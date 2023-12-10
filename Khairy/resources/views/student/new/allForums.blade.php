@extends('student.layouts.new-app')
@section('css')


    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/jstree/jstree.css') }}" />

    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/pages/app-academy.css') }}" />

    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/pages/question-style.css') }}" />

    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/pages/app-chat.css') }}">

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





    <!-- start question section -->

    <div class="card mt-5 border rounded">
        <div class="card-body  rounded p-4">

            <div class="d-flex justify-content-between align-items-center mb-2">
                <div>
                    <h5 class="mb-1">الاسئلة الخاصة بك:</h5>
                </div>
            </div>

            @if ($data->count() == 0)

            <div class="alert alert-primary" role="alert">
               لم تقم بسؤال اى سؤال من قبل
            </div>
            @endif

            <div class="row">
                <div class=" col-12 ">
                    <ul class="list-group review-list">

                        @foreach ($data as $forum)
                            <li class="list-group-item border-3 shadow rounded">
                                <div class="d-flex">
                                    <img width="50px" src="{{ asset('assets/images/ask-icon.png') }}"
                                        class="avatar rounded">
                                    <div class="review-right col-sm-9">
                                        <span class="author-name">{{ $forum->student->name }}</span>
                                        <div class="time">
                                            <a
                                                href="#">{{ \Carbon\Carbon::parse($forum->created_at)->diffForHumans() }}</a>
                                        </div>
                                        @if (!empty($forum->picture))
                                            <img src="{{ $forum->picture }}" class="ques-img img-fluid">
                                        @endif
                                        <div class="review-des">
                                            <p> {{ $forum->question }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="your-comments-container" id="comments-container-{{ $forum->id }}">
                                    @foreach ($forum->forumcomments as $comment)
                                        <hr>

                                        <div class="d-flex my-replay-1">
                                            <div class="line-img-con">
                                                <img src="{{ $comment->commentor == 1 ? asset('assets/images/faces/face8.jpg') : asset('assets/images/ask-icon.png') }}"
                                                    alt class="your-imag">
                                            </div>
                                            <div class="replay-img-info col-sm-9">
                                                <div class="your-replay-con">
                                                    <h1 class="stud-name">
                                                        {{ $comment->commentor == 1 ? 'استاذ محمد خيرى' : $forum->student->name }}
                                                    </h1>
                                                    <p class="your-replay">
                                                        @if (!empty($comment->picture))
                                                            @if ($comment->comment_type == 1)
                                                                <img src="{{ $comment->picture }}"
                                                                    class="ques-img img-fluid">
                                                            @endif
                                                            <br>
                                                        @endif
                                                        {{ $comment->comment }}
                                                    </p>
                                                </div>
                                                <img src alt class="your-img-2 img">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                @if ($forum->student->id == auth()->user()->id)
                                    <div class="chat-history-footer card border-3 shadow">
                                        <form class="form-send-message d-flex justify-content-between align-items-center"
                                            id="comment-form-{{ $forum->id }}">
                                            <input type="hidden" name="forum_id" value="{{ $forum->id }}">
                                            <textarea class="form-control message-input shadow-none" name="comment" placeholder="اشرح هنا" cols="25"
                                                rows="2"></textarea>
                                            <div class="message-actions d-flex align-items-center">
                                                <label for="attach-doc-{{ $forum->id }}" class="form-label mb-0">
                                                    <i
                                                        class="mdi mdi-paperclip mdi-20px cursor-pointer btn btn-text-secondary btn-icon rounded-pill me-2 ms-1"></i>
                                                    <input type="file" id="attach-doc-{{ $forum->id }}"
                                                        name="picture" hidden>
                                                </label>
                                                <button type="button" class="btn btn-primary d-flex send-msg-btn"
                                                    onclick="submitForm({{ $forum->id }})">
                                                    <span class="align-middle">ارسل</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                @endif

                            </li>
                        @endforeach
                        <!-- Repeat the structure for additional questions -->
                    </ul>
                </div>
            </div>


            <br>
            <center>
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-outline-primary">
                        {!! $data->links() !!}
                    </ul>
                </nav>
            </center>



        </div>
    </div>



    <!-- start question section -->



@stop
@section('js')


    <script src="{{ asset('admin/assets/vendor/libs/jstree/jstree.js') }}"></script>

    <script src="{{ asset('admin/assets/js/extended-ui-treeview.js') }}"></script>


    <script src="{{ asset('admin/assets/js/app-chat.js') }}"></script>

    <script>
        function submitForm(forumId) {
            var formData = new FormData($(`#comment-form-${forumId}`)[0]);
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            formData.append('_token', csrfToken);

            $.ajax({
                type: 'POST',
                url: '{{ route('add.comment') }}',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    var commentText = formData.get('comment');
                    var picture = formData.get('picture');

                    var newCommentHtml = `
                    <hr>
                    <div class="d-flex my-replay-1">
                        <div class="line-img-con">
                            <img src="{{ asset('assets/images/ask-icon.png') }}" alt class="your-imag">
                        </div>
                        <div class="replay-img-info col-sm-9">
                            <div class="your-replay-con">
                                <h1 class="stud-name">{{ auth()->user()->name }}</h1>
                                <p class="your-replay">${commentText || ''}</p>
                            </div>
                            ${picture ? `<img src="${URL.createObjectURL(picture)}" alt class="your-img-2 img">` : ''}
                        </div>
                    </div>
                `;

                    $(`#comments-container-${forumId}`).append(newCommentHtml);

                    $(`#comment-form-${forumId} textarea[name="comment"]`).val('');
                    $(`#comment-form-${forumId} #attach-doc`).val('');
                },
                error: function(error) {
                    console.error(error);
                }
            });
        }
    </script>

@stop
