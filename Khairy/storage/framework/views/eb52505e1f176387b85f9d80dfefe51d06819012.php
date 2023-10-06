<?php $__env->startSection('css'); ?>

<link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/libs/flatpickr/flatpickr.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/libs/select2/select2.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>



      <div class="row">
            <!-- Form Separator -->
            <div class="col-xxl">
              <div class="card mb-4">
                <h4 class="card-header">تعديل طالب</h4>
                <hr class="my-4 mx-n4" />

                <form method="POST" class="card-body" action="<?php echo e(route('update.student')); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" class="form-control" value="<?php echo e($data->id); ?>" aria-label="Username">

                  <h6>المعلومات الاساسية</h6>
                  <div class="row mb-3">
                    <label class="col-sm-3 col-form-label" for="multicol-username">الاسم</label>
                    <div class="col-sm-9">
                         <input type="text" id="multicol-username"  name="name" class="form-control" value="<?php echo e($data->name); ?>">

                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-sm-3 col-form-label" for="multicol-full-name">رقم الهاتف</label>
                    <div class="col-sm-9">
                        <input type="text" name="phone_number" class="form-control" value="<?php echo e($data->phone_number); ?>" aria-label="Username">
                    </div>
                  </div>

                  <div class="row form-password-toggle">
                    <label class="col-sm-3 col-form-label" for="multicol-password">كلمة المرور</label>
                    <div class="col-sm-9">
                      <div class="input-group input-group-merge">
                        <input type="password" name="password" id="multicol-password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="multicol-password2" />
                        <span class="input-group-text cursor-pointer" id="multicol-password2"><i class="mdi mdi-eye-off-outline"></i></span>
                      </div>
                    </div>
                  </div>
                  <hr class="my-4 mx-n4" />
                  <h6>للتحكم بالمحتوى المعروض للطالب</h6>

                  <div class="row mb-3">
                    <label class="col-sm-3 col-form-label" for="multicol-birthdate">ـاريخ انتهاء الاشتراك</label>
                    <div class="col-sm-9">
                      <input type="text" id="multicol-birthdate" class="form-control dob-picker" name="subscription_end_date" value="<?php echo e($data->subscription_end_date); ?>" placeholder="YYYY-MM-DD" />
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-sm-3 col-form-label" for="multicol-birthdate">اخر تاريخ لتسجيل الدخول(غيرها لتاريخ اليوم فى حالة عدم قدرة الطالب على التسجيل)</label>
                    <div class="col-sm-9">
                      <input type="text" id="multicol-birthdate" class="form-control dob-picker" name="last_login_date" value="<?php echo e($data->last_login_date); ?>" placeholder="YYYY-MM-DD" />
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-sm-3 col-form-label" for="multicol-birthdate">الكورسات الخاصة بالطالب</label>
                    <div class="col-sm-9">
                        <?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-check">
                          <label class="form-check-label">
                          <input type="checkbox" name = "grade_id[]" class="form-check-input" value = "<?php echo e($grade->id); ?>" <?php $__currentLoopData = $data->grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gradec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($gradec->id == $grade->id): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e($grade->name); ?></label>
                          </div>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>



                  <div class="pt-4">
                    <div class="row justify-content-end">
                      <div class="col-sm-7">

                        <button type="reset" onclick="redirectToStudent()" class="btn btn-outline-secondary">الغاء</button>

                        <button type="submit" class="btn btn-primary me-sm-2 me-1">حفظ</button>
                    </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>

          </div>

       <?php $__env->stopSection(); ?>

       <?php $__env->startSection("js"); ?>

       <script src="<?php echo e(asset('admin/assets/vendor/libs/cleavejs/cleave.js')); ?>"></script>
       <script src="<?php echo e(asset('admin/assets/vendor/libs/cleavejs/cleave-phone.js')); ?>"></script>
       <script src="<?php echo e(asset('admin/assets/vendor/libs/moment/moment.js')); ?>"></script>
       <script src="<?php echo e(asset('admin/assets/vendor/libs/flatpickr/flatpickr.js')); ?>"></script>
       <script src="<?php echo e(asset('admin/assets/vendor/libs/select2/select2.js')); ?>"></script>

       <script src="<?php echo e(asset('admin/assets/js/form-layouts.js')); ?>"></script>

       <script>
        function redirectToStudent() {
            window.location.href = "<?php echo e(route('allStudents')); ?>";
        }
    </script>

       <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.new-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Web-Development\Khairy\Khairy\resources\views/admin/new/editstudent.blade.php ENDPATH**/ ?>