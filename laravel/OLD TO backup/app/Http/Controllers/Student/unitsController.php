<?php




namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Grade;
use App\Models\GradeUser;
use App\Models\Unit;

use App\Models\Unitexamsectionfollowup;
use App\Models\Studentexamanswer;
use App\Models\Exam;
use App\Models\Unitexamsection;

use App\Traits\ImageTrait;
use auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
class unitsController extends Controller
{

  use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  

  
  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unitexam($grade_id, $unit_id, $unit_exam_section_id)
    {
       
      $now = Carbon::now();

        $doneexam = Unitexamsectionfollowup::where('unit_exam_section_id', $unit_exam_section_id)->where('student_id', auth()->user()->id)->count();

      
      $examunit = Unitexamsection::where('id', $unit_exam_section_id)->where('unit_id', $unit_id)->where('hide', 0)->where('start_time', '<=', $now )->where('end_time', '>=', $now )->count();
        
      $unitgrade = Unit::where('id', $unit_id)->where('grade_id', $grade_id)->where('hide', 0)->count();  
        
      $gradeuser =  GradeUser::where('user_id', auth()->user()->id)->where('grade_id', $grade_id)->count();
 
    

      if ($gradeuser < 1) {
        return redirect('/grades');
     
    }
    
   if ($unitgrade < 1) {
        return redirect('/grades');
     
    }
      
    if ($examunit < 1) {
        return redirect('/grades');
     
    }
    $unitname = Unit::where('id', $unit_id)->first();

    
    $time = Unitexamsection::where('id', $unit_exam_section_id)->where('hide', 0)->select('end_time', 'id', 'answer_time')->first();

    
    if($doneexam == 0){
      
       return view('student.unitexam', compact('unitname', 'doneexam', 'time'));
    }

    if($doneexam > 0){

      $doneexamtime = Unitexamsectionfollowup::where('unit_exam_section_id', $unit_exam_section_id)->where('student_id', auth()->user()->id)->first();

    
      $exam = Exam::where('unit_exam_section_id', $unit_exam_section_id)->whereIn('id', function ($query)  use($unit_exam_section_id) {
        $query->select('exam_id')
            ->from('studentexamanswers')->where('unit_exam_section_id', $unit_exam_section_id)->where('student_id', auth()->user()->id)->get();
            //->where('lesson_section_id',1);
    })->get();

      $studentanswer = Studentexamanswer::where('unit_exam_section_id', $unit_exam_section_id)->where('student_id', auth()->user()->id)->get();
     
    
       return view('student.unitexam', compact('unitname', 'doneexam', 'exam', 'studentanswer', 'time', 'doneexamtime'));
   }

      }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unitexamstart($grade_id, $unit_id, $unit_exam_section_id)
    {
       
      $now = Carbon::now();

      $exam = Exam::where('unit_exam_section_id', $unit_exam_section_id)->where('hide', 0)->get();

       $doneexam = Unitexamsectionfollowup::where('unit_exam_section_id', $unit_exam_section_id)->where('student_id', auth()->user()->id)->count();

      
      $examunit = Unitexamsection::where('id', $unit_exam_section_id)->where('unit_id', $unit_id)->where('hide', 0)->where('start_time', '<=', $now )->where('end_time', '>=', $now )->count();
        
      $unitgrade = Unit::where('id', $unit_id)->where('grade_id', $grade_id)->where('hide', 0)->count();  
        
      $gradeuser =  GradeUser::where('user_id', auth()->user()->id)->where('grade_id', $grade_id)->count();
 
    

      if ($gradeuser < 1) {
        return redirect('/grades');
     
    }
    
   if ($unitgrade < 1) {
        return redirect('/grades');
     
    }
      
    if ($examunit < 1) {
        return redirect('/grades');
     
    }
    
    $unitname = Unit::where('id', $unit_id)->first();

    

    $data = Unitexamsection::where('id', $unit_exam_section_id)->where('hide', 0)->where('start_time', '<=', $now )->where('end_time', '>=', $now )->first();

   

    if($doneexam > 0){

     
    
      return redirect('/grade/'.$grade_id.'/unit/'.$unit_id.'/unitexam/'.$unit_exam_section_id);
   }


   if($doneexam == 0){

    $datetime1 = strtotime($now); // convert to timestamps
  $datetime2 = strtotime($data->end_time); // convert to timestamps
  $mins = (int)(($datetime2 - $datetime1)/60); // will give the difference in days , 86400 is the timestamp difference of a day
 
  
     return view('student.unitexamstart', compact('data', 'unitname','exam', 'mins'));
  }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    public function unitexampost(Request $request)
    {
       
    
      
      Unitexamsectionfollowup::create([
        
        'student_id' => auth()->user()->id,
        'unit_exam_section_id' =>   $request->unit_exam_section_id[0],
        'time_posted' => now(),
        
    ]);

        $questionnumber = count($request->question);

      
        for ($i = 0; $i < $questionnumber; $i++) {

          //  return $request->question[$i]; 

          $exam_id = $request->question[$i];

          $right_answer = $request->right_answer[$i];

          if(!empty($request->answer[$exam_id])){
          $student_answer = $request->answer[$exam_id];
          }else{
            $student_answer = 'Null';
          }
         
          $unit_exam_section_id = $request->unit_exam_section_id[$i];


         
          
        $allpoints = $request->points[$i];

          if($student_answer == $right_answer){

            $is_right = 1;
            $points = $allpoints;

          }else{
            $is_right = 0;
            $points = 0;
          }
           Studentexamanswer::create([
          

              'student_id' => auth()->user()->id,
              'exam_id' =>   $exam_id,
              'student_answer' =>  $student_answer,
              'right_answer' => $right_answer,
              'unit_exam_section_id' => $unit_exam_section_id,
              'is_right' =>   $is_right,
              'points' =>   $points,
          ]);

          
        }
       

        return redirect()->back();

    }



////////////////////////////////////////////////////////////////////////////////


public function unittextexam($grade_id, $unit_id, $unit_exam_section_id)
{
   
  $now = Carbon::now();

  $doneexam = Unitexamsectionfollowup::where('unit_exam_section_id', $unit_exam_section_id)->where('student_id', auth()->user()->id)->count();

      
  $examunit = Unitexamsection::where('id', $unit_exam_section_id)->where('unit_id', $unit_id)->where('hide', 0)->where('start_time', '<=', $now )->where('end_time', '>=', $now )->count();
    
  $unitgrade = Unit::where('id', $unit_id)->where('grade_id', $grade_id)->where('hide', 0)->count();  
    
  $gradeuser =  GradeUser::where('user_id', auth()->user()->id)->where('grade_id', $grade_id)->count();



  if ($gradeuser < 1) {
    return redirect('/grades');
 
}

if ($unitgrade < 1) {
    return redirect('/grades');
 
}
  
if ($examunit < 1) {
    return redirect('/grades');
 
}
$unitname = Unit::where('id', $unit_id)->first();


$time = Unitexamsection::where('id', $unit_exam_section_id)->where('hide', 0)->select('end_time', 'id', 'answer_time')->first();


if($doneexam == 0){
  
   return view('student.unittextexam', compact('unitname', 'doneexam', 'time'));
}

if($doneexam > 0){

  $exam = Exam::where('unit_exam_section_id', $unit_exam_section_id)->whereIn('id', function ($query)  use($unit_exam_section_id) {
    $query->select('exam_id')
        ->from('studentexamanswers')->where('unit_exam_section_id', $unit_exam_section_id)->where('student_id',  auth()->user()->id)->get();
        //->where('lesson_section_id',1);
})->get();

  $studentanswer = Studentexamanswer::where('unit_exam_section_id', $unit_exam_section_id)->where('student_id', auth()->user()->id)->get();
 

   return view('student.unittextexam', compact('unitname', 'doneexam', 'exam', 'studentanswer', 'time'));
}




  }



///////////////////////////////////////////////////////////////////////////////////////////////////////


public function unittextexamstart($grade_id, $unit_id, $unit_exam_section_id)
    {


      $now = Carbon::now();
       
      $exam = Exam::where('unit_exam_section_id', $unit_exam_section_id)->where('hide', 0)->get();
      $doneexam = Unitexamsectionfollowup::where('unit_exam_section_id', $unit_exam_section_id)->where('student_id', auth()->user()->id)->count();

      $examunit = Unitexamsection::where('id', $unit_exam_section_id)->where('unit_id', $unit_id)->where('hide', 0)->where('start_time', '<=', $now )->where('end_time', '>=', $now )->count();
    
      $unitgrade = Unit::where('id', $unit_id)->where('grade_id', $grade_id)->where('hide', 0)->count();  
        
      $gradeuser =  GradeUser::where('user_id', auth()->user()->id)->where('grade_id', $grade_id)->count();
    
    
    
      if ($gradeuser < 1) {
        return redirect('/grades');
     
    }
    
    if ($unitgrade < 1) {
        return redirect('/grades');
     
    }
      
    if ($examunit < 1) {
        return redirect('/grades');
     
    }


    $unitname = Unit::where('id', $unit_id)->first();

    $data = Unitexamsection::where('id', $unit_exam_section_id)->where('hide', 0)->where('start_time', '<=', $now )->where('end_time', '>=', $now )->first();

    

    if($doneexam > 0){

     
      return redirect('/grade/'.$grade_id.'/unit/'.$unit_id.'/unittextexam/'.$unit_exam_section_id);
   }


   if($doneexam == 0){

    $datetime1 = strtotime($now); // convert to timestamps
    $datetime2 = strtotime($data->end_time); // convert to timestamps
    $mins = (int)(($datetime2 - $datetime1)/60); // will give the difference in days , 86400 is the timestamp difference of a day
   

  
     return view('student.unittextexamstart', compact('data', 'unitname','exam', 'mins'));
  }



    }



///////////////////////////////////////////////////////////////////////////////////////



public function unittextexampost(Request $request)
{
   

  
  Unitexamsectionfollowup::create([
    
    'student_id' => auth()->user()->id,
    'unit_exam_section_id' => $request->unit_exam_section_id[0],
    
]);

    $questionnumber = count($request->question);

  
    for ($i = 0; $i < $questionnumber; $i++) {

      //  return $request->question[$i]; 

      $exam_id = $request->question[$i];

      

      if(!empty($request->answer[$exam_id])){
        $student_answer = $request->answer[$exam_id];
        }else{
          $student_answer = 'Null';
        }

     
      $unit_exam_section_id = $request->unit_exam_section_id[$i];


     
      if(empty($request->student_answer_picture[$exam_id])){

       Studentexamanswer::create([
      

          'student_id' => auth()->user()->id,
          'exam_id' =>   $exam_id,
          'student_answer' =>  $student_answer,
          'unit_exam_section_id' => $unit_exam_section_id,
         
      ]);
       
        }
      
        if(!empty($request->student_answer_picture[$exam_id])){

          $student_answer_picture = $this->saveImage($request->student_answer_picture[$exam_id], 'images/studentanswers');

          Studentexamanswer::create([
         
   
             'student_id' => auth()->user()->id,
             'exam_id' =>   $exam_id,
             'student_answer' =>  $student_answer,
             'unit_exam_section_id' => $unit_exam_section_id,
             'student_answer_picture' => $student_answer_picture,
            
         ]);
          
           }



    }
    

    return redirect()->back();

}









}
