
                      <table id="order-listing" class="table">

                      
                        <thead>
                          <tr>
                           
                            <th>اسم الطالب</th>
                            <th>درجة الطالب</th>
                            <th>الدرجة النهائية للامتحان</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                       
                          @foreach ($examname as $dat)
    

                          <tr>
                           
                            <td>{{$dat->student->name}}</td>
                            <td>{{$dat->studentanswer->where('student_id', $dat->student->id)->sum('points')}}</td>
                            <td>{{$dat->exam->sum('points')}}</td>
                     
                            
                           
                          
                          </tr>
                          @endforeach
                        </tbody>

                      </table>
                   
            

                  
            