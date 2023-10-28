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

<div class="row g-4 mb-4">

    <div class="col-sm-6 col-xl-12">
        <div class="card">
          <div class="card-body " style="display: flex; justify-content: space-between; align-items: center;">
    <h4><?php echo e($lessonsection->name); ?></h4>

          </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-12">
            <div class="card">
                <div class="card-body d-flex justify-content-center align-items-center">

              <?php
                $totalPoints = $data->pluck('studentexamanswers')->flatten()->sum('points');
            ?>

                <h3  style="color:rgb(11, 109, 255); border-radius:30%; border:solid green 3px;padding:50px">
                    لقد حصل الطالب على <?php echo e($totalPoints); ?> من <?php echo e($data->sum('points')); ?> </h3>

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





         <?php if($exam->choose_type == 1): ?>
         <div class="col-md-10">
           <div class="form-group row">



             <div class="col-sm-7">
               <div class="form-check">
                 <label  class=" form-check-label" <?php if($exam->right_answer == "choose1"): ?> style="border-radius:60%; border:solid <?php if(count($exam->studentexamanswers) > 0 && $exam->right_answer == $exam->studentexamanswers[0]->student_answer): ?> green <?php else: ?> red <?php endif; ?> 3px;padding:12px" <?php endif; ?>>

                   <input type="radio" class="form-check-input"  value="choose1" <?php if(count($exam->studentexamanswers) > 0 && $exam->studentexamanswers[0]->student_answer == 'choose1'): ?> checked active <?php else: ?> disabled <?php endif; ?> disabled> <?php echo e($exam->choose1); ?></label>


                 </div>
             </div>
             <div class="col-sm-4">
               <div class="form-check">
                 <label class="form-check-label" <?php if($exam->right_answer == "choose2"): ?> style="border-radius:60%; border:solid <?php if(count($exam->studentexamanswers) > 0 && $exam->right_answer == $exam->studentexamanswers[0]->student_answer): ?> green <?php else: ?> red <?php endif; ?> 3px;padding:12px" <?php endif; ?>>
                   <input type="radio" class="form-check-input"  value="choose2" <?php if(count($exam->studentexamanswers) > 0 && $exam->studentexamanswers[0]->student_answer == 'choose2'): ?> checked active <?php else: ?> disabled <?php endif; ?> disabled> <?php echo e($exam->choose2); ?> </label>
               </div>
             </div>


             <div class="col-sm-7">
               <div class="form-check">
                 <label class="form-check-label" <?php if($exam->right_answer == "choose3"): ?> style="border-radius:60%; border:solid <?php if(count($exam->studentexamanswers) > 0 && $exam->right_answer == $exam->studentexamanswers[0]->student_answer): ?> green <?php else: ?> red <?php endif; ?> 3px;padding:12px" <?php endif; ?>>
                   <input type="radio" class="form-check-input" value="choose3" <?php if(count($exam->studentexamanswers) > 0 && $exam->studentexamanswers[0]->student_answer == 'choose3'): ?> checked active <?php else: ?> disabled <?php endif; ?> disabled> <?php echo e($exam->choose3); ?>   </label>


                 </div>
             </div>
             <div class="col-sm-4">
               <div class="form-check">
                 <label class="form-check-label" <?php if($exam->right_answer == "choose4"): ?> style="border-radius:60%; border:solid <?php if(count($exam->studentexamanswers) > 0 && $exam->right_answer == $exam->studentexamanswers[0]->student_answer): ?> green <?php else: ?> red <?php endif; ?> 3px;padding:12px" <?php endif; ?>>
                   <input type="radio" class="form-check-input"  value="choose4" <?php if(count($exam->studentexamanswers) > 0 && $exam->studentexamanswers[0]->student_answer == 'choose4'): ?> checked active <?php else: ?> disabled <?php endif; ?> disabled> <?php echo e($exam->choose4); ?> </label>
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
             <label class="form-check-label" >


               <input type="radio" class="form-check-input" <?php if(count($exam->studentexamanswers) > 0 && $exam->studentexamanswers[0]->student_answer == 'choose1'): ?> checked active <?php else: ?> disabled <?php endif; ?> disabled> أ  </label>


               <div class="col-md-4" >
                 <img src="<?php echo e($exam->choose1); ?>" width="200px" height="100px"  <?php if($exam->right_answer == "choose1"): ?> style="border-radius:60%; border:solid <?php if(count($exam->studentexamanswers) > 0 && $exam->right_answer == $exam->studentexamanswers[0]->student_answer): ?> green <?php else: ?> red <?php endif; ?> 3px;padding:12px" <?php endif; ?> >
               </div>

             </div>
         </div>
         <div class="col-sm-4">
           <div class="form-check">
             <label class="form-check-label" >
               <input type="radio" class="form-check-input" <?php if(count($exam->studentexamanswers) > 0 && $exam->studentexamanswers[0]->student_answer == 'choose2'): ?> checked active <?php else: ?> disabled <?php endif; ?> disabled > ب   </label>
               <div class="col-md-4">
                 <img src="<?php echo e($exam->choose2); ?>"  width="200px" height="100px" <?php if($exam->right_answer == "choose2"): ?> style="border-radius:60%; border:solid <?php if(count($exam->studentexamanswers) > 0 && $exam->right_answer == $exam->studentexamanswers[0]->student_answer): ?> green <?php else: ?> red <?php endif; ?> 3px;padding:12px" <?php endif; ?>>
               </div>

           </div>
         </div>


         <div class="col-sm-7">
           <div class="form-check">
             <label class="form-check-label">
               <input type="radio" class="form-check-input" <?php if(count($exam->studentexamanswers) > 0 && $exam->studentexamanswers[0]->student_answer == 'choose3'): ?> checked active <?php else: ?> disabled <?php endif; ?> disabled> ج </label>
               <div class="col-md-4">
                 <img src="<?php echo e($exam->choose3); ?>" width="200px" height="100px" <?php if($exam->right_answer == "choose3"): ?> style="border-radius:60%; border:solid <?php if(count($exam->studentexamanswers) > 0 && $exam->right_answer == $exam->studentexamanswers[0]->student_answer): ?> green <?php else: ?> red <?php endif; ?> 3px;padding:12px" <?php endif; ?>>
               </div>

             </div>
         </div>
         <div class="col-sm-4">
           <div class="form-check">
             <label class="form-check-label" >
               <input type="radio" class="form-check-input" <?php if(count($exam->studentexamanswers) > 0 && $exam->studentexamanswers[0]->student_answer == 'choose4'): ?> checked active <?php else: ?> disabled <?php endif; ?>  disabled> د  </label>

               <div class="col-md-4">
                 <img src="<?php echo e($exam->choose1); ?>"  width="200px" height="100px"  <?php if($exam->right_answer == "choose4"): ?> style="border-radius:60%; border:solid <?php if(count($exam->studentexamanswers) > 0 && $exam->right_answer == $exam->studentexamanswers[0]->student_answer): ?> green <?php else: ?> red <?php endif; ?> 3px;padding:12px" <?php endif; ?>>
               </div>

           </div>
         </div>
       </div>
     </div>


     <?php endif; ?>


      </div>
  </div>
