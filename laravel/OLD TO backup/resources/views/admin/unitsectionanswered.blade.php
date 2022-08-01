@extends('admin.layouts.app')
@section('content')
               


<div class="card-body">
 
  <div class="template-demo">
 
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb breadcrumb-custom">
        <li class="breadcrumb-item"><a href="{{url('admin/units/'.$grade->id)}}">{{$grade->name}}</a></li>
        
        <li class="breadcrumb-item"><a href="{{url('admin/lessons/'.$unit->id)}}">{{$unit->name}}</a></li>


        <li class="breadcrumb-item active" aria-current="page"><span>{{$unitexamsection->name}}</span></li>
     
      </ol>
    </nav>
  </div>
</div>
               

              
              <br>
              <br>
                <div class="row">
                  <div class="col-12">
                    <div class="table-responsive">
                      <table id="order-listing" class="table">

                        <h2>الطلاب الذين قاموا بالاجابة عن الامتحان </h2>
                        

                        <br>
                        <a href="{{url('admin/uresultsdownload/'. $unitexamsection->id)}}" class="btn btn-primary"> اضغط لتحميل ملف Excel بدرجات الطلاب</a>
                        <br>
                        <br>
                      
                        <thead>
                          <tr>
                           
                            <th>اسم الطالب</th>
                            <th>درجة الطالب</th>
                            <th>الدرجة النهائية للامتحان</th>
                            <th>جميع درجات الطالب</th>
                            <th>تعديل الطالب</th>
                          </tr>
                        </thead>
                        <tbody>
                       
                          @foreach ($examname as $dat)
    

                          <tr>
                           
                            <td>{{$dat->student->name}}</td>
                            <td>{{$dat->studentanswer->where('student_id', $dat->student->id)->sum('points')}}</td>
                            <td>{{$dat->exam->sum('points')}}</td>
                     
                            
                            <td><a href="{{url('admin/ucheckanswers/'.$dat->student->id.'/'. $unitexamsection->id)}}" class="btn btn-outline-primary"> ورقة الاجابة</a></td>

                            <td><a href="{{url('admin/studentresults/'.$dat->student->id)}}" class="btn btn-outline-primary"> جميع درجات الطالب</a></td>
                            <td><a href="{{url('admin/students/edit/'.$dat->student->id)}}" class="btn btn-outline-primary">تعديل الطالب</a></td>
                          
                          
                          </tr>
                          @endforeach
                        </tbody>

                        <div class="d-flex justify-content-center">
                          {{ $examname->links() }}
                      </div>
                      </table>
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
</div>

@stop
            

                  
            