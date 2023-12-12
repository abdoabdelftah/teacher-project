@extends('student.layouts.new-app')
@section('css')

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/jstree/jstree.css') }}" />

@stop



@section('content')


<div class="col-12">
    <div class="card">
      <div class="card-body">


        <div class="card-datatable table-responsive">
            <table class="datatables-users table">
              <thead class="table-light">
                <tr>

                    <th>اسم الامتحان</th>
                    <th>درجة الامتحان</th>
                    <th>المزيد</th>

                </tr>
              </thead>

                      <tbody>
                          @foreach ($follow_up as $data)
                          @if($data->lessonsection->section_type == 1 || $data->lessonsection->section_type == 2 || $data->lessonsection->section_type == 3 || $data->lessonsection->section_type == 4)

                          <tr>

                            <td><a > {{$data->lessonsection->name}} </a></td>

                            @if($data->lessonsection->section_type == 1)
                            <td><a href="/grade/{{$data->lessonsection->lesson->unit->grade->id}}/unit/{{$data->lessonsection->lesson->unit->id}}/lesson/{{$data->lessonsection->lesson->id}}/lessonsectionexam/{{$data->lessonsection->id}}" > {{$data->studentanswer->where('student_id', $data->student->id)->sum('points')}} / {{$data->exam->sum('points')}} </a></td>
                            @elseif($data->lessonsection->section_type == 3)
                           <td><a href="/grade/{{$data->lessonsection->lesson->unit->grade->id}}/unit/{{$data->lessonsection->lesson->unit->id}}/lesson/{{$data->lessonsection->lesson->id}}/lessonsectiontextexam/{{$data->lessonsection->id}}" > {{ $data->done != 1?'لم تقم بانهاء الامتحان':($data->done_correcting == 0 ? 'لم يتم تصحيح الامتحان' : $data->studentanswer->where('student_id', $data->student->id)->sum('points') )}} / {{$data->exam->sum('points') }} </a></td>
                            @elseif($data->lessonsection->section_type == 4)
                            <td><a href="/grade/{{$data->lessonsection->lesson->unit->grade->id}}/unit/{{$data->lessonsection->lesson->unit->id}}/lesson/{{$data->lessonsection->lesson->id}}/pdfexam/{{$data->lessonsection->id}}" > {{ $data->done != 1?'لم تقم بانهاء الامتحان':($data->done_correcting == 0 ? 'لم يتم تصحيح الامتحان' : $data->studentanswer->where('student_id', $data->student->id)->sum('points') )}} / {{$data->exam->sum('points')}} </a></td>
                            @endif


                            @if($data->lessonsection->section_type == 1)
                            <td><a class="btn rounded-pill btn-label-info waves-effect" href="/grade/{{$data->lessonsection->lesson->unit->grade->id}}/unit/{{$data->lessonsection->lesson->unit->id}}/lesson/{{$data->lessonsection->lesson->id}}/lessonsectionexam/{{$data->lessonsection->id}}" > ورقة الامتحان </a></td>
                            @elseif($data->lessonsection->section_type == 3)
                           <td><a class="btn rounded-pill btn-label-info waves-effect" href="/grade/{{$data->lessonsection->lesson->unit->grade->id}}/unit/{{$data->lessonsection->lesson->unit->id}}/lesson/{{$data->lessonsection->lesson->id}}/lessonsectiontextexam/{{$data->lessonsection->id}}" > ورقة الامتحان </a></td>
                            @elseif($data->lessonsection->section_type == 4)
                            <td><a class="btn rounded-pill btn-label-info waves-effect" href="/grade/{{$data->lessonsection->lesson->unit->grade->id}}/unit/{{$data->lessonsection->lesson->unit->id}}/lesson/{{$data->lessonsection->lesson->id}}/pdfexam/{{$data->lessonsection->id}}" > ورقة الامتحان </a></td>
                            @endif

                          </tr>
                          @endif
                          @endforeach

                       </tbody>
            </table>


          </div>


  </div>
</div>
</div>



@stop


@section('js')


    <script src="{{ asset('admin/assets/vendor/libs/jstree/jstree.js') }}"></script>

    <script src="{{ asset('admin/assets/js/extended-ui-treeview.js') }}"></script>





@stop
