<?php $__env->startSection('content'); ?>
               
               
<?php 
$student_id = request()->route('student_id');

 $lesson_section_id = request()->route('lesson_section_id');
 ?>



 <div class="col-md-12 grid-margin">
  <div class="card">
    <div class="card-body">




      <form method="POST" class="pt-3" enctype="multipart/form-data" action="<?php echo e(route('correctlessonexam.done')); ?>">
        <?php echo csrf_field(); ?>

      <?php
      foreach($exam as $i => $exa){
        ?>

<input type = "hidden" name = "question[]" value="<?php echo e($exa->id); ?>" >

<input type = "hidden" name = "lesson_section_id[]" value="<?php echo e($exa->lesson_section_id); ?>" >


<input type = "hidden" name = "student_id[]" value="<?php echo e($student_id); ?>" >


      
  
      
      <div class="col-md-12 grid-margin">
        <div class="card">
          <div class="card-body">
  
            <div class="col-md-10">
              <div class="form-group row">
                       
                <?php if($exa->question_type == 1): ?>
               <h3> <?php echo e($exa->question); ?></h3>
               <?php endif; ?> 
  
               <?php if($exa->question_type == 2): ?>
               <a href="#" id="pop">
                <img  src="<?php echo e($exa->question); ?>" width="800px" height="200px" style=" width: 100%; height: auto;">
              </a>
            <?php endif; ?>
  
  
            </div>
            </div>
  
           

       
            <div class="col-md-10">
              <div class="form-group row">
                
           
  
                    <label  class=" form-check-label" >
                   

                      <?php if(!empty($studentanswer[$i]->student_answer)): ?>
                      <div class="separator" style="font-size:20px;"> &nbsp; &nbsp;اجابة الطالب: &nbsp; &nbsp;</div>
                      <h3> <?php echo e($studentanswer[$i]->student_answer); ?></h3>
                        <?php endif; ?>


                    <?php if(!empty($studentanswer[$i]->student_answer_picture)): ?>
                    <div class="separator" style="font-size:20px;"> &nbsp; &nbsp;اجابة الطالب: &nbsp; &nbsp;</div>
                    
                <img  src="<?php echo e($studentanswer[$i]->student_answer_picture); ?>" width="800px" height="200px" style=" width: 100%; height: auto;">
                  <?php endif; ?>


                
                    
                </div>
              </div>

                  <div class="col-md-10">
                    <div class="form-group row">
                      
                 
        <br>
                      <div class="separator" style="font-size:20px;"> &nbsp; &nbsp;قم باضافة تقيمك وتعليقك لاجابة الطالب: &nbsp; &nbsp;</div>
                    
        
                      <div class="form-group">
                        <label style="font-size: 25px; color:blue;">قم باضافة تقيمك</label>
                            <input class="form-control" style="border:2px solid blue" name="points[<?php echo e($exa->id); ?>]" id="answer<?php echo e($exa->id); ?>" value="<?php echo e($exa->points); ?>"> 
                        <br>

                        <br>

                      <div class="form-group">
                        <label style="font-size: 25px; color:blue;">قم بكتابة تعليق هنا او قم برفع صورة</label>
                            <textarea class="form-control" rows="10" cols="150" style="border:2px solid blue" name="right_answer[<?php echo e($exa->id); ?>]" id="answer<?php echo e($exa->id); ?>">  </textarea>
                        <br>
                       
        
                        <br>
        
        
        
                          <!-- Upload image input-->
                    <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm" style="border: 1px solid blue;">
                      <input   name="right_answer_picture[<?php echo e($exa->id); ?>]" type="file" class="form-control border-0" accept="image/*;capture=camera" capture="camera"  >
                      <label  for="upload" class="font-weight-light text-muted">اختر صورة</label>
                      <div class="input-group-append" >
                          <label  style="border: 1px solid blue;" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">اختر صورة</small></label>
                      </div>
                  </div>
        
                  <!-- Uploaded image area-->
                
                   
        
                      </div>
                        
                
                    </div>
                  </div>


                    </div>
                </div>
         
              </div>
            </div>
  
  
          
  
  
  
  
            
     
  
 
            
       
  <hr color="black">
<?php } ?>

</div>
</div>
</div>


  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" id="submitnow" type="submit" class="btn btn-primary">
 حفظ التصحيح
</button>

</form>


</div>

</div>
</div>
</div>

<?php $__env->stopSection(); ?>
            

                  
            
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u580293580/domains/mrkhairy.com/public_html/laravel/resources/views/admin/correctlessonexam.blade.php ENDPATH**/ ?>