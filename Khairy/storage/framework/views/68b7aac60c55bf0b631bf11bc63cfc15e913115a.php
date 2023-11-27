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
    <h4> الطلاب <?php echo e($lessonsection->section_type != 5 ? 'المجاوبين على الامتحان': 'المشاهدين ل'); ?> (<?php echo e($lessonsection->name); ?>)</h4>


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
    <div class="card">
      <div class="card-body">


        <div class="card-datatable table-responsive">
            <table class="datatables-users table">
              <thead class="table-light">
                <tr>

                    <th>اسم الطالب</th>
                    <?php if($lessonsection->section_type != 5): ?>
                    <th>درجة الطالب</th>
                    <?php endif; ?>
                    <th>جميع درجات الطالب</th>
                    <th>المزيد</th>

                </tr>
              </thead>

                      <tbody>
                          <?php $__currentLoopData = $content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                          <tr>

                            <td><a href="<?php echo e(url('admin/students/0/0/'.$data->student->name)); ?>"> <?php echo e($data->student->name); ?> </a></td>
                            <?php if($lessonsection->section_type == 1): ?>
                            <td><a href="<?php echo e(url('admin/lcheckanswers/'.$data->student->id.'/'. $lessonsection->id)); ?>" > <?php echo e($data->studentanswer->where('student_id', $data->student->id)->sum('points')); ?> / <?php echo e($data->exam->sum('points')); ?> </a></td>
                            <?php elseif($lessonsection->section_type == 3): ?>
                           <td><a href="<?php echo e(url('admin/ltextcheckanswers/'.$data->student->id.'/'. $lessonsection->id)); ?>" >  <?php if($data->done == 0): ?>  لم يتم تصحيح الامتحان  <?php else: ?> <?php echo e($data->studentanswer->where('student_id', $data->student->id)->sum('points')); ?> / <?php echo e($data->exam->sum('points')); ?> <?php endif; ?> </a></td>
                            <?php elseif($lessonsection->section_type == 4): ?>
                            <td><a href="<?php echo e(url('admin/lpdfexamcheckanswers/'.$data->student->id.'/'. $lessonsection->id)); ?>" > <?php if($data->done == 0): ?>  لم يتم تصحيح الامتحان  <?php else: ?>  <?php echo e($data->studentanswer->where('student_id', $data->student->id)->sum('points')); ?> / <?php echo e($data->exam->sum('points')); ?> <?php endif; ?></a></td>
                            <?php endif; ?>
                            <td><a href="<?php echo e(url('admin/studentresults/'.$data->student->id)); ?>" class="btn rounded-pill btn-label-info waves-effect"> جميع درجات الطالب</a></td>


                          <td>
                            <div class="dropdown">
                              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
                              <div class="dropdown-menu">

                                <a href="<?php echo e(url('admin/student/edit/'.$data->student->id)); ?>" class="btn rounded-pill btn-label-info waves-effect">تعديل الطالب</a>

                                <?php if($lessonsection->section_type != 5): ?>
                               <a href="<?php echo e(url('/lessonresult/delete/'.$lessonsection->id.'/'.$data->student->id)); ?>" onclick="return confirm('هل انت متأكد من رغبتك فى مسح هذا الطالب نهائيا?')" class="btn btn-danger">مسح اجابة الطالب<i class="fa fa-trash"></i></a>
                               <?php endif; ?>

                              </div>
                            </div>
                          </td>



                          </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                       </tbody>
            </table>
            <br>
            <center>
                  <nav aria-label="Page navigation">
                    <ul class="pagination pagination-outline-primary">
                        <?php echo $content -> links(); ?>

                    </ul>
                    </nav>
                </center>

          </div>


  </div>
</div>
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



        $('.edit-grade').click(function() {

            var gradeId = $(this).data('grade-id');

            $.ajax({
                url: '/admin/grades/edit/' + gradeId,
                method: 'GET',
                success: function(data) {
                    // Step 4: Populate modal inputs with fetched data
                    $('#name').val(data.name);
                    $('#grade-id').val(gradeId);
                    if (data.image) {
                        $('#image').attr("src", data.image);
                    } else {
                        $('#image').attr("src", "<?php echo e(asset('admin/assets/img/smallfolder.png')); ?>");
                    }
                   $('#hide').prop('checked', data.hide);

                    // Step 5: Open the modal
                    $('#editGradeModal').modal('show');
                }
            });
        });


    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.new-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Web-Development\Khairy\Khairy\resources\views/admin/new/viewed.blade.php ENDPATH**/ ?>