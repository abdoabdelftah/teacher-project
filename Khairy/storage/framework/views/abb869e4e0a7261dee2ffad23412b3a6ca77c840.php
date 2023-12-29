<?php $__env->startSection('css'); ?>

    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/libs/flatpickr/flatpickr.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/libs/select2/select2.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>



    <div class="row">


        <div class="card">

            <div class="card-header">

               <h3> الشكاوى والمقترحات</h3>
            </div>

            <div class="card-body">
                <?php $__currentLoopData = $complaints; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $complaint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="alert alert-primary alert-dismissible mb-0" role="alert">
                        <h4 class="alert-heading d-flex align-items-center"><i
                                class="mdi mdi-chat-alert-outline mdi-24px me-2"></i><?php echo e($complaint->name); ?> / <?php echo e($complaint->phone_number); ?></h4>
                        <p class="mb-0"><?php echo e($complaint->message); ?></p>

                        <a href="/admin/guest/complaint/see/<?php echo e($complaint->id); ?>" class="btn-close">
                        </a>

                    </div>
                    <br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

    <script src="<?php echo e(asset('admin/assets/vendor/libs/cleavejs/cleave.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/vendor/libs/cleavejs/cleave-phone.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/vendor/libs/moment/moment.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/vendor/libs/flatpickr/flatpickr.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/vendor/libs/select2/select2.js')); ?>"></script>

    <script src="<?php echo e(asset('admin/assets/js/form-layouts.js')); ?>"></script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.new-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Web-Development\Khairy\Khairy\resources\views/admin/new/complaints.blade.php ENDPATH**/ ?>