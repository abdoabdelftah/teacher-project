<?php $__env->startSection('content'); ?>
               
               

              
              <br>
              <br>
                <div class="row">
                  <div class="col-12">
                    <div class="table-responsive">
                      <table id="order-listing" class="table">

                        <h2>امتحانات الوحدات التى لم يتم تصليحها </h2>
                        <br>
                      
                        <thead>
                          <tr>
                           
                            <th>اسم الطالب</th>
                           
                            <th>اضغط للتصحيح</th>
                          </tr>
                        </thead>
                        <tbody>
                       
                          <?php $__currentLoopData = $examname; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    

                          <?php if($dat->unitexamsection->type == 4): ?>
                          <tr>
                           
                            <td><?php echo e($dat->student->name); ?></td>
                         
                     
                            <td><a href="<?php echo e(url('admin/student/'.$dat->student_id.'/unit/'.$dat->unit_exam_section_id)); ?>" class="btn btn-outline-primary"> اضغط هنا للتصحيح</a></td>
                         
                          
                          </tr>
                          <?php endif; ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>

                        <div class="d-flex justify-content-center">
                       
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
            

                  
            
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u580293580/domains/eazythink.com/public_html/laravel/resources/views/admin/unitnotcorrected.blade.php ENDPATH**/ ?>