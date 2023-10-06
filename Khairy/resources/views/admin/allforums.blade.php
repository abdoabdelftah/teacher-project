@extends('admin.layouts.app')
@section('content')
               
              

            

              <br>
              <br>
                <div class="row">
                  <div class="col-12">
                    <div class="table-responsive">
                      <table id="order-listing" class="table">
                        <thead>
                          <tr>
                            
                            <th>اسم الطالب</th>
                            <th>عنوان السؤال</th>
                         
                            <th>ادخل الى تفاصيل السؤال</th>
                            
                            <th>تعديل الطالب</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($forums as $dat)
    

                          <tr>
                            <td>{{$dat->student->name}}</td>
                            <td> {{$dat->head}} </td>
                         
                            <td>
                              <a href="{{url('admin/forum/'.$dat->id)}}" class="btn btn-outline-primary">ادخل الى تفاصيل السؤال</a>
                            </td>

                            <td>
                              <a href="{{url('admin/students/edit/'.$dat->student->id)}}" class="btn btn-outline-primary">تعديل الطالب</a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>

                        <div class="d-flex justify-content-center">
                        <?php //echo $data->render(); ?>
                        {!!  $forums -> links() !!}
                      </div>
                      </table>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>

@stop
            

                  
            