<?php $__env->startSection('content'); ?>


<div class="card-body">
 
  <div class="template-demo">
 
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb breadcrumb-custom">
        <li class="breadcrumb-item"><a href="<?php echo e(url('admin/units/'.$grade->id)); ?>"><?php echo e($grade->name); ?></a></li>
        
        <li class="breadcrumb-item"><a href="<?php echo e(url('admin/lessons/'.$unit->id)); ?>"><?php echo e($unit->name); ?></a></li>

        <li class="breadcrumb-item"><a href="<?php echo e(url('admin/unitchooseexams/'.$unitexamsection->id)); ?>"><?php echo e($unitexamsection->name); ?></a></li>



        <li class="breadcrumb-item active" aria-current="page"><span>تعديل سؤال</span></li>
     
      </ol>
    </nav>
  </div>
</div>
                  
                    <?php if(Session::has('message')): ?>
                    <h3 style="text-align:right;direction:rtl;" class="form-text text-success"> <?php echo e(Session::get('message')); ?> </h3>
                    <?php endif; ?>

                    <form method="POST" class="pt-3" enctype="multipart/form-data" action="<?php echo e(route('update.unitchooseexam')); ?>">
                      <?php echo csrf_field(); ?>
                      <input type="hidden" name="id" class="form-control" value="<?php echo e($data->id); ?>" aria-label="Username">
                    <div class="form-group">
                      <label>الاسم</label>
                      <input type="text" name="name" class="form-control" value="<?php echo e($data->name); ?>" aria-label="Username">
                    </div>

                    <!------------------------Start question-------------- -->
                    <?php if($data->question_type == 1): ?>

                    <div class="form-group">
                      <label>السؤال</label>
                      <br>
                        <textarea  name="question" rows="10" cols="120"><?php echo e($data->question); ?></textarea>
                    </div>
              
                  <?php endif; ?> 
                  

                  
                   <?php if($data->question_type == 2): ?>

                   <div class="form-group">
                    <label> ارفع صورة السؤال</label>
                    <a href="<?php echo e($data->question); ?>">اضغط هنا لرؤية المحتوى</a>
                   <br>
                    <input type="file" name="question">
                  </div>
            
                  <hr color = "black">
                  <hr>
                <?php endif; ?> 


                                    <!------------------------end question-------------- -->
                                    


                                   <!------------------------Start choose text-------------- -->
                                   <?php if($data->choose_type == 1): ?>


                                   <div class="form-group">
                                    <label>الاختيار الاول</label>
                                    <br>
                                      <textarea  name="choose1" rows="5" cols="120"><?php echo e($data->choose1); ?></textarea>
                                  </div>
                            
                                  <div class="form-group">
                                    <label>الاختيار الثانى</label>
                                    <br>
                                      <textarea  name="choose2" rows="5" cols="120"><?php echo e($data->choose2); ?></textarea>
                                  </div>


                                  <div class="form-group">
                                    <label>الاختيار الثالث</label>
                                    <br>
                                      <textarea  name="choose3" rows="5" cols="120"><?php echo e($data->choose3); ?></textarea>
                                  </div>


                                  <div class="form-group">
                                    <label>الاختيار الرابع</label>
                                    <br>
                                      <textarea  name="choose4" rows="5" cols="120"><?php echo e($data->choose4); ?></textarea>
                                  </div>



                                  <?php endif; ?>
                                   <!------------------------end choose text-------------- -->


                                    <!------------------------Start choose picture-------------- -->


                                    <?php if($data->choose_type == 2): ?>

                                    <div class="form-group">
                                      <label> ارفع صورة الاختيار الاول</label>
                                      <a href="<?php echo e($data->choose1); ?>">اضغط هنا لرؤية المحتوى</a>
                                     <br>
                                      <input type="file" name="choose1">
                                    </div>

                                    <hr color = "orange">
                                    <hr>
                                    <div class="form-group">
                                      <label> ارفع صورة الاختيار الثانى</label>
                                      <a href="<?php echo e($data->choose2); ?>">اضغط هنا لرؤية المحتوى</a>
                                     <br>
                                      <input type="file" name="choose2">
                                    </div>

                                    <hr color = "orange">
                                    <hr>

                                    <div class="form-group">
                                      <label> ارفع صورة الاختيار الثالث</label>
                                      <a href="<?php echo e($data->choose3); ?>">اضغط هنا لرؤية المحتوى</a>
                                     <br>
                                      <input type="file" name="choose3">
                                    </div>


                                    <hr color = "orange">
                                    <hr>
                                    <div class="form-group">
                                      <label> ارفع صورة الاختيار الرابع</label>
                                      <a href="<?php echo e($data->choose4); ?>">اضغط هنا لرؤية المحتوى</a>
                                     <br>
                                      <input type="file" name="choose4">
                                    </div>


                                    <hr color = "orange">
                                    <hr>
                                    <?php endif; ?>


                                   <!------------------------end choose picture-------------- -->


                                   <div class="form-group">
                                    <label for="exampleFormControlSelect2">الاجابة الصحيحة</label>
                                    <select name = "right_answer" class="form-control" id="exampleFormControlSelect2">
                                      <option value = "choose1" <?php if($data->right_answer == "choose1"): ?> selected <?php endif; ?>>الاختيار الاول</option>
                                      <option value = "choose2" <?php if($data->right_answer == "choose2"): ?> selected <?php endif; ?>>الاختيار الثانى</option>
                                      <option value = "choose3" <?php if($data->right_answer == "choose3"): ?> selected <?php endif; ?>>الاختيار الثالث</option>
                                      <option value = "choose4" <?php if($data->right_answer == "choose4"): ?> selected <?php endif; ?>>الاختيار الرابع</option>
                                    </select>
                                  </div>


                    <div class="form-group">
                      <label>درجات السؤال</label>
                      <input type="number" name="points" value="<?php echo e($data->points); ?>" class="form-control"  aria-label="Username">
                    </div>

                    <div class="form-group">
                      <label for="exampleFormControlSelect2">الحالة</label>
                      <select name = "hide" class="form-control" id="exampleFormControlSelect2">
                        <option value = "0" <?php if($data->hide == 0): ?> selected <?php endif; ?>>فعال</option>
                        <option value = "1" <?php if($data->hide == 1): ?> selected <?php endif; ?>>مخفى</option>
                    
                       
                      </select>
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
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u580293580/domains/mrkhairy.com/public_html/laravel/resources/views/admin/editunitchooseexam.blade.php ENDPATH**/ ?>