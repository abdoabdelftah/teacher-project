@extends('student.layouts.new-app')
@section('css')

<link rel="stylesheet" href="{{asset('admin/assets/vendor/libs/jstree/jstree.css')}}" />

<link rel="stylesheet" href="{{asset('admin/assets/vendor/css/pages/app-academy.css')}}" />


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


@foreach($grades as $grade)
<div class="card mb-4">
    <div class="card-header d-flex flex-wrap justify-content-between gap-3">
      <div class="card-title mb-0 me-1">
        <h5 class="mb-1">{{$grade->name}}</h5>
      </div>

    </div>
    <div class="card-body">
      <div class="row gy-4 mb-4">


        @foreach ($grade->units as $unit)
        @if($unit->hide != 1)
        <div class="col-sm-6 col-lg-4">
          <div class="card p-2 h-100 shadow-none border">
            <div class="rounded-2 text-center mb-3">
              <a href="/grade/{{$grade->id}}/unit/{{$unit->id}}/lessons"><img class="img-fluid" src="{{$unit->image ? $unit->image : asset('admin/assets/img/pages/app-academy-tutor-1.png')}}" alt="tutor image 1" /></a>
            </div>
            <div class="card-body p-3 pt-2">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="badge rounded-pill bg-label-primary">عدد الدروس: {{$unit->lessons->count()}}</span>

              </div>
              <a href="/grade/{{$grade->id}}/unit/{{$unit->id}}/lessons" class="h5">{{$unit->name}}</a>
              <p class="mt-2">{{$unit->description}}</p>

              <div class="progress rounded-pill mb-4" style="height: 8px">
                  <div class="progress-bar" role="progressbar" style="width: {{ isset($percentages[$unit->id]) ? $percentages[$unit->id] : 0 }}%" aria-valuenow="{{ isset($percentages[$unit->id]) ? $percentages[$unit->id] : 0 }}" aria-valuemin="0" aria-valuemax="100"></div>

            </div>
              <div class="d-flex flex-column flex-md-row gap-3 text-nowrap flex-wrap flex-md-nowrap  flex-lg-wrap flex-xxl-nowrap">

                <a class="w-100 btn btn-outline-primary d-flex align-items-center" href="/grade/{{$grade->id}}/unit/{{$unit->id}}/lessons">
                  <span class="me-1">الانتقال الى الدروس</span><i class="mdi mdi-arrow-right lh-1 scaleX-n1-rtl"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        @endif
@endforeach

      </div>


    </div>
  </div>
@endforeach



@stop
@section('js')


<script src="{{asset('admin/assets/vendor/libs/jstree/jstree.js')}}"></script>

<script src="{{asset('admin/assets/js/extended-ui-treeview.js')}}"></script>


<script>




    </script>

@stop
