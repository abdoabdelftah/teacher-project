@extends('admin.layouts.app')
@section('content')
               
               

              
              <br>
              <br>
                <div class="row">
                  <div class="col-12">
                    <div class="table-responsive">
                      <table id="order-listing" class="table">

                        <h2>امتحانات الدروس التى لم يتم تصليحها </h2>
                        <br>
                      
                        <thead>
                          <tr>
                           
                            <th>اسم الطالب</th>
                           
                            <th>اضغط للتصحيح</th>
                          </tr>
                        </thead>
                        <tbody>
                       
                          @foreach ($examname as $dat)
    

                          @if($dat->lessonsection->section_type == 6)
                          <tr>
                           
                            <td>{{$dat->student->name}}</td>
                         
                     
                            <td><a href="{{url('admin/student/'.$dat->student_id.'/lesson/'.$dat->lesson_section_id)}}" class="btn btn-outline-primary"> اضغط هنا للتصحيح</a></td>
                         
                          
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
            

                  
            