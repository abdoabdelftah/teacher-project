<?php $__env->startSection('css'); ?>

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/libs/jstree/jstree.css')); ?>" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('sideBar'); ?>

<?php $__currentLoopData = $lesson->userLessonsections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sectionm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<li class="menu-item <?php echo e($section->id == $sectionm->id ? 'active' : ''); ?>" >

<a class="menu-link" href="

<?php if($sectionm->section_type == 1 || $sectionm->section_type == 2): ?>
/grade/<?php echo e($sectionm->lesson->unit->grade->id); ?>/unit/<?php echo e($sectionm->lesson->unit->id); ?>/lesson/<?php echo e($sectionm->lesson->id); ?>/lessonsectionexam/<?php echo e($sectionm->id); ?>


<?php endif; ?>

<?php if($sectionm->section_type == 3): ?>
/grade/<?php echo e($sectionm->lesson->unit->grade->id); ?>/unit/<?php echo e($sectionm->lesson->unit->id); ?>/lesson/<?php echo e($sectionm->lesson->id); ?>/lessonsectiontextexam/<?php echo e($sectionm->id); ?>

<?php endif; ?>

<?php if($sectionm->section_type == 4): ?>
/grade/<?php echo e($sectionm->lesson->unit->grade->id); ?>/unit/<?php echo e($sectionm->lesson->unit->id); ?>/lesson/<?php echo e($sectionm->lesson->id); ?>/pdfexam/<?php echo e($sectionm->id); ?>


<?php endif; ?>

<?php if($sectionm->section_type == 5): ?>

/grade/<?php echo e($sectionm->lesson->unit->grade->id); ?>/unit/<?php echo e($sectionm->lesson->unit->id); ?>/lesson/<?php echo e($sectionm->lesson->id); ?>/lessonsectionlecture/<?php echo e($sectionm->id); ?>


<?php endif; ?>


" >

    <?php if($sectionm->sectionFollowup && count($sectionm->sectionFollowup) > 0 && $sectionm->sectionFollowup[0]->done == 1): ?>
    <i class='menu-icon tf-icons mdi mdi-check-circle-outline mdi-24px'></i>
    <?php else: ?>
    <i class='menu-icon tf-icons mdi mdi-circle-outline mdi-24px'></i>
    <?php endif; ?>

<div data-i18n="<?php echo e($sectionm->name); ?>"><?php echo e($sectionm->name); ?></div>

