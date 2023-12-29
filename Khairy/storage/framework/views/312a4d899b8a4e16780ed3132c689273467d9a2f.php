<?php $__env->startSection('css'); ?>

<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/libs/jstree/jstree.css')); ?>" />

    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />




<?php $__env->stopSection(); ?>

<?php $__env->startSection('sideBar'); ?>

<?php $__currentLoopData = $lesson->userLessonsections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<li class="menu-item <?php echo e($lecture->lessonsection->id == $section->id ? 'active' : ''); ?>" >

<a class="menu-link" href="

<?php if($section->section_type == 1 || $section->section_type == 2): ?>
/grade/<?php echo e($section->lesson->unit->grade->id); ?>/unit/<?php echo e($section->lesson->unit->id); ?>/lesson/<?php echo e($section->lesson->id); ?>/lessonsectionexam/<?php echo e($section->id); ?>


<?php endif; ?>

<?php if($section->section_type == 3): ?>
/grade/<?php echo e($section->lesson->unit->grade->id); ?>/unit/<?php echo e($section->lesson->unit->id); ?>/lesson/<?php echo e($section->lesson->id); ?>/lessonsectiontextexam/<?php echo e($section->id); ?>

<?php endif; ?>

<?php if($section->section_type == 4): ?>
/grade/<?php echo e($section->lesson->unit->grade->id); ?>/unit/<?php echo e($section->lesson->unit->id); ?>/lesson/<?php echo e($section->lesson->id); ?>/pdfexam/<?php echo e($section->id); ?>


<?php endif; ?>

<?php if($section->section_type == 5): ?>

/grade/<?php echo e($section->lesson->unit->grade->id); ?>/unit/<?php echo e($section->lesson->unit->id); ?>/lesson/<?php echo e($section->lesson->id); ?>/lessonsectionlecture/<?php echo e($section->id); ?>


<?php endif; ?>


" >

    <?php if($section->sectionFollowup && count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 1): ?>
    <i class='menu-icon tf-icons mdi mdi-check-circle-outline mdi-24px'></i>
    <?php else: ?>
    <i class='menu-icon tf-icons mdi mdi-circle-outline mdi-24px'></i>
    <?php endif; ?>

<div data-i18n="<?php echo e($section->name); ?>"><?php echo e($section->name); ?></div>

</a>
</li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <div class="row">
        <!-- Video Player -->
        <div class="col-12 mb-4">
            <div class="card">
                <h5 class="card-header"><?php echo e($lecture->lessonsection->name); ?></h5>
                <div class="card-body">

                    <?php if($lecture->type == 3): ?>
                        <video class="w-100"
                            poster="<?php echo e($lecture->lessonsection->lesson->image ? $lecture->lessonsection->lesson->image : asset('admin/assets/img/pages/app-academy-tutor-1.png')); ?>"
                            id="plyr-video-aplayer">
                            <source
                                src="https://drive.google.com/uc?export=preview&id=<?php echo e($lecture->type == 3 ? $lecture->video_google_id : ''); ?>"
                                type="video/mp4" />
                        </video>
                    <?php elseif($lecture->type == 2): ?>
                        <embed src="<?php echo e($lecture->content); ?>" type="application/pdf" width="100%" height="600px" />
                    <?php elseif($lecture->type == 1): ?>
                        <img src="<?php echo e($lecutre->content); ?>" alt="image"
                            style=" max-width: 100%;
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


    <script>
        $(document).ready(function() {
                    csrfToken = $('meta[name="csrf-token"]').attr('content');
                    // Make an AJAX request to check follow-up on page load
                    $.ajax({
                        url: '/add-followup', // Update with your actual route
                        method: 'POST',
                        data: {
                            // Include any required parameters here
                            _token: csrfToken,
                            student_id: <?php echo e(auth()->user()->id); ?>,
                            lesson_section_id: <?php echo e($lecture->lessonsection->id); ?>,
                            done: 1 // Update with the actual value
                        },
                        success: function(response) {
                            // Close the modal or perform any other actions

                        }
                    });

                    });


    </script>

<script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
<script>
    const player = new Plyr('#plyr-video-aplayer', {
        settings: ['captions', 'quality', 'speed', 'loop'],
        quality: { default: 576, options: [4320, 2880, 2160, 1440, 1080, 720, 576, 480, 360, 240] }
});
</script>

    </body>

    </html>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('student.layouts.exam-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Web-Development\Khairy\Khairy\resources\views/student/new/lecture.blade.php ENDPATH**/ ?>