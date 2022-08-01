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

<?php $urlid = request()->route('id'); ?>

<a href="{{url('admin/addlessontextexam/'.$urlid)}}" class="btn btn-success">اضافة سؤال</a>


              <br>
              <br>
                <div class="row">
                  <div class="col-12">
                    <div class="table-responsive">
                      <table id="order-listing" class="table">
                        <thead>
                          <tr>
                            <th>الترتيب</th>
                            <th>الاسم</th>
                            <th>الدرجات</th>
                          
                            <th>الحالة</th>
                            
                            <th>تعديل</th>
                          
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($data as $dat)
    

                          <tr>
                            <td>{{$dat->id}}</td>
                            <td>{{$dat->name}}</td>
                            <td>{{$dat->points}}</td>
                          
                            <td>@if($dat->hide == 1) مخفى @else ظاهر @endif</td>
         
                            
                            <td>
                              <a href="{{url('admin/lessontextexams/edit/'.$dat -> id)}}" class="btn btn-outline-primary">  تعديل السؤال</a>
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
            

                  
            