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


<div class="col-sm-12 col-xl-12">
    <div class="card">
      <div class="card-body">


        <div class="card-datatable table-responsive">
            <table class="datatables-users table">
              <thead class="table-light">
                <tr>

                    <th>اسم الطالب</th>
                    <th>اسم الامتحان</th>
                    <th>ورقة الاجابة</th>
                    <th>المزيد</th>

                </tr>
              </thead>

                      <tbody>
                          @foreach ($content as $data)


                          <tr>

                            <td><a href="{{url('admin/students/0/0/'.$data->student->name)}}"> {{$data->student->name}} </a></td>
                            <td> {{$data->lessonsection->name}}</td>
                            @if($data->lessonsection->section_type == 3)
                           <td><a href="{{url('admin/ltextcheckanswers/'.$data->student->id.'/'. $data->lessonsection->id)}}" class="btn rounded-pill btn-label-info waves-effect"> تصحيح الامتحان </a></td>
                            @elseif($data->lessonsection->section_type == 4)
                            <td><a href="{{url('admin/lpdfexamcheckanswers/'.$data->student->id.'/'. $data->lessonsection->id)}}" class="btn rounded-pill btn-label-info waves-effect"> تصحيح الامتحان </a></td>
                            @endif


                          <td>
                            <div class="dropdown">
                              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
                              <div class="dropdown-menu">

                                <a href="{{url('admin/student/edit/'.$data->student->id)}}" class="btn rounded-pill btn-label-info waves-effect">تعديل الطالب</a>

                                @if($data->lessonsection->section_type != 5)
                               <a href="{{url('/lessonresult/delete/'.$data->lessonsection->id.'/'.$data->student->id)}}" onclick="return confirm('هل انت متأكد من رغبتك فى مسح هذا الطالب نهائيا?')" class="btn btn-danger">مسح اجابة الطالب<i class="fa fa-trash"></i></a>
                               @endif

                              </div>
                            </div>
                          </td>



                          </tr>
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
