<?php $__env->startSection('content'); ?>

                <form class="search-form d-none d-md-block"  method="POST" action="<?php echo e(route('search.student')); ?>">
                  <?php echo csrf_field(); ?>
                  <i class="icon-magnifier"></i>
                  <input type="search" class="form-control" name = "search" placeholder=" ابحث عن طريق الاسم او رقم التليفون" title="Search here">
                </form>

              <br>

              <a href="<?php echo e(url('admin/addstudent')); ?>" class="btn btn-success">اضافة طالب</a>

              <br>
              <br>
                <div class="row">
                  <div class="col-12">
                    <div class="table-responsive">
                      <table id="order-listing" class="table">
                        <thead>
                          <tr>
                            <th>الرقم</th>
                            <th>الاسم</th>
                            <th>كود الادخول</th>


                            <th>تعديل</th>

                            <th>السماح بتسجيل الدخول</th>


                            <th>مسح طالب</th>

                          </tr>
                        </thead>
                        <tbody>
                          <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                          <tr>
                            <td><?php echo e($dat->id); ?></td>
                            <td><a href="<?php echo e(url('admin/studentresults/'.$dat->id)); ?>"> <?php echo e($dat->name); ?> </a> </td>
                            <td><?php echo e($dat->phone_number); ?></td>


                            <td>
                              <a href="<?php echo e(url('admin/students/edit/'.$dat -> id)); ?>" class="btn btn-outline-primary">تعديل</a>
                            </td>

                            <td>
                              <a href="<?php echo e(url('admin/allowlogin/'.$dat -> id)); ?>" class="btn btn-outline-primary">السماح بتسجيل الدخول</a>
                            </td>


                            <td>
                              <a href="<?php echo e(url('admin/deletestudent/'.$dat -> id)); ?>" onclick="return confirm('هل انت متأكد من رغبتك فى مسح هذا الطالب نهائيا?')" class="btn btn-danger">مسح الطالب<i class="fa fa-trash"></i></a>
                            </td>




                          </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </tbody>

                        <div class="d-flex justify-content-center">
                        <?php //echo $data->render(); ?>

                      </div>
                      </table>
                    </div>
                  </div>
                </div>

                <?php echo $data -> links(); ?>


              </div>
            </div>
          </div>
        </div>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u580293580/domains/mrkhairy.com/public_html/laravel/resources/views/admin/students.blade.php ENDPATH**/ ?>