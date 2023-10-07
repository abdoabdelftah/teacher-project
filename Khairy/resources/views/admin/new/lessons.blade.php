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
    <h4>الدروس</h4>

      <button type="button" class="custom-btn" data-bs-toggle="modal" data-bs-target="#addGradeModal">اضافة درس</button>

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

        <div class="row">




        @foreach($lessons as $lesson)
        <div class="col-sm-3 col-xl-6">
        <div class="card mb-4">
            <div class="card-header pb-1">
                <div class="d-flex justify-content-between">
                  <div class="dropdown">
                    <button class="btn p-0" type="button" id="organicSessionsDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="mdi mdi-dots-vertical mdi-24px"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="organicSessionsDropdown">
                      <a class="dropdown-item edit-lesson" data-lesson-id="{{$lesson->id}}" href="javascript:void(0);">تعديل</a>

                    </div>
                  </div>
                </div>
              </div>

            <div class="card-body">
              <p class="card-text">

     <a href="/admin/lessonsections/{{$lesson->id}}"> <img src="{{asset('admin/assets/img/folder.png')}}" alt="" class="mx-auto d-block" >

     <center> <h5 class="mb-1">{{$lesson->name}}</h5> @if ($lesson->hide == 1) <i class="mdi mdi-eye-off-outline"></i>

     @endif</center>

    </a>
            </p>
            </div>
          </div>
        </div>
        @endforeach

    </div>

      </div>
  </div>
</div>
</div>


<!-- Modal -->
<div class="modal fade"  id="editGradeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form method="POST" action="{{ route('update.lesson') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value ="" id="lesson-id">
        <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel1">تعديل درس</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">


          <div class="row">
            <div class="col mb-4 mt-2">
              <div class="form-floating form-floating-outline">
                  <input type="text" id="name" name="name" class="form-control" >

                <label for="name">الاسم</label>
              </div>
            </div>
        </div>

        <div class="row">
            <div class="col mb-4 mt-2">
            <div class="form-floating form-floating-outline">


                <div class="col-md">
                    <div class="card mb-3">
                      <div class="row g-0">
                        <div class="col-md-4" style="display: flex;  justify-content: center; align-items: center;">
                          <img  id="image"  src="" alt="Card image" style="max-width: 100%;">
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <input class="form-control"  name = "image" type="file" id="formFile">

                        </div>
                        </div>
                      </div>
                    </div>
                  </div>


           </div>
        </div>
    </div>

           <input type="checkbox" id="hide" class="form-check-input"  name="hide">
              <label for="hide">اخفاء</label>


          </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">الغاء</button>
          <button type="submit" class="btn btn-primary">حفظ</button>
        </div>
    </form>
      </div>
    </div>
  </div>




<!-- Modal -->
<div class="modal fade"  id="addGradeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form method="POST" action="{{ route('store.lesson') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value ="{{$id}}" name="unit_id" id="lesson-id">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel1">اضافة درس</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">


          <div class="row">
            <div class="col mb-4 mt-2">
              <div class="form-floating form-floating-outline">
                  <input type="text" name="name" class="form-control" >

                <label for="name">الاسم</label>
              </div>
            </div>
        </div>

        <div class="row">
            <div class="col mb-4 mt-2">
            <div class="form-floating form-floating-outline">


                <div class="col-md">
                    <div class="card mb-3">
                      <div class="row g-0">

                        <div class="col-md-12">
                          <div class="card-body">
                            <input class="form-control"  name = "image" type="file" id="formFile">

                        </div>
                        </div>
                      </div>
                    </div>
                  </div>


           </div>
        </div>
    </div>

           <input type="checkbox" class="form-check-input"  name="hide">
              <label for="hide">اخفاء</label>


          </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">الغاء</button>
          <button type="submit" class="btn btn-primary">حفظ</button>
        </div>
    </form>
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

    $(document).on('click', 'span[lesson-id]', function() {
    var lessonId = $(this).attr('lesson-id');
    if (lessonId) {
        window.location.href = '/admin/lessons/' + lessonId;
    }
    });

    $(document).on('click', 'span[lesson-id]', function() {
    var lessonId = $(this).attr('lesson-id');
    if (lessonId) {
        window.location.href = '/admin/lessonsections/' + lessonId;
    }
    });



        $('.edit-lesson').click(function() {

            var lessonId = $(this).data('lesson-id');

            $.ajax({
                url: '/admin/lessons/edit/' + lessonId,
                method: 'GET',
                success: function(data) {
                    // Step 4: Populate modal inputs with fetched data
                    $('#name').val(data.name);
                    $('#lesson-id').val(lessonId);
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
