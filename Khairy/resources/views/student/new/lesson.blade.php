@extends('student.layouts.new-app')
@section('css')

    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/jstree/jstree.css') }}" />

    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/pages/app-academy.css') }}" />

    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/pages/question-style.css') }}" />

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



<div class="card g-3 mt-5">
    <div class="card-body row g-3">
      <div class="col-lg-8">
        <div class="d-flex justify-content-between align-items-center flex-wrap mb-2 gap-1">
          <div class="me-1">
            <h5 class="mb-1">{{$lesson->name}}</h5>

          </div>
          <div class="d-flex align-items-center">
            <span class="badge bg-label-success rounded-pill">{{$lesson->unit->name}}</span>

            <i class='mdi mdi-bookmark-multiple-outline mdi-24px'></i>
          </div>
        </div>
        <div class="card academy-content shadow-none border">
          <div class="p-2">
            <div class="cursor-pointer">
                <img class="img-fluid" src="{{$lesson->image ? $lesson->image : asset('admin/assets/img/pages/app-academy-tutor-1.png')}}" alt="tutor image 1" />   </div>
          </div>
          <div class="card-body">
            <h5>تفاصيل</h5>
            <div class="d-flex flex-wrap">
              <div class="me-5">
                <p class="text-nowrap"><i class='mdi mdi-check-all mdi-24px me-2'></i>الدرس: {{$lesson->name}}</p>
                <p class="text-nowrap"><i class='mdi mdi-book-outline mdi-24px me-2'></i>الوحدة {{$lesson->unit->name}}</p>
                <p class="text-nowrap"><i class='mdi mdi-web mdi-24px me-2'></i>المادة: {{$lesson->unit->grade->name}}</p>

              </div>
              <div>
                <p class="text-nowrap"><i class='mdi mdi-pencil-outline mdi-24px me-2'></i>اجزاء الشرح : {{$lesson->userLessonsections->count()}}</p>

              </div>
            </div>
            <hr class="mb-4 mt-2">
            <h5>وصف</h5>
            <p class="mb-4">
       {{$lesson->description}}
            </p>
            <hr class="my-4">
            <h5>المدرس :</h5>
            <div class="d-flex justify-content-start align-items-center user-name">
              <div class="avatar-wrapper">
                <div class="avatar avatar-sm me-2"><img src="{{ asset('assets/images/faces/face8.jpg') }}" alt="Avatar" class="rounded-circle"></div>
              </div>
              <div class="d-flex flex-column">
                <h6 class="mb-0">استاذ محمد خيرى</h6>
                <small>استاذ الريضيات</small>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="accordion stick-top" id="courseContent">
          <div class="accordion-item shadow-none border border-bottom-0 active my-0 overflow-hidden">
            <div class="accordion-header border-0" id="headingOne">
              <button type="button" class="accordion-button bg-lighter rounded-0" data-bs-toggle="collapse" data-bs-target="#chapterOne" aria-expanded="true" aria-controls="chapterOne">
                <span class="d-flex flex-column">
                  <span class="h5 mb-1">محتوى الدرس</span>
                  <span class="text-body fw-normal">{{$lesson->userLessonsections->count()}} جزء</span>
                </span>
              </button>
            </div>
            <div id="chapterOne" class="accordion-collapse collapse show" data-bs-parent="#courseContent">
              <div class="accordion-body py-3 border-top">

                @foreach ($lesson->userLessonsections as $section)

                <a class="form-check d-flex align-items-center mb-3" href="

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
                    <i class='mdi mdi-check-circle-outline mdi-24px me-2'></i>
                    @else
                    <i class='mdi mdi-circle-outline mdi-24px me-2'></i>
                    @endif
                    <label for="defaultCheck1" class="form-check-label ms-3">
                        <span class="mb-0 h6">{{$section->name}} </span>
                        <span class="text-body d-block">


                        @if ($section->section_type == 1)
                            امتحان الاختيار من متعدد
                        @endif


                        @if ($section->section_type == 3)
                            امتحان الاجابة المقالية
                        @endif

                        @if ($section->section_type == 4)
                            امتحان يتم الاجابة عنه برفع ملف
                        @endif

                        @if ($section->section_type == 5)
                        {{$section->lecture && $section->lecture->type == 1 ?'صورة' : '' }}
                        {{$section->lecture && $section->lecture->type == 2 ?'ملف' : '' }}
                        {{$section->lecture && $section->lecture->type == 3 ?'فديو' : '' }}
                        {{!$section->lecture || $section->lecture->type == Null ?'صورة او فديو او ملف' : '' }}
                        @endif


                        </span>
                    </label>

                </a>

                @endforeach

              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>



