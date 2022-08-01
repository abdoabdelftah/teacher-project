@extends('admin.layouts.app')
@section('content')
                  



<div class="card-body">
 
  <div class="template-demo">
 
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb breadcrumb-custom">
        <li class="breadcrumb-item"><a href="{{url('admin/units/'.$grade->id)}}">{{$grade->name}}</a></li>
        
        <li class="breadcrumb-item"><a href="{{url('admin/lessons/'.$unit->id)}}">{{$unit->name}}</a></li>

        
        <li class="breadcrumb-item"><a href="{{url('admin/lessonsections/'.$lesson->id)}}">{{$lesson->name}}</a></li>

        <li class="breadcrumb-item active" aria-current="page"><span>اضافة فقرة</span></li>
     
      </ol>
    </nav>
  </div>
</div>


                    @if(Session::has('message'))
                    <h3 style="text-align:right;direction:rtl;" class="form-text text-success"> {{ Session::get('message') }} </h3>
                    @endif

                    <form method="POST" class="pt-3" action="{{ route('store.lessonsection') }}">
                      @csrf
                      
                    <div class="form-group">
                      <label>الاسم</label>
                      <input type="text" name="name" class="form-control"  aria-label="Username">
                    </div>

                    <div class="form-group">
                      <label>ترتيب الفقرة(الرقم الاصغر سيظهر للطالب فى اول الصفحة)</label>
                      <input type="text" name="priority" class="form-control"  aria-label="Username">
                    </div>

                    <div class="form-group">
                      <label>نوع الفقرة</label>
                    <select name="section_type" class="form-control" id="exampleFormControlSelect2">
                      <option value="5">شرح</option>
                      <option value="1">واجب</option>
                      <option value="2"> امتحان الاختيار من متعدد</option>
                      <option value="6"> امتحان الاجابة المقالية</option>
                    
                    </select>
                  </div>


<!--                    <div class="form-group">
                      <label>وقت الامتحان بالدقائق (قم بالاضافة فى حالة اختيار امتحان فقط)</label>
                      <input type="text" name="stop_watch" class="form-control"  aria-label="Username">
                    </div>
                  -->

                  <div class="form-group">
                    <label>وقت بدأ الامتحان</label>
<br>

                    <input style="font-weight:bold" type="datetime-local" class="form-control"  aria-label="Username" name="start_time">
                </div>


                
                <div class="form-group">
                  <label>وقت انتهاء الامتحان</label>
<br>

                  <input style="font-weight:bold" type="datetime-local" class="form-control"  aria-label="Username" name="end_time">
              </div>

         


                    <input type="hidden" name="lesson_id" value ="<?php echo request()->route('id'); ?>" class="form-control"  aria-label="Username">

                    <div class="mt-3">
                      <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" class="btn btn-primary">
                       اضافة فقرة جديد
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