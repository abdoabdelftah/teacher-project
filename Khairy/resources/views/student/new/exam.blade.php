@extends('student.layouts.exam-app')
@section('css')

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/jstree/jstree.css') }}" />

@stop


@section('content')


    <div class="row g-4 mb-4">

        @if (count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 1)
            <div class="card">
                <div class="card-body">
                    <center>
                        <div class="row"
                            style="border-radius: 30%; border: solid green 3px; padding: 30px; display: inline-block;">

                            @php
                                $totalPoints = $data
                                    ->pluck('studentexamanswers')
                                    ->flatten()
                                    ->sum('points');
                            @endphp

                            <h3 style="color: rgb(11, 109, 255);">
                                نتيجتك هى : {{ $totalPoints }} من {{ $data->sum('points') }} </h3>

                        </div>
                    </center>
                </div>
            </div>


        @endif

        @foreach ($data as $exam)
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <input type="hidden" class="exam-id-input" name="exam_id" value="{{ $exam->id }}">
                        <input type="hidden" name="student_id" value="{{ auth()->user()->id }}">

                        @if ($exam->question_type == 1)
                            <h3>{{ $exam->question }}</h3>
                        @endif

                        @if ($exam->question_type == 2)
                            <img src="{{ $exam->question }}" style="width: 100%; height: auto;">
                        @endif

                        @if ($exam->choose_type == 1)
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <div class="col-sm-7">
                                        <div class="form-check">
                                            <label class="form-check-label"
                                                @if (count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 1 && $exam->right_answer == 'choose1') style="border-radius:60%; border:solid @if (count($exam->studentexamanswers) > 0 && $exam->right_answer == $exam->studentexamanswers[0]->student_answer) green @else red @endif
                                                3px;padding:12px" @endif>
                                                <input type="radio" class="form-check-input"
                                                    name="answer[{{ $exam->id }}]" value="choose1"
                                                    @if (
                                                        $exam->choose_type == 1 &&
                                                            count($exam->studentexamanswers) > 0 &&
                                                            $exam->studentexamanswers[0]->student_answer == 'choose1') checked @endif
                                                    @if (count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 1) disabled @endif> {{ $exam->choose1 }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <label class="form-check-label"
                                                @if (count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 1 && $exam->right_answer == 'choose2') style="border-radius:60%; border:solid @if (count($exam->studentexamanswers) > 0 && $exam->right_answer == $exam->studentexamanswers[0]->student_answer) green @else red @endif
                                                3px;padding:12px" @endif>
                                                <input type="radio" class="form-check-input"
                                                    name="answer[{{ $exam->id }}]" value="choose2"
                                                    @if (
                                                        $exam->choose_type == 1 &&
                                                            count($exam->studentexamanswers) > 0 &&
                                                            $exam->studentexamanswers[0]->student_answer == 'choose2') checked @endif
                                                    @if (count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 1) disabled @endif>
                                                {{ $exam->choose2 }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="form-check">
                                            <label class="form-check-label"
                                                @if (count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 1 && $exam->right_answer == 'choose3') style="border-radius:60%; border:solid @if (count($exam->studentexamanswers) > 0 && $exam->right_answer == $exam->studentexamanswers[0]->student_answer) green @else red @endif
                                                3px;padding:12px" @endif>
                                                <input type="radio" class="form-check-input"
                                                    name="answer[{{ $exam->id }}]" value="choose3"
                                                    @if (
                                                        $exam->choose_type == 1 &&
                                                            count($exam->studentexamanswers) > 0 &&
                                                            $exam->studentexamanswers[0]->student_answer == 'choose3') checked @endif
                                                    @if (count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 1) disabled @endif>
                                                {{ $exam->choose3 }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <label class="form-check-label"
                                                @if (count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 1 && $exam->right_answer == 'choose4') style="border-radius:60%; border:solid @if (count($exam->studentexamanswers) > 0 && $exam->right_answer == $exam->studentexamanswers[0]->student_answer) green @else red @endif
                                                3px;padding:12px" @endif>
                                                <input type="radio" class="form-check-input"
                                                    name="answer[{{ $exam->id }}]" value="choose4"
                                                    @if (
                                                        $exam->choose_type == 1 &&
                                                            count($exam->studentexamanswers) > 0 &&
                                                            $exam->studentexamanswers[0]->student_answer == 'choose4') checked @endif
                                                    @if (count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 1) disabled @endif>
                                                {{ $exam->choose4 }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($exam->choose_type == 2)
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <div class="col-sm-7">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input"
                                                    name="answer{{ $exam->id }}" value="choose1"
                                                    @if (
                                                        $exam->choose_type == 2 &&
                                                            count($exam->studentexamanswers) > 0 &&
                                                            $exam->studentexamanswers[0]->student_answer == 'choose1') checked @endif
                                                    @if (count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 1) disabled @endif> أ
                                            </label>
                                            <div class="col-md-4">
                                                <img src="{{ $exam->choose1 }}" width="200px" height="100px"
                                                    @if (count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 1 && $exam->right_answer == 'choose1') style="border-radius:60%; border:solid @if (count($exam->studentexamanswers) > 0 && $exam->right_answer == $exam->studentexamanswers[0]->student_answer) green @else red @endif
                                                    3px;padding:12px" @endif>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input"
                                                    name="answer{{ $exam->id }}" value="choose2"
                                                    @if (
                                                        $exam->choose_type == 2 &&
                                                            count($exam->studentexamanswers) > 0 &&
                                                            $exam->studentexamanswers[0]->student_answer == 'choose2') checked @endif
                                                    @if (count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 1) disabled @endif> ب
                                            </label>
                                            <div class="col-md-4">
                                                <img src="{{ $exam->choose2 }}" width="200px" height="100px"
                                                    @if (count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 1 && $exam->right_answer == 'choose2') style="border-radius:60%; border:solid @if (count($exam->studentexamanswers) > 0 && $exam->right_answer == $exam->studentexamanswers[0]->student_answer) green @else red @endif
                                                    3px;padding:12px" @endif>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input"
                                                    name="answer{{ $exam->id }}" value="choose3"
                                                    @if (
                                                        $exam->choose_type == 2 &&
                                                            count($exam->studentexamanswers) > 0 &&
                                                            $exam->studentexamanswers[0]->student_answer == 'choose3') checked @endif
                                                    @if (count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 1) disabled @endif> ج
                                            </label>
                                            <div class="col-md-4">
                                                <img src="{{ $exam->choose3 }}" width="200px" height="100px"
                                                    @if (count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 1 && $exam->right_answer == 'choose3') style="border-radius:60%; border:solid @if (count($exam->studentexamanswers) > 0 && $exam->right_answer == $exam->studentexamanswers[0]->student_answer) green @else red @endif
                                                    3px;padding:12px" @endif>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input"
                                                    name="answer{{ $exam->id }}" value="choose4"
                                                    @if (
                                                        $exam->choose_type == 2 &&
                                                            count($exam->studentexamanswers) > 0 &&
                                                            $exam->studentexamanswers[0]->student_answer == 'choose4') checked @endif
                                                    @if (count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 1) disabled @endif> د
                                            </label>
                                            <div class="col-md-4">
                                                <img src="{{ $exam->choose4 }}" width="200px" height="100px"
                                                    @if (count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 1 && $exam->right_answer == 'choose4') style="border-radius:60%; border:solid @if (count($exam->studentexamanswers) > 0 && $exam->right_answer == $exam->studentexamanswers[0]->student_answer) green @else red @endif
                                                    3px;padding:12px" @endif>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach


        @if (count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 0)
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <center> <button type="button" class="btn rounded-pill btn-label-secondary waves-effect btn-lg"
                                id = "saveButton">
                                انهاء الامتحان
                            </button> </center>

                    </div>
                </div>
            </div>
        @endif

    </div>



    <!-- Modal -->
    <div class="modal fade" id="startModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel1">{{ $section->name }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <h4>انت على وشك البدأ فى الاجابة عن امتحان مدته {{ $section->stop_watch }} دقائق</h4>

                    <center> <button type="button" class="btn rounded-pill btn-label-success waves-effect"
                            id = "startButton">
                            البدأ فى الامتحان
                        </button> </center>



                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="timeEndModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel1">{{ $section->name }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <h4>انتهى وقت الامتحان</h4>





                </div>

            </div>
        </div>
    </div>




@stop


@section('js')


    <script src="{{ asset('admin/assets/vendor/libs/jstree/jstree.js') }}"></script>

    <script src="{{ asset('admin/assets/js/extended-ui-treeview.js') }}"></script>


    <script>
        $(document).ready(function() {
            // Add a click event handler to all radio inputs
            $('input[type="radio"]').on('click', function() {
                // Get the values from hidden inputs
                var studentId = $('input[name="student_id"]').val();

                // Find the closest exam-id-input element to the clicked radio input
                var examIdInput = $(this).closest('.card').find('.exam-id-input');
                var examId = examIdInput.val();

                // Get the value of the clicked radio input
                var studentAnswer = $(this).val();
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                // Create a data object to send in the POST request
                var data = {
                    _token: csrfToken, // Include the CSRF token
                    student_id: studentId,
                    exam_id: examId,
                    student_answer: studentAnswer
                };

                // Send a POST request to your controller endpoint
                $.post('/save-student-answer', data, function(response) {
                    // Handle the response from the server if needed
                    console.log(response);
                });
            });
        });



        $(document).ready(function() {
            csrfToken = $('meta[name="csrf-token"]').attr('content');
            // Make an AJAX request to check follow-up on page load
            $.ajax({
                url: '/check-followup', // Update with your actual route
                method: 'POST',
                data: {
                    // Include any required parameters here
                    _token: csrfToken,
                    student_id: {{ auth()->user()->id }},
                    lesson_section_id: {{ $section->id }}
                },
                success: function(response) {
                    if (response.code == 200) {
                        if (response.message.done == 0) {
                            @if ($section->has_time == 1)
                                // Calculate countdown time in milliseconds
                                var createdTimestamp = new Date(response.message.created_at).getTime();
                                var countdownDuration = {{ $section->stop_watch }} * 60 *
                                    1000; // Convert minutes to milliseconds
                                var countdownEndTime = createdTimestamp + countdownDuration;

                                // Update countdown timer every second
                                var x = setInterval(function() {
                                    // Get current time
                                    var now = new Date().getTime();

                                    // Calculate remaining time
                                    var distance = countdownEndTime - now;

                                    // Check if countdown has expired
                                    if (distance <= 0) {
                                        clearInterval(x);
                                        $("#countdown-timer").html("انتهى الوقت");
                                        // Add code to handle timer expiration here

                                        $.ajax({
                                            url: '/add-followup', // Update with your actual route
                                            method: 'POST',
                                            data: {
                                                // Include any required parameters here
                                                _token: csrfToken,
                                                student_id: {{ auth()->user()->id }},
                                                lesson_section_id: {{ $section->id }},
                                                done: 1 // Update with the actual value
                                            },
                                            success: function(response) {
                                                // Close the modal or perform any other actions
                                                $('#timeEndModal').modal('show');

                                                setTimeout(function() {
                                                    location.reload();
                                                }, 5000);

                                            }
                                        });

                                    } else {
                                        // Calculate minutes and seconds
                                        var minutes = Math.floor(distance / (1000 * 60));
                                        var seconds = Math.floor((distance % (1000 * 60)) /
                                            1000);

                                        // Display the countdown timer
                                        $("#countdown-timer").html("الوقت المتبقى: " + minutes +
                                            "د " +
                                            seconds + "ث ");
                                    }
                                }, 1000);
                            @endif

                        }
                    }
                    if (response.code == 400) {
                        // Show modal with "Start" button

                        showStartModal();





                    }
                }
            });

            // Function to show the modal with "Start" button
            function showStartModal() {
                // You can use your preferred modal library or create a custom modal
                // For simplicity, let's assume you have a modal with id "startModal"
                @if ($section->has_time == 1)

                    $('#startModal').modal('show');

                    @else

                    $.ajax({
                        url: '/add-followup', // Update with your actual route
                        method: 'POST',
                        data: {
                            // Include any required parameters here
                            _token: csrfToken,
                            student_id: {{ auth()->user()->id }},
                            lesson_section_id: {{ $section->id }},
                            done: 0 // Update with the actual value
                        },
                        success: function(response) {
                            // Close the modal or perform any other actions
                            location.reload();
                        }
                    });

                @endif

                var startButtonClicked = false;


                $('#startButton').on('click', function() {
                    startButtonClicked = true;
                    // Make an AJAX request to add follow-up when "Start" is clicked
                    $.ajax({
                        url: '/add-followup', // Update with your actual route
                        method: 'POST',
                        data: {
                            // Include any required parameters here
                            _token: csrfToken,
                            student_id: {{ auth()->user()->id }},
                            lesson_section_id: {{ $section->id }},
                            done: 0 // Update with the actual value
                        },
                        success: function(response) {
                            // Close the modal or perform any other actions
                            $('#startModal').modal('hide');
                            location.reload();
                        }
                    });
                });

                $('#startModal').on('hidden.bs.modal', function() {
                    if (!startButtonClicked) {
                        var currentUrl = window.location.href;

                        // Remove the specific segment "lessonsectionexam" from the URL
                        var redirectUrl = currentUrl.replace(/\/lessonsectionexam\/\d+$/,
                            '/lessonsections');

                        // Redirect to the new URL
                        window.location.href = redirectUrl;
                    }
                });


            }

            $('#saveButton').on('click', function() {


                $.ajax({
                    url: '/add-followup', // Update with your actual route
                    method: 'POST',
                    data: {
                        // Include any required parameters here
                        _token: csrfToken,
                        student_id: {{ auth()->user()->id }},
                        lesson_section_id: {{ $section->id }},
                        done: 1 // Update with the actual value
                    },
                    success: function(response) {
                        // Close the modal or perform any other actions

                        setTimeout(function() {
                            location.reload();
                        }, 1000);

                    }
                });

            });

        });
    </script>


@stop
