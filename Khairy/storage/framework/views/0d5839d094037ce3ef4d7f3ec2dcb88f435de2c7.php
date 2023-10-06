<?php $__env->startSection('content'); ?>


<div class="card-body">
 
  <div class="template-demo">
 
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb breadcrumb-custom">
<li class="breadcrumb-item"><a href="<?php echo e(url('admin/units/'.$grade->id)); ?>"><?php echo e($grade->name); ?></a></li>
<li class="breadcrumb-item"><a href="<?php echo e(url('admin/lessons/'.$unit->id )); ?>"><?php echo e($unit->name); ?></a></li>
<li class="breadcrumb-item"><a href="<?php echo e(url('admin/lessonsections/'.$lesson->id )); ?>"><?php echo e($lesson->name); ?></a></li>

<li class="breadcrumb-item active" aria-current="page"><span>تعديل <?php echo e($data->name); ?></span></li>


</ol>
</nav>
</div>
</div>

                  
                    <?php if(Session::has('message')): ?>
                    <h3 style="text-align:right;direction:rtl;" class="form-text text-success"> <?php echo e(Session::get('message')); ?> </h3>
                    <?php endif; ?>

                    <form method="POST" class="pt-3" enctype="multipart/form-data" action="<?php echo e(route('update.lecture')); ?>">
                      <?php echo csrf_field(); ?>
                      <input type="hidden" name="id" class="form-control" value="<?php echo e($data->id); ?>" aria-label="Username">
                    <div class="form-group">
                      <label>الاسم</label>
                      <input type="text" name="name" class="form-control" value="<?php echo e($data->name); ?>" aria-label="Username">
                    </div>


                    <div class="form-group">
                      <label for="exampleFormControlSelect2">النوع</label>
                      <select name = "type" class="form-control" id="exampleFormControlSelect2">
                        <option value = "1" <?php if(! empty($data->type)): ?> <?php if($data->type == 1): ?> selected <?php endif; ?> <?php endif; ?>>نص</option>
                        <option value = "2" <?php if(! empty($data->type)): ?> <?php if($data->type == 2): ?> selected <?php endif; ?> <?php endif; ?>>ملف</option>
                        <option value = "3" <?php if(! empty($data->type)): ?> <?php if($data->type == 3): ?> selected <?php endif; ?> <?php endif; ?>>صورة</option>
                       
                      </select>
                    </div>
                   

                 
                    <?php if($data->type == 1): ?>

                      <div class="form-group">
                        <label>المحتوى</label>
                        <br>
                          <textarea  name="content" rows="10" cols="120"><?php echo e($data->content); ?></textarea>
                      </div>
                
                    <?php endif; ?> 
                    

                      
                    <?php if($data->type != 'Null'): ?>
                     <?php if($data->type == 3): ?>

                     <div class="form-group">
                      <label>ارفع الصورة</label>
                      <a href="<?php echo e($data->content); ?>">اضغط هنا لرؤية المحتوى</a>
                     <br>
                      <input type="file" name="content">
                    </div>
              
                  <?php endif; ?> 
                  <?php endif; ?>

                  <?php if($data->type != 'Null'): ?>
                  <?php if($data->type == 2): ?>

                  <div class="form-group">
                   <label>ارفع ملف</label>
                   <a href="<?php echo e($data->content); ?>">اضغط هنا لرؤية المحتوى</a>
                  <br>
                   <input type="file" name="content">
                 </div>
           
               <?php endif; ?> 
               <?php endif; ?>



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
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u580293580/domains/eazythink.com/public_html/laravel/resources/views/admin/editlecture.blade.php ENDPATH**/ ?>