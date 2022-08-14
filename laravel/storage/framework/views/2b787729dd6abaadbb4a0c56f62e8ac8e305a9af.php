<?php $__env->startSection('content'); ?>
               
       
<div class="card-body">
 
  <div class="template-demo">
 
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb breadcrumb-custom">
        <li class="breadcrumb-item"><a href="<?php echo e(url('admin/grades')); ?>">المواد</a></li>
        


        <li class="breadcrumb-item active" aria-current="page"><span> <?php echo e($grade->name); ?></span></li>
     
      </ol>
    </nav>
  </div>
</div>
        


<?php $urlid = request()->route('id'); ?>

<a href="<?php echo e(url('admin/addunit/'.$urlid)); ?>" class="btn btn-success">اضافة وحدة</a>


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
                              <a href="<?php echo e(url('admin/units/edit/'.$dat -> id)); ?>" class="btn btn-outline-primary">تعديل</a>
                            </td>

                            <td>
                              <a href="<?php echo e(url('admin/lessons/'.$dat -> id)); ?>" class="btn btn-outline-primary">الدروس</a>
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
            

                  
            
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u580293580/domains/mrkhairy.com/public_html/laravel/resources/views/admin/units.blade.php ENDPATH**/ ?>