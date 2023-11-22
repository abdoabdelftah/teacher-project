<?php $__env->startSection('css'); ?>

<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

<link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/libs/jstree/jstree.css')); ?>" />

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>




<div class="row g-4 mb-4">
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <?php echo e($exam->id); ?>

                    <input type="hidden" class="exam-id-input" name="exam_id" value="<?php echo e($exam->id); ?>">
                    <input type="hidden" name="student_id" value="<?php echo e(auth()->user()->id); ?>">

                    <?php if($exam->question_type == 1): ?>
                        <h3><?php echo e($exam->question); ?></h3>
                    <?php endif; ?>

                    <?php if($exam->question_type == 2): ?>
                        <img src="<?php echo e($exam->question); ?>" style="width: 100%; height: auto;">
                    <?php endif; ?>

                    <?php if($exam->choose_type == 1): ?>
                        <div class="col-md-10">
                            <div class="form-group row">
                                <div class="col-sm-7">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="answer[<?php echo e($exam->id); ?>]" value="choose1"> <?php echo e($exam->choose1); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="answer[<?php echo e($exam->id); ?>]" value="choose2"> <?php echo e($exam->choose2); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="answer[<?php echo e($exam->id); ?>]" value="choose3"> <?php echo e($exam->choose3); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="answer[<?php echo e($exam->id); ?>]" value="choose4"> <?php echo e($exam->choose4); ?>

                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if($exam->choose_type == 2): ?>
                        <div class="col-md-10">
                            <div class="form-group row">
                                <div class="col-sm-7">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="answer<?php echo e($exam->id); ?>" value="choose1"> أ
                                        </label>
                                        <div class="col-md-4">
                                            <img src="<?php echo e($exam->choose1); ?>" width="200px" height="100px">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="answer<?php echo e($exam->id); ?>" value="choose2"> ب
                                        </label>
                                        <div class="col-md-4">
                                            <img src="<?php echo e($exam->choose2); ?>" width="200px" height="100px">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="answer<?php echo e($exam->id); ?>" value="choose3"> ج
                                        </label>
                                        <div class="col-md-4">
                                            <img src="<?php echo e($exam->choose3); ?>" width="200px" height="100px">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="answer<?php echo e($exam->id); ?>" value="choose4"> د
                                        </label>
                                        <div class="col-md-4">
                                            <img src="<?php echo e($exam->choose4); ?>" width="200px" height="100px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>






<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>


<script src="<?php echo e(asset('admin/assets/vendor/libs/jstree/jstree.js')); ?>"></script>

<script src="<?php echo e(asset('admin/assets/js/extended-ui-treeview.js')); ?>"></script>


<script>
    $(document).ready(function () {
        // Add a click event handler to all radio inputs
        $('input[type="radio"]').on('click', function () {
            // Get the values from hidden inputs
            var studentId = $('input[name="student_id"]').val();

            // Find the closest exam-id-input element to the clicked radio input
            var examIdInput = $(this).closest('.card').find('.exam-id-input');
            var examId = examIdInput.val();

            // Get the value of the clicked radio input
            var studentAnswer = $(this).val();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Create a data object to send in the POST request
            var data = {
                _token: csrfToken, // Include the CSRF token
                student_id: studentId,
                exam_id: examId,
                student_answer: studentAnswer
            };

            // Send a POST request to your controller endpoint
            $.post('/save-student-answer', data, function (response) {
                // Handle the response from the server if needed
                console.log(response);
            });
        });
    });
</script>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('student.layouts.exam-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Web-Development\Khairy\Khairy\resources\views/student/new/exam.blade.php ENDPATH**/ ?>