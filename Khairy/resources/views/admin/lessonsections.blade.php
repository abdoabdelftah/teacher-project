@extends('admin.layouts.app')
@section('content')
               
            
              
<div class="card-body">
 
  <div class="template-demo">
 
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb breadcrumb-custom">
        <li class="breadcrumb-item"><a href="{{url('admin/units/'.$grade->id )}}">{{$grade->name}}</a></li>
        <li class="breadcrumb-item"><a href="{{url('admin/lessons/'.$unit->id )}}">{{$unit->name}}</a></li>
        <li class="breadcrumb-item active" aria-current="page"><span>{{$lesson->name}}</span></li>
     
      </ol>
    </nav>
  </div>
</div>


<?php $urlid = request()->route('id'); ?>

<a href="{{url('admin/addlessonsection/'.$urlid)}}" class="btn btn-success">اضافة فقرة</a>


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
                            <th>النوع</th>
                            <th>الحالة</th>
                         
                            
                            <th>تعديل</th>
                            <th>المحتوى</th>

                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($data as $dat)
    

                          <tr>
                            <td>{{$dat->priority}}</td>
                            <td>{{$dat->name}}</td>
                            <td> @if($dat->section_type == 5)
                            شرح
                            @endif

                            @if($dat->section_type == 1)
                            واجب
                            @endif

                            @if($dat->section_type == 2)
                             امتحان الاختيار من متعدد
                            @endif

                            @if($dat->section_type == 6)
                            امتحان الاجابة المقالية
                           @endif
                          </td>
         
                          <td>@if($dat->hide == 0) ظاهر @else مخفى @endif</td>
                            <td>
                              <a href="{{url('admin/lessonsections/edit/'.$dat -> id)}}" class="btn btn-outline-primary">  تعديل الفقرة</a>
                            </td>

                            <td>

                              @if($dat->section_type == 5)
                              <a href="{{url('admin/lectureedit/'.$dat -> id)}}" class="btn btn-outline-primary">تعديل الشرح</a>
                                @endif

                              @if($dat->section_type == 1)
                              <a href="{{url('admin/lessonhomeworks/'.$dat -> id)}}" class="btn btn-outline-primary">اسألة الواجب</a>
                               @endif

                              @if($dat->section_type == 2)
                              <a href="{{url('admin/lessonexams/'.$dat -> id)}}" class="btn btn-outline-primary">اسألة الامتحان</a>
                               @endif


                               @if($dat->section_type == 6)
                               <a href="{{url('admin/lessontextexams/'.$dat -> id)}}" class="btn btn-outline-primary">اسألة الامتحان</a>
                                @endif
                            </td>

                            <td> @if($dat->section_type != 5)
                              <a href="{{url('admin/student/lessonsection/answered/'.$dat -> id)}}" class="btn btn-outline-primary">من قام بالاجابة؟</a>
                              @endif </td>

                              
                            <td> @if($dat->section_type != 5)
                              <a href="{{url('admin/student/lessonsection/notanswered/'.$dat -> id)}}" class="btn btn-outline-primary">من لم يقم بالاجابة؟</a>
                              @endif </td>


                              
                            <td>
                              <a href="{{url('admin/delete/lessonsection/'.$dat -> id)}}" onclick="return confirm('هل انت متأكد من رغبتك فى المسح نهائيا?')" class="btn btn-danger">حذف<i class="fa fa-trash"></i></a>
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
            

                  
            