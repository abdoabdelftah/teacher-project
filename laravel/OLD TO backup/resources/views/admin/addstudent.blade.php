@extends('admin.layouts.app')
@section('content')
                  
                    @if(Session::has('message'))
                    <h3 style="text-align:right;direction:rtl;" class="form-text text-success"> {{ Session::get('message') }} </h3>
                    @endif

                    <form method="POST" class="pt-3" action="{{ route('store.student') }}">
                      @csrf
                      
                    <div class="form-group">
                      <label>الاسم</label>
                      <input type="text" name="name" class="form-control"  aria-label="Username">
                    </div>

                    <?php
                    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
     
     // generate a pin based on 2 * 7 digits + a random character
     $pin =  substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 4)
     .mt_rand(1000, 9999);
     // shuffle the result

     $string = str_shuffle($pin);
     
                         ?>


                    <div class="form-group">
                      <label>كود الطالب</label>
                      <input type="text" name="phone_number" class="form-control" value ="{{$string}}" aria-label="Username">
                    </div>

                    <div class="form-group">
                      <label>كلمة المرور</label>
                      <input type="text" name="password" class="form-control"  aria-label="Username">
                    </div>

                
                    <div class="form-group">
                      <label for="exampleFormControlSelect2">السنة الدراسية</label>
                      @foreach($grades as $grade)
                      <div class="form-check">
                        <label style ="font-size:20px; bold">
                          &nbsp; &nbsp;  &nbsp;  &nbsp;<input type="checkbox"  style="outline: 2px solid rgba(14, 1, 1, 0.952);" name = "grade_id[]"  value = "{{$grade->id}}" >  &nbsp;  &nbsp;{{$grade->name}}</label>
                        </div>
                        @endforeach
                    </div>

                    <div class="mt-3">
                      <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" class="btn btn-primary">
                       تسجيل طالب جديد
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