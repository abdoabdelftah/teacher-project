@extends('admin.layouts.app')
@section('content')


<div class="card-body">
 
  <div class="template-demo">
 
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb breadcrumb-custom">
        <li class="breadcrumb-item"><a href="{{url('admin/units/'.$grade->id)}}">{{$grade->name}}</a></li>
        
        <li class="breadcrumb-item"><a href="{{url('admin/lessons/'.$unit->id)}}">{{$unit->name}}</a></li>

        <li class="breadcrumb-item"><a href="{{url('admin/unittextexams/'.$unitexamsection->id)}}">{{$unitexamsection->name}}</a></li>



        <li class="breadcrumb-item active" aria-current="page"><span>اضافة سؤال</span></li>
     
      </ol>
    </nav>
  </div>
</div>


                  
                    @if(Session::has('message'))
                    <h3 style="text-align:right;direction:rtl;" class="form-text text-success"> {{ Session::get('message') }} </h3>
                    @endif

                    <form method="POST" class="pt-3" action="{{ route('store.unittextexam') }}">
                      @csrf
                      
                    <div class="form-group">
                      <label> (سيظهر الاسم لك فقط)الاسم</label>
                      <input type="text" name="name" class="form-control"  aria-label="Username">
                    </div>

                    <div class="form-group">
                      <label>درجات السؤال</label>
                      <input type="number" name="points" class="form-control"  aria-label="Username">
                    </div>

                    <div class="form-group">
                      <label>شكل السؤال</label>
                    <select name="question_type" class="form-control" id="exampleFormControlSelect2">
                      <option value="1">نص</option>
                      <option value="2">صورة</option>
                      
                    
                    </select>
                  </div>



               




                    <input type="hidden" name="unit_exam_section_id" value ="<?php echo request()->route('id'); ?>" class="form-control"  aria-label="Username">
                    <input type="hidden" name="type" value ="4" class="form-control"  aria-label="Username">

                    <div class="mt-3">
                      <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" class="btn btn-primary">
                       اضافة السؤال
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