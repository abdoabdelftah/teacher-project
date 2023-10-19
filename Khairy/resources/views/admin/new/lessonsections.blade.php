@extends('admin.layouts.new-app')
@section('css')

    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/jstree/jstree.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/pages/cards-statistics.css') }}" />


    <style>
        .custom-btn {
            padding: 10px 20px;
            background-color: #666CFF;
            color: #fff;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .custom-btn:hover {
            background-color: #0056b3;
        }
    </style>
@stop
@section('content')


    <div class="row g-4 mb-4">

        <div class="col-sm-6 col-xl-12">
            <div class="card">
                <div class="card-body " style="display: flex; justify-content: space-between; align-items: center;">
                    <h4>اجزاء الدرس</h4>

                    <button type="button" class="custom-btn" data-bs-toggle="modal" data-bs-target="#addGradeModal">اضافة
                        جزء </button>

                </div>
            </div>
        </div>


        <div class="col-sm-6 col-xl-4">
            <div class="card">
                <div class="card-body" style="overflow: auto;">


                    <h5 class="card-header">الخريطة</h5>
                    <div class="card-body">
                        <div id="jstree-basic">
                            <ul>
                                {{-- class="jstree-open" --}}
                                @foreach ($grades as $grade)
                                    <li data-jstree='{"icon" : "mdi mdi-folder-outline"}'>

                                        <span grade-id = "{{ $grade->id }}"> {{ $grade->name }} </span>

                                        <ul>

                                            @foreach ($grade->units as $unit)
                                                <li data-jstree='{"icon" : "mdi mdi-folder-outline"}'>
                                                    <span unit-id = "{{ $unit->id }}"> {{ $unit->name }}</span>
                                                    <ul>


                                                        @foreach ($unit->lessons as $lesson)
                                                            <li data-jstree='{"icon" : "mdi mdi-folder-outline"}'>
                                                                <span lesson-id = "{{ $lesson->id }}"> {{ $lesson->name }}
                                                                </span>
                                                            </li>
                                                        @endforeach

                                                    </ul>
                                                </li>
                                            @endforeach
                                        </ul>

                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>



                </div>
            </div>
        </div>


        <div class="col-sm-6 col-xl-8">




            <!-- Cards Draggable -->
            <div class="swiper-container swiper-container-horizontal swiper swiper-sales" id="swiper-weekly-sales">
                <div class="swiper-wrapper">

                    <div class="row mb-2" id="sortable-cards">

                        @foreach ($data as $section)
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card drag-item cursor-move mb-lg-0 mb-4" sort-section-id="{{ $section->id }}" data-priority="{{ $section->priority }}">

                                        <div class="swiper-slide pb-3" style="margin-left: 10px;">

                                            <div class="dropdown" style="position: absolute; top: 10px; left: 10px;">
                                                <button class="btn p-0" type="button" id="organicSessionsDropdown"
                                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="mdi mdi-dots-vertical mdi-24px"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="organicSessionsDropdown">
                                                    <a class="dropdown-item edit-section"
                                                        data-section-id="{{ $section->id }}"
                                                        href="javascript:void(0);">تعديل</a>
                                                </div>
                                            </div>


                                            <h5 class="mb-2">{{ $section->name }} @if ($section->hide == 1)
                                                    <i class="mdi mdi-eye-off-outline"></i>
                                                @endif
                                            </h5>
                                            <div class="d-flex align-items-center gap-2">

                                            </div>
                                            <div class="d-flex align-items-center mt-3">

                                                @if ($section->section_type == 5 || $section->section_type == 7)
                                                    <!-- شرح -->
                                                    @if($section->lecture && $section->lecture->type == 2)<span class="mdi mdi-panorama-variant-outline mdi-48px"></span>
                                                    @elseif($section->lecture && $section->lecture->type == 3)  <span class="mdi mdi-file-pdf-box mdi-48px"></span>
                                                    @elseif($section->lecture && $section->lecture->type == 4)  <span class="mdi mdi-video-outline mdi-48px"></span>
                                                    @else  <span class="mdi mdi-book-open-page-variant-outline mdi-48px"></span>
                                                    @endif

                                                @endif

                                                @if ($section->section_type == 1)
                                                    <!-- واجب-->
                                                    <span class="mdi mdi-table-check mdi-48px"></span>
                                                @endif

                                                @if ($section->section_type == 2)
                                                    <!-- امتحان الاختيار من متعدد-->
                                                    <span class="mdi mdi-timetable mdi-48px"></span>
                                                @endif

                                                @if ($section->section_type == 6)
                                                    <!--  امتحان الاجابة المقالية-->
                                                    <span class="mdi mdi-pencil-box-outline mdi-48px"></span>
                                                @endif

                                                <div class="d-flex flex-column w-100 ms-4">
                                                    <h6 class="mb-3">

                                                        @if ($section->section_type == 5 || $section->section_type == 7)
                                                        {{$section->lecture && $section->lecture->type == 2 ?'صورة' : '' }}
                                                        {{$section->lecture && $section->lecture->type == 3 ?'ملف' : '' }}
                                                        {{$section->lecture && $section->lecture->type == 4 ?'فديو' : '' }}
                                                        {{!$section->lecture || $section->lecture->type == Null ?'صورة او فديو او ملف' : '' }}
                                                        @endif

                                                        @if ($section->section_type == 1)
                                                            امتحان الاختيار من متعدد بدون وقت
                                                        @endif

                                                        @if ($section->section_type == 2)
                                                            امتحان الاختيار من متعدد بوقت
                                                        @endif

                                                        @if ($section->section_type == 6)
                                                            امتحان الاجابة المقالية
                                                        @endif



                                                    </h6>
                                                    <div class="row d-flex flex-wrap justify-content-between">
                                                        <div class="col-6">
                                                            <ul class="list-unstyled mb-0">
                                                                <li class="d-flex mb-2 pb-1 align-items-center">
                                                                    <small
                                                                        class="mb-0 me-2 sales-text-bg bg-label-secondary">{{ $section->section_followup_count }}</small>
                                                                    <a
                                                                        href="{{ url('admin/student/lessonsection/answered/' . $section->id) }}"><small
                                                                            class="mb-0 text-truncate">مشاهدة</small> </a>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                        <div class="col-6">
                                                            <ul class="list-unstyled mb-0">
                                                                <li class="d-flex mb-2 pb-1 align-items-center">
                                                                    <small
                                                                        class="mb-0 me-2 sales-text-bg bg-label-secondary">{{ $userCount - $section->section_followup_count }}</small>
                                                                    <a
                                                                        href="{{ url('admin/student/lessonsection/notanswered/' . $section->id) }}"><small
                                                                            class="mb-0 text-truncate">لم يشاهد</small> </a>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-3 pt-1">
                                                <div class="text-end">

                                                    @if ($section->section_type == 5 || $section->section_type == 7)
                                                    <a href="{{ url('admin/lectureedit/' . $section->id) }}"
                                                        type="button"
                                                        class="btn rounded-pill btn-label-info waves-effect">المحتوى</a>


                                                    @endif

                                                    @if ($section->section_type == 1)
                                                        <a href="{{ url('admin/lessonhomeworks/' . $section->id) }}"
                                                            type="button"
                                                            class="btn rounded-pill btn-label-info waves-effect">المحتوى</a>
                                                    @endif

                                                    @if ($section->section_type == 2)
                                                        <a href="{{ url('admin/lessonexams/' . $section->id) }}"
                                                            type="button"
                                                            class="btn rounded-pill btn-label-info waves-effect">المحتوى</a>
                                                    @endif


                                                    @if ($section->section_type == 6)
                                                        <a href="{{ url('admin/lessontextexams/' . $section->id) }}"
                                                            type="button"
                                                            class="btn rounded-pill btn-label-info waves-effect">المحتوى</a>
                                                    @endif


                                                    </td>

                                                </div>
                                            </div>
                                        </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>




        <!-- Modal -->
        <div class="modal fade" id="editGradeModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="POST" action="{{ route('update.lessonsection') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value ="" id="section-id">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel1">تعديل جزء من درس</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">


                            <div class="row">
                                <div class="col mb-4 mt-2">
                                    <div class="form-floating form-floating-outline">
                                        <input type="text" id="name" name="name" class="form-control">

                                        <label for="name">الاسم</label>
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col mb-4 mt-2">
                                    <input type="checkbox" id="block" class="form-check-input" name="block">
                                    <label for="block">ضرورى للاستمرار</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-4 mt-2">
                                    <input type="checkbox" id="hide" class="form-check-input" name="hide">
                                    <label for="hide">اخفاء</label>
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary"
                                data-bs-dismiss="modal">الغاء</button>
                            <button type="submit" class="btn btn-primary">حفظ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>




        <!-- Modal -->
        <div class="modal fade" id="addGradeModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="POST" action="{{ route('store.lessonsection') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value ="" name="grade_id" id="section-id">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel1">اضافة وحدة</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">


                            <div class="row">
                                <div class="col mb-4 mt-2">
                                    <div class="form-floating form-floating-outline">
                                        <input type="text" name="name" class="form-control">

                                        <label for="name">الاسم</label>
                                    </div>
                                </div>
                            </div>

                            <input type="checkbox" class="form-check-input" name="hide">
                            <label for="hide">اخفاء</label>


                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary"
                                data-bs-dismiss="modal">الغاء</button>
                            <button type="submit" class="btn btn-primary">حفظ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>





    @stop
    @section('js')


        <script src="{{ asset('admin/assets/vendor/libs/jstree/jstree.js') }}"></script>

        <script src="{{ asset('admin/assets/js/extended-ui-treeview.js') }}"></script>

        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

        <script>


          $(function() {
        $("#sortable-cards").sortable({
            axis: "y", // Allow vertical sorting only
            update: function(event, ui) {
                $(this).children().each(function(index) {
                    $(this).attr('data-priority', index + 1);
                });

                // Send the updated order to the server using an AJAX request
                updateCardPriorities();
            }
        });
        $("#sortable-cards").disableSelection();
    });

    function updateCardPriorities() {
        var priorities = [];
        $("#sortable-cards .card").each(function() {
            priorities.push({
                id: $(this).attr('sort-section-id'),
                priority: $(this).attr('data-priority')
            });
        });

        // Send an AJAX request to update the priorities in the database
        $.ajax({
            url: "{{route('update.order')}}", // Adjust the route to your Laravel route
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                priorities: priorities
            },
            success: function(response) {

                    Toastify({
                        text: "تم تغيير الترتيب بنجاح",
                        duration: 3000,  // Display duration in milliseconds
                        gravity: "top",  // Position of the toast
                        close: true  // Show close button
                    }).showToast();

            },
            error: function(error) {
                console.error('Error updating card priorities:', error);
            }
        });
    }

            $(document).on('click', 'span[grade-id]', function() {
                var gradeId = $(this).attr('grade-id');
                if (gradeId) {
                    window.location.href = '/admin/units/' + gradeId;
                }
            });

            $(document).on('click', 'span[unit-id]', function() {
                var unitId = $(this).attr('unit-id');
                if (unitId) {
                    window.location.href = '/admin/lessons/' + unitId;
                }
            });

            $(document).on('click', 'span[lesson-id]', function() {
                var lessonId = $(this).attr('lesson-id');
                if (lessonId) {
                    window.location.href = '/admin/lessonsections/' + lessonId;
                }
            });



            $('.edit-section').click(function() {

                var sectionId = $(this).data('section-id');

                $.ajax({
                    url: '/admin/lessonsections/edit/' + sectionId,
                    method: 'GET',
                    success: function(data) {
                        // Step 4: Populate modal inputs with fetched data
                        $('#name').val(data.name);
                        $('#section-id').val(sectionId);
                        $('#hide').prop('checked', data.hide);
                        $('#block').prop('checked', data.block);
                        // Step 5: Open the modal
                        $('#editGradeModal').modal('show');
                    }
                });
            });


        </script>

        <script src="{{ asset('admin/assets/vendor/libs/sortablejs/sortable.js') }}"></script>


        <script src="{{ asset('admin/assets/js/extended-ui-drag-and-drop.js') }}"></script>


        <script src="{{ asset('admin/assets/js/cards-statistics.js') }}"></script>

    @stop