</a>
</li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <div class="row g-4 mb-4">

        <?php if(count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 1): ?>
            <div class="card">
                <div class="card-body">
                    <center>
                        <div class="row"
                            style="border-radius: 30%; border: solid green 3px; padding: 30px; display: inline-block;">

                            <?php
                                $totalPoints = $data
                                    ->pluck('studentexamanswers')
                                    ->flatten()
                                    ->sum('points');
                            ?>

                            <h3 style="color: rgb(11, 109, 255);">
                                نتيجتك هى : <?php echo e($totalPoints); ?> من <?php echo e($data->sum('points')); ?> </h3>

                        </div>
                    </center>
                </div>
            </div>


        <?php endif; ?>

        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card">
                <div class="card-body">
                    <div class="row">

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
                                            <label class="form-check-label"
                                                <?php if(count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 1 && $exam->right_answer == 'choose1'): ?> style="border-radius:60%; border:solid <?php if(count($exam->studentexamanswers) > 0 && $exam->right_answer == $exam->studentexamanswers[0]->student_answer): ?> green <?php else: ?> red <?php endif; ?>
                                                3px;padding:12px" <?php endif; ?>>
                                                <input type="radio" class="form-check-input"
                                                    name="answer[<?php echo e($exam->id); ?>]" value="choose1"
                                                    <?php if(
                                                        $exam->choose_type == 1 &&
                                                            count($exam->studentexamanswers) > 0 &&
                                                            $exam->studentexamanswers[0]->student_answer == 'choose1'): ?> checked <?php endif; ?>
                                                    <?php if(count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 1): ?> disabled <?php endif; ?>> <?php echo e($exam->choose1); ?>

                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <label class="form-check-label"
                                                <?php if(count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 1 && $exam->right_answer == 'choose2'): ?> style="border-radius:60%; border:solid <?php if(count($exam->studentexamanswers) > 0 && $exam->right_answer == $exam->studentexamanswers[0]->student_answer): ?> green <?php else: ?> red <?php endif; ?>
                                                3px;padding:12px" <?php endif; ?>>
                                                <input type="radio" class="form-check-input"
                                                    name="answer[<?php echo e($exam->id); ?>]" value="choose2"
                                                    <?php if(
                                                        $exam->choose_type == 1 &&
                                                            count($exam->studentexamanswers) > 0 &&
                                                            $exam->studentexamanswers[0]->student_answer == 'choose2'): ?> checked <?php endif; ?>
                                                    <?php if(count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 1): ?> disabled <?php endif; ?>>
                                                <?php echo e($exam->choose2); ?>

                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="form-check">
                                            <label class="form-check-label"
                                                <?php if(count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 1 && $exam->right_answer == 'choose3'): ?> style="border-radius:60%; border:solid <?php if(count($exam->studentexamanswers) > 0 && $exam->right_answer == $exam->studentexamanswers[0]->student_answer): ?> green <?php else: ?> red <?php endif; ?>
                                                3px;padding:12px" <?php endif; ?>>
                                                <input type="radio" class="form-check-input"
                                                    name="answer[<?php echo e($exam->id); ?>]" value="choose3"
                                                    <?php if(
                                                        $exam->choose_type == 1 &&
                                                            count($exam->studentexamanswers) > 0 &&
                                                            $exam->studentexamanswers[0]->student_answer == 'choose3'): ?> checked <?php endif; ?>
                                                    <?php if(count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 1): ?> disabled <?php endif; ?>>
                                                <?php echo e($exam->choose3); ?>

                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <label class="form-check-label"
                                                <?php if(count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 1 && $exam->right_answer == 'choose4'): ?> style="border-radius:60%; border:solid <?php if(count($exam->studentexamanswers) > 0 && $exam->right_answer == $exam->studentexamanswers[0]->student_answer): ?> green <?php else: ?> red <?php endif; ?>
                                                3px;padding:12px" <?php endif; ?>>
                                                <input type="radio" class="form-check-input"
                                                    name="answer[<?php echo e($exam->id); ?>]" value="choose4"
                                                    <?php if(
                                                        $exam->choose_type == 1 &&
                                                            count($exam->studentexamanswers) > 0 &&
                                                            $exam->studentexamanswers[0]->student_answer == 'choose4'): ?> checked <?php endif; ?>
                                                    <?php if(count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 1): ?> disabled <?php endif; ?>>
                                                <?php echo e($exam->choose4); ?>

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
                                                <input type="radio" class="form-check-input"
                                                    name="answer<?php echo e($exam->id); ?>" value="choose1"
                                                    <?php if(
                                                        $exam->choose_type == 2 &&
                                                            count($exam->studentexamanswers) > 0 &&
                                                            $exam->studentexamanswers[0]->student_answer == 'choose1'): ?> checked <?php endif; ?>
                                                    <?php if(count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 1): ?> disabled <?php endif; ?>> أ
                                            </label>
                                            <div class="col-md-4">
                                                <img src="<?php echo e($exam->choose1); ?>" width="200px" height="100px"
                                                    <?php if(count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 1 && $exam->right_answer == 'choose1'): ?> style="border-radius:60%; border:solid <?php if(count($exam->studentexamanswers) > 0 && $exam->right_answer == $exam->studentexamanswers[0]->student_answer): ?> green <?php else: ?> red <?php endif; ?>
                                                    3px;padding:12px" <?php endif; ?>>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input"
                                                    name="answer<?php echo e($exam->id); ?>" value="choose2"
                                                    <?php if(
                                                        $exam->choose_type == 2 &&
                                                            count($exam->studentexamanswers) > 0 &&
                                                            $exam->studentexamanswers[0]->student_answer == 'choose2'): ?> checked <?php endif; ?>
                                                    <?php if(count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 1): ?> disabled <?php endif; ?>> ب
                                            </label>
                                            <div class="col-md-4">
                                                <img src="<?php echo e($exam->choose2); ?>" width="200px" height="100px"
                                                    <?php if(count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 1 && $exam->right_answer == 'choose2'): ?> style="border-radius:60%; border:solid <?php if(count($exam->studentexamanswers) > 0 && $exam->right_answer == $exam->studentexamanswers[0]->student_answer): ?> green <?php else: ?> red <?php endif; ?>
                                                    3px;padding:12px" <?php endif; ?>>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input"
                                                    name="answer<?php echo e($exam->id); ?>" value="choose3"
                                                    <?php if(
                                                        $exam->choose_type == 2 &&
                                                            count($exam->studentexamanswers) > 0 &&
                                                            $exam->studentexamanswers[0]->student_answer == 'choose3'): ?> checked <?php endif; ?>
                                                    <?php if(count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 1): ?> disabled <?php endif; ?>> ج
                                            </label>
                                            <div class="col-md-4">
                                                <img src="<?php echo e($exam->choose3); ?>" width="200px" height="100px"
                                                    <?php if(count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 1 && $exam->right_answer == 'choose3'): ?> style="border-radius:60%; border:solid <?php if(count($exam->studentexamanswers) > 0 && $exam->right_answer == $exam->studentexamanswers[0]->student_answer): ?> green <?php else: ?> red <?php endif; ?>
                                                    3px;padding:12px" <?php endif; ?>>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input"
                                                    name="answer<?php echo e($exam->id); ?>" value="choose4"
                                                    <?php if(
                                                        $exam->choose_type == 2 &&
                                                            count($exam->studentexamanswers) > 0 &&
                                                            $exam->studentexamanswers[0]->student_answer == 'choose4'): ?> checked <?php endif; ?>
                                                    <?php if(count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 1): ?> disabled <?php endif; ?>> د
                                            </label>
                                            <div class="col-md-4">
                                                <img src="<?php echo e($exam->choose4); ?>" width="200px" height="100px"
                                                    <?php if(count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 1 && $exam->right_answer == 'choose4'): ?> style="border-radius:60%; border:solid <?php if(count($exam->studentexamanswers) > 0 && $exam->right_answer == $exam->studentexamanswers[0]->student_answer): ?> green <?php else: ?> red <?php endif; ?>
                                                    3px;padding:12px" <?php endif; ?>>
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


        <?php if(count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 0): ?>
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <center> <button type="button" class="btn rounded-pill btn-label-secondary waves-effect btn-lg"
                                id = "saveButton">
                                انهاء الامتحان
                            </button> </center>

                    </div>
                </div>
            </div>
        <?php endif; ?>

    </div>



    <!-- Modal -->
    <div class="modal fade" id="startModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel1"><?php echo e($section->name); ?></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <h4>انت على وشك البدأ فى الاجابة عن امتحان مدته <?php echo e($section->stop_watch); ?> دقائق</h4>

                    <center> <button type="button" class="btn rounded-pill btn-label-success waves-effect"
                            id = "startButton">
                            البدأ فى الامتحان
                        </button> </center>



                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="timeEndModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel1"><?php echo e($section->name); ?></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <h4>انتهى وقت الامتحان</h4>





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
            // Add a click event handler to all radio inputs
            $('input[type="radio"]').on('click', function() {
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
                $.post('/save-student-answer', data, function(response) {
                    // Handle the response from the server if needed
                    console.log(response);
                });
            });
        });



        $(document).ready(function() {
            csrfToken = $('meta[name="csrf-token"]').attr('content');
            // Make an AJAX request to check follow-up on page load
            $.ajax({
                url: '/check-followup', // Update with your actual route
                method: 'POST',
                data: {
                    // Include any required parameters here
                    _token: csrfToken,
                    student_id: <?php echo e(auth()->user()->id); ?>,
                    lesson_section_id: <?php echo e($section->id); ?>

                },
                success: function(response) {
                    if (response.code == 200) {
                        if (response.message.done == 0) {
                            <?php if($section->has_time == 1): ?>
                                // Calculate countdown time in milliseconds
                                var createdTimestamp = new Date(response.message.created_at).getTime();
                                var countdownDuration = <?php echo e($section->stop_watch); ?> * 60 *
                                    1000; // Convert minutes to milliseconds
                                var countdownEndTime = createdTimestamp + countdownDuration;

                                // Update countdown timer every second
                                var x = setInterval(function() {
                                    // Get current time
                                    var now = new Date().getTime();

                                    // Calculate remaining time
                                    var distance = countdownEndTime - now;

                                    // Check if countdown has expired
                                    if (distance <= 0) {
                                        clearInterval(x);
                                        $("#countdown-timer").html("انتهى الوقت");
                                        // Add code to handle timer expiration here

                                        $.ajax({
                                            url: '/add-followup', // Update with your actual route
                                            method: 'POST',
                                            data: {
                                                // Include any required parameters here
                                                _token: csrfToken,
                                                student_id: <?php echo e(auth()->user()->id); ?>,
                                                lesson_section_id: <?php echo e($section->id); ?>,
                                                done: 1 // Update with the actual value
                                            },
                                            success: function(response) {
                                                // Close the modal or perform any other actions
                                                $('#timeEndModal').modal('show');

                                                setTimeout(function() {
                                                    location.reload();
                                                }, 5000);

                                            }
                                        });

                                    } else {
                                        // Calculate minutes and seconds
                                        var minutes = Math.floor(distance / (1000 * 60));
                                        var seconds = Math.floor((distance % (1000 * 60)) /
                                            1000);

                                        // Display the countdown timer
                                        $("#countdown-timer").html("الوقت المتبقى: " + minutes +
                                            "د " +
                                            seconds + "ث ");
                                    }
                                }, 1000);
                            <?php endif; ?>

                        }
                    }
                    if (response.code == 400) {
                        // Show modal with "Start" button

                        showStartModal();





                    }
                }
            });

            // Function to show the modal with "Start" button
            function showStartModal() {
                // You can use your preferred modal library or create a custom modal
                // For simplicity, let's assume you have a modal with id "startModal"
                <?php if($section->has_time == 1): ?>

                    $('#startModal').modal('show');

                    <?php else: ?>

                    $.ajax({
                        url: '/add-followup', // Update with your actual route
                        method: 'POST',
                        data: {
                            // Include any required parameters here
                            _token: csrfToken,
                            student_id: <?php echo e(auth()->user()->id); ?>,
                            lesson_section_id: <?php echo e($section->id); ?>,
                            done: 0 // Update with the actual value
                        },
                        success: function(response) {
                            // Close the modal or perform any other actions
                            location.reload();
                        }
                    });

                <?php endif; ?>

                var startButtonClicked = false;


                $('#startButton').on('click', function() {
                    startButtonClicked = true;
                    // Make an AJAX request to add follow-up when "Start" is clicked
                    $.ajax({
                        url: '/add-followup', // Update with your actual route
                        method: 'POST',
                        data: {
                            // Include any required parameters here
                            _token: csrfToken,
                            student_id: <?php echo e(auth()->user()->id); ?>,
                            lesson_section_id: <?php echo e($section->id); ?>,
                            done: 0 // Update with the actual value
                        },
                        success: function(response) {
                            // Close the modal or perform any other actions
                            $('#startModal').modal('hide');
                            location.reload();
                        }
                    });
                });

                $('#startModal').on('hidden.bs.modal', function() {
                    if (!startButtonClicked) {
                        var currentUrl = window.location.href;

                        // Remove the specific segment "lessonsectionexam" from the URL
                        var redirectUrl = currentUrl.replace(/\/lessonsectionexam\/\d+$/,
                            '/lessonsections');

                        // Redirect to the new URL
                        window.location.href = redirectUrl;
                    }
                });


            }

            $('#saveButton').on('click', function() {


                $.ajax({
                    url: '/add-followup', // Update with your actual route
                    method: 'POST',
                    data: {
                        // Include any required parameters here
                        _token: csrfToken,
                        student_id: <?php echo e(auth()->user()->id); ?>,
                        lesson_section_id: <?php echo e($section->id); ?>,
                        done: 1 // Update with the actual value
                    },
                    success: function(response) {
                        // Close the modal or perform any other actions

                        setTimeout(function() {
                            location.reload();
                        }, 1000);

                    }
                });

            });

        });
    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('student.layouts.exam-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Web-Development\Khairy\Khairy\resources\views/student/new/exam.blade.php ENDPATH**/ ?>