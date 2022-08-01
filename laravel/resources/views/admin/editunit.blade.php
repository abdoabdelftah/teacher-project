@extends('admin.layouts.app')
@section('content')

<div class="card-body">
 
  <div class="template-demo">
 
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb breadcrumb-custom">
        <li class="breadcrumb-item"><a href="{{url('admin/units/'.$grade->id)}}">{{$grade->name}}</a></li>
        <li class="breadcrumb-item active" aria-current="page"><span>تعديل {{$data->name}}</span></li>
     
      </ol>
    </nav>
  </div>
</div>

                  
                    @if(Session::has('message'))
                    <h3 style="text-align:right;direction:rtl;" class="form-text text-success"> {{ Session::get('message') }} </h3>
                    @endif

                    <form method="POST" class="pt-3" action="{{ route('update.unit') }}">
                      @csrf
                      <input type="hidden" name="id" class="form-control" value="{{$data->id}}" aria-label="Username">
                    <div class="form-group">
                      <label>الاسم</label>
                      <input type="text" name="name" class="form-control" value="{{$data->name}}" aria-label="Username">
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