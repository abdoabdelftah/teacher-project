@extends('admin.layouts.app')
@section('content')
               
<div class="card-body">
 
  <div class="template-demo">
 
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb breadcrumb-custom">
        <li class="breadcrumb-item"><a href="{{url('admin/units/'.$grade->id )}}">{{$grade->name}}</a></li>
        <li class="breadcrumb-item active" aria-current="page"><span>{{$unit->name}}</span></li>
     
      </ol>
    </nav>
  </div>
</div>

               
<?php $urlid = request()->route('id'); ?>

<a href="{{url('admin/addlesson/'.$urlid)}}" class="btn btn-success">اضافة درس</a>


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
                              <a href="{{url('admin/lessons/edit/'.$dat -> id)}}" class="btn btn-outline-primary">تعديل</a>
                            </td>

                            <td>
                              <a href="{{url('admin/lessonsections/'.$dat -> id)}}" class="btn btn-outline-primary">الفقرات</a>
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



        <br>
        <hr color="black">
        <br>

        <div class="row">
          <div class="col-md-12 grid-margin">
            <div class="card">
              <div class="card-body">

        <a href="{{url('admin/addunitexamsection/'.$urlid)}}" class="btn btn-success">اضافة امتحان وحدة</a>


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
                          
                          
                            <th>النوع</th>
                            
                            <th>تعديل</th>
                            <th>اسألة الامتحان</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($examsection as $dat)
    

                          <tr>
                            <td>{{$dat->id}}</td>
                            <td>{{$dat->name}}</td>
                            <td>@if($dat->type == 3) امتحان اسألة اختيارى @endif @if($dat->type == 4) امتحان اسألة مقالية @endif </td>
         
                            
                            <td>
                              <a href="{{url('admin/unitexamsections/edit/'.$dat -> id)}}" class="btn btn-outline-primary">تعديل</a>
                            </td>

                            <td>
                              <a @if($dat->type == 3) href="{{url('admin/unitchooseexams/'.$dat -> id)}}" @endif @if($dat->type == 4) href="{{url('admin/unittextexams/'.$dat -> id)}}" @endif class="btn btn-outline-primary">اسألة الامتحان</a>
                            </td>

                            <td> <a href="{{url('admin/student/unitexamsection/answered/'.$dat -> id)}}" class="btn btn-outline-primary">من قام بالاجابة؟</a>
                            </td>

                            <td> <a href="{{url('admin/student/unitexamsection/notanswered/'.$dat -> id)}}" class="btn btn-outline-primary">من لم يقم بالاجابة؟</a>
                            </td>

                          </tr>
                          @endforeach
                        </tbody>

                        <div class="d-flex justify-content-center">
                        <?php //echo $data->render(); ?>
                     
                      </div>
                      </table>
                      <br>
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
            

                  
            