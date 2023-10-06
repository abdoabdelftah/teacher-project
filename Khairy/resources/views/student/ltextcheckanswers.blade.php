<!DOCTYPE html>
<html lang="ar" dir="rtl">
  
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>استاذ محمد خيرى</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/chartist/chartist.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/demo_1/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />



    <link rel="stylesheet" href="{{ asset('assets/vendors/dropzone/dropzone.css') }}">



    
    <style>

.iframecontainer {
  position: relative;
  overflow: hidden;
  width: 100%;
  /* 16:9 Aspect Ratio (divide 9 by 16 = 0.5625) */
}

/* Then style the iframe to fit in the container div with full height and width */
.responsive-iframe {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  width: 90%;
  height: 90%;
}

.circle {
  width: 500px;
  height: 500px;
  line-height: 500px;
  border-radius: 50%;
  border-color:red;
  font-size: 50px;
  color: #fff;
  text-align: center;
  background:;
}





.separator {
    display: flex;
    align-items: center;
    text-align: center;
}
.separator::before, .separator::after {
    content: '';
    flex: 1;
    border-bottom: 1px solid #000;
}
.separator::before {
    margin-right: .25em;
}
.separator::after {
    margin-left: .25em;
}
</style>
  </head>
  <body class="rtl">
    <div class="container-scroller">
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
         <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        
          <a class="navbar-brand brand-logo-mini" href="{{url('/grades')}}"><img src="{{ asset('assets/images/test.png') }}" alt="logo" /></a>
         <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
          <h5 class="mb-0 font-weight-medium d-none d-lg-flex">مرحبا بك فى بوابة التعلم للاستاذ محمد خيرى!</h5>
          
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>
      <div class="container-fluid page-body-wrapper">
        <div id="settings-trigger"><i class="icon-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close icon-close"></i>
          <p class="settings-heading">جلود الشريط الجانبي</p>
          <div class="sidebar-bg-options selected" id="sidebar-default-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div>الإفتراضي
          </div>
          <div class="sidebar-bg-options" id="sidebar-light-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div>ضوء
          </div>
          <p class="settings-heading mt-2">لون الرأس</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles dark"></div>
            <div class="tiles default light"></div>
          </div>
        </div>
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item navbar-brand-mini-wrapper">
              <a class="nav-link navbar-brand brand-logo-mini" href="#"><img src="{{ asset('assets/images/test.png') }}" alt="logo" /></a>
            </li>
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                
                  
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">{{Auth::user()->name}}</p>
                  <p class="designation"></p>
                </div>
                <div class="icon-container">
                 
                </div>
              </a>
            </li>
           


           

            <li class="nav-item">
              <a class="nav-link" href="{{url('grades')}}">
                <span class="menu-title">المواد الخاصة بك</span>
                <i class="icon-screen-desktop menu-icon"></i>
              </a>
            </li>
         
            <li class="nav-item">
              <a class="nav-link" href="{{url('student/forums')}}">
                <span class="menu-title">الاسئلة الخاصة بك</span>
                <i class="icon-screen-desktop menu-icon"></i>
              </a>
            </li>

            
            <li class="nav-item">
              <a class="nav-link" href="{{url('student/examsresults')}}">
                <span class="menu-title">نتائج الامتحانات</span>
                <i class="icon-screen-desktop menu-icon"></i>
              </a>
            </li>

           

           
           

          </ul>
        </nav>





        <div class="main-panel">
          <div class="content-wrapper">
 



  <!---------------------------------------------Start main here ------------------------------------------------------------------>





    






   <!-------------------------------Start Content here ---------------------->

 

   
   <div class="col-md-12 grid-margin">
    <div class="card">
      <div class="card-body">


        @if($exam->sum('points') == 0)

        <h3  style="color:rgb(11, 109, 255)"> 
         لم تصل الينا اجابتك - قد يكون ذلك بسبب احدى الاسباب التالية : </h3>
         <h4><br> - انك لم تقم بالضغط على أرسال الاجابات فى اخر الصفحة بعد الانتهاء من اجابتك عن الامتحان  <br><br>
          - انك قد اغلقت صفحة الامتحان قبل ان تقوم بالانتهاء من الامتحان وبالتالى لم تقم بالضغط على أرسال الاجابات<br><br>
            - انك قد فقدت اتصالك بالانترنت اثناء ارسال اجابتك عن الامتحان
          </h4>
          <h4  style="color: red" ><br> يجب عليك الاتصال بالأستاذ ليسمح لك بإعادة الامتحان <h4>
 

         @else

      <h4  style="color:rgb(11, 109, 255); border-radius:30%; border:solid green 3px;padding:50px"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        @if($studentanswer->sum('points') == 0) لم يتم تصحيح امتحانك حتى الان.الرجاء القدوم الى هذه الصفحة فى وقت لاحق @else   لقد حصلت على  {{$studentanswer->sum('points')}}  من {{$exam->sum('points')}} @endif</h4>


        @endif 


      </div>
    </div>
  </div>

   <div class="col-md-12 grid-margin">
    <div class="card">
      <div class="card-body">





        <?php
        foreach($exam as $i => $exa){
          ?>


        
    
        
        <div class="col-md-12 grid-margin">
          <div class="card">
            <div class="card-body">
    
              <div class="col-md-10">
                <div class="form-group row">
                         
                  @if($exa->question_type == 1)
                 <h3> {{$exa->question}}</h3>
                 @endif 
    
                 @if($exa->question_type == 2)
                 <a href="#" id="pop">
                  <img  src="{{$exa->question}}" width="800px" height="200px" style=" width: 100%; height: auto;">
                </a>
              @endif
    
    
              </div>
              </div>
    
             

         
              <div class="col-md-10">
                <div class="form-group row">
                  
             
    
                  
                      <label  class=" form-check-label" >
                     

                        @if(!empty($studentanswer[$i]->student_answer))
                        <div class="separator" style="font-size:20px;"> &nbsp; &nbsp;اجابتك: &nbsp; &nbsp;</div>
                        <h3> {{$studentanswer[$i]->student_answer}}</h3>
                          @endif


                      @if(!empty($studentanswer[$i]->student_answer_picture))
                      <div class="separator" style="font-size:20px;"> &nbsp; &nbsp;اجابتك: &nbsp; &nbsp;</div>
                      
                  <img  src="{{$studentanswer[$i]->student_answer_picture}}" width="800px" height="200px" style=" width: 100%; height: auto;">
                    @endif


                    @if(!empty($studentanswer[$i]->right_answer))
                    <div class="separator" style="font-size:20px;"> &nbsp; &nbsp;الاجابة الصحيحة وتعليق المصحح: &nbsp; &nbsp;</div>
                    <h3 style="color:red;" > {{$studentanswer[$i]->right_answer}}</h3>
                      @endif

<br>
                      @if(!empty($studentanswer[$i]->right_answer_picture))
                      <img  src="{{$studentanswer[$i]->right_answer_picture}}" width="800px" height="200px" style=" width: 100%; height: auto;">
                      @endif

                    
           
                </div>
              </div>
    
    
            
    
    
    
    
              
       
    
   
              
            </div>
          </div>
       </div>
    <hr color="black">
<?php } ?>



  
      </div>
    </div>
  </div>


   
 <!-------------------------------End Content here ---------------------->






  <!------------------------------------------------------end main here -------------------------------------------------------->


              
            </div>
           




            

                  
                  </div>
                </div>
              </div>
            
          
          <!-- content-wrapper ends -->
         
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/vendors/chartist/chartist.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/file-upload.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>
    <!-- End custom js for this page -->




    <script src="{{ asset('assets/vendors/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('assets/js/dropzone.js') }}"></script>



  </body>


  


</html>



