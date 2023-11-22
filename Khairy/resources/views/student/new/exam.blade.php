@extends('student.layouts.exam-app')
@section('css')

<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="{{asset('admin/assets/vendor/libs/jstree/jstree.css')}}" />

@stop
@section('content')




<div class="row g-4 mb-4">
    @foreach ($data as $exam)
        <div class="card">
            <div class="card-body">
                <div class="row">
                    {{$exam->id}}
                    <input type="hidden" class="exam-id-input" name="exam_id" value="{{$exam->id}}">
                    <input type="hidden" name="student_id" value="{{auth()->user()->id}}">

                    @if($exam->question_type == 1)
                        <h3>{{$exam->question}}</h3>
                    @endif

                    @if($exam->question_type == 2)
                        <img src="{{$exam->question}}" style="width: 100%; height: auto;">
                    @endif

                    @if($exam->choose_type == 1)
                        <div class="col-md-10">
                            <div class="form-group row">
                                <div class="col-sm-7">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="answer[{{$exam->id}}]" value="choose1"> {{$exam->choose1}}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="answer[{{$exam->id}}]" value="choose2"> {{$exam->choose2}}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="answer[{{$exam->id}}]" value="choose3"> {{$exam->choose3}}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="answer[{{$exam->id}}]" value="choose4"> {{$exam->choose4}}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($exam->choose_type == 2)
                        <div class="col-md-10">
                            <div class="form-group row">
                                <div class="col-sm-7">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="answer{{$exam->id}}" value="choose1"> أ
                                        </label>
                                        <div class="col-md-4">
                                            <img src="{{$exam->choose1}}" width="200px" height="100px">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="answer{{$exam->id}}" value="choose2"> ب
                                        </label>
                                        <div class="col-md-4">
                                            <img src="{{$exam->choose2}}" width="200px" height="100px">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="answer{{$exam->id}}" value="choose3"> ج
                                        </label>
                                        <div class="col-md-4">
                                            <img src="{{$exam->choose3}}" width="200px" height="100px">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="answer{{$exam->id}}" value="choose4"> د
                                        </label>
                                        <div class="col-md-4">
                                            <img src="{{$exam->choose4}}" width="200px" height="100px">
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
</div>






@stop
@section('js')


<script src="{{asset('admin/assets/vendor/libs/jstree/jstree.js')}}"></script>

<script src="{{asset('admin/assets/js/extended-ui-treeview.js')}}"></script>


<script>
    $(document).ready(function () {
        // Add a click event handler to all radio inputs
        $('input[type="radio"]').on('click', function () {
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
            $.post('/save-student-answer', data, function (response) {
                // Handle the response from the server if needed
                console.log(response);
            });
        });
    });
</script>




@stop