<!-- start question section -->

<div class="card mt-5 border rounded">
    <div class="card-body  rounded p-4">

        <div class="d-flex justify-content-between align-items-center mb-2">
            <div>
                <h5 class="mb-1">الاسئلة والاجوبة</h5>
            </div>
        </div>




        <div class="row">
            <div class=" col-12 ">
                <ul class="list-group review-list">
                    <li class="list-group-item border-3 shadow rounded">
                        <div class="d-flex">
                            <img width="50px" src="{{ asset('assets/images/ask-icon.png') }}" class="avatar rounded" >
                            <div class="review-right col-sm-9">
                                <span class="author-name">شهد خليفة عبد المجيد</span>
                                <div class="time">
                                    <a href="../lecture-questions/113009">منذ 9 دقائق (المحاضرة 6: قراءة الأميتر والفولتميتر وإضاءة المصابيح)</a>
                                </div>
                                <img src="{{ $lesson->image }}" class="ques-img img-fluid" alt>
                                <div class="review-des">
                                    <p>بعد اذن حضراتكم انا كان حصلي ظروف لما المستر نزل الامتحان و ماعرفتش امتحنه ف ينفع من فضلكم تنزلوه عشان انا محتجاه جدا جدا 🥺🙏</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex my-replay-1">
                            <div class="line-img-con">
                                <img src="{{ asset('assets/images/faces/face8.jpg') }}" alt class="your-imag">
                            </div>
                            <div class="replay-img-info col-sm-9">
                                <div class="your-replay-con">
                                    <h1 class="stud-name">استاذ محمد خيرى</h1>
                                    <p class="your-replay">للاسف مينفعش بس حضرتك تقدري تشوفي المراجعه الي نزلت ع اليوتيوب المستر حل فيها من اسئله الامتحان</p>
                                </div>
                                <img src alt class="your-img-2 img">
                            </div>
                        </div>

                        <div class="chat-history-footer  card border-3 shadow">
                            <form class="form-send-message d-flex justify-content-between align-items-center ">
                              <textarea class="form-control message-input  shadow-none" placeholder="اشرح هنا" cols="25" rows="2"></textarea>
                              <div class="message-actions d-flex align-items-center">
                                <i class="btn btn-text-secondary btn-icon rounded-pill speech-to-text mdi mdi-microphone mdi-20px cursor-pointer"></i>
                                <label for="attach-doc" class="form-label mb-0">
                                  <i class="mdi mdi-paperclip mdi-20px cursor-pointer btn btn-text-secondary btn-icon rounded-pill me-2 ms-1"></i>
                                  <input type="file" id="attach-doc" hidden>
                                </label>
                                <button class="btn btn-primary d-flex send-msg-btn">
                                  <span class="align-middle">ارسل</span>
                                </button>
                              </div>
                            </form>
                          </div>

                    </li>
                    <!-- Repeat the structure for additional questions -->
                </ul>
            </div>
        </div>



    </div>
</div>



<!-- start question section -->



@stop
@section('js')


    <script src="{{ asset('admin/assets/vendor/libs/jstree/jstree.js') }}"></script>

    <script src="{{ asset('admin/assets/js/extended-ui-treeview.js') }}"></script>


    <script></script>

@stop
