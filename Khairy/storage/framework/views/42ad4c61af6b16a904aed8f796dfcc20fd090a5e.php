<?php $__env->startSection('css'); ?>

<link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/libs/jstree/jstree.css')); ?>" />

<link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/css/pages/app-academy.css')); ?>" />


<style>
    .custom-btn {
    padding: 10px 20px;
    background-color: #666CFF;
    color: #fff;
    border: none;
    border-radius: 30px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.custom-btn:hover {
    background-color: #0056b3;
}


</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


<?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="card mb-4">
    <div class="card-header d-flex flex-wrap justify-content-between gap-3">
      <div class="card-title mb-0 me-1">
        <h5 class="mb-1"><?php echo e($grade->name); ?></h5>
      </div>

    </div>
    <div class="card-body">
      <div class="row gy-4 mb-4">


        <?php $__currentLoopData = $grade->units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($unit->hide != 1): ?>
        <div class="col-sm-6 col-lg-4">
          <div class="card p-2 h-100 shadow-none border">
            <div class="rounded-2 text-center mb-3">
              <a href="/grade/<?php echo e($grade->id); ?>/unit/<?php echo e($unit->id); ?>/lessons"><img class="img-fluid" src="<?php echo e($unit->image ? $unit->image : asset('admin/assets/img/pages/app-academy-tutor-1.png')); ?>" alt="tutor image 1" /></a>
            </div>
            <div class="card-body p-3 pt-2">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="badge rounded-pill bg-label-primary">عدد الدروس: <?php echo e($unit->lessons->count()); ?></span>

              </div>
              <a href="/grade/<?php echo e($grade->id); ?>/unit/<?php echo e($unit->id); ?>/lessons" class="h5"><?php echo e($unit->name); ?></a>
              <p class="mt-2"><?php echo e($unit->description); ?></p>

              <div class="progress rounded-pill mb-4" style="height: 8px">
                  <div class="progress-bar" role="progressbar" style="width: <?php echo e(isset($percentages[$unit->id]) ? $percentages[$unit->id] : 0); ?>%" aria-valuenow="<?php echo e(isset($percentages[$unit->id]) ? $percentages[$unit->id] : 0); ?>" aria-valuemin="0" aria-valuemax="100"></div>

            </div>
              <div class="d-flex flex-column flex-md-row gap-3 text-nowrap flex-wrap flex-md-nowrap  flex-lg-wrap flex-xxl-nowrap">

                <a class="w-100 btn btn-outline-primary d-flex align-items-center" href="/grade/<?php echo e($grade->id); ?>/unit/<?php echo e($unit->id); ?>/lessons">
                  <span class="me-1">الانتقال الى الدروس</span><i class="mdi mdi-arrow-right lh-1 scaleX-n1-rtl"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </div>


    </div>
  </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>


<script src="<?php echo e(asset('admin/assets/vendor/libs/jstree/jstree.js')); ?>"></script>

<script src="<?php echo e(asset('admin/assets/js/extended-ui-treeview.js')); ?>"></script>


<script>




    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('student.layouts.new-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Web-Development\Khairy\Khairy\resources\views/student/new/grades.blade.php ENDPATH**/ ?>