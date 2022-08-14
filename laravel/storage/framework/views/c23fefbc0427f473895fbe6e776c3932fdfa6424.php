<?php $__env->startSection('content'); ?>
               
               

<div class="card-body">
 
  <div class="template-demo">
 
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb breadcrumb-custom">
        <li class="breadcrumb-item"><a href="<?php echo e(url('admin/units/'.$grade->id)); ?>"><?php echo e($grade->name); ?></a></li>
        
        <li class="breadcrumb-item"><a href="<?php echo e(url('admin/lessons/'.$unit->id)); ?>"><?php echo e($unit->name); ?></a></li>


        <li class="breadcrumb-item active" aria-current="page"><span><?php echo e($unitexamsection->name); ?></span></li>
     
      </ol>
    </nav>
  </div>
</div>
              
              <br>
              <br>
                <div class="row">
                  <div class="col-12">
                    <div class="table-responsive">
                      <table id="order-listing" class="table">

                        <h2>الطلاب الذين لم يقوموا بالاجابة عن الامتحان </h2>
                        <br>
                      
                        <thead>
                          <tr>
                           
                            <th>اسم الطالب</th>
                            <th>تعديل الطالب</th>
                            <th>جميع درجات الطالب</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                       
                          <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    

                          <tr>
                           
                            <td><?php echo e($dat->name); ?></td>
                            <td><a href="<?php echo e(url('admin/students/edit/'.$dat -> id)); ?>" class="btn btn-outline-primary">تعديل الطالب</a></td>
                            <td><a href="<?php echo e(url('admin/studentresults/'.$dat->id)); ?>" class="btn btn-outline-primary"> جميع درجات الطالب</a></td>
                          
                          </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>

                        <div class="d-flex justify-content-center">
                          <?php echo e($students->links()); ?>

                      </div>
                      </table>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>





     

</div>
</div>
</div>
</div>

<?php $__env->stopSection(); ?>
            

                  
            
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u580293580/domains/mrkhairy.com/public_html/laravel/resources/views/admin/unitsectionnotanswered.blade.php ENDPATH**/ ?>