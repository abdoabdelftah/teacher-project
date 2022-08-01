@extends('admin.layouts.app')
@section('content')
               
               

              
              <br>
              <br>
                <div class="row">
                  <div class="col-12">
                    <div class="table-responsive">
                      <table id="order-listing" class="table">

                        <h2>امتحانات وواجب الدروس </h2>
                        <thead>
                          <tr>
                           
                            <th>اسم الامتحان</th>
                            <th>درجة الطالب</th>
                            <th>الدرجة النهائية للامتحان</th>
                            <th>مسح سجل الطالب للامتحان</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                       
                          @foreach ($examname as $dat)
    

                          <tr>
                           
                            <td>{{$dat->lessonsection->name}}</td>
                            <td>{{$dat->studentanswer->where('lesson_section_id', $dat->lessonsection->id)->where('student_id', $dat->student_id)->sum('points')}}</td>
                            <td>{{$dat->exam->sum('points')}}</td>
                            <td>
                              <a href="{{url('/admin/lessonresult/delete/'.$dat->lessonsection->id.'/'.$dat->student_id )}}" class="btn btn-outline-primary">مسح اجابة الطالب</a>
                            </td>
                          
                          </tr>
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





        <br>
        <br>

        <div class="row">
          <div class="col-md-12 grid-margin">
            <div class="card">
              <div class="card-body">

          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table">

                  <h2>امتحانات الوحدات </h2>
                  <thead>
                    <tr>
                     
                      <th>اسم الامتحان</th>
                      <th>درجة الطالب</th>
                      <th>الدرجة النهائية للامتحان</th>
                     
                      <th>مسح سجل الطالب للامتحان</th>
                    </tr>
                  </thead>
                  <tbody>
                 
                    @foreach ($unitname as $udat)


                    <tr>
                     
                      <td>{{$udat->unitexamsection->name}}</td>
                      <td>{{$udat->studentanswer->where('unit_exam_section_id', $udat->unitexamsection->id)->where('student_id', $udat->student_id)->sum('points')}}</td>
                      <td>{{$udat->exam->sum('points')}}</td>
                    
                      
                      <td>
                        <a href="{{url('/admin/unitresult/delete/'.$udat->unitexamsection->id.'/'.$udat->student_id )}}" class="btn btn-outline-primary">مسح اجابة الطالب</a>
                      </td>

                    </tr>
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
            

                  
            