@extends('admin.layouts.app')
@section('content')

                    @if(Session::has('message'))
                    <h3 style="text-align:right;direction:rtl;" class="form-text text-success"> {{ Session::get('message') }} </h3>
                    @endif

                    <form method="POST" class="pt-3" action="{{ route('update.student') }}">
                      @csrf
                      <input type="hidden" name="id" class="form-control" value="{{$data->id}}" aria-label="Username">
                    <div class="form-group">
                      <label>الاسم</label>
                      <input type="text" name="name" class="form-control" value="{{$data->name}}" aria-label="Username">
                    </div>

                    <div class="form-group">
                      <label>رقم التيفون</label>
                      <input type="text" name="phone_number" class="form-control" value="{{$data->phone_number}}" aria-label="Username">
                    </div>

                    <div class="form-group">
                      <label>كلمة المرور</label>
                      <input type="text" name="password" class="form-control"  aria-label="Username">
                    </div>

                    <div class="form-group">
                      <label>اخر تاريخ لتسجيل الدخول(غيرها لتاريخ اليوم فى حالة عدم قدرة الطالب على التسجيل)</label>
                      <input type="date" style="text-align:right; dir:rtl" name="last_login_date" class="form-control" value="{{$data->last_login_date}}" aria-label="Username">
                    </div>

                   <!-- <div class="form-group">
                      <label>تاريخ انتهاء الاشتراك</label>
                      <input style="text-align:right; dir:rtl" type="date" name="subscription_end_date" class="form-control" value="" aria-label="Username">
                    </div> -->

                    <div class="form-group">
                      <label for="exampleFormControlSelect2">السنة الدراسية</label>



                      @foreach($grades as $grade)
                      <div class="form-check">
                        <label class="form-check-label">
                        <input type="checkbox" name = "grade_id[]" class="form-check-input" value = "{{$grade->id}}" @foreach($data->grades as $gradec) @if($gradec->id == $grade->id) checked @endif @endforeach>{{$grade->name}}</label>
                        </div>
                        @endforeach



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
