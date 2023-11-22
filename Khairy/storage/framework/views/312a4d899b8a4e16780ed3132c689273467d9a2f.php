<?php $__env->startSection('css'); ?>

<link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/libs/jstree/jstree.css')); ?>" />

<link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/libs/plyr/plyr.css')); ?>" />




<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


<div class="row">
    <!-- Video Player -->
    <div class="col-12 mb-4">
      <div class="card">
        <h5 class="card-header"><?php echo e($lecture->lessonsection->name); ?></h5>
        <div class="card-body">

            <?php if($lecture->type == 3): ?>
            <video class="w-100" poster="<?php echo e($lecture->lessonsection->lesson->image ? $lecture->lessonsection->lesson->image : asset('admin/assets/img/pages/app-academy-tutor-1.png')); ?>" id="plyr-video-player" >
            <source src="https://drive.google.com/uc?export=preview&id=<?php echo e($lecture->type == 3 ? $lecture->video_google_id : ''); ?>" type="video/mp4"  data-plyr-config='{"quality": ["low", "medium", "high"]}' />
          </video>

          <?php elseif($lecture->type == 2): ?>
          <embed src="<?php echo e($lecture->content); ?>" type="application/pdf" width="100%"
            height="600px" />

            <?php elseif($lecture->type == 1): ?>

            <img src="<?php echo e($lecutre->content); ?>" alt="image" style=" max-width: 100%;
            height: auto;">

            <?php endif; ?>
        </div>
      </div>
    </div>
</div>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>


<script src="<?php echo e(asset('admin/assets/vendor/libs/jstree/jstree.js')); ?>"></script>

<script src="<?php echo e(asset('admin/assets/js/extended-ui-treeview.js')); ?>"></script>

<script src="<?php echo e(asset('admin/assets/vendor/libs/plyr/plyr.js')); ?>"></script>

<script src="<?php echo e(asset('admin/assets/js/extended-ui-media-player.js')); ?>"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize Plyr without quality options in the constructor
        const player = new Plyr('#plyr-video-player');

        // Add event listener for quality change
        player.on('qualitychange', event => {
            console.log('Quality changed to', event.detail.quality);
        });
    });
</script>

</body>
</html>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('student.layouts.exam-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Web-Development\Khairy\Khairy\resources\views/student/new/lecture.blade.php ENDPATH**/ ?>