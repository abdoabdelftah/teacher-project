<?php $__env->startSection('content'); ?>
                  
                    <?php if(Session::has('message')): ?>
                    <h3 style="text-align:right;direction:rtl;" class="form-text text-success"> <?php echo e(Session::get('message')); ?> </h3>
                    <?php endif; ?>

                    <form method="POST" class="pt-3" action="<?php echo e(route('store.student')); ?>">
                      <?php echo csrf_field(); ?>
                      
                    <div class="form-group">
                      <label>الاسم</label>
                      <input type="text" name="name" class="form-control"  aria-label="Username">
                    </div>

                    <?php
                    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
     
     // generate a pin based on 2 * 7 digits + a random character
     $pin =  substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 4)
     .mt_rand(1000, 9999);
     // shuffle the result

     $string = str_shuffle($pin);
     
                         ?>


                    <div class="form-group">
                      <label>كود الطالب</label>
                      <input type="text" name="phone_number" class="form-control" value ="<?php echo e($string); ?>" aria-label="Username">
                    </div>

                    <div class="form-group">
                      <label>كلمة المرور</label>
                      <input type="text" name="password" class="form-control"  aria-label="Username">
                    </div>

                
                    <div class="form-group">
                      <label for="exampleFormControlSelect2">السنة الدراسية</label>
                      <?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="form-check">
                        <label style ="font-size:20px; bold">
                          &nbsp; &nbsp;  &nbsp;  &nbsp;<input type="checkbox"  style="outline: 2px solid rgba(14, 1, 1, 0.952);" name = "grade_id[]"  value = "<?php echo e($grade->id); ?>" >  &nbsp;  &nbsp;<?php echo e($grade->name); ?></label>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <div class="mt-3">
                      <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" class="btn btn-primary">
                       تسجيل طالب جديد
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
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u580293580/domains/mrkhairy.com/public_html/laravel/resources/views/admin/addstudent.blade.php ENDPATH**/ ?>