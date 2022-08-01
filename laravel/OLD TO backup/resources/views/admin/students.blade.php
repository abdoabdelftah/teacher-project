@extends('admin.layouts.app')
@section('content')

                <form class="search-form d-none d-md-block"  method="POST" action="{{ route('search.student') }}">
                  @csrf
                  <i class="icon-magnifier"></i>
                  <input type="search" class="form-control" name = "search" placeholder=" ابحث عن طريق الاسم او رقم التليفون" title="Search here">
                </form>

              <br>

              <a href="{{url('admin/addstudent')}}" class="btn btn-success">اضافة طالب</a>

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
                            <th>كود الادخول</th>


                            <th>تعديل</th>

                            <th>السماح بتسجيل الدخول</th>


                            <th>مسح طالب</th>

                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($data as $dat)


                          <tr>
                            <td>{{$dat->id}}</td>
                            <td><a href="{{url('admin/studentresults/'.$dat->id)}}"> {{$dat->name}} </a> </td>
                            <td>{{$dat->phone_number}}</td>


                            <td>
                              <a href="{{url('admin/students/edit/'.$dat -> id)}}" class="btn btn-outline-primary">تعديل</a>
                            </td>

                            <td>
                              <a href="{{url('admin/allowlogin/'.$dat -> id)}}" class="btn btn-outline-primary">السماح بتسجيل الدخول</a>
                            </td>


                            <td>
                              <a href="{{url('admin/deletestudent/'.$dat -> id)}}" onclick="return confirm('هل انت متأكد من رغبتك فى مسح هذا الطالب نهائيا?')" class="btn btn-danger">مسح الطالب<i class="fa fa-trash"></i></a>
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

                {!!  $data -> links() !!}

              </div>
            </div>
          </div>
        </div>

@stop



