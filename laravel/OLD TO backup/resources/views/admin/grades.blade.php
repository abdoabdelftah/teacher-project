@extends('admin.layouts.app')
@section('content')
               
               

<a href="{{url('admin/addgrade')}}" class="btn btn-success">اضافة كورس</a>


              <br>
              <br>
                <div class="row">
                  <div class="col-12">
                    <div class="table-responsive">
                      <table id="order-listing" class="table">
                        <thead>
                          <tr>
                            <th>الرقم</th>
                            <th>الاسم</th>
                            
                          
                            <th>الحالة</th>
                            
                            <th>تعديل</th>
                            <th>المحتوى</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($data as $dat)
    

                          <tr>
                            <td>{{$dat->id}}</td>
                            <td>{{$dat->name}}</td>
                         
                            <td>@if($dat->hide == 1) مخفى @else ظاهر @endif</td>
         
                            
                            <td>
                              <a href="{{url('admin/grades/edit/'.$dat -> id)}}" class="btn btn-outline-primary">تعديل</a>
                            </td>

                            <td>
                              <a href="{{url('admin/units/'.$dat -> id)}}" class="btn btn-outline-primary">الوحدات</a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>

                        <div class="d-flex justify-content-center">
                        <?php //echo $data->render(); ?>
                     
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
            

                  
            