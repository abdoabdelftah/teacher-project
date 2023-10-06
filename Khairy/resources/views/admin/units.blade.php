@extends('admin.layouts.app')
@section('content')
               
       
<div class="card-body">
 
  <div class="template-demo">
 
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb breadcrumb-custom">
        <li class="breadcrumb-item"><a href="{{url('admin/grades')}}">المواد</a></li>
        


        <li class="breadcrumb-item active" aria-current="page"><span> {{$grade->name}}</span></li>
     
      </ol>
    </nav>
  </div>
</div>
        


<?php $urlid = request()->route('id'); ?>

<a href="{{url('admin/addunit/'.$urlid)}}" class="btn btn-success">اضافة وحدة</a>


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
                              <a href="{{url('admin/units/edit/'.$dat -> id)}}" class="btn btn-outline-primary">تعديل</a>
                            </td>

                            <td>
                              <a href="{{url('admin/lessons/'.$dat -> id)}}" class="btn btn-outline-primary">الدروس</a>
                            </td>

                            
                            <td>
                              <a href="{{url('admin/delete/unit/'.$dat -> id)}}" onclick="return confirm('هل انت متأكد من رغبتك فى المسح نهائيا?')" class="btn btn-danger">حذف<i class="fa fa-trash"></i></a>
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
            

                  
            