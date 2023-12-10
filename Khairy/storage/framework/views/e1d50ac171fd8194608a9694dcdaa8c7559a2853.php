<?php $__env->startSection('css'); ?>

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/libs/jstree/jstree.css')); ?>" />

<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>


<div class="col-12">
    <div class="card">
      <div class="card-body">


        <div class="card-datatable table-responsive">
            <table class="datatables-users table">
              <thead class="table-light">
                <tr>

                    <th>اسم الامتحان</th>
                    <th>درجة الامتحان</th>
                    <th>المزيد</th>

                </tr>
              </thead>

                      <tbody>
                          <?php $__currentLoopData = $follow_up; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($data->lessonsection->section_type == 1 || $data->lessonsection->section_type == 2 || $data->lessonsection->section_type == 3 || $data->lessonsection->section_type == 4): ?>

                          <tr>

                            <td><a href=""> <?php echo e($data->lessonsection->name); ?> </a></td>

                            <?php if($data->lessonsection->section_type == 1): ?>
                            <td><a href="" > <?php echo e($data->studentanswer->where('student_id', $data->student->id)->sum('points')); ?> / <?php echo e($data->exam->sum('points')); ?> </a></td>
                            <?php elseif($data->lessonsection->section_type == 3): ?>
                           <td><a href="" > <?php echo e($data->done == 0 ? 'لم يتم تصحيح الامتحان' : $data->studentanswer->where('student_id', $data->student->id)->sum('points')); ?> / <?php echo e($data->exam->sum('points')); ?> </a></td>
                            <?php elseif($data->lessonsection->section_type == 4): ?>
                            <td><a href="" > <?php echo e($data->done == 0 ? 'لم يتم تصحيح الامتحان' : $data->studentanswer->where('student_id', $data->student->id)->sum('points')); ?> / <?php echo e($data->exam->sum('points')); ?> </a></td>
                            <?php endif; ?>

                            <td>
                                 <a href="#" class="btn rounded-pill btn-label-info waves-effect">ورقة الامتحان</a>
                            </td>
                          </tr>
                          <?php endif; ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                       </tbody>
            </table>


          </div>


  </div>
</div>
</div>



<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>


    <script src="<?php echo e(asset('admin/assets/vendor/libs/jstree/jstree.js')); ?>"></script>

    <script src="<?php echo e(asset('admin/assets/js/extended-ui-treeview.js')); ?>"></script>





<?php $__env->stopSection(); ?>

<?php echo $__env->make('student.layouts.new-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Web-Development\Khairy\Khairy\resources\views/student/new/allExams.blade.php ENDPATH**/ ?>