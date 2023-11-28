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



<div class="card g-3 mt-5">
    <div class="card-body row g-3">
      <div class="col-lg-8">
        <div class="d-flex justify-content-between align-items-center flex-wrap mb-2 gap-1">
          <div class="me-1">
            <h5 class="mb-1"><?php echo e($lesson->name); ?></h5>

          </div>
          <div class="d-flex align-items-center">
            <span class="badge bg-label-success rounded-pill"><?php echo e($lesson->unit->name); ?></span>

            <i class='mdi mdi-bookmark-multiple-outline mdi-24px'></i>
          </div>
        </div>
        <div class="card academy-content shadow-none border">
          <div class="p-2">
            <div class="cursor-pointer">
                <img class="img-fluid" src="<?php echo e($lesson->image ? $lesson->image : asset('admin/assets/img/pages/app-academy-tutor-1.png')); ?>" alt="tutor image 1" />   </div>
          </div>
          <div class="card-body">
            <h5>تفاصيل</h5>
            <div class="d-flex flex-wrap">
              <div class="me-5">
                <p class="text-nowrap"><i class='mdi mdi-check-all mdi-24px me-2'></i>الدرس: <?php echo e($lesson->name); ?></p>
                <p class="text-nowrap"><i class='mdi mdi-book-outline mdi-24px me-2'></i>الوحدة <?php echo e($lesson->unit->name); ?></p>
                <p class="text-nowrap"><i class='mdi mdi-web mdi-24px me-2'></i>المادة: <?php echo e($lesson->unit->grade->name); ?></p>

              </div>
              <div>
                <p class="text-nowrap"><i class='mdi mdi-pencil-outline mdi-24px me-2'></i>اجزاء الشرح : <?php echo e($lesson->userLessonsections->count()); ?></p>

              </div>
            </div>
            <hr class="mb-4 mt-2">
            <h5>وصف</h5>
            <p class="mb-4">
       <?php echo e($lesson->description); ?>

            </p>
            <hr class="my-4">
            <h5>المدرس :</h5>
            <div class="d-flex justify-content-start align-items-center user-name">
              <div class="avatar-wrapper">
                <div class="avatar avatar-sm me-2"><img src="<?php echo e(asset('assets/images/faces/face8.jpg')); ?>" alt="Avatar" class="rounded-circle"></div>
              </div>
              <div class="d-flex flex-column">
                <h6 class="mb-0">استاذ محمد خيرى</h6>
                <small>استاذ الريضيات</small>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="accordion stick-top" id="courseContent">
          <div class="accordion-item shadow-none border border-bottom-0 active my-0 overflow-hidden">
            <div class="accordion-header border-0" id="headingOne">
              <button type="button" class="accordion-button bg-lighter rounded-0" data-bs-toggle="collapse" data-bs-target="#chapterOne" aria-expanded="true" aria-controls="chapterOne">
                <span class="d-flex flex-column">
                  <span class="h5 mb-1">محتوى الدرس</span>
                  <span class="text-body fw-normal"><?php echo e($lesson->userLessonsections->count()); ?> جزء</span>
                </span>
              </button>
            </div>
            <div id="chapterOne" class="accordion-collapse collapse show" data-bs-parent="#courseContent">
              <div class="accordion-body py-3 border-top">

                <?php $__currentLoopData = $lesson->userLessonsections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <a class="form-check d-flex align-items-center mb-3" href="

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
                    <i class='mdi mdi-check-circle-outline mdi-24px me-2'></i>
                    <?php else: ?>
                    <i class='mdi mdi-circle-outline mdi-24px me-2'></i>
                    <?php endif; ?>
                    <label for="defaultCheck1" class="form-check-label ms-3">
                        <span class="mb-0 h6"><?php echo e($section->name); ?> </span>
                        <span class="text-body d-block">


                        <?php if($section->section_type == 1): ?>
                            امتحان الاختيار من متعدد
                        <?php endif; ?>


                        <?php if($section->section_type == 3): ?>
                            امتحان الاجابة المقالية
                        <?php endif; ?>

                        <?php if($section->section_type == 4): ?>
                            امتحان يتم الاجابة عنه برفع ملف
                        <?php endif; ?>

                        <?php if($section->section_type == 5): ?>
                        <?php echo e($section->lecture && $section->lecture->type == 1 ?'صورة' : ''); ?>

                        <?php echo e($section->lecture && $section->lecture->type == 2 ?'ملف' : ''); ?>

                        <?php echo e($section->lecture && $section->lecture->type == 3 ?'فديو' : ''); ?>

                        <?php echo e(!$section->lecture || $section->lecture->type == Null ?'صورة او فديو او ملف' : ''); ?>

                        <?php endif; ?>


                        </span>
                    </label>

                </a>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>


    <script src="<?php echo e(asset('admin/assets/vendor/libs/jstree/jstree.js')); ?>"></script>

    <script src="<?php echo e(asset('admin/assets/js/extended-ui-treeview.js')); ?>"></script>


    <script></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('student.layouts.new-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Web-Development\Khairy\Khairy\resources\views/student/new/lesson.blade.php ENDPATH**/ ?>