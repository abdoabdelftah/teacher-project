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


        @if (count($lessonsection->sectionFollowup) > 0 && $lessonsection->sectionFollowup[0]->done == 1)
        <div class="card">
            <div class="card-body">
                @if (count($lessonsection->sectionFollowup) > 0 &&
                        $lessonsection->sectionFollowup[0]->done == 1 &&
                        $lessonsection->sectionFollowup[0]->done_correcting == 0)
                    <center>
                        <div class="row"
                            style="border-radius: 30%; border: solid blue 3px; padding: 30px; display: inline-block;">

                            <h3>الاجابة قيد التصحيح والمراجعة</h3>
                        </div>
                    </center>
                @elseif(count($lessonsection->sectionFollowup) > 0 &&
                        $lessonsection->sectionFollowup[0]->done == 1 &&
                        $lessonsection->sectionFollowup[0]->done_correcting == 1)
                    <center>
                        <div class="row"
                            style="border-radius: 30%; border: solid green 3px; padding: 30px; display: inline-block;">


                            <h3 style="color: rgb(11, 109, 255);">
                                نتيجة الطالب هى : {{ $data[0]->studentexamanswers[0]->points ? $data[0]->studentexamanswers[0]->points : 0 }} من {{ $data[0]->points }} </h3>

                        </div>
                    </center>
                @endif
            </div>
        </div>
    @endif



        <div class="col-sm-6 col-xl-12">
            <div class="card">
                <div class="card-body " style="display: flex; justify-content: space-between; align-items: center;">
                    <h4>{{ $lessonsection->name }}</h4>

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

            @foreach ($data as $exam)
                <div class="card">
                    <div class="card-body">

                        <div class="row">


                            @if ($exam->question_type == 1)
                                <h3> {{ $exam->question }}</h3>
                            @endif

                            @if ($exam->question_type == 2)
                                <img src="{{ $exam->question }}" style=" width: 100%; height: auto;">
                            @endif

                            <center> <span class="mdi mdi-48px mdi-arrow-down-circle-outline"></span></center>

                            <div class="accordion" id="collapsibleSection">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingDeliveryOptions1">
                                        <button type="button" class="accordion-button " data-bs-toggle="collapse"
                                            data-bs-target="#collapseDeliveryOptions1" aria-expanded="false"
                                            aria-controls="collapseDeliveryOptions1"><b> اجابة الطالب </b></button>
                                    </h2>
                                    <div id="collapseDeliveryOptions1" class="accordion-collapse collapse show"
                                        aria-labelledby="headingDeliveryOptions1" data-bs-parent="#collapsibleSection">
                                        <div class="accordion-body">
                                            <div class="row">

                                                @if (count($exam->studentexamanswers) > 0 && !empty($exam->studentexamanswers[0]->student_answer))
                                                    <h3> {{ $exam->studentexamanswers[0]->student_answer }}</h3>
                                                @endif


                                                @if (count($exam->studentexamanswers) > 0 && !empty($exam->studentexamanswers[0]->student_answer_picture))
                                                    <img src="{{ $exam->studentexamanswers[0]->student_answer_picture }}"
                                                        style=" width: 100%; height: auto;">
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion" id="collapsibleSection">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingDeliveryOptions">
                                        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#collapseDeliveryOptions" aria-expanded="false"
                                            aria-controls="collapseDeliveryOptions"> <b>تصحيح الاجابة </b></button>
                                    </h2>
                                    <div id="collapseDeliveryOptions" class="accordion-collapse collapse"
                                        aria-labelledby="headingDeliveryOptions" data-bs-parent="#collapsibleSection">
                                        <div class="accordion-body">
                                            <div class="row">



                                                <div class="row g-0" id="displayI">
                                                    <label for="roundedInput" class="form-label">التصحيح</label>
                                                    <div class="col-md-4"
                                                        style="display: flex;  justify-content: center; align-items: center;">
                                                        @if (count($exam->studentexamanswers) > 0 && !empty($exam->studentexamanswers[0]->right_answer_picture))
                                                            <img id="image"
                                                                src="{{ $exam->studentexamanswers[0]->right_answer_picture }}"
                                                                alt="Card image" style="max-width: 100%;">
                                                        @endif
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <input class="form-control" name = "image" type="file"
                                                                id="formFile">

                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="mt-2">
                                                    <label for="roundedInput" class="form-label">درجة الطالب بالامتحان</label>
                                                    <input id="roundedInput" class="form-control rounded-pill"
                                                        value="{{ $exam->studentexamanswers[0]->points != null ? $exam->studentexamanswers[0]->points : $exam->points }}"
                                                        name ="points" type="number" />
                                                </div>

                                                <input type="hidden" name="exam_id"
                                                    value="{{ $exam->studentexamanswers[0]->exam_id }}">

                                                <input type="hidden" name="user_id"
                                                    value="{{ $exam->studentexamanswers[0]->student_id }}">

                                                <br>

                                        @if($lessonsection->sectionFollowup[0]->done_correcting == 0)
                                                <center>
                                                    <div class="col-5">
                                                        <button
                                                            class="btn save-btn rounded-pill btn-label-info waves-effect">حفظ</button>
                                                    </div>
                                                </center>
                                        @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>

                <br>
            @endforeach

            @if($lessonsection->sectionFollowup[0]->done_correcting == 0)
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <center>
                            <button class="btn rounded-pill btn-label-success waves-effect"
                                section-followup-id="{{ $lessonsection->sectionFollowup[0]->id }}">تم تصحيح
                                الامتحان</button>
                        </center>

                    </div>
                </div>
            </div>
            @endif

        </div>












    @stop
    @section('js')


        <script src="{{ asset('admin/assets/vendor/libs/jstree/jstree.js') }}"></script>

        <script src="{{ asset('admin/assets/js/extended-ui-treeview.js') }}"></script>

        <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
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



            $(document).ready(function() {
                $('.save-btn').on('click', function() {
                    var card = $(this).closest('.card');
                    var pointsValue = card.find('input[name="points"]').val();
                    var examId = card.find('input[name="exam_id"]').val();
                    var userId = card.find('input[name="user_id"]').val();
                    var imageInput = card.find('input[name="image"]')[0]; // Get the input element

                    // Create FormData object
                    var formData = new FormData();
                    formData.append('points', pointsValue);
                    formData.append('exam_id', examId);
                    formData.append('user_id', userId);
                    formData.append('image', imageInput.files[0]); // Append the selected file
                    formData.append('_token', '{{ csrf_token() }}'); // Add CSRF token


                    // Send data to the controller using AJAX
                    $.ajax({
                        type: 'POST',
                        url: '/admin/correct/question',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {


                            Toastify({
                                text: "تم حفظ تصحيحك للملف",
                                duration: 3000, // Display duration in milliseconds
                                gravity: "top", // Position of the toast
                                close: true // Show close button
                            }).showToast();

                        },
                        error: function(error) {
                            console.error(error);
                            // You can handle error behavior here
                        }
                    });
                });
            });

            $(document).ready(function() {
                $('.btn-label-success').on('click', function() {
                    var sectionFollowupId = $(this).attr('section-followup-id');

                    // Send data to the controller using AJAX
                    $.ajax({
                        type: 'POST',
                        url: '/admin/update-section-followup',
                        data: {
                            section_followup_id: sectionFollowupId,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {

                            Toastify({
                                text: "تم تصحيح الامتحان",
                                duration: 3000, // Display duration in milliseconds
                                gravity: "top", // Position of the toast
                                close: true // Show close button
                            }).showToast();

                            setTimeout(function() {
                                location.reload();
                            }, 3000);
                            // You can handle success behavior here
                        },
                        error: function(error) {
                            console.error(error);
                            // You can handle error behavior here
                        }
                    });
                });
            });
        </script>




    @stop