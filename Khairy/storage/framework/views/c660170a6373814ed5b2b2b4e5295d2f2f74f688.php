<?php $__env->startSection('content'); ?>
               
               

              
              <br>
              <br>
                <div class="row">
                  <div class="col-12">
                    <div class="table-responsive">
                      <table id="order-listing" class="table">

                        <h2>امتحانات وواجب الدروس </h2>
                        <thead>
                          <tr>
                           
                            <th>اسم الامتحان</th>
                            <th>درجة الطالب</th>
                            <th>الدرجة النهائية للامتحان</th>
                            <th>مسح سجل الطالب للامتحان</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                       
                          <?php $__currentLoopData = $examname; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    

                          <tr>
                           
                            <td><?php echo e($dat->lessonsection->name); ?></td>
                            <td><?php echo e($dat->studentanswer->where('lesson_section_id', $dat->lessonsection->id)->where('student_id', $dat->student_id)->sum('points')); ?></td>
                            <td><?php echo e($dat->exam->sum('points')); ?></td>
                            <td>
                              <a href="<?php echo e(url('/admin/lessonresult/delete/'.$dat->lessonsection->id.'/'.$dat->student_id )); ?>" class="btn btn-outline-primary">مسح اجابة الطالب</a>
                            </td>
                          
                          </tr>
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





        <br>
        <br>

        <div class="row">
          <div class="col-md-12 grid-margin">
            <div class="card">
              <div class="card-body">

          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table">

                  <h2>امتحانات الوحدات </h2>
                  <thead>
                    <tr>
                     
                      <th>اسم الامتحان</th>
                      <th>درجة الطالب</th>
                      <th>الدرجة النهائية للامتحان</th>
                     
                      <th>مسح سجل الطالب للامتحان</th>
                    </tr>
                  </thead>
                  <tbody>
                 
                    <?php $__currentLoopData = $unitname; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $udat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                    <tr>
                     
                      <td><?php echo e($udat->unitexamsection->name); ?></td>
                      <td><?php echo e($udat->studentanswer->where('unit_exam_section_id', $udat->unitexamsection->id)->where('student_id', $udat->student_id)->sum('points')); ?></td>
                      <td><?php echo e($udat->exam->sum('points')); ?></td>
                    
                      
                      <td>
                        <a href="<?php echo e(url('/admin/unitresult/delete/'.$udat->unitexamsection->id.'/'.$udat->student_id )); ?>" class="btn btn-outline-primary">مسح اجابة الطالب</a>
                      </td>

                    </tr>
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
            

                  
            
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u580293580/domains/eazythink.com/public_html/laravel/resources/views/admin/studentresults.blade.php ENDPATH**/ ?>