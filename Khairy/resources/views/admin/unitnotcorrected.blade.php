@extends('admin.layouts.app')
@section('content')
               
               

              
              <br>
              <br>
                <div class="row">
                  <div class="col-12">
                    <div class="table-responsive">
                      <table id="order-listing" class="table">

                        <h2>امتحانات الوحدات التى لم يتم تصليحها </h2>
                        <br>
                      
                        <thead>
                          <tr>
                           
                            <th>اسم الطالب</th>
                           
                            <th>اضغط للتصحيح</th>
                          </tr>
                        </thead>
                        <tbody>
                       
                          @foreach ($examname as $dat)
    

                          @if($dat->unitexamsection->type == 4)
                          <tr>
                           
                            <td>{{$dat->student->name}}</td>
                         
                     
                            <td><a href="{{url('admin/student/'.$dat->student_id.'/unit/'.$dat->unit_exam_section_id)}}" class="btn btn-outline-primary"> اضغط هنا للتصحيح</a></td>
                         
                          
                          </tr>
                          @endif
                          @endforeach
                        </tbody>

                        <div class="d-flex justify-content-center">
                       
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
            

                  
            