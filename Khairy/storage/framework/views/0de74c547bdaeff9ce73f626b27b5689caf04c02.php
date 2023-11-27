<?php $__env->startSection('css'); ?>

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/libs/jstree/jstree.css')); ?>" />

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


    <div class="row g-4 mb-4">


        <?php if(count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 1): ?>
            <div class="card">
                <div class="card-body">
                    <?php if(count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 1 && $section->sectionFollowup[0]->done_correcting == 0): ?>
                    <center>
                        <div class="row"
                            style="border-radius: 30%; border: solid blue 3px; padding: 30px; display: inline-block;">

                   <h3>اجابتك قيد المراجعة والتصحيح</h3>
                        </div>
                    </center>
                   <?php elseif(count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 1 && $section->sectionFollowup[0]->done_correcting == 1): ?>
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
                    <?php endif; ?>
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

                        <div class="card-body image-preview"></div>

                        <?php if(count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 0): ?>
                            <div class="mt-2" id = "formFile">
                                <label for="roundedInput" class="form-label">الاجابة بصورة</label>
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <input class="form-control" name = "image" type="file" id="formFile">

                                    </div>
                                </div>
                            </div>

                            <?php endif; ?>

                            <?php if(count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 0): ?>

                            <div class="mt-2" id = "formFile">
                                <label for="roundedInput" class="form-label">الاجابة بنص</label>
                                <input id="roundedInput" class="form-control rounded-pill"
                                    value=" <?php if(count($exam->studentexamanswers) > 0 && !empty($exam->studentexamanswers[0]->student_answer)): ?> <?php echo e($exam->studentexamanswers[0]->student_answer); ?>  <?php endif; ?>"
                                    name ="text_answer" type="text"
                                    <?php if(count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 1): ?> disabled <?php endif; ?>
                                    />
                            </div>

                            <?php endif; ?>

                        <?php if(count($exam->studentexamanswers) > 0 && (!empty($exam->studentexamanswers[0]->student_answer_picture) || !empty($exam->studentexamanswers[0]->student_answer))): ?>
                            <br>
                            <div class="accordion" id="collapsibleSection<?php echo e($exam->id); ?>">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingDeliveryOptions<?php echo e($exam->id); ?>">
                                        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#collapseDeliveryOptions<?php echo e($exam->id); ?>"
                                            aria-expanded="false"
                                            aria-controls="collapseDeliveryOptions<?php echo e($exam->id); ?>"><b> اجابتك
                                            </b></button>
                                    </h2>
                                    <div id="collapseDeliveryOptions<?php echo e($exam->id); ?>"
                                        class="accordion-collapse collapse"
                                        aria-labelledby="headingDeliveryOptions<?php echo e($exam->id); ?>"
                                        data-bs-parent="#collapsibleSection<?php echo e($exam->id); ?>">
                                        <div class="accordion-body">
                                            <div class="row">


                                                <?php if(count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done == 1 && !empty($exam->studentexamanswers[0]->student_answer)): ?>

                                                <div class="mt-2" id = "formFile">
                                                    <label for="roundedInput" class="form-label">اجابتك النصية</label>
                                                    <input id="roundedInput" class="form-control rounded-pill"
                                                        value=" <?php if(count($exam->studentexamanswers) > 0 && !empty($exam->studentexamanswers[0]->student_answer)): ?> <?php echo e($exam->studentexamanswers[0]->student_answer); ?>  <?php endif; ?>"
                                                        name ="text_answer" type="text"
                                                         disabled
                                                        />
                                                </div>
                                                <br>
                                                <?php endif; ?>


                                                <img src="<?php echo e($exam->studentexamanswers[0]->student_answer_picture); ?>"
                                                    style=" width: 100%; height: auto;">


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>


                <!-- start Admin answer-->

                <?php if(count($section->sectionFollowup) > 0 && $section->sectionFollowup[0]->done_correcting == 1): ?>

                        <div class="accordion" id="collapsibleSection">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingDeliveryOptions">
                                  <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseDeliveryOptions" aria-expanded="false" aria-controls="collapseDeliveryOptions"> <b style="color: <?php echo e($exam->studentexamanswers[0]->points == $exam->points ? 'green' : 'red'); ?>"> <?php echo e($exam->studentexamanswers[0]->points == $exam->points ? 'اجابتك صحيحة' : 'اجابتك خاطئة'); ?> </b></button>
                                </h2>
                                <div id="collapseDeliveryOptions" class="accordion-collapse collapse" aria-labelledby="headingDeliveryOptions" data-bs-parent="#collapsibleSection">
                                  <div class="accordion-body">
                                    <div class="row">



                                        <?php if(count($exam->studentexamanswers) > 0 &&!empty($exam->studentexamanswers[0]->right_answer_pic)): ?>
                                        <div class="row g-0" id="displayI">
                                            <label for="roundedInput" class="form-label">الشرح بصورة</label>
                                                <div class="col-md-4" style="display: flex;  justify-content: center; align-items: center;">
                                                 <img  id="image"  src="<?php echo e($exam->studentexamanswers[0]->right_answer_pic); ?>" alt="Card image" style="max-width: 100%;">

                                             </div>
                                                <div class="col-md-8">
                                                  <div class="card-body">
                                                    <input class="form-control"  name = "image" type="file" id="formFile">

                                                </div>
                                                </div>
                                              </div>
                                              <?php endif; ?>

                                              <?php if(count($exam->studentexamanswers) > 0 &&!empty($exam->studentexamanswers[0]->right_answer)): ?>

                                              <div class="mt-2" id = "formFile">
                                                <label for="roundedInput" class="form-label">الشرح بنص</label>
                                                <input id="roundedInput" class="form-control rounded-pill" value="<?php echo e(count($exam->studentexamanswers) > 0 && !empty($exam->studentexamanswers[0]->right_answer) ? $exam->studentexamanswers[0]->right_answer : ''); ?>  " name ="points" type="number"  />
                                              </div>

                                              <?php endif; ?>

                                              <div class="mt-2">
                                                <label for="roundedInput" class="form-label">حصلت على</label>
                                                <input id="roundedInput" class="form-control rounded-pill" value="<?php echo e($exam->points); ?> من <?php echo e($exam->studentexamanswers[0]->points); ?>" name ="points" type="text" disabled />
                                              </div>


                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div>
                        <?php endif; ?>
                    <!-- end Admin answer-->


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


    // Handle file input change event
    $('input[name="image"]').on('change', function () {
        // Get the parent card element
        var cardElement = $(this).closest('.card');

        // Hide the entire accordion
        cardElement.find('.accordion').hide();

        cardElement.find('.appended-accordion').remove();

        // Get the input file element
        var fileInput = $(this)[0];

        // Check if any file is selected
        if (fileInput.files && fileInput.files[0]) {
            // Create a FileReader to read the selected file
            var reader = new FileReader();

            // Set up the FileReader onload event
            reader.onload = function (e) {
                // Create a new accordion with the new image
                var newAccordion = createAccordionWithImage(e.target.result);

                // Insert the new accordion after the hidden accordion
                cardElement.find('.accordion').after(newAccordion);
            };

            // Read the selected file as a data URL
            reader.readAsDataURL(fileInput.files[0]);
        }
    });

    // Function to create a new accordion with the provided image
    function createAccordionWithImage(imageSrc) {
        // Customize this function based on your HTML structure
        var newAccordion = $('<div class="accordion appended-accordion" id="newAccordion"></div>');
        var accordionItem = $('<div class="accordion-item"></div>');
        var accordionHeader = $('<h2 class="accordion-header" id="newAccordionHeader"></h2>');
        var accordionButton = $('<button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#newAccordionCollapse" aria-expanded="true" aria-controls="newAccordionCollapse">اجابتك</button>');
        var accordionCollapse = $('<div id="newAccordionCollapse" class="accordion-collapse collapse show" aria-labelledby="newAccordionHeader" data-bs-parent="#newAccordion"></div>');
        var accordionBody = $('<div class="accordion-body"></div>');

        // Append the image to the new accordion body
        accordionBody.append('<img src="' + imageSrc + '" style="width: 100%; height: auto;">');

        // Construct the new accordion
        accordionHeader.append(accordionButton);
        accordionItem.append(accordionHeader);
        accordionCollapse.append(accordionBody);
        accordionItem.append(accordionCollapse);
        newAccordion.append(accordionItem);

        return newAccordion;
    }






            $('input[name="text_answer"]').on('blur', function() {


                // Get the student ID from the hidden input
                var studentId = $('input[name="student_id"]').val();

                // Find the closest exam-id-input element to the changed input
                var examIdInput = $(this).closest('.card').find('.exam-id-input');
                var examId = examIdInput.val();

                // Get the value of the text input
                var studentAnswerText = $(this).closest('.card').find('input[name="text_answer"]').val();
                var csrfToken = $('meta[name="csrf-token"]').attr('content');



                // Create a FormData object to send both image and text inputs
                var formData = new FormData();
                formData.append('_token', csrfToken);
                formData.append('student_id', studentId);
                formData.append('exam_id', examId);
                formData.append('student_answer_text', studentAnswerText);

                // Send a POST request to your controller endpoint
                $.ajax({
                    url: '/save-text-student-answer',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {



                    },
                    error: function(error) {
                        // Handle the error if needed
                        console.error(error);
                    }
                });

            });



            //image hadnling


            $('input[name="image"]').on('change', function() {
                // Get the student ID from the hidden input
                var studentId = $('input[name="student_id"]').val();

                // Find the closest exam-id-input element to the changed input
                var examIdInput = $(this).closest('.card').find('.exam-id-input');
                var examId = examIdInput.val();

                // Get the value of the text input
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                // Check if an image is selected
                var studentAnswerImage = $(this).closest('.card').find('input[name="image"]').prop('files')[
                    0];

                // Create a FormData object to send both image and text inputs
                var formData = new FormData();
                formData.append('_token', csrfToken);
                formData.append('student_id', studentId);
                formData.append('exam_id', examId);
                formData.append('student_answer_image', studentAnswerImage);

                // Send a POST request to your controller endpoint
                $.ajax({
                    url: '/save-text-student-answer',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {



                    },
                    error: function(error) {
                        // Handle the error if needed
                        console.error(error);
                    }
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

<?php echo $__env->make('student.layouts.exam-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Web-Development\Khairy\Khairy\resources\views/student/new/text-exam.blade.php ENDPATH**/ ?>