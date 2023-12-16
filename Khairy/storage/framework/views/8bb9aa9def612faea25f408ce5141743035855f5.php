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
        <div class="row">
            <div class="col-sm-3 col-xl-9">
      <h5 class="card-title">البحث</h5>
            </div>
            <div class="col-sm-3 col-xl-3">
      <button type="button" class="btn rounded-pill btn-label-secondary waves-effect" data-bs-toggle="modal" data-bs-target="#basicModal">
        تسجيل طالب جديد
      </button>
            </div>
    </div>
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

                          <a href="<?php echo e(url('admin/student/edit/'.$dat -> id)); ?>" class="btn rounded-pill btn-label-info waves-effect">تعديل</a>

                          <a href="<?php echo e(url('admin/allowlogin/'.$dat -> id)); ?>" class="btn rounded-pill btn-label-secondary waves-effect">السماح بتسجيل الدخول</a>

                          <a href="<?php echo e(url('admin/newmonth/'.$dat -> id)); ?>" class="btn rounded-pill btn-label-success waves-effect">تجديد الاشتراك</a>

                          <button class="btn rounded-pill btn-label-warning waves-effect notify-btn" data-student_id="<?php echo e($dat->id); ?>" data-bs-toggle="modal" data-bs-target="#notifyModal">ارسال اشعار</button>

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

<!-- Modal -->
<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form method="POST" action="<?php echo e(route('store.student')); ?>">
            <?php echo csrf_field(); ?>
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel1">اضافة طالب جديد</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col mb-4 mt-2">
              <div class="form-floating form-floating-outline">
                  <input type="text" id="nameBasic" name="name" class="form-control" placeholder="اسم الطالب">

                <label for="nameBasic">الاسم</label>
              </div>
            </div>
          </div>
          <div class="row g-2">
            <div class="col mb-2">
              <div class="form-floating form-floating-outline">
                <input type="text" name="phone_number" id="aemailBasic" class="form-control" placeholder="01093934554">
                <label for="aemailBasic">رقم الهاتف</label>
              </div>
            </div>

            <div class="col mb-2">
              <div class="form-floating form-floating-outline">
                <input type="password" name="password" id="dobBasic" class="form-control" placeholder="*********">
                <label for="dobBasic">كلمة المرور</label>
              </div>
            </div>
          </div>
          <hr class="my-4 mx-n4" />
          <div class="col mb-2">

                <label>السنة الدراسية</label>
                <div class="row">
            <?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-6 col-xl-6">
            <div class="form-check">
              <label style ="font-size:20px; bold">
                &nbsp; &nbsp;  &nbsp;  &nbsp;<input type="checkbox"   name = "grade_id[]"  value = "<?php echo e($grade->id); ?>" >  &nbsp;  &nbsp;<?php echo e($grade->name); ?></label>
              </div>
            </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </div>
        </div>
        <hr class="my-4 mx-n4" />

        <div class="row g-2">
            <div class="col mb-2">
                <label for="emailBasic">تاريخ انتهاء الاشتراك</label>

                <input type="date" name="subscription_end_date" id="emailBasic" class="form-control" value="<?php echo e($plusMonth); ?>">


            </div>

          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">الغاء</button>
          <button type="submit" class="btn btn-primary">حفظ</button>
        </div>
    </form>
      </div>
    </div>
  </div>



  <div class="modal fade" id="notifyModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form method="POST" action="#">
            <?php echo csrf_field(); ?>
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel1">ارسال اشعار لطالب</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col mb-4 mt-2">
              <div class="form-floating form-floating-outline">
                  <input type="text" id="nameBasic" name="message" class="form-control" placeholder="الرسالة">

                <label for="nameBasic">الرسالة</label>
              </div>
            </div>
          </div>
            <input type="hidden" name="student_id">

          <div class="col mb-4 mt-2">
            <div class="form-floating form-floating-outline">
                <input type="text" id="link" name="link" value="#" class="form-control" placeholder="الرابط">

              <label for="link">الرابط</label>
            </div>
          </div>




        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">ارسال</button>
          <button type="submit" class="btn btn-primary send-notify">حفظ</button>
        </div>
    </form>
      </div>
    </div>
  </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<script src="<?php echo e(asset('admin/assets/js/ui-modals.js')); ?>"></script>

<script src="<?php echo e(asset('admin/assets/js/app-user-list.js')); ?>"></script>


<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

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


    $(document).ready(function () {
        $('.notify-btn').click(function () {
            // Get the student ID from the clicked button
            var studentId = $(this).data('student_id');

            // Set the student ID in the modal form
            $('#notifyModal input[name="student_id"]').val(studentId);

            // Show the modal
            $('#notifyModal').modal('show');
        });

        $('.send-notify').click(function (e) {
            e.preventDefault();

            // Get form data
            var formData = $('#notifyModal form').serialize();

            // Make AJAX request
            $.ajax({
                type: 'POST',
                url: '<?php echo e(route("user.notification")); ?>', // Replace with your notification route
                data: formData,
                success: function (response) {
                     // You can customize this part
                     $('#notifyModal').modal('hide');

                    Toastify({
                        text: "تم الارسال",
                        duration: 3000,  // Display duration in milliseconds
                        gravity: "top",  // Position of the toast
                        close: true  // Show close button
                    }).showToast();


                },
                error: function (error) {
                    console.log(error.responseJSON.errors);
                    // Handle validation errors
                }
            });
        });
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.new-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Web-Development\Khairy\Khairy\resources\views/admin/new/students.blade.php ENDPATH**/ ?>