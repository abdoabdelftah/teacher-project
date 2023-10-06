@extends('admin.layouts.app')
@section('content')


<div class="card-body">
 
  <div class="template-demo">
 
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb breadcrumb-custom">
        <li class="breadcrumb-item"><a href="{{url('admin/units/'.$grade->id)}}">{{$grade->name}}</a></li>
        <li class="breadcrumb-item"><a href="{{url('admin/lessons/'.$unit->id )}}">{{$unit->name}}</a></li>
        <li class="breadcrumb-item"><a href="{{url('admin/lessonsections/'.$lesson->id )}}">{{$lesson->name}}</a></li>
 
        <li class="breadcrumb-item active" aria-current="page"><span>تعديل {{$data->name}}</span></li>
     
      </ol>
    </nav>
  </div>
</div>


                  
                    @if(Session::has('message'))
                    <h3 style="text-align:right;direction:rtl;" class="form-text text-success"> {{ Session::get('message') }} </h3>
                    @endif

                    <form method="POST" class="pt-3" action="{{ route('update.lessonsection') }}">
                      @csrf
                      <input type="hidden" name="id" class="form-control" value="{{$data->id}}" aria-label="Username">
                    <div class="form-group">
                      <label>الاسم</label>
                      <input type="text" name="name" class="form-control" value="{{$data->name}}" aria-label="Username">
                    </div>

<!--                    <div class="form-group">
                      <label>وقت الامتحان (قم بالاضافة فى حالة اختيار امتحان فقط)</label>
                      <input type="text" name="stop_watch" class="form-control" value="" aria-label="Username">
                    </div> -->

                    <div class="form-group">
                      <label> وقت بدأ الامتحان </label>
  <br>
  
                      <input style="font-weight:bold" type="datetime-local" class="form-control"   value="{{ date('Y-m-d\TH:i', strtotime($data->start_time))}}" aria-label="Username" name="start_time">
                  </div>
  
  
                  
                  <div class="form-group">
                    <label>وقت انتهاء الامتحان</label>
  <br>
  
                    <input style="font-weight:bold" type="datetime-local" class="form-control"  value="{{ date('Y-m-d\TH:i', strtotime($data->end_time))}}" aria-label="Username" name="end_time">
                </div>

                

                    <div class="form-group">
                      <label>ترتيب الفقرة</label>
                      <input type="text" name="priority" class="form-control" value="{{$data->priority}}" aria-label="Username">
                    </div>

                    <div class="form-group">
                      <label for="exampleFormControlSelect2">الحالة</label>
                      <select name = "hide" class="form-control" id="exampleFormControlSelect2">
                        <option value = "0" @if($data->hide == 0) selected @endif>فعال</option>
                        <option value = "1" @if($data->hide == 1) selected @endif>مخفى</option>
                    
                       
                      </select>
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