<?php $__env->startSection('css'); ?>
<style>
.card-datatable {
    position: relative;
}

.card-datatable table {
    width: 100%;
}

.pagination {
    display: flex;
    justify-content: center;
    margin-top: 20px; /* Adjust this value as needed */
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<div class="row g-4 mb-4">
    <div class="col-sm-6 col-xl-6">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div class="me-1">
              <p class="text-heading mb-2">العدد الاجمالى للمستخدمين</p>
              <div class="d-flex align-items-center">
                <h4 class="mb-2 me-1 display-6"><?php echo e($totalUsers); ?></h4>

              </div>

            </div>
            <div class="avatar">
              <div class="avatar-initial bg-label-primary rounded">
                <div class="mdi mdi-account-outline mdi-24px"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-6">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div class="me-1">
              <p class="text-heading mb-2">عدد المستخدمين الفعالين</p>
              <div class="d-flex align-items-center">
                <h4 class="mb-2 me-1 display-6"><?php echo e($activeUsers); ?></h4>

              </div>

            </div>
            <div class="avatar">
              <div class="avatar-initial bg-label-success rounded">
                <div class="mdi mdi-account-check-outline mdi-24px scaleX-n1"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



  </div>
  <!-- Users List Table -->
  <div class="card">
    <div class="card-header border-bottom">
      <h5 class="card-title">البحث</h5>
      <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">

        <div class="col-sm-6 col-xl-3">
            <input type="text" class="form-control search" id="basic-default-name" placeholder="رقم الهاتف او اسم الطالب" <?php if(isset($search) && !empty($search)): ?> value="<?php echo e($search); ?>" <?php endif; ?>/>
            </div>

        <div class="col-sm-6 col-xl-3">
        <select id="defaultSelect" class="form-select gradeFilter">
            <option value="0" <?php if($gradeFilter == 0): ?> selected <?php endif; ?>>كل الكورسات</option>
            <?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($grade->id); ?>" <?php if($gradeFilter == $grade->id): ?> selected <?php endif; ?>><?php echo e($grade->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>

        <div class="col-sm-6 col-xl-3">
            <select id="defaultSelect" class="form-select activeFilter">
                <option value="0"  <?php if($activeFilter == 0): ?> selected <?php endif; ?>>كل الطلاب</option>
                <option value= "1" <?php if($activeFilter == 1): ?> selected <?php endif; ?>>مشترك حالى</option>
                <option value="2" <?php if($activeFilter == 2): ?> selected <?php endif; ?>>غير مشترك</option>
              </select>
            </div>


      </div>
    </div>
    <div class="card-datatable table-responsive">
      <table class="datatables-users table">
        <thead class="table-light">
          <tr>

            <th>الرقم</th>
            <th>الاسم</th>
            <th>رقم الهاتف</th>
            <th>انتهاء الاشتراك</th>
            <th>خيارات</th>

          </tr>
        </thead>

                <tbody>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                    <tr>
                      <td><?php echo e($dat->id); ?></td>
                      <td><a href="<?php echo e(url('admin/studentresults/'.$dat->id)); ?>"> <?php echo e($dat->name); ?> </a> </td>
                      <td><?php echo e($dat->phone_number); ?></td>
                      <td><?php echo e($dat->subscription_end_date != null ? $dat->subscription_end_date : 'لا يوجد'); ?></td>

                    <td>
                      <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
                        <div class="dropdown-menu">

                          <a href="<?php echo e(url('admin/students/edit/'.$dat -> id)); ?>" class="btn rounded-pill btn-label-info waves-effect">تعديل</a>

                          <a href="<?php echo e(url('admin/allowlogin/'.$dat -> id)); ?>" class="btn rounded-pill btn-label-secondary waves-effect">السماح بتسجيل الدخول</a>

                          <a href="<?php echo e(url('admin/newmonth/'.$dat -> id)); ?>" class="btn rounded-pill btn-label-success waves-effect">تجديد الاشتراك</a>

                          <a href="<?php echo e(url('admin/deletestudent/'.$dat -> id)); ?>" onclick="return confirm('هل انت متأكد من رغبتك فى مسح هذا الطالب نهائيا?')" class="btn btn-danger">مسح الطالب<i class="fa fa-trash"></i></a>


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
                  <?php echo $data -> links(); ?>

              </ul>
              </nav>
          </center>

    </div>

  </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<script src="<?php echo e(asset('admin/assets/js/app-user-list.js')); ?>"></script>
<script>
$('.gradeFilter').change(function() {
    location.href = '/admin/students/' + $('.activeFilter').val() + '/' + $('.gradeFilter').val() ;
});

$('.activeFilter').change(function() {
    location.href = '/admin/students/'  + $('.activeFilter').val() + '/' + $('.gradeFilter').val() ;
});

$('.search').keypress(function(e) {
        if(e.which == 13) { // Check if the "Enter" key is pressed
        location.href = '/admin/students/'  + '0/0' + '/' + $('.search').val() ;
        }
    });


</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.new-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Web-Development\Khairy\Khairy\resources\views/admin/new/students.blade.php ENDPATH**/ ?>