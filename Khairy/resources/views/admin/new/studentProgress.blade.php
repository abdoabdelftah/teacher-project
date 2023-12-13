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
    <h4> تطور الطالب {{$student->name}}</h4>


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
    <div class="card">
      <div class="card-body">


        <div class="card-datatable table-responsive">
            <table class="datatables-users table">
              <thead class="table-light">
                <tr>

                    <th>اسم الامتحان</th>
                    <th>درجة الطالب</th>
                    <th>المزيد</th>

                </tr>
              </thead>

                      <tbody>
                          @foreach ($content as $data)

                          @if($data->done == 1)

                          <tr>
                            <td><a href="{{url('admin/exams/'.$data->lessonsection->id)}}"> {{$data->lessonsection->name}} </a></td>

                            @if($data->lessonsection->section_type == 1)
                            <td><a href="{{url('admin/lcheckanswers/'.$data->student->id.'/'. $data->lessonsection->id)}}" > {{$data->studentanswer->where('student_id', $data->student->id)->sum('points')}} / {{$data->exam->sum('points')}} </a></td>
                            @elseif($data->lessonsection->section_type == 3)
                           <td><a href="{{url('admin/ltextcheckanswers/'.$data->student->id.'/'. $data->lessonsection->id)}}" > {{$data->done_correcting == 0 ? 'لم يتم تصحيح الامتحان' : $data->studentanswer->where('student_id', $data->student->id)->sum('points')}} / {{$data->exam->sum('points')}} </a></td>
                            @elseif($data->lessonsection->section_type == 4)
                            <td><a href="{{url('admin/lpdfexamcheckanswers/'.$data->student->id.'/'. $data->lessonsection->id)}}" > {{$data->done_correcting == 0 ? 'لم يتم تصحيح الامتحان' : $data->studentanswer->where('student_id', $data->student->id)->sum('points')}} / {{$data->exam->sum('points')}} </a></td>
                            @endif

                          <td>
                            <div class="dropdown">
                              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
                              <div class="dropdown-menu">

                                <a href="{{url('admin/student/edit/'.$student->id)}}" class="btn rounded-pill btn-label-info waves-effect">تعديل الطالب</a>

                               <a href="{{url('/lessonresult/delete/'.$data->lessonsection->id.'/'.$data->student->id)}}" onclick="return confirm('هل انت متأكد من رغبتك فى مسح هذا الطالب نهائيا?')" class="btn btn-danger">مسح اجابة الطالب<i class="fa fa-trash"></i></a>

                              </div>
                            </div>
                          </td>



                          </tr>
                          @endif
                          @endforeach

                       </tbody>
            </table>
            <br>
            <center>
                  <nav aria-label="Page navigation">
                    <ul class="pagination pagination-outline-primary">
                        {!!  $content -> links() !!}
                    </ul>
                    </nav>
                </center>

          </div>


  </div>
</div>
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



        $('.edit-grade').click(function() {

            var gradeId = $(this).data('grade-id');

            $.ajax({
                url: '/admin/grades/edit/' + gradeId,
                method: 'GET',
                success: function(data) {
                    // Step 4: Populate modal inputs with fetched data
                    $('#name').val(data.name);
                    $('#grade-id').val(gradeId);
                    if (data.image) {
                        $('#image').attr("src", data.image);
                    } else {
                        $('#image').attr("src", "{{asset('admin/assets/img/smallfolder.png')}}");
                    }
                   $('#hide').prop('checked', data.hide);

                    // Step 5: Open the modal
                    $('#editGradeModal').modal('show');
                }
            });
        });


    </script>

@stop
