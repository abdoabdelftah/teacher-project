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
              <span class="nav-link"><?php echo e($lessonname->name); ?></span>
            </li>

            <?php $gradeid = request()->route('grade_id'); ?> 

            <?php $unitid = request()->route('unit_id'); ?> 

            <?php $lessonid = request()->route('lesson_id'); ?> 

           

           

            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="nav-item">
              <?php if($dat->section_type == 5): ?>
              <a class="nav-link" href="<?php echo e(url('/grade/'.$gradeid.'/unit/'.$unitid.'/lesson/'.$lessonid.'/lessonsectionlecture/'.$dat->id)); ?>">

                <?php elseif($dat->section_type == 1): ?>
                <a class="nav-link" href="<?php echo e(url('/grade/'.$gradeid.'/unit/'.$unitid.'/lesson/'.$lessonid.'/lessonsectionhomework/'.$dat->id)); ?>">

                  <?php elseif($dat->section_type == 2): ?>
                  <a class="nav-link" href="<?php echo e(url('/grade/'.$gradeid.'/unit/'.$unitid.'/lesson/'.$lessonid.'/lessonsectionexam/'.$dat->id)); ?>">

                    <?php elseif($dat->section_type == 6): ?>
                    <a class="nav-link" href="<?php echo e(url('/grade/'.$gradeid.'/unit/'.$unitid.'/lesson/'.$lessonid.'/lessonsectiontextexam/'.$dat->id)); ?>">

                      <?php endif; ?>
                <span class="menu-title"><?php echo e($dat->name); ?></span>
              
               
                
                <i class="icon-star menu-icon"></i>
             
              </a>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         
           

          </ul>
        </nav>





        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Quick Action Toolbar Starts-->
           
            <!-- Quick Action Toolbar Ends-->
           
            <div class="row">

              <div class="card-body">
 
                <div class="template-demo">
               
                  <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb breadcrumb-custom">
                      <li class="breadcrumb-item"><a href="<?php echo e(url('grades')); ?>">المواد</a></li>
                      <li class="breadcrumb-item"><a href="<?php echo e(url('/grade/'.$gradeid.'/units')); ?>">الوحدات</a></li>
                      <li class="breadcrumb-item"><a href="<?php echo e(url('/grade/'.$gradeid.'/unit/'.$unitid.'/lessons')); ?>">الدروس</a></li>
                      <li class="breadcrumb-item"><a href="<?php echo e(url('/grade/'.$gradeid.'/unit/'.$unitid.'/lesson/'.$lessonid.'/lessonsections')); ?>">محتوى الدرس</a></li>
                      <li class="breadcrumb-item active" aria-current="page"><span>الشرح</span></li>
                   
                    </ol>
                  </nav>
                </div>
              </div>

                    




  <!---------------------------------------------Start main here ------------------------------------------------------------------>





    


              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">



   <!-------------------------------Start Content here ---------------------->

    <?php if($lecture->type != 1): ?>  
   <div class="iframecontainer"> 
  
   
<iframe id="theFrame" height='800' width= '100%' src='<?php echo e($lecture->content.'#toolbar=0'); ?>' frameborder='0' allowfullscreen></iframe>

   </div>

   <?php endif; ?>


   
   <?php if($lecture->type == 1): ?>  
   
   <h2> <?php echo e($lecture->content); ?></h2>

   <?php endif; ?>
 <!-------------------------------End Content here ---------------------->





                  </div>
                </div>





                
              </div>


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
document.getElementById("theFrame").contentWindow.onload = function() {
    this.document.getElementsByTagName("img")[0].style.width="100%";
};
</script>

  </body>


  


</html>



<?php /**PATH /home/u580293580/domains/mrkhairy.com/public_html/laravel/resources/views/student/lessonsectionlecture.blade.php ENDPATH**/ ?>