</div>

<br>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


</div>



<div class="modal fade" id="copy-question" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="<?php echo e(route('move.exam')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel1">نسخ السؤال</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <!-- Select Grade -->
                        <select id="grades" class="form-select">
                            <option value="">اختر الكورس</option>
                            <?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($grade->id); ?>"><?php echo e($grade->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                        <!-- Select Unit (Initially hidden) -->
                        <div id="unitDiv" style="display:none;">
                            <br>
                            <select id="units" class="form-select"></select>
                        </div>

                        <!-- Select Lesson (Initially hidden) -->
                        <div id="lessonDiv" style="display:none;">
                            <br>
                            <select id="lessons" class="form-select"></select>
                        </div>

                        <!-- Select Lesson Section (Initially hidden) -->
                        <div id="lessonSectionDiv" style="display:none;">
                            <br>
                            <select id="lessonSections" name="section_id" class="form-select"></select>
                        </div>




                        </div>
                        <br>

                <div class="modal-footer">
                    <button type="button" class="btn rounded-pill btn-label-secondary waves-effect"
                        data-bs-dismiss="modal">الغاء</button>

                        <div id="submitButtonDiv" style="display:none;">
                        <button type="submit" id="submitButton"
                        class="btn rounded-pill btn-label-success waves-effect">حفظ</button>
                        </div>
                </div>
            </form>
        </div>
    </div>
