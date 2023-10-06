<?php $__env->startSection('content'); ?>
               
<div class="card-body">
 
  <div class="template-demo">
 
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb breadcrumb-custom">
        <li class="breadcrumb-item"><a href="<?php echo e(url('admin/units/'.$grade->id )); ?>"><?php echo e($grade->name); ?></a></li>
        <li class="breadcrumb-item active" aria-current="page"><span><?php echo e($unit->name); ?></span></li>
     
      </ol>
    </nav>
  </div>
</div>

               
<?php $urlid = request()->route('id'); ?>

<a href="<?php echo e(url('admin/addlesson/'.$urlid)); ?>" class="btn btn-success">اضافة درس</a>


              <br>
              <br>
                <div class="row">
                  <div class="col-12">
                    <div class="table-responsive">
                      <table id="order-listing" class="table">
                        <thead>
                          <tr>
                            <th>الرقم</th>
                            <th>الاسم</th>
                          
                            <th>الحالة</th>
                         
                            
                            <th>تعديل</th>
                            <th>المحتوى</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    

                          <tr>
                            <td><?php echo e($dat->id); ?></td>
                            <td><?php echo e($dat->name); ?></td>
                         
                            <td><?php if($dat->hide == 1): ?> مخفى <?php else: ?> ظاهر <?php endif; ?></td>
         
                            
                            <td>
                              <a href="<?php echo e(url('admin/lessons/edit/'.$dat -> id)); ?>" class="btn btn-outline-primary">تعديل</a>
                            </td>

                            <td>
                              <a href="<?php echo e(url('admin/lessonsections/'.$dat -> id)); ?>" class="btn btn-outline-primary">الفقرات</a>
                            </td>
                          </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>

                        <div class="d-flex justify-content-center">
                        <?php //echo $data->render(); ?>
                     
                      </div>
                      </table>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>



        <br>
        <hr color="black">
        <br>

        <div class="row">
          <div class="col-md-12 grid-margin">
            <div class="card">
              <div class="card-body">

        <a href="<?php echo e(url('admin/addunitexamsection/'.$urlid)); ?>" class="btn btn-success">اضافة امتحان وحدة</a>


              <br>
              <br>
                <div class="row">
                  <div class="col-12">
                    <div class="table-responsive">
                      <table id="order-listing" class="table">
                        <thead>
                          <tr>
                            <th>الرقم</th>
                            <th>الاسم</th>
                          
                          
                            <th>النوع</th>
                            
                            <th>تعديل</th>
                            <th>اسألة الامتحان</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $__currentLoopData = $examsection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    

                          <tr>
                            <td><?php echo e($dat->id); ?></td>
                            <td><?php echo e($dat->name); ?></td>
                            <td><?php if($dat->type == 3): ?> امتحان اسألة اختيارى <?php endif; ?> <?php if($dat->type == 4): ?> امتحان اسألة مقالية <?php endif; ?> </td>
         
                            
                            <td>
                              <a href="<?php echo e(url('admin/unitexamsections/edit/'.$dat -> id)); ?>" class="btn btn-outline-primary">تعديل</a>
                            </td>

                            <td>
                              <a <?php if($dat->type == 3): ?> href="<?php echo e(url('admin/unitchooseexams/'.$dat -> id)); ?>" <?php endif; ?> <?php if($dat->type == 4): ?> href="<?php echo e(url('admin/unittextexams/'.$dat -> id)); ?>" <?php endif; ?> class="btn btn-outline-primary">اسألة الامتحان</a>
                            </td>

                            <td> <a href="<?php echo e(url('admin/student/unitexamsection/answered/'.$dat -> id)); ?>" class="btn btn-outline-primary">من قام بالاجابة؟</a>
                            </td>

                            <td> <a href="<?php echo e(url('admin/student/unitexamsection/notanswered/'.$dat -> id)); ?>" class="btn btn-outline-primary">من لم يقم بالاجابة؟</a>
                            </td>

                          </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>

                        <div class="d-flex justify-content-center">
                        <?php //echo $data->render(); ?>
                     
                      </div>
                      </table>
                      <br>
                    </div>
                  </div>
                </div>

                
              </div>
            </div>
          </div>
        </div>
                
              </div>
            </div>
          </div>
        </div>
<?php $__env->stopSection(); ?>
            

                  
            
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u580293580/domains/mrkhairy.com/public_html/laravel/resources/views/admin/lessons.blade.php ENDPATH**/ ?>