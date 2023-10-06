<!DOCTYPE html>
<html lang="ar" dir="rtl">
  
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>استاذ محمد خيرى</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/simple-line-icons/css/simple-line-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/css/vendor.bundle.base.css')); ?>">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/font-awesome/css/font-awesome.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/jvectormap/jquery-jvectormap.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/daterangepicker/daterangepicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/chartist/chartist.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/select2/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/mdi/css/materialdesignicons.min.css')); ?>">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/demo_1/style.css')); ?>">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?php echo e(asset('assets/images/favicon.png')); ?>" />



    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/dropzone/dropzone.css')); ?>">



    
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






#upload {
    opacity: 0;
 
}

#upload-label {
    position: absolute;
    top: 50%;
    left: 1rem;
    transform: translateY(-50%);

}

.image-area {
    border: 2px dashed rgba(255, 255, 255, 0.7);
    padding: 1rem;
    position: relative;
}

.image-area::before {
    content: 'Uploaded image result';
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 0.8rem;
    z-index: 1;
}

.image-area img {
    z-index: 2;
    position: relative;
}
</style>
  </head>
  <body class="rtl">
    <div class="container-scroller">
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
         <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        
          <a class="navbar-brand brand-logo-mini" href="<?php echo e(url('/grades')); ?>"><img src="<?php echo e(asset('assets/images/test.png')); ?>" alt="logo" /></a>
         <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
          <h5 class="mb-0 font-weight-medium d-none d-lg-flex"><span > الوقت المتبقى على انتهاء الامتحان &nbsp;<span style="font-size:20px;" id="time" ><?php echo e($mins); ?> </span>  دقيقة</span></h5>
 
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
              <a class="nav-link navbar-brand brand-logo-mini" href="#"><img src="<?php echo e(asset('assets/images/test.png')); ?>" alt="logo" /></a>
            </li>
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                
                  
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?php echo e(Auth::user()->name); ?></p>
                  <p class="designation"></p>
                </div>
                <div class="icon-container">
                 
                </div>
              </a>
            </li>
           

            <li class="nav-item nav-category">
              <span class="nav-link"> الرجاء عدم الخروج من الصفحة</span>
            </li>

            <li class="nav-item nav-category">
              <span class="nav-link"> موعد انتهاء الامتحان <br> يوم  <?php echo e(Str::substr($data->end_time , 8, 2)); ?>  من شهر <?php echo e(Str::substr($data->end_time , 5, 2)); ?> الساعة <?php echo e(Str::substr($data->end_time , 11, 5)); ?></span>

              <span class="nav-link"> الوقت المتاح لك حل الامتحان فيه: </span>  <span style="font-size:15px;" id="time" ><?php echo e($mins); ?>   &nbsp; دقيقة</span>

            </li>

           
           

          </ul>
        </nav>





        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Quick Action Toolbar Starts-->
           
            <!-- Quick Action Toolbar Ends-->
           
           

              <?php $gradeid = request()->route('grade_id'); ?> 

              <?php $unitid = request()->route('unit_id'); ?> 

         
                    
            



  <!---------------------------------------------Start main here ------------------------------------------------------------------>





    






   <!-------------------------------Start Content here ---------------------->

   
    
    <form method="POST" class="pt-3" id="myform" enctype="multipart/form-data" action="<?php echo e(route('post.unittextexam')); ?>">
      <?php echo csrf_field(); ?>

    <?php $__currentLoopData = $exam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $exa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


    <input type = "hidden" name = "question[]" value="<?php echo e($exa->id); ?>" >

    <input type = "hidden" name = "unit_exam_section_id[]" value="<?php echo e($exa->unit_exam_section_id); ?>" >
    

    
    <div class="col-md-12 grid-margin">
      <div class="card">
        <div class="card-body">

          <div class="col-md-10">
            <div class="form-group row">
                     
              <?php if($exa->question_type == 1): ?>
              <b> <?php echo e($i + 1); ?> - </b>   <h3> <?php echo e($exa->question); ?></h3>
             <?php endif; ?> 

             <?php if($exa->question_type == 2): ?>
             <b> <?php echo e($i + 1); ?> - </b>   <a href="#" id="pop">
              <img  src="<?php echo e($exa->question); ?>" width="800px" height="200px" style=" width: 100%; height: auto;">
            </a>
          <?php endif; ?>


          </div>
          </div>

    
          <div class="col-md-10">
            <div class="form-group row">
              
         

             

              <div class="form-group">
                <label style="font-size: 25px; color:blue;">قم بكتابة الاجابة هنا او قم برفع صورة</label>
                    <textarea class="form-control" rows="10" cols="150" style="border:2px solid blue" name="answer[<?php echo e($exa->id); ?>]" id="answer<?php echo e($exa->id); ?>">  </textarea>
                <br>
               

                <br>



                  <!-- Upload image input-->
            <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm" style="border: 1px solid blue;">
              <input   name="student_answer_picture[<?php echo e($exa->id); ?>]" type="file" class="form-control border-0" accept="image/*;capture=camera" capture="camera"  >
              <label  for="upload" class="font-weight-light text-muted">اختر صورة</label>
              <div class="input-group-append" >
                  <label  style="border: 1px solid blue;" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">اختر صورة</small></label>
              </div>
          </div>

          <!-- Uploaded image area-->
        
           

              </div>
                
        
            </div>
          </div>






          
     


          
        </div>
      </div>
   </div>
<hr color="black">
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" id="mysubmit" type="submit" class="btn btn-primary">
 إرسال الإجابات
</button>
<br>
<br>

  </form>

 


   
  
    
    
    
    
       
    
   
              
        



  
    
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
    <script src="<?php echo e(asset('assets/vendors/js/vendor.bundle.base.js')); ?>"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?php echo e(asset('assets/vendors/chart.js/Chart.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendors/jvectormap/jquery-jvectormap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendors/moment/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendors/daterangepicker/daterangepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendors/chartist/chartist.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendors/progressbar.js/progressbar.min.js')); ?>"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?php echo e(asset('assets/js/off-canvas.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/hoverable-collapse.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/misc.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/settings.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/todolist.js')); ?>"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="<?php echo e(asset('assets/js/dashboard.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/file-upload.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/typeahead.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/select2.js')); ?>"></script>
    <!-- End custom js for this page -->




    <script src="<?php echo e(asset('assets/vendors/dropzone/dropzone.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/dropzone.js')); ?>"></script>


    <script>


      document.getElementById("myform").onsubmit = function() {myfFunction()};
      
      function myfFunction() {
        document.getElementById("mysubmit").disabled = true;
      }
      
      </script>

      
    <script>
    function startTimer(duration, display) {
      var timer = duration, minutes, seconds;
      setInterval(function () {
          minutes = parseInt(timer / 60, 10);
          seconds = parseInt(timer % 60, 10);
  
          minutes = minutes < 10 ? "0" + minutes : minutes;
          seconds = seconds < 10 ? "0" + seconds : seconds;
  
          display.textContent = minutes + ":" + seconds;
  
          if (--timer < 0) {
              timer = duration;
              document.getElementById('mysubmit').click();
          }
      }, 1000);
  }
  
  window.onload = function () {
      var fiveMinutes = 60 * <?php echo e($mins); ?>,
          display = document.querySelector('#time');
      startTimer(fiveMinutes, display);
  };

  </script>





</body>


  


</html>



<?php /**PATH /home/u580293580/domains/mrkhairy.com/public_html/laravel/resources/views/student/unittextexamstart.blade.php ENDPATH**/ ?>