</div>









<?php if(Session::has('target')): ?>

    <script>
         window.open('/admin/exams/<?php echo e(Session::get('target')); ?>', '_blank');
    </script>
<?php endif; ?>



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


    $(document).ready(function() {
        $(".text-input").hide();
        $(".text-input-2").hide();
      $("#defaultCheck1").change(function() {
        if(this.checked) {
          $(".image-input").hide();
          $(".text-input").show();
          $("#qtype").val(1);
        } else {
          $(".text-input").hide();
          $(".image-input").show();
          $("#qtype").val(2);
        }
      });


      $("#defaultCheck2").change(function() {
        if(this.checked) {
          $(".image-input-2").hide();
          $(".text-input-2").show();
          $("#ctype").val(1);
        } else {
          $(".text-input-2").hide();
          $(".image-input-2").show();
          $("#ctype").val(2);
        }
      });


    });

    $(document).ready(function() {
        $('#grades').change(function() {
            var gradeId = $(this).val();

            if(gradeId) {
                // Make an AJAX request to fetch units for the selected grade
                $.ajax({
                    url: '/admin/getUnits/' + gradeId,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        if(data) {
                            $('#unitDiv').show();
                            $('#units').empty();
                            $('#units').append('<option value="">اختر الوحدة</option>');
                            $.each(data, function(key, value) {
                                $('#units').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                        } else {
                            $('#unitDiv').hide();
                            $('#lessonDiv').hide();
                            $('#lessonSectionDiv').hide();
                            $('#submitButtonDiv').hide();
                        }
                    }
                });
            } else {
                $('#unitDiv').hide();
                $('#lessonDiv').hide();
                $('#lessonSectionDiv').hide();
                $('#submitButtonDiv').hide();
            }
        });

        $('#units').change(function() {
            var unitId = $(this).val();

            if(unitId) {
                // Make an AJAX request to fetch lessons for the selected unit
                $.ajax({
                    url: '/admin/getLessons/' + unitId,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        if(data) {
                            $('#lessonDiv').show();
                            $('#lessons').empty();
                            $('#lessons').append('<option value="">اختر الدرس</option>');
                            $.each(data, function(key, value) {
                                $('#lessons').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                        } else {
                            $('#lessonDiv').hide();
                            $('#lessonSectionDiv').hide();
                            $('#submitButtonDiv').hide();
                        }
                    }
                });
            } else {
                $('#lessonDiv').hide();
                $('#lessonSectionDiv').hide();
                $('#submitButtonDiv').hide();
            }
        });

        $('#lessons').change(function() {
            var lessonId = $(this).val();

            if(lessonId) {
                // Make an AJAX request to fetch lesson sections for the selected lesson
                $.ajax({
                    url: '/admin/getLessonSections/' + lessonId,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        if(data) {
                            $('#lessonSectionDiv').show();
                            $('#lessonSections').empty();
                            $('#lessonSections').append('<option value="">اختر الامتحان</option>');
                            $.each(data, function(key, value) {
                                $('#lessonSections').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                        } else {
                            $('#lessonSectionDiv').hide();
                            $('#submitButtonDiv').hide();
                        }
                    }
                });
            } else {
                $('#lessonSectionDiv').hide();
                $('#submitButtonDiv').hide();
            }
        });

        $('#lessonSections').change(function() {
            $('#submitButtonDiv').show();
        });

        $('.copy-questiona').click(function(){
            var examId = $(this).data('question-id');
            $('<input>').attr({
                type: 'hidden',
                name: 'exam_id',
                value: examId
            }).appendTo('#lessonSectionDiv');

        });

    });


</script>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.new-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Web-Development\Khairy\Khairy\resources\views/admin/new/studentAnswer.blade.php ENDPATH**/ ?>