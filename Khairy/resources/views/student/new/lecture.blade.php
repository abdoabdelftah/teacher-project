@extends('student.layouts.exam-app')
@section('css')

<meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/jstree/jstree.css') }}" />

    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/plyr/plyr.css') }}" />




@stop

@section('sideBar')

@foreach ($lesson->userLessonsections as $section)

<li class="menu-item {{ $lecture->lessonsection->id == $section->id ? 'active' : '' }}" >

<a class="menu-link" href="

@if ($section->section_type == 1 || $section->section_type == 2)
/grade/{{$section->lesson->unit->grade->id}}/unit/{{$section->lesson->unit->id}}/lesson/{{$section->lesson->id}}/lessonsectionexam/{{$section->id}}

@endif

@if ($section->section_type == 3)
/grade/{{$section->lesson->unit->grade->id}}/unit/{{$section->lesson->unit->id}}/lesson/{{$section->lesson->id}}/lessonsectiontextexam/{{$section->id}}
@endif

@if ($section->section_type == 4)
/grade/{{$section->lesson->unit->grade->id}}/unit/{{$section->lesson->unit->id}}/lesson/{{$section->lesson->id}}/pdfexam/{{$section->id}}

@endif

@if ($section->section_type == 5)

/grade/{{$section->lesson->unit->grade->id}}/unit/{{$section->lesson->unit->id}}/lesson/{{$section->lesson->id}}/lessonsectionlecture/{{$section->id}}

@endif


" >

    @if($section->sectionFollowup && count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 1)
    <i class='menu-icon tf-icons mdi mdi-check-circle-outline mdi-24px'></i>
    @else
    <i class='menu-icon tf-icons mdi mdi-circle-outline mdi-24px'></i>
    @endif

<div data-i18n="{{$section->name}}">{{$section->name}}</div>

</a>
</li>
@endforeach

@stop

@section('content')


    <div class="row">
        <!-- Video Player -->
        <div class="col-12 mb-4">
            <div class="card">
                <h5 class="card-header">{{ $lecture->lessonsection->name }}</h5>
                <div class="card-body">

                    @if ($lecture->type == 3)
                        <video class="w-100"
                            poster="{{ $lecture->lessonsection->lesson->image ? $lecture->lessonsection->lesson->image : asset('admin/assets/img/pages/app-academy-tutor-1.png') }}"
                            id="plyr-video-player">
                            <source
                                src="https://drive.google.com/uc?export=preview&id={{ $lecture->type == 3 ? $lecture->video_google_id : '' }}"
                                type="video/mp4" />
                        </video>
                    @elseif($lecture->type == 2)
                        <embed src="{{ $lecture->content }}" type="application/pdf" width="100%" height="600px" />
                    @elseif($lecture->type == 1)
                        <img src="{{ $lecutre->content }}" alt="image"
                            style=" max-width: 100%;
            height: auto;">
                    @endif
                </div>
            </div>
        </div>
    </div>



@stop
@section('js')


    <script src="{{ asset('admin/assets/vendor/libs/jstree/jstree.js') }}"></script>

    <script src="{{ asset('admin/assets/js/extended-ui-treeview.js') }}"></script>

    <script src="{{ asset('admin/assets/vendor/libs/plyr/plyr.js') }}"></script>

    <script src="{{ asset('admin/assets/js/extended-ui-media-player.js') }}"></script>

    <script>
        $(document).ready(function() {
                    csrfToken = $('meta[name="csrf-token"]').attr('content');
                    // Make an AJAX request to check follow-up on page load
                    $.ajax({
                        url: '/add-followup', // Update with your actual route
                        method: 'POST',
                        data: {
                            // Include any required parameters here
                            _token: csrfToken,
                            student_id: {{ auth()->user()->id }},
                            lesson_section_id: {{ $lecture->lessonsection->id }},
                            done: 1 // Update with the actual value
                        },
                        success: function(response) {
                            // Close the modal or perform any other actions

                        }
                    });

                    });


    </script>


    </body>

    </html>


@stop
