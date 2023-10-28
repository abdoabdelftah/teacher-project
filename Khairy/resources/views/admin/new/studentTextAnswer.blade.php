@extends('admin.layouts.new-app')
@section('css')

<link rel="stylesheet" href="{{asset('admin/assets/vendor/libs/jstree/jstree.css')}}" />

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
    <h4>{{$lessonsection->name}}</h4>

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
                    @foreach($grades as $grade)
                    <li data-jstree='{"icon" : "mdi mdi-folder-outline"}'>

                        <span  grade-id = "{{$grade->id}}">  {{$grade->name}} </span>

                          <ul>

                          @foreach ($grade->units as $unit)

                            <li data-jstree='{"icon" : "mdi mdi-folder-outline"}' >
                             <span unit-id = "{{$unit->id}}"> {{$unit->name}}</span>
                              <ul>


                                @foreach ($unit->lessons as $lesson)
                                <li data-jstree='{"icon" : "mdi mdi-folder-outline"}' >
                                <span lesson-id = "{{$lesson->id}}"> {{$lesson->name}} </span>
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


            @if($exam->question_type == 1)
            <h3> {{$exam->question}}</h3>
            @endif

            @if($exam->question_type == 2)

             <img  src="{{$exam->question}}"  style=" width: 100%; height: auto;">

            @endif

           <center> <span class="mdi mdi-48px mdi-arrow-down-circle-outline"></span></center>

           <div class="accordion" id="collapsibleSection">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingDeliveryOptions1">
                  <button type="button" class="accordion-button " data-bs-toggle="collapse" data-bs-target="#collapseDeliveryOptions1" aria-expanded="false" aria-controls="collapseDeliveryOptions1"><b> اجابة الطالب </b></button>
                </h2>
                <div id="collapseDeliveryOptions1" class="accordion-collapse collapse show" aria-labelledby="headingDeliveryOptions1" data-bs-parent="#collapsibleSection">
                  <div class="accordion-body">
                    <div class="row">

                        @if(count($exam->studentexamanswers) > 0 &&!empty($exam->studentexamanswers[0]->student_answer))

                        <h3> {{$exam->studentexamanswers[0]->student_answer}}</h3>
                          @endif


                      @if(count($exam->studentexamanswers) > 0 && !empty($exam->studentexamanswers[0]->student_answer_picture))


                     <img  src="{{$exam->studentexamanswers[0]->student_answer_picture}}" style=" width: 100%; height: auto;">
                     @endif

                    </div>
                  </div>
                </div>
              </div>
        </div>

        <div class="accordion" id="collapsibleSection">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingDeliveryOptions">
                  <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseDeliveryOptions" aria-expanded="false" aria-controls="collapseDeliveryOptions"> <b>تصحيح الاجابة </b></button>
                </h2>
                <div id="collapseDeliveryOptions" class="accordion-collapse collapse" aria-labelledby="headingDeliveryOptions" data-bs-parent="#collapsibleSection">
                  <div class="accordion-body">
                    <div class="row">



                        <div class="row g-0" id="displayI">
                            <label for="roundedInput" class="form-label">الشرح بصورة</label>
                                <div class="col-md-4" style="display: flex;  justify-content: center; align-items: center;">
                              @if(count($exam->studentexamanswers) > 0 &&!empty($exam->studentexamanswers[0]->right_answer_pic))
                                 <img  id="image"  src="{{$exam->studentexamanswers[0]->right_answer_pic}}" alt="Card image" style="max-width: 100%;">

                              @endif
                             </div>
                                <div class="col-md-8">
                                  <div class="card-body">
                                    <input class="form-control"  name = "image" type="file" id="formFile">

                                </div>
                                </div>
                              </div>

                              <div class="mt-2" id = "formFile">
                                <label for="roundedInput" class="form-label">الشرح بنص</label>
                                <input id="roundedInput" class="form-control rounded-pill" value="{{ count($exam->studentexamanswers) > 0 && !empty($exam->studentexamanswers[0]->right_answer) ? $exam->studentexamanswers[0]->right_answer : ''}}  " name ="points" type="number"  />
                              </div>

                              <div class="mt-2">
                                <label for="roundedInput" class="form-label">درجة السؤال</label>
                                <input id="roundedInput" class="form-control rounded-pill" value="{{$exam->points}}" name ="points" type="number"  />
                              </div>


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


</div>












@stop
@section('js')


<script src="{{asset('admin/assets/vendor/libs/jstree/jstree.js')}}"></script>

<script src="{{asset('admin/assets/js/extended-ui-treeview.js')}}"></script>


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







</script>




@stop
