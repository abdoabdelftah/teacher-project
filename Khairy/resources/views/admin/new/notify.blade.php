@extends('admin.layouts.new-app')
@section('css')

<link rel="stylesheet" href="{{asset('admin/assets/vendor/libs/flatpickr/flatpickr.css')}}" />
<link rel="stylesheet" href="{{asset('admin/assets/vendor/libs/select2/select2.css')}}" />
@stop
@section('content')



      <div class="row">
            <!-- Form Separator -->
            <div class="col-xxl">
              <div class="card mb-4">
                <h4 class="card-header">ارسال اشعار</h4>
                <hr class="my-4 mx-n4" />

                <form method="POST" class="card-body" action="{{ route('send.notification') }}">
                    @csrf


                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label" for="multicol-username">ارسال الى طلاب :</label>
                        <div class="col-sm-9">

                            <select name="grade_id" class="form-control">

                                @foreach ($grades as $grade)

                                <option value="{{$grade->id}}">{{$grade->name}}</option>
                                @endforeach
                            </select>
                        </div>
                      </div>

                  <div class="row mb-3">
                    <label class="col-sm-3 col-form-label" for="multicol-username">الرسالة</label>
                    <div class="col-sm-9">
                         <input type="text" id="multicol-username"  name="message" class="form-control" >

                    </div>
                  </div>


                  <div class="row mb-3">
                    <label class="col-sm-3 col-form-label" for="multicol-username">الرابط</label>
                    <div class="col-sm-9">
                         <input type="text" id="multicol-username"  name="link" class="form-control" value="#">

                    </div>
                  </div>



                  <div class="pt-4">
                    <div class="row justify-content-end">
                      <div class="col-sm-7">


                        <button type="submit" class="btn btn-primary me-sm-2 me-1">ارسال</button>
                    </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>

          </div>

       @stop

       @section("js")

       <script src="{{asset('admin/assets/vendor/libs/cleavejs/cleave.js')}}"></script>
       <script src="{{asset('admin/assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
       <script src="{{asset('admin/assets/vendor/libs/moment/moment.js')}}"></script>
       <script src="{{asset('admin/assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
       <script src="{{asset('admin/assets/vendor/libs/select2/select2.js')}}"></script>

       <script src="{{asset('admin/assets/js/form-layouts.js')}}"></script>

       <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
       <script>
          $(document).ready(function () {
        $('form').submit(function (e) {
            e.preventDefault();

            Toastify({
                        text: "جارى الارسال",
                        duration: 3000,  // Display duration in milliseconds
                        gravity: "top",  // Position of the toast
                        close: true  // Show close button
                    }).showToast();


            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function (response) {
                    alert("تم الارسال"); // You can customize this part
                },
                error: function (error) {
                    console.log(error.responseJSON.errors);
                    // Handle validation errors
                }
            });
        });
    });

       </script>

       @stop
