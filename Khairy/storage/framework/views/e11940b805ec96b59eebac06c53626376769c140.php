
                      <table id="order-listing" class="table">

                      
                        <thead>
                          <tr>
                           
                            <th>اسم الطالب</th>
                            <th>درجة الطالب</th>
                            <th>الدرجة النهائية للامتحان</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                       
                          <?php $__currentLoopData = $examname; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    

                          <tr>
                           
                            <td><?php echo e($dat->student->name); ?></td>
                            <td><?php echo e($dat->studentanswer->where('student_id', $dat->student->id)->sum('points')); ?></td>
                            <td><?php echo e($dat->exam->sum('points')); ?></td>
                     
                            
                           
                          
                          </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>

                      </table>
                   
            

                  
            <?php /**PATH /home/u580293580/domains/mrkhairy.com/public_html/laravel/resources/views/admin/downloadunitsectionanswered.blade.php ENDPATH**/ ?>