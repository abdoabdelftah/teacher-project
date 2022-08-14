<?php $__env->startSection('content'); ?>
               
              

            

              <br>
              <br>
                <div class="row">
                  <div class="col-12">
                    <div class="table-responsive">
                      <table id="order-listing" class="table">
                        <thead>
                          <tr>
                            
                            <th>اسم الطالب</th>
                            <th>عنوان السؤال</th>
                         
                            <th>ادخل الى تفاصيل السؤال</th>
                            
                            <th>تعديل الطالب</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $__currentLoopData = $forums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    

                          <tr>
                            <td><?php echo e($dat->student->name); ?></td>
                            <td> <?php echo e($dat->head); ?> </td>
                         
                            <td>
                              <a href="<?php echo e(url('admin/forum/'.$dat->id)); ?>" class="btn btn-outline-primary">ادخل الى تفاصيل السؤال</a>
                            </td>

                            <td>
                              <a href="<?php echo e(url('admin/students/edit/'.$dat->student->id)); ?>" class="btn btn-outline-primary">تعديل الطالب</a>
                            </td>
                          </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>

                        <div class="d-flex justify-content-center">
                        <?php //echo $data->render(); ?>
                        <?php echo $forums -> links(); ?>

                      </div>
                      </table>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>

<?php $__env->stopSection(); ?>
            

                  
            
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u580293580/domains/mrkhairy.com/public_html/laravel/resources/views/admin/allforums.blade.php ENDPATH**/ ?>