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
                <h4 class="card-header">تعديل طالب</h4>
                <hr class="my-4 mx-n4" />

                <form method="POST" class="card-body" action="{{ route('update.student') }}">
                    @csrf
                    <input type="hidden" name="id" class="form-control" value="{{$data->id}}" aria-label="Username">

                  <h6>المعلومات الاساسية</h6>
                  <div class="row mb-3">
                    <label class="col-sm-3 col-form-label" for="multicol-username">الاسم</label>
                    <div class="col-sm-9">
                         <input type="text" id="multicol-username"  name="name" class="form-control" value="{{$data->name}}">

                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-sm-3 col-form-label" for="multicol-full-name">رقم الهاتف</label>
                    <div class="col-sm-9">
                        <input type="text" name="phone_number" class="form-control" value="{{$data->phone_number}}" aria-label="Username">
                    </div>
                  </div>

                  <div class="row form-password-toggle">
                    <label class="col-sm-3 col-form-label" for="multicol-password">كلمة المرور</label>
                    <div class="col-sm-9">
                      <div class="input-group input-group-merge">
                        <input type="password" name="password" id="multicol-password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="multicol-password2" />
                        <span class="input-group-text cursor-pointer" id="multicol-password2"><i class="mdi mdi-eye-off-outline"></i></span>
                      </div>
                    </div>
                  </div>
                  <hr class="my-4 mx-n4" />
                  <h6>للتحكم بالمحتوى المعروض للطالب</h6>

                  <div class="row mb-3">
                    <label class="col-sm-3 col-form-label" for="multicol-birthdate">ـاريخ انتهاء الاشتراك</label>
                    <div class="col-sm-9">
                      <input type="text" id="multicol-birthdate" class="form-control dob-picker" name="subscription_end_date" value="{{$data->subscription_end_date}}" placeholder="YYYY-MM-DD" />
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-sm-3 col-form-label" for="multicol-birthdate">اخر تاريخ لتسجيل الدخول(غيرها لتاريخ اليوم فى حالة عدم قدرة الطالب على التسجيل)</label>
                    <div class="col-sm-9">
                      <input type="text" id="multicol-birthdate" class="form-control dob-picker" name="last_login_date" value="{{$data->last_login_date}}" placeholder="YYYY-MM-DD" />
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-sm-3 col-form-label" for="multicol-birthdate">الكورسات الخاصة بالطالب</label>
                    <div class="col-sm-9">
                        @foreach($grades as $grade)
                        <div class="form-check">
                          <label class="form-check-label">
                          <input type="checkbox" name = "grade_id[]" class="form-check-input" value = "{{$grade->id}}" @foreach($data->grades as $gradec) @if($gradec->id == $grade->id) checked @endif @endforeach>{{$grade->name}}</label>
                          </div>
                          @endforeach
                    </div>
                </div>



                  <div class="pt-4">
                    <div class="row justify-content-end">
                      <div class="col-sm-7">

                        <button type="reset" onclick="redirectToStudent()" class="btn btn-outline-secondary">الغاء</button>

                        <button type="submit" class="btn btn-primary me-sm-2 me-1">حفظ</button>
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

       <script>
        function redirectToStudent() {
            window.location.href = "{{ route('allStudents') }}";
        }
    </script>

       @stop
