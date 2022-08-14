<?php $__env->startSection('content'); ?>
               
            
              
<div class="card-body">
 
  <div class="template-demo">
 
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb breadcrumb-custom">
        <li class="breadcrumb-item"><a href="<?php echo e(url('admin/units/'.$grade->id )); ?>"><?php echo e($grade->name); ?></a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(url('admin/lessons/'.$unit->id )); ?>"><?php echo e($unit->name); ?></a></li>
        <li class="breadcrumb-item active" aria-current="page"><span><?php echo e($lesson->name); ?></span></li>
     
      </ol>
    </nav>
  </div>
</div>


<?php $urlid = request()->route('id'); ?>

<a href="<?php echo e(url('admin/addlessonsection/'.$urlid)); ?>" class="btn btn-success">اضافة فقرة</a>


              <br>
              <br>
                <div class="row">
                  <div class="col-12">
                    <div class="table-responsive">
                      <table id="order-listing" class="table">
                        <thead>
                          <tr>
                            <th>الترتيب</th>
                            <th>الاسم</th>
                            <th>النوع</th>
                            <th>الحالة</th>
                         
                            
                            <th>تعديل</th>
                            <th>المحتوى</th>

                          </tr>
                        </thead>
                        <tbody>
                          <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    

                          <tr>
                            <td><?php echo e($dat->priority); ?></td>
                            <td><?php echo e($dat->name); ?></td>
                            <td> <?php if($dat->section_type == 5): ?>
                            شرح
                            <?php endif; ?>

                            <?php if($dat->section_type == 1): ?>
                            واجب
                            <?php endif; ?>

                            <?php if($dat->section_type == 2): ?>
                             امتحان الاختيار من متعدد
                            <?php endif; ?>

                            <?php if($dat->section_type == 6): ?>
                            امتحان الاجابة المقالية
                           <?php endif; ?>
                          </td>
         
                          <td><?php if($dat->hide == 0): ?> ظاهر <?php else: ?> مخفى <?php endif; ?></td>
                            <td>
                              <a href="<?php echo e(url('admin/lessonsections/edit/'.$dat -> id)); ?>" class="btn btn-outline-primary">  تعديل الفقرة</a>
                            </td>

                            <td>

                              <?php if($dat->section_type == 5): ?>
                              <a href="<?php echo e(url('admin/lectureedit/'.$dat -> id)); ?>" class="btn btn-outline-primary">تعديل الشرح</a>
                                <?php endif; ?>

                              <?php if($dat->section_type == 1): ?>
                              <a href="<?php echo e(url('admin/lessonhomeworks/'.$dat -> id)); ?>" class="btn btn-outline-primary">اسألة الواجب</a>
                               <?php endif; ?>

                              <?php if($dat->section_type == 2): ?>
                              <a href="<?php echo e(url('admin/lessonexams/'.$dat -> id)); ?>" class="btn btn-outline-primary">اسألة الامتحان</a>
                               <?php endif; ?>


                               <?php if($dat->section_type == 6): ?>
                               <a href="<?php echo e(url('admin/lessontextexams/'.$dat -> id)); ?>" class="btn btn-outline-primary">اسألة الامتحان</a>
                                <?php endif; ?>
                            </td>

                            <td> <?php if($dat->section_type != 5): ?>
                              <a href="<?php echo e(url('admin/student/lessonsection/answered/'.$dat -> id)); ?>" class="btn btn-outline-primary">من قام بالاجابة؟</a>
                              <?php endif; ?> </td>

                              
                            <td> <?php if($dat->section_type != 5): ?>
                              <a href="<?php echo e(url('admin/student/lessonsection/notanswered/'.$dat -> id)); ?>" class="btn btn-outline-primary">من لم يقم بالاجابة؟</a>
                              <?php endif; ?> </td>

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

<?php $__env->stopSection(); ?>
            

                  
            
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u580293580/domains/mrkhairy.com/public_html/laravel/resources/views/admin/lessonsections.blade.php ENDPATH**/ ?>