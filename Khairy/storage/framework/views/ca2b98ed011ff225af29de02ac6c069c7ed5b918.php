<?php $__env->startSection('css'); ?>

<link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/libs/jstree/jstree.css')); ?>" />

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


    <div class="col-sm-6 col-xl-12">
        <div class="card">
          <div class="card-body " style="display: flex; justify-content: space-between; align-items: center;">
    <h4><?php echo e($lessonsection->name); ?></h4>

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

                        <span  grade-id = "<?php echo e($grade->id); ?>">  <?php echo e($grade->name); ?> </span>

                          <ul>

                          <?php $__currentLoopData = $grade->units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <li data-jstree='{"icon" : "mdi mdi-folder-outline"}' >
                             <span unit-id = "<?php echo e($unit->id); ?>"> <?php echo e($unit->name); ?></span>
                              <ul>


                                <?php $__currentLoopData = $unit->lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li data-jstree='{"icon" : "mdi mdi-folder-outline"}' >
                                <span lesson-id = "<?php echo e($lesson->id); ?>"> <?php echo e($lesson->name); ?> </span>
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

<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <div class="card">
      <div class="card-body">

        <div class="row">


            <?php if($exam->question_type == 1): ?>
            <h3> <?php echo e($exam->question); ?></h3>
            <?php endif; ?>

            <?php if($exam->question_type == 2): ?>

             <img  src="<?php echo e($exam->question); ?>"  style=" width: 100%; height: auto;">

            <?php endif; ?>

           <center> <span class="mdi mdi-48px mdi-arrow-down-circle-outline"></span></center>

           <div class="accordion" id="collapsibleSection">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingDeliveryOptions1">
                  <button type="button" class="accordion-button " data-bs-toggle="collapse" data-bs-target="#collapseDeliveryOptions1" aria-expanded="false" aria-controls="collapseDeliveryOptions1"><b> اجابة الطالب </b></button>
                </h2>
                <div id="collapseDeliveryOptions1" class="accordion-collapse collapse show" aria-labelledby="headingDeliveryOptions1" data-bs-parent="#collapsibleSection">
                  <div class="accordion-body">
                    <div class="row">

                        <?php if(count($exam->studentexamanswers) > 0 &&!empty($exam->studentexamanswers[0]->student_answer)): ?>

                        <h3> <?php echo e($exam->studentexamanswers[0]->student_answer); ?></h3>
                          <?php endif; ?>


                      <?php if(count($exam->studentexamanswers) > 0 && !empty($exam->studentexamanswers[0]->student_answer_picture)): ?>


                     <img  src="<?php echo e($exam->studentexamanswers[0]->student_answer_picture); ?>" style=" width: 100%; height: auto;">
                     <?php endif; ?>

                    </div>
                  </div>
                </div>
              </div>
        </div>

        <div class="accordion" id="collapsibleSection">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingDeliveryOptions">
                  <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseDeliveryOptions" aria-expanded="false" aria-controls="collapseDeliveryOptions"> <b>تصحيح الاجابة </b></button>
                </h2>
                <div id="collapseDeliveryOptions" class="accordion-collapse collapse" aria-labelledby="headingDeliveryOptions" data-bs-parent="#collapsibleSection">
                  <div class="accordion-body">
                    <div class="row">



                        <div class="row g-0" id="displayI">
                            <label for="roundedInput" class="form-label">الشرح بصورة</label>
                                <div class="col-md-4" style="display: flex;  justify-content: center; align-items: center;">
                              <?php if(count($exam->studentexamanswers) > 0 &&!empty($exam->studentexamanswers[0]->right_answer_pic)): ?>
                                 <img  id="image"  src="<?php echo e($exam->studentexamanswers[0]->right_answer_pic); ?>" alt="Card image" style="max-width: 100%;">

                              <?php endif; ?>
                             </div>
                                <div class="col-md-8">
                                  <div class="card-body">
                                    <input class="form-control"  name = "image" type="file" id="formFile">

                                </div>
                                </div>
                              </div>

                              <div class="mt-2" id = "formFile">
                                <label for="roundedInput" class="form-label">الشرح بنص</label>
                                <input id="roundedInput" class="form-control rounded-pill" value="<?php echo e(count($exam->studentexamanswers) > 0 && !empty($exam->studentexamanswers[0]->right_answer) ? $exam->studentexamanswers[0]->right_answer : ''); ?>  " name ="points" type="number"  />
                              </div>

                              <div class="mt-2">
                                <label for="roundedInput" class="form-label">درجة السؤال</label>
                                <input id="roundedInput" class="form-control rounded-pill" value="<?php echo e($exam->points); ?>" name ="points" type="number"  />
                              </div>


                    </div>
                  </div>
                </div>
              </div>
        </div>


      </div>
  </div>
</div>

<br>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


</div>












<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>


<script src="<?php echo e(asset('admin/assets/vendor/libs/jstree/jstree.js')); ?>"></script>

<script src="<?php echo e(asset('admin/assets/js/extended-ui-treeview.js')); ?>"></script>


<script>


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







</script>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.new-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Web-Development\Khairy\Khairy\resources\views/admin/new/studentTextAnswer.blade.php ENDPATH**/ ?>