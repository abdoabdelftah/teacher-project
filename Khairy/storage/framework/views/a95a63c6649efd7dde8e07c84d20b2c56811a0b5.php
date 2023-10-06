<?php $__env->startSection('content'); ?>
               
               

<a href="<?php echo e(url('admin/addgrade')); ?>" class="btn btn-success">اضافة كورس</a>


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
                            
                          
                            <th>الحالة</th>
                            
                            <th>تعديل</th>
                            <th>المحتوى</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    

                          <tr>
                            <td><?php echo e($dat->id); ?></td>
                            <td><?php echo e($dat->name); ?></td>
                         
                            <td><?php if($dat->hide == 1): ?> مخفى <?php else: ?> ظاهر <?php endif; ?></td>
         
                            
                            <td>
                              <a href="<?php echo e(url('admin/grades/edit/'.$dat -> id)); ?>" class="btn btn-outline-primary">تعديل</a>
                            </td>

                            <td>
                              <a href="<?php echo e(url('admin/units/'.$dat -> id)); ?>" class="btn btn-outline-primary">الوحدات</a>
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
                
              </div>
            </div>
          </div>
        </div>

<?php $__env->stopSection(); ?>
            

                  
            
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u580293580/domains/mrkhairy.com/public_html/laravel/resources/views/admin/grades.blade.php ENDPATH**/ ?>