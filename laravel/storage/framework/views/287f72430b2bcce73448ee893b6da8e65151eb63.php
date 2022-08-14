<!DOCTYPE html>
<html dir="rtl" lang="ar">
  
<!-- Mirrored from www.bootstrapdash.com/demo/stellar-admin/jquery/template/demo_1/pages/samples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Jan 2021 01:26:29 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/simple-line-icons/css/simple-line-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/css/vendor.bundle.base.css')); ?>">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/demo_1/style.css')); ?>">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?php echo e(asset('assets/images/favicon.png')); ?>" />
  </head>
  <body>

    <?php if(Auth::id()): ?>
    <script>window.location = "/admin/students";</script>
<?php endif; ?>

    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="<?php echo e(asset('assets/images/logo.svg')); ?>">
                </div>
                
                <h6 style="text-align:right;direction:rtl;" class="font-weight-hard">قم بتسجل الدخول</h6>
                <?php $__errorArgs = ['errors'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <small style="text-align:right;direction:rtl;" class="form-text text-danger"><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                 <form method="POST" class="pt-3" action="<?php echo e(route('save.admin.login')); ?>">
                  <?php echo csrf_field(); ?>
                  <div class="form-group">
                    <input type="text" name="phone_number" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="رقم التليفون">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="كلمة المرور">
                  </div>
                  <div class="mt-3">
                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" class="btn btn-primary">
                      سجل الدخول
                  </button>
                   
                  </div>
                 
                
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?php echo e(asset('assets/vendors/js/vendor.bundle.base.js')); ?>"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?php echo e(asset('assets/js/off-canvas.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/hoverable-collapse.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/misc.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/settings.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/todolist.js')); ?>"></script>
    <!-- endinject -->
  </body>

<!-- Mirrored from www.bootstrapdash.com/demo/stellar-admin/jquery/template/demo_1/pages/samples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Jan 2021 01:26:29 GMT -->
</html><?php /**PATH /home/u580293580/domains/eazythink.com/public_html/laravel/resources/views/admin/login.blade.php ENDPATH**/ ?>