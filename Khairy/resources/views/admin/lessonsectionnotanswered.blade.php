@extends('admin.layouts.app')
@section('content')
               
               
   
<div class="card-body">
 
  <div class="template-demo">
 
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb breadcrumb-custom">
        <li class="breadcrumb-item"><a href="{{url('admin/units/'.$grade->id )}}">{{$grade->name}}</a></li>
        <li class="breadcrumb-item"><a href="{{url('admin/lessons/'.$unit->id )}}">{{$unit->name}}</a></li>
        
        <li class="breadcrumb-item"><a href="{{url('admin/lessonsections/'.$lesson->id )}}">{{$lesson->name}}</a></li>

        <li class="breadcrumb-item active" aria-current="page"><span>{{$lessonsection->name}}</span></li>
     
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

                        <h2>الطلاب الذين لم يقوموا بالاجابة عن الامتحان </h2>
                        <br>
                      
                        <thead>
                          <tr>
                           
                            <th>اسم الطالب</th>
                            <th>تعديل الطالب</th>
                            <th>جميع درجات الطالب</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                       
                          @foreach ($students as $dat)
    

                          <tr>
                           
                            <td>{{$dat->name}}</td>
                            <td><a href="{{url('admin/students/edit/'.$dat -> id)}}" class="btn btn-outline-primary">تعديل الطالب</a></td>
                            <td><a href="{{url('admin/studentresults/'.$dat->id)}}" class="btn btn-outline-primary"> جميع درجات الطالب</a></td>
                          
                          </tr>
                          @endforeach
                        </tbody>

                        <div class="d-flex justify-content-center">
                          {{ $students->links() }}
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
            

                  
            