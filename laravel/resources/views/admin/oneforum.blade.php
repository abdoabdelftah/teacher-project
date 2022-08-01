@extends('admin.layouts.app')
@section('content')
               
              

            

              <br>
              <br>
                <div class="row">
                  <div class="col-12">
                   


                    
<div class="col-md-12 grid-margin">
  <div class="card">
    <div class="card-body">


<div class="tab-content tabcontent-border">
  <div class="tab-pane active" id="home" role="tabpanel">
      <div class="row" style="direction: rtl;text-align: right;margin-right: 40px; margin-top: 30px; margin-bottom: 10px;">
          <div class="col-lg-12">
              <h4><span style="font-weight: bold;">عنوان السؤال</span> : {{$data->head}} </h4>
              <hr>
              <h4><span style="font-weight: bold;">التفاصيل </span>: {{$data->question}}</h4><hr>
           
  
             @if(!empty($data->picture))
         <h4><span style="font-weight: bold;">المرفقات : </span>   <img  src="{{$data->picture}}" width="800px" height="200px" style=" width: 100%; height: auto;"></h4><hr>
          @endif
             
                  
                   
              
                 
              </div>
          </div>
      </div>
  </div>
 




                
              </div>
            </div>
          </div>
        
          <hr style="background-color: black; height: 2px; border: 1;">
        <!-------------------------------start comments here ---------------------->


        <div class="col-md-12 grid-margin">
          <div class="card">
            <div class="card-body comments" id ="comments">

           

              <center><h3> تعليقات المدرس او صاحب السؤال:</h3></center>

              @foreach($data->forumcomments as $com)
               

              <div class="tab-content tabcontent-border">
                <div class="tab-pane active" id="home" role="tabpanel">
                    <div class="row" style="direction: rtl;text-align: right;margin-right: 40px; margin-top: 30px; margin-bottom: 10px;">
                        <div class="col-lg-12">
                            <h4><span style="font-weight: bold;">تعليق</span> : {{$com->comment}} </h4>
                            <hr>
                            @if(!empty($com->picture)) 
                       <h4><span style="font-weight: bold;">المرفقات :  <img  src="{{$com->picture}}" width="800px" height="200px" style=" width: 100%; height: auto;"></span> </h4><hr>
                        @endif
                           
                                
                                 
                            
                               
                            </div>
                        </div>
                    </div>
                </div>
 <hr style="background-color: orange; height: 2px; border: 1;">
              @endforeach
             
      </div>
    </div>
  </div>



  <hr style="background-color: black; height: 2px; border: 1;">



  <div class="col-md-12 grid-margin">
    <div class="card">
      <div class="card-body">

        <form method="POST" class="pt-3" enctype="multipart/form-data" action="{{ route('postadmin.comment') }}">
          @csrf
<input type="hidden" name="forum_id" value="{{$data->id}}">
        <div class="form-group">
          <label style="font-size: 25px; color:blue;">قم بكتابة تعليق او قم برفع صورة</label>
              <textarea class="form-control" rows="10" cols="150" style="border:2px solid blue" name="comment" id="answer">  </textarea>
          <br>
         

          <br>



            <!-- Upload image input-->
      <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm" style="border: 1px solid blue;">
        <input   name="picture" type="file" class="form-control border-0" accept="image/*;"  >
        <label  for="upload" class="font-weight-light text-muted">اختر صورة</label>
        <div class="input-group-append" >
            <label  style="border: 1px solid blue;" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">اختر صورة</small></label>
        </div>
    </div>

    <!-- Uploaded image area-->
  
    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" id="submitnow" type="submit" class="btn btn-primary">
      اضافة تعليق
     </button>
    </form>
        </div>



</div>
</div>
</div>







<hr style="background-color: black; height: 2px; border: 1;">



<div class="col-md-12 grid-margin">
  <div class="card">
    <div class="card-body">

      <form method="POST" class="pt-3" action="{{ route('edit.forum') }}">
        @csrf

        <input type="hidden" name="forum_id" value="{{$data->id}}">

        <div class="form-group">
          <label for="exampleFormControlSelect2">اخفاء السؤال من الجميع؟</label>
          <select name = "hide" class="form-control" id="exampleFormControlSelect2">
            <option value = "1" >نعم</option>
            <option value = "0" selected>لا</option>
        
           
          </select>
        </div>


        <div class="form-group">
          <label for="exampleFormControlSelect2">اغلاق السؤال ومن الطالب واعتبار السؤال مجاب عنه؟</label>
          <select name = "is_closed" class="form-control" id="exampleFormControlSelect2">
            <option value = "1" >نعم</option>
            <option value = "0" selected>لا</option>
        
           
          </select>
        </div>



    

  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" id="submitnow" type="submit" class="btn btn-primary">
    تعديل صفحة السؤال
   </button>

  </form>
      </div>



</div>
</div>
</div>







</div>

        
</div>
</div>
</div>


          </div>
        </div>

@stop
            

                  
            