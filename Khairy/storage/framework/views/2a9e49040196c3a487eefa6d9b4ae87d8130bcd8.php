<?php $__env->startSection('content'); ?>
                  

<div class="card-body">
 
  <div class="template-demo">
 
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb breadcrumb-custom">
        <li class="breadcrumb-item"><a href="<?php echo e(url('admin/units/'.$grade->id)); ?>"><?php echo e($grade->name); ?></a></li>
        
        <li class="breadcrumb-item"><a href="<?php echo e(url('admin/lessons/'.$unit->id)); ?>"><?php echo e($unit->name); ?></a></li>

        
        <li class="breadcrumb-item"><a href="<?php echo e(url('admin/lessonsections/'.$lesson->id)); ?>"><?php echo e($lesson->name); ?></a></li>

        
        <li class="breadcrumb-item"><a href="<?php echo e(url('admin/lessontextexams/'.$lessonsection->id)); ?>"><?php echo e($lessonsection->name); ?></a></li>


        <li class="breadcrumb-item active" aria-current="page"><span>اضافة سؤال</span></li>
     
      </ol>
    </nav>
  </div>
</div>

                    <?php if(Session::has('message')): ?>
                    <h3 style="text-align:right;direction:rtl;" class="form-text text-success"> <?php echo e(Session::get('message')); ?> </h3>
                    <?php endif; ?>

                    <form method="POST" class="pt-3" action="<?php echo e(route('store.lessontextexam')); ?>">
                      <?php echo csrf_field(); ?>
                      
                    <div class="form-group">
                      <label> (سيظهر الاسم لك فقط)الاسم</label>
                      <input type="text" name="name" class="form-control"  aria-label="Username">
                    </div>

                    <div class="form-group">
                      <label>درجات السؤال</label>
                      <input type="number" name="points" class="form-control"  aria-label="Username">
                    </div>

                    <div class="form-group">
                      <label>شكل السؤال</label>
                    <select name="question_type" class="form-control" id="exampleFormControlSelect2">
                      <option value="1">نص</option>
                      <option value="2">صورة</option>
                      
                    
                    </select>
                  </div>



               




                    <input type="hidden" name="lesson_section_id" value ="<?php echo request()->route('id'); ?>" class="form-control"  aria-label="Username">
                    <input type="hidden" name="type" value ="6" class="form-control"  aria-label="Username">

                    <div class="mt-3">
                      <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" class="btn btn-primary">
                       اضافة السؤال
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
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u580293580/domains/mrkhairy.com/public_html/laravel/resources/views/admin/addlessontextexam.blade.php ENDPATH**/ ?>