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
    <h4>الكورسات</h4>

      <button type="button" class="custom-btn" data-bs-toggle="modal" data-bs-target="#addGradeModal">اضافة كورس</button>

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

        <div class="row">



        <?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-sm-3 col-xl-6">
        <div class="card mb-4">
            <div class="card-header pb-1">
                <div class="d-flex justify-content-between">
                  <div class="dropdown">
                    <button class="btn p-0" type="button" id="organicSessionsDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="mdi mdi-dots-vertical mdi-24px"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="organicSessionsDropdown">
                      <a class="dropdown-item edit-grade" data-grade-id="<?php echo e($grade->id); ?>" href="javascript:void(0);">تعديل</a>

                    </div>
                  </div>
                </div>
              </div>

            <div class="card-body">
              <p class="card-text">

     <a href="/admin/units/<?php echo e($grade->id); ?>"> <img src="<?php echo e(asset('admin/assets/img/folder.png')); ?>" alt="" class="mx-auto d-block" >

     <center> <h5 class="mb-1"><?php echo e($grade->name); ?></h5> <?php if($grade->hide == 1): ?> <i class="mdi mdi-eye-off-outline"></i>

        <?php endif; ?></center>

    </a>
            </p>
            </div>
          </div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

      </div>
  </div>
</div>
</div>


<!-- Modal -->
<div class="modal fade"  id="editGradeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form method="POST" action="<?php echo e(route('update.grade')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="id" value ="" id="grade-id">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel1">تعديل كورس</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">


          <div class="row">
            <div class="col mb-4 mt-2">
              <div class="form-floating form-floating-outline">
                  <input type="text" id="name" name="name" class="form-control" >

                <label for="name">الاسم</label>
              </div>
            </div>
        </div>

        <div class="row">
            <div class="col mb-4 mt-2">
            <div class="form-floating form-floating-outline">


                <div class="col-md">
                    <div class="card mb-3">
                      <div class="row g-0">
                        <div class="col-md-4" style="display: flex;  justify-content: center; align-items: center;">
                          <img  id="image"  src="" alt="Card image" style="max-width: 100%;">
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <input class="form-control"  name = "image" type="file" id="formFile">

                        </div>
                        </div>
                      </div>
                    </div>
                  </div>


           </div>
        </div>
    </div>

           <input type="checkbox" id="hide" class="form-check-input"  name="hide">
              <label for="hide">اخفاء</label>


          </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">الغاء</button>
          <button type="submit" class="btn btn-primary">حفظ</button>
        </div>
    </form>
      </div>
    </div>
  </div>




<!-- Modal -->
<div class="modal fade"  id="addGradeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form method="POST" action="<?php echo e(route('store.grade')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="id" value ="" id="grade-id">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel1">اضافة كورس</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">


          <div class="row">
            <div class="col mb-4 mt-2">
              <div class="form-floating form-floating-outline">
                  <input type="text" name="name" class="form-control" >

                <label for="name">الاسم</label>
              </div>
            </div>
        </div>

        <div class="row">
            <div class="col mb-4 mt-2">
            <div class="form-floating form-floating-outline">


                <div class="col-md">
                    <div class="card mb-3">
                      <div class="row g-0">

                        <div class="col-md-12">
                          <div class="card-body">
                            <input class="form-control"  name = "image" type="file" id="formFile">

                        </div>
                        </div>
                      </div>
                    </div>
                  </div>


           </div>
        </div>
    </div>

           <input type="checkbox" class="form-check-input"  name="hide">
              <label for="hide">اخفاء</label>


          </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">الغاء</button>
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

<?php echo $__env->make('admin.layouts.new-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Web-Development\Khairy\Khairy\resources\views/admin/new/grades.blade.php ENDPATH**/ ?>