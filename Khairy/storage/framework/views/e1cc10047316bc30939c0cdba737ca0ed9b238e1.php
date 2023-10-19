<?php $__env->startSection('css'); ?>

    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/libs/jstree/jstree.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/css/pages/cards-statistics.css')); ?>" />


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


    <div class="row g-4 mb-4">

        <div class="col-sm-6 col-xl-12">
            <div class="card">
                <div class="card-body " style="display: flex; justify-content: space-between; align-items: center;">
                    <h4>اجزاء الدرس</h4>

                    <button type="button" class="custom-btn" data-bs-toggle="modal" data-bs-target="#addGradeModal">اضافة
                        جزء </button>

                </div>
            </div>
        </div>


        <div class="col-sm-6 col-xl-4">
            <div class="card">
                <div class="card-body" style="overflow: auto;">


                    <h5 class="card-header">الخريطة</h5>
                    <div class="card-body">
                        <div id="jstree-basic">
                            <ul>
                                
                                <?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li data-jstree='{"icon" : "mdi mdi-folder-outline"}'>

                                        <span grade-id = "<?php echo e($grade->id); ?>"> <?php echo e($grade->name); ?> </span>

                                        <ul>

                                            <?php $__currentLoopData = $grade->units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li data-jstree='{"icon" : "mdi mdi-folder-outline"}'>
                                                    <span unit-id = "<?php echo e($unit->id); ?>"> <?php echo e($unit->name); ?></span>
                                                    <ul>


                                                        <?php $__currentLoopData = $unit->lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li data-jstree='{"icon" : "mdi mdi-folder-outline"}'>
                                                                <span lesson-id = "<?php echo e($lesson->id); ?>"> <?php echo e($lesson->name); ?>

                                                                </span>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                    </ul>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>

                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </ul>
                        </div>
                    </div>



                </div>
            </div>
        </div>


        <div class="col-sm-6 col-xl-8">




            <!-- Cards Draggable -->
            <div class="swiper-container swiper-container-horizontal swiper swiper-sales" id="swiper-weekly-sales">
                <div class="swiper-wrapper">

                    <div class="row mb-2" id="sortable-cards">

                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card drag-item cursor-move mb-lg-0 mb-4" sort-section-id="<?php echo e($section->id); ?>" data-priority="<?php echo e($section->priority); ?>">

                                        <div class="swiper-slide pb-3" style="margin-left: 10px;">

                                            <div class="dropdown" style="position: absolute; top: 10px; left: 10px;">
                                                <button class="btn p-0" type="button" id="organicSessionsDropdown"
                                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="mdi mdi-dots-vertical mdi-24px"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="organicSessionsDropdown">
                                                    <a class="dropdown-item edit-section"
                                                        data-section-id="<?php echo e($section->id); ?>"
                                                        href="javascript:void(0);">تعديل</a>
                                                </div>
                                            </div>


                                            <h5 class="mb-2"><?php echo e($section->name); ?> <?php if($section->hide == 1): ?>
                                                    <i class="mdi mdi-eye-off-outline"></i>
                                                <?php endif; ?>
                                            </h5>
                                            <div class="d-flex align-items-center gap-2">

                                            </div>
                                            <div class="d-flex align-items-center mt-3">

                                                <?php if($section->section_type == 5 || $section->section_type == 7): ?>
                                                    <!-- شرح -->
                                                    <?php if($section->lecture && $section->lecture->type == 2): ?><span class="mdi mdi-panorama-variant-outline mdi-48px"></span>
                                                    <?php elseif($section->lecture && $section->lecture->type == 3): ?>  <span class="mdi mdi-file-pdf-box mdi-48px"></span>
                                                    <?php elseif($section->lecture && $section->lecture->type == 4): ?>  <span class="mdi mdi-video-outline mdi-48px"></span>
                                                    <?php else: ?>  <span class="mdi mdi-book-open-page-variant-outline mdi-48px"></span>
                                                    <?php endif; ?>

                                                <?php endif; ?>

                                                <?php if($section->section_type == 1): ?>
                                                    <!-- واجب-->
                                                    <span class="mdi mdi-table-check mdi-48px"></span>
                                                <?php endif; ?>

                                                <?php if($section->section_type == 2): ?>
                                                    <!-- امتحان الاختيار من متعدد-->
                                                    <span class="mdi mdi-timetable mdi-48px"></span>
                                                <?php endif; ?>

                                                <?php if($section->section_type == 6): ?>
                                                    <!--  امتحان الاجابة المقالية-->
                                                    <span class="mdi mdi-pencil-box-outline mdi-48px"></span>
                                                <?php endif; ?>

                                                <div class="d-flex flex-column w-100 ms-4">
                                                    <h6 class="mb-3">

                                                        <?php if($section->section_type == 5 || $section->section_type == 7): ?>
                                                        <?php echo e($section->lecture && $section->lecture->type == 2 ?'صورة' : ''); ?>

                                                        <?php echo e($section->lecture && $section->lecture->type == 3 ?'ملف' : ''); ?>

                                                        <?php echo e($section->lecture && $section->lecture->type == 4 ?'فديو' : ''); ?>

                                                        <?php echo e(!$section->lecture || $section->lecture->type == Null ?'صورة او فديو او ملف' : ''); ?>

                                                        <?php endif; ?>

                                                        <?php if($section->section_type == 1): ?>
                                                            امتحان الاختيار من متعدد بدون وقت
                                                        <?php endif; ?>

                                                        <?php if($section->section_type == 2): ?>
                                                            امتحان الاختيار من متعدد بوقت
                                                        <?php endif; ?>

                                                        <?php if($section->section_type == 6): ?>
                                                            امتحان الاجابة المقالية
                                                        <?php endif; ?>



                                                    </h6>
                                                    <div class="row d-flex flex-wrap justify-content-between">
                                                        <div class="col-6">
                                                            <ul class="list-unstyled mb-0">
                                                                <li class="d-flex mb-2 pb-1 align-items-center">
                                                                    <small
                                                                        class="mb-0 me-2 sales-text-bg bg-label-secondary"><?php echo e($section->section_followup_count); ?></small>
                                                                    <a
                                                                        href="<?php echo e(url('admin/student/lessonsection/answered/' . $section->id)); ?>"><small
                                                                            class="mb-0 text-truncate">مشاهدة</small> </a>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                        <div class="col-6">
                                                            <ul class="list-unstyled mb-0">
                                                                <li class="d-flex mb-2 pb-1 align-items-center">
                                                                    <small
                                                                        class="mb-0 me-2 sales-text-bg bg-label-secondary"><?php echo e($userCount - $section->section_followup_count); ?></small>
                                                                    <a
                                                                        href="<?php echo e(url('admin/student/lessonsection/notanswered/' . $section->id)); ?>"><small
                                                                            class="mb-0 text-truncate">لم يشاهد</small> </a>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-3 pt-1">
                                                <div class="text-end">

                                                    <?php if($section->section_type == 5 || $section->section_type == 7): ?>
                                                    <a href="<?php echo e(url('admin/lectureedit/' . $section->id)); ?>"
                                                        type="button"
                                                        class="btn rounded-pill btn-label-info waves-effect">المحتوى</a>


                                                    <?php endif; ?>

                                                    <?php if($section->section_type == 1): ?>
                                                        <a href="<?php echo e(url('admin/lessonhomeworks/' . $section->id)); ?>"
                                                            type="button"
                                                            class="btn rounded-pill btn-label-info waves-effect">المحتوى</a>
                                                    <?php endif; ?>

                                                    <?php if($section->section_type == 2): ?>
                                                        <a href="<?php echo e(url('admin/lessonexams/' . $section->id)); ?>"
                                                            type="button"
                                                            class="btn rounded-pill btn-label-info waves-effect">المحتوى</a>
                                                    <?php endif; ?>


                                                    <?php if($section->section_type == 6): ?>
                                                        <a href="<?php echo e(url('admin/lessontextexams/' . $section->id)); ?>"
                                                            type="button"
                                                            class="btn rounded-pill btn-label-info waves-effect">المحتوى</a>
                                                    <?php endif; ?>


                                                    </td>

                                                </div>
                                            </div>
                                        </div>

                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>




        <!-- Modal -->
        <div class="modal fade" id="editGradeModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="POST" action="<?php echo e(route('update.lessonsection')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" value ="" id="section-id">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel1">تعديل جزء من درس</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">


                            <div class="row">
                                <div class="col mb-4 mt-2">
                                    <div class="form-floating form-floating-outline">
                                        <input type="text" id="name" name="name" class="form-control">

                                        <label for="name">الاسم</label>
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col mb-4 mt-2">
                                    <input type="checkbox" id="block" class="form-check-input" name="block">
                                    <label for="block">ضرورى للاستمرار</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-4 mt-2">
                                    <input type="checkbox" id="hide" class="form-check-input" name="hide">
                                    <label for="hide">اخفاء</label>
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary"
                                data-bs-dismiss="modal">الغاء</button>
                            <button type="submit" class="btn btn-primary">حفظ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>




        <!-- Modal -->
        <div class="modal fade" id="addGradeModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="POST" action="<?php echo e(route('store.lessonsection')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" value ="" name="grade_id" id="section-id">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel1">اضافة وحدة</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">


                            <div class="row">
                                <div class="col mb-4 mt-2">
                                    <div class="form-floating form-floating-outline">
                                        <input type="text" name="name" class="form-control">

                                        <label for="name">الاسم</label>
                                    </div>
                                </div>
                            </div>

                            <input type="checkbox" class="form-check-input" name="hide">
                            <label for="hide">اخفاء</label>


                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary"
                                data-bs-dismiss="modal">الغاء</button>
                            <button type="submit" class="btn btn-primary">حفظ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>





    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('js'); ?>


        <script src="<?php echo e(asset('admin/assets/vendor/libs/jstree/jstree.js')); ?>"></script>

        <script src="<?php echo e(asset('admin/assets/js/extended-ui-treeview.js')); ?>"></script>

        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

        <script>


          $(function() {
        $("#sortable-cards").sortable({
            axis: "y", // Allow vertical sorting only
            update: function(event, ui) {
                $(this).children().each(function(index) {
                    $(this).attr('data-priority', index + 1);
                });

                // Send the updated order to the server using an AJAX request
                updateCardPriorities();
            }
        });
        $("#sortable-cards").disableSelection();
    });

    function updateCardPriorities() {
        var priorities = [];
        $("#sortable-cards .card").each(function() {
            priorities.push({
                id: $(this).attr('sort-section-id'),
                priority: $(this).attr('data-priority')
            });
        });

        // Send an AJAX request to update the priorities in the database
        $.ajax({
            url: "<?php echo e(route('update.order')); ?>", // Adjust the route to your Laravel route
            type: 'POST',
            data: {
                _token: '<?php echo e(csrf_token()); ?>',
                priorities: priorities
            },
            success: function(response) {

                    Toastify({
                        text: "تم تغيير الترتيب بنجاح",
                        duration: 3000,  // Display duration in milliseconds
                        gravity: "top",  // Position of the toast
                        close: true  // Show close button
                    }).showToast();

            },
            error: function(error) {
                console.error('Error updating card priorities:', error);
            }
        });
    }

            $(document).on('click', 'span[grade-id]', function() {
                var gradeId = $(this).attr('grade-id');
                if (gradeId) {
                    window.location.href = '/admin/units/' + gradeId;
                }
            });

            $(document).on('click', 'span[unit-id]', function() {
                var unitId = $(this).attr('unit-id');
                if (unitId) {
                    window.location.href = '/admin/lessons/' + unitId;
                }
            });

            $(document).on('click', 'span[lesson-id]', function() {
                var lessonId = $(this).attr('lesson-id');
                if (lessonId) {
                    window.location.href = '/admin/lessonsections/' + lessonId;
                }
            });



            $('.edit-section').click(function() {

                var sectionId = $(this).data('section-id');

                $.ajax({
                    url: '/admin/lessonsections/edit/' + sectionId,
                    method: 'GET',
                    success: function(data) {
                        // Step 4: Populate modal inputs with fetched data
                        $('#name').val(data.name);
                        $('#section-id').val(sectionId);
                        $('#hide').prop('checked', data.hide);
                        $('#block').prop('checked', data.block);
                        // Step 5: Open the modal
                        $('#editGradeModal').modal('show');
                    }
                });
            });


        </script>

        <script src="<?php echo e(asset('admin/assets/vendor/libs/sortablejs/sortable.js')); ?>"></script>


        <script src="<?php echo e(asset('admin/assets/js/extended-ui-drag-and-drop.js')); ?>"></script>


        <script src="<?php echo e(asset('admin/assets/js/cards-statistics.js')); ?>"></script>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.new-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Web-Development\Khairy\Khairy\resources\views/admin/new/lessonsections.blade.php ENDPATH**/ ?>