<?php $__env->startSection('content'); ?>
               
               
   
<div class="card-body">
 
  <div class="template-demo">
 
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb breadcrumb-custom">
        <li class="breadcrumb-item"><a href="<?php echo e(url('admin/units/'.$grade->id )); ?>"><?php echo e($grade->name); ?></a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(url('admin/lessons/'.$unit->id )); ?>"><?php echo e($unit->name); ?></a></li>
        
        <li class="breadcrumb-item"><a href="<?php echo e(url('admin/lessonsections/'.$lesson->id )); ?>"><?php echo e($lesson->name); ?></a></li>

        <li class="breadcrumb-item active" aria-current="page"><span><?php echo e($lessonsection->name); ?></span></li>
     
      </ol>
    </nav>
  </div>
</div>
              
              <br>
              <br>
                <div class="row">
                  <div class="col-12">
                    <div class="table-responsive">
                      <table id="order-listing" class="table">

                        <h2>الطلاب الذين قاموا بالاجابة عن الامتحان </h2>
                        <br>
                        <a href="<?php echo e(url('admin/lresultsdownload/'. $lessonsection->id)); ?>" class="btn btn-primary"> اضغط لتحميل ملف Excel بدرجات الطلاب</a>
                        <br>
                        <br>
                        <thead>
                          <tr>
                           
                            <th>اسم الطالب</th>
                            <th>درجة الطالب</th>
                            <th>الدرجة النهائية للامتحان</th>
                            <th>جميع درجات الطالب</th>
                            <th>تعديل الطالب</th>
                          </tr>
                        </thead>
                        <tbody>
                       
                          <?php $__currentLoopData = $examname; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    

                          <tr>
                           
                            <td><?php echo e($dat->student->name); ?></td>
                            <td><?php echo e($dat->studentanswer->where('student_id', $dat->student->id)->sum('points')); ?></td>
                            <td><?php echo e($dat->exam->sum('points')); ?></td>

                            <td><a href="<?php echo e(url('admin/lcheckanswers/'.$dat->student->id.'/'. $lessonsection->id)); ?>" class="btn btn-outline-primary"> ورقة الاجابة</a></td>

                            <td><a href="<?php echo e(url('admin/studentresults/'.$dat->student->id)); ?>" class="btn btn-outline-primary"> جميع درجات الطالب</a></td>
                            <td><a href="<?php echo e(url('admin/students/edit/'.$dat->student->id)); ?>" class="btn btn-outline-primary">تعديل الطالب</a></td>
                          
                          
                          </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>

                        <div class="d-flex justify-content-center">
                          <?php echo e($examname->links()); ?>

                      </div>
                      </table>
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
            

                  
            
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u580293580/domains/mrkhairy.com/public_html/laravel/resources/views/admin/lessonsectionanswered.blade.php ENDPATH**/ ?>