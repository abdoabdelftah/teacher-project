
<?php $__env->startSection('content'); ?>

                    <?php if(Session::has('message')): ?>
                    <h3 style="text-align:right;direction:rtl;" class="form-text text-success"> <?php echo e(Session::get('message')); ?> </h3>
                    <?php endif; ?>

                    <form method="POST" class="pt-3" action="<?php echo e(route('update.student')); ?>">
                      <?php echo csrf_field(); ?>
                      <input type="hidden" name="id" class="form-control" value="<?php echo e($data->id); ?>" aria-label="Username">
                    <div class="form-group">
                      <label>الاسم</label>
                      <input type="text" name="name" class="form-control" value="<?php echo e($data->name); ?>" aria-label="Username">
                    </div>

                    <div class="form-group">
                      <label>رقم التيفون</label>
                      <input type="text" name="phone_number" class="form-control" value="<?php echo e($data->phone_number); ?>" aria-label="Username">
                    </div>

                    <div class="form-group">
                      <label>كلمة المرور</label>
                      <input type="text" name="password" class="form-control"  aria-label="Username">
                    </div>

                    <div class="form-group">
                      <label>اخر تاريخ لتسجيل الدخول(غيرها لتاريخ اليوم فى حالة عدم قدرة الطالب على التسجيل)</label>
                      <input type="date" style="text-align:right; dir:rtl" name="last_login_date" class="form-control" value="<?php echo e($data->last_login_date); ?>" aria-label="Username">
                    </div>

                   <!-- <div class="form-group">
                      <label>تاريخ انتهاء الاشتراك</label>
                      <input style="text-align:right; dir:rtl" type="date" name="subscription_end_date" class="form-control" value="" aria-label="Username">
                    </div> -->

                    <div class="form-group">
                      <label for="exampleFormControlSelect2">السنة الدراسية</label>



                      <?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="form-check">
                        <label class="form-check-label">
                        <input type="checkbox" name = "grade_id[]" class="form-check-input" value = "<?php echo e($grade->id); ?>" <?php $__currentLoopData = $data->grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gradec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($gradec->id == $grade->id): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e($grade->name); ?></label>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                    </div>

                    <div class="mt-3">
                      <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" class="btn btn-primary">
                       حفظ
                    </button>

                    </div>


                  </form>

                  </div>
                </div>
              </div>
            </div>








                  </div>
                </div>
              </div>


          <!-- content-wrapper ends -->
       <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Web-Development\Khairy\Khairy\resources\views/admin/editstudent.blade.php ENDPATH**/ ?>