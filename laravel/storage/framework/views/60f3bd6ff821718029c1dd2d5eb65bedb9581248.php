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

           
           

          </ul>
        </nav>





        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Quick Action Toolbar Starts-->
           
            <!-- Quick Action Toolbar Ends-->
           
            <div class="row">

             

              <?php $gradeid = request()->route('grade_id'); ?> 

              <?php $unitid = request()->route('unit_id'); ?> 

              <?php $lessonid = request()->route('lesson_id'); ?> 

              <div class="card-body">
 
                <div class="template-demo">
               
                  <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb breadcrumb-custom">
                      <li class="breadcrumb-item"><a href="<?php echo e(url('grades')); ?>">المواد</a></li>
                      <li class="breadcrumb-item"><a href="<?php echo e(url('/grade/'.$gradeid.'/units')); ?>">الوحدات</a></li>
                      <li class="breadcrumb-item"><a href="<?php echo e(url('/grade/'.$gradeid.'/unit/'.$unitid.'/lessons')); ?>">الدروس</a></li>
                      <li class="breadcrumb-item"><a href="<?php echo e(url('/grade/'.$gradeid.'/unit/'.$unitid.'/lesson/'.$lessonid.'/lessonsections')); ?>">محتوى الدرس</a></li>
      
                      <li class="breadcrumb-item active" aria-current="page"><span>محتوى السؤال والاجابة</span></li>
                   
                    </ol>
                  </nav>
                </div>
              </div>

                    
            </div>



 











   <!-------------------------------Start Content here ---------------------->
               
<br>

<div class="col-md-12 grid-margin">
  <div class="card">
    <div class="card-body">


<div class="tab-content tabcontent-border">
  <div class="tab-pane active" id="home" role="tabpanel">
      <div class="row" style="direction: rtl;text-align: right;margin-right: 40px; margin-top: 30px; margin-bottom: 10px;">
          <div class="col-lg-12">
              <h4><span style="font-weight: bold;">عنوان السؤال</span> : <?php echo e($data->head); ?> </h4>
              <hr>
              <h4><span style="font-weight: bold;">التفاصيل </span>: <?php echo e($data->question); ?></h4><hr>
           
  
             <?php if(!empty($data->picture)): ?>
         <h4><span style="font-weight: bold;">المرفقات : </span>   <img  src="<?php echo e($data->picture); ?>" width="800px" height="200px" style=" width: 100%; height: auto;"></h4><hr>
          <?php endif; ?>
             
                  
                   
              
                 
              </div>
          </div>
      </div>
  </div>
 




                
              </div>
            </div>
          </div>
        
          <hr style="background-color: black; height: 2px; border: 1;">
        <!-------------------------------start comments here ---------------------->


        <div class="col-md-12 grid-margin">
          <div class="card">
            <div class="card-body comments" id ="comments">

              <?php if(empty($data->forumcomments[0])): ?>
              
              <center><h3> لم يقم المدرس بالاجابة الى الان الرجاء القدوم فى وقت لاحق</h3></center>
              <?php endif; ?>

              <?php if(!empty($data->forumcomments[0])): ?>
              <center><h3> تعليقات المدرس او صاحب السؤال:</h3></center>

              <?php $__currentLoopData = $data->forumcomments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $com): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               

              <div class="tab-content tabcontent-border">
                <div class="tab-pane active" id="home" role="tabpanel">
                    <div class="row" style="direction: rtl;text-align: right;margin-right: 40px; margin-top: 30px; margin-bottom: 10px;">
                        <div class="col-lg-12">
                            <h4><span style="font-weight: bold;">تعليق</span> : <?php echo e($com->comment); ?> </h4>
                            <hr>
                            <?php if(!empty($com->picture)): ?> 
                       <h4><span style="font-weight: bold;">المرفقات :  <img  src="<?php echo e($com->picture); ?>" width="800px" height="200px" style=" width: 100%; height: auto;"></span> </h4><hr>
                        <?php endif; ?>
                           
                                
                                 
                            
                               
                            </div>
                        </div>
                    </div>
                </div>
 <hr style="background-color: orange; height: 2px; border: 1;">
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             <?php endif; ?>
      </div>
    </div>
  </div>



  <hr style="background-color: black; height: 2px; border: 1;">


<?php if($data->student_id == auth()->user()->id && $data->is_closed == 0): ?>
  <div class="col-md-12 grid-margin">
    <div class="card">
      <div class="card-body">

        <form method="POST" class="pt-3" enctype="multipart/form-data" action="<?php echo e(route('add.comment')); ?>">
          <?php echo csrf_field(); ?>
<input type="hidden" name="forum_id" value="<?php echo e($data->id); ?>">
        <div class="form-group">
          <label style="font-size: 25px; color:blue;">قم بكتابة تعليق او قم برفع صورة</label>
              <textarea class="form-control" rows="10" cols="150" style="border:2px solid blue" name="comment" id="answer">  </textarea>
          <br>
         

          <br>



            <!-- Upload image input-->
      <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm" style="border: 1px solid blue;">
        <input   name="picture" type="file" class="form-control border-0" accept="image/*;capture=camera" capture="camera"  >
        <label  for="upload" class="font-weight-light text-muted">اختر صورة</label>
        <div class="input-group-append" >
            <label  style="border: 1px solid blue;" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">اختر صورة</small></label>
        </div>
    </div>

    <!-- Uploaded image area-->
  
    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" id="mysubmit" type="submit" class="btn btn-primary">
      اضافة تعليق
     </button>

        </div>



</div>
</div>
</div>

<?php endif; ?>

</div>

        
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



</body>





</html>




            

                  
            <?php /**PATH /home/u580293580/domains/mrkhairy.com/public_html/laravel/resources/views/student/oneforum.blade.php ENDPATH**/ ?>