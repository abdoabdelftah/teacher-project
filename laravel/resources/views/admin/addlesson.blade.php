@extends('admin.layouts.app')
@section('content')


<div class="card-body">
 
  <div class="template-demo">
 
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb breadcrumb-custom">
        <li class="breadcrumb-item"><a href="{{url('admin/units/'.$grade->id)}}">{{$grade->name}}</a></li>
        
        <li class="breadcrumb-item"><a href="{{url('admin/lessons/'.$unit->id)}}">{{$unit->name}}</a></li>
        <li class="breadcrumb-item active" aria-current="page"><span>اضافة درس</span></li>
     
      </ol>
    </nav>
  </div>
</div>

                    @if(Session::has('message'))
                    <h3 style="text-align:right;direction:rtl;" class="form-text text-success"> {{ Session::get('message') }} </h3>
                    @endif

                    <form method="POST" class="pt-3" action="{{ route('store.lesson') }}">
                      @csrf
                      
                    <div class="form-group">
                      <label>الاسم</label>
                      <input type="text" name="name" class="form-control"  aria-label="Username">
                    </div>

                    <input type="hidden" name="unit_id" value ="<?php echo request()->route('id'); ?>" class="form-control"  aria-label="Username">

                    <div class="mt-3">
                      <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" class="btn btn-primary">
                       تسجيل درس جديد
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