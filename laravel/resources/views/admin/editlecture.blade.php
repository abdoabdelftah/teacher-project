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

                    <form method="POST" class="pt-3" enctype="multipart/form-data" action="{{ route('update.lecture') }}">
                      @csrf
                      <input type="hidden" name="id" class="form-control" value="{{$data->id}}" aria-label="Username">
                    <div class="form-group">
                      <label>الاسم</label>
                      <input type="text" name="name" class="form-control" value="{{$data->name}}" aria-label="Username">
                    </div>


                    <div class="form-group">
                      <label for="exampleFormControlSelect2">النوع</label>
                      <select name = "type" class="form-control" id="exampleFormControlSelect2">
                        <option value = "1" @if(! empty($data->type)) @if($data->type == 1) selected @endif @endif>نص</option>
                        <option value = "2" @if(! empty($data->type)) @if($data->type == 2) selected @endif @endif>ملف</option>
                        <option value = "3" @if(! empty($data->type)) @if($data->type == 3) selected @endif @endif>صورة</option>
                       
                      </select>
                    </div>
                   

                 
                    @if($data->type == 1)

                      <div class="form-group">
                        <label>المحتوى</label>
                        <br>
                          <textarea  name="content" rows="10" cols="120">{{$data->content}}</textarea>
                      </div>
                
                    @endif 
                    

                      
                    @if($data->type != 'Null')
                     @if($data->type == 3)

                     <div class="form-group">
                      <label>ارفع الصورة</label>
                      <a href="{{$data->content}}">اضغط هنا لرؤية المحتوى</a>
                     <br>
                      <input type="file" name="content">
                    </div>
              
                  @endif 
                  @endif

                  @if($data->type != 'Null')
                  @if($data->type == 2)

                  <div class="form-group">
                   <label>ارفع ملف</label>
                   <a href="{{$data->content}}">اضغط هنا لرؤية المحتوى</a>
                  <br>
                   <input type="file" name="content">
                 </div>
           
               @endif 
               @endif



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