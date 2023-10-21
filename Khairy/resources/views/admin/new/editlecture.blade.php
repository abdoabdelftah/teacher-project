@extends('admin.layouts.new-app')
@section('css')

    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/jstree/jstree.css') }}" />
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
                    <h4>تعديل جزء من حصة</h4>



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
            <div class="card">
                <div class="card-body">


                    <div class="card-header p-0">
                        <div class="nav-align-top">
                            <ul class="nav nav-tabs nav-fill" role="tablist">

                                <li class="nav-item">
                                    <button type="button" class="nav-link @if ($data->type == 2) active @endif"
                                        role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-profile"
                                        aria-controls="navs-justified-profile"
                                        aria-selected="@if ($data->type == 2) true @else false @endif"><i
                                            class="tf-icons mdi mdi-account-outline me-1"></i> ملف</button>
                                </li>
                                <li class="nav-item">
                                    <button type="button" class="nav-link @if ($data->type == 1) active @endif"
                                        role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-messages"
                                        aria-controls="navs-justified-messages"
                                        aria-selected="@if ($data->type == 1) true @else false @endif"><i
                                            class="tf-icons mdi mdi-message-text-outline me-1"></i> صورة</button>
                                </li>
                                <li class="nav-item">
                                    <button type="button" class="nav-link @if ($data->type == 3) active @endif"
                                        role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-home"
                                        aria-controls="navs-justified-home"
                                        aria-selected="@if ($data->type == 3) true @else false @endif"><i
                                            class="tf-icons mdi mdi-message-text-outline me-1"></i> فديو</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content p-0">

                            <div class="tab-pane @if ($data->type == 2) show active @else fade @endif"
                                id="navs-justified-profile" role="tabpanel">

                                <div class="col-md">
                                    <div class="card mb-3">
                                        <div class="row g-0">
                                            <form method="POST" class="pt-3" enctype="multipart/form-data" action="{{ route('update.lecture') }}">
                                                @csrf
                                                <input type="hidden" name="type" value="2">
                                                <input type="hidden" name="id" value="{{$id}}">
                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    <div class="form-group d-flex justify-content-between">
                                                        <input class="form-control" name = "content" type="file"
                                                            id="formFile">
                                                        <button type="submit"
                                                            class="btn rounded-pill btn-label-success waves-effect">حفظ</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if ($data->type == 2 && !empty($data->content))
                                    <embed src="{{ $data->content }}" type="application/pdf" width="100%"
                                        height="600px" />
                                @endif


                            </div>
                            <div class="tab-pane @if ($data->type == 1) show active @else fade @endif"
                                id="navs-justified-messages" role="tabpanel">

                                <div class="col-md">
                                    <div class="card mb-3">
                                        <div class="row g-0">
                                            <form method="POST" class="pt-3" enctype="multipart/form-data" action="{{ route('update.lecture') }}">
                                                @csrf
                                                <input type="hidden" name="type" value="3">
                                                <input type="hidden" name="id" value="{{$id}}">
                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    <div class="form-group d-flex justify-content-between">
                                                        <input class="form-control" name = "content" type="file"
                                                            id="formFile">
                                                        <button type="submit"
                                                            class="btn rounded-pill btn-label-success waves-effect">حفظ</button>
                                                        </form>
                                                      </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if ($data->type == 1 && !empty($data->content))
                                    <img src="{{ $data->content }}" alt="image" style=" max-width: 100%;
                                    height: auto;">
                                @endif


                            </div>

                            <div class="tab-pane @if ($data->type == 3) show active @else fade @endif"
                                id="navs-justified-home" role="tabpanel">

                                <div class="row">
                                    <div class="col mb-4 mt-2">
                                        <div class="form-floating form-floating-outline">
                                            <div class="row">
                                                <p>رابط الفديو</p>
                                            </div>
                                            <form method="POST" class="pt-3" enctype="multipart/form-data" action="{{ route('update.lecture') }}">
                                                @csrf
                                                <input type="hidden" name="type" value="4">
                                                <input type="hidden" name="id" value="{{$id}}">
                                            <div class="form-group d-flex justify-content-between">
                                                <input type="text" id="name" name="content" class="form-control"
                                                    value="@if ($data->type == 3 && !empty($data->content)) {{ $data->content }} @endif">
                                                    <button type="submit"
                                                    class="btn rounded-pill btn-label-success waves-effect">حفظ</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="p-2">
                                    <div class="cursor-pointer">


                                        <div oncontextmenu="return false;">

                                            <!-- <iframe oncontextmenu="return false;" id="fraDisabled" src="https://drive.google.com/file/d/1-imMPCOKReRp_Mq3kxjYW-kqc8lfRvoe/preview"   width="640" height="480" frameborder="0" scrolling="no" seamless="">
                                             </iframe>
                                           -->

                                           <video width="100%" height="100%" position="relative" controls>



                                           <source src="{{url('https://drive.google.com/uc?export=preview&id='.$data->content)}}" type="video/mp4">



                                             Your browser does not support the video tag.
                                             </video>

                                            </div>

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>










@stop
@section('js')


    <script src="{{ asset('admin/assets/vendor/libs/jstree/jstree.js') }}"></script>

    <script src="{{ asset('admin/assets/js/extended-ui-treeview.js') }}"></script>


    <script>
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



        $('.edit-unit').click(function() {

            var unitId = $(this).data('unit-id');

            $.ajax({
                url: '/admin/units/edit/' + unitId,
                method: 'GET',
                success: function(data) {
                    // Step 4: Populate modal inputs with fetched data
                    $('#name').val(data.name);
                    $('#unit-id').val(unitId);
                    if (data.image) {
                        $('#image').attr("src", data.image);
                    } else {
                        $('#image').attr("src", "{{ asset('admin/assets/img/smallfolder.png') }}");
                    }
                    $('#hide').prop('checked', data.hide);

                    // Step 5: Open the modal
                    $('#editGradeModal').modal('show');
                }
            });
        });

    </script>

<script src="https://www.youtube.com/iframe_api"></script>


@stop
