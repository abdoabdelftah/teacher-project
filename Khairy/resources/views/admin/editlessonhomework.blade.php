@extends('admin.layouts.app')
@section('content')


<div class="card-body">

  <div class="template-demo">

    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb breadcrumb-custom">
        <li class="breadcrumb-item"><a href="{{url('admin/units/'.$grade->id)}}">{{$grade->name}}</a></li>

        <li class="breadcrumb-item"><a href="{{url('admin/lessons/'.$unit->id)}}">{{$unit->name}}</a></li>


        <li class="breadcrumb-item"><a href="{{url('admin/lessonsections/'.$lesson->id)}}">{{$lesson->name}}</a></li>


        <li class="breadcrumb-item"><a href="{{url('admin/exams/'.$lessonsection->id)}}">{{$lessonsection->name}}</a></li>


        <li class="breadcrumb-item active" aria-current="page"><span>تعديل سؤال</span></li>

      </ol>
    </nav>
  </div>
</div>


                    @if(Session::has('message'))
                    <h3 style="text-align:right;direction:rtl;" class="form-text text-success"> {{ Session::get('message') }} </h3>
                    @endif

                    <form method="POST" class="pt-3" enctype="multipart/form-data" action="{{ route('update.exam') }}">
                      @csrf
                      <input type="hidden" name="id" class="form-control" value="{{$data->id}}" aria-label="Username">
                    <div class="form-group">
                      <label>الاسم</label>
                      <input type="text" name="name" class="form-control" value="{{$data->name}}" aria-label="Username">
                    </div>

                    <!------------------------Start question-------------- -->
                    @if($data->question_type == 1)

                    <div class="form-group">
                      <label>السؤال</label>
                      <br>
                        <textarea  name="question" rows="10" cols="120">{{$data->question}}</textarea>
                    </div>

                  @endif



                   @if($data->question_type == 2)

                   <div class="form-group">
                    <label> ارفع صورة السؤال</label>
                    <a href="{{$data->question}}">اضغط هنا لرؤية المحتوى</a>
                   <br>
                    <input type="file" name="question">
                  </div>

                  <hr color = "black">
                  <hr>
                @endif


                                    <!------------------------end question-------------- -->



                                   <!------------------------Start choose text-------------- -->
                                   @if($data->choose_type == 1)


                                   <div class="form-group">
                                    <label>الاختيار الاول</label>
                                    <br>
                                      <textarea  name="choose1" rows="5" cols="120">{{$data->choose1}}</textarea>
                                  </div>

                                  <div class="form-group">
                                    <label>الاختيار الثانى</label>
                                    <br>
                                      <textarea  name="choose2" rows="5" cols="120">{{$data->choose2}}</textarea>
                                  </div>


                                  <div class="form-group">
                                    <label>الاختيار الثالث</label>
                                    <br>
                                      <textarea  name="choose3" rows="5" cols="120">{{$data->choose3}}</textarea>
                                  </div>


                                  <div class="form-group">
                                    <label>الاختيار الرابع</label>
                                    <br>
                                      <textarea  name="choose4" rows="5" cols="120">{{$data->choose4}}</textarea>
                                  </div>



                                  @endif
                                   <!------------------------end choose text-------------- -->


                                    <!------------------------Start choose picture-------------- -->


                                    @if($data->choose_type == 2)

                                    <div class="form-group">
                                      <label> ارفع صورة الاختيار الاول</label>
                                      <a href="{{$data->choose1}}">اضغط هنا لرؤية المحتوى</a>
                                     <br>
                                      <input type="file" name="choose1">
                                    </div>

                                    <hr color = "orange">
                                    <hr>
                                    <div class="form-group">
                                      <label> ارفع صورة الاختيار الثانى</label>
                                      <a href="{{$data->choose2}}">اضغط هنا لرؤية المحتوى</a>
                                     <br>
                                      <input type="file" name="choose2">
                                    </div>

                                    <hr color = "orange">
                                    <hr>

                                    <div class="form-group">
                                      <label> ارفع صورة الاختيار الثالث</label>
                                      <a href="{{$data->choose3}}">اضغط هنا لرؤية المحتوى</a>
                                     <br>
                                      <input type="file" name="choose3">
                                    </div>


                                    <hr color = "orange">
                                    <hr>
                                    <div class="form-group">
                                      <label> ارفع صورة الاختيار الرابع</label>
                                      <a href="{{$data->choose4}}">اضغط هنا لرؤية المحتوى</a>
                                     <br>
                                      <input type="file" name="choose4">
                                    </div>


                                    <hr color = "orange">
                                    <hr>
                                    @endif


                                   <!------------------------end choose picture-------------- -->


                                   <div class="form-group">
                                    <label for="exampleFormControlSelect2">الاجابة الصحيحة</label>
                                    <select name = "right_answer" class="form-control" id="exampleFormControlSelect2">
                                      <option value = "choose1" @if($data->right_answer == "choose1") selected @endif>الاختيار الاول</option>
                                      <option value = "choose2" @if($data->right_answer == "choose2") selected @endif>الاختيار الثانى</option>
                                      <option value = "choose3" @if($data->right_answer == "choose3") selected @endif>الاختيار الثالث</option>
                                      <option value = "choose4" @if($data->right_answer == "choose4") selected @endif>الاختيار الرابع</option>
                                    </select>
                                  </div>


                    <div class="form-group">
                      <label>درجات السؤال</label>
                      <input type="number" name="points" value="{{$data->points}}" class="form-control"  aria-label="Username">
                    </div>

                    <div class="form-group">
                      <label for="exampleFormControlSelect2">الحالة</label>
                      <select name = "hide" class="form-control" id="exampleFormControlSelect2">
                        <option value = "0" @if($data->hide == 0) selected @endif>فعال</option>
                        <option value = "1" @if($data->hide == 1) selected @endif>مخفى</option>


                      </select>
                    </div>


                    <div class="mt-3">
                      <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" class="btn btn-primary">
                       حفظ
                    </button>

                    </div>


                  </form>

                  </div>
                </div>
              </div>
            </div>








                  </div>
                </div>
              </div>


          <!-- content-wrapper ends -->
       @stop
