<?php




namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Grade;
use App\Models\GradeUser;
use App\Models\Unit;
use App\Models\Lecture;
use App\Models\Studentlessonsectionfollowup;
use App\Models\Studentexamanswer;
use App\Models\Exam;


use App\Models\Unitexamsectionfollowup;

use App\Models\Unitexamsection;
use App\Models\Lesson;
use App\Models\Lessonsection;
use App\Traits\ImageTrait;
use auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
class examsController extends Controller
{

  use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function homework($grade_id, $unit_id, $lesson_id, $lesson_section_id)
    {
       
      $exam = Exam::where('lesson_section_id', $lesson_section_id)->where('hide', 0)->get();
      $doneexam = Studentlessonsectionfollowup::where('lesson_section_id', $lesson_section_id)->where('student_id', auth()->user()->id)->count();

        $lessonsectionlesson = Lessonsection::where('id', $lesson_section_id)->where('lesson_id', $lesson_id)->where('hide', 0)->count();

      $lessonunit = Lesson::where('id', $lesson_id)->where('unit_id', $unit_id)->where('hide', 0)->count();
        
      $unitgrade = Unit::where('id', $unit_id)->where('grade_id', $grade_id)->where('hide', 0)->count();  
        
      $gradeuser =  GradeUser::where('user_id', auth()->user()->id)->where('grade_id', $grade_id)->count();
 
      if ($lessonsectionlesson < 1) {
        return redirect('/grades');
     
    }

      if ($gradeuser < 1) {
        return redirect('/grades');
     
    }
    
   if ($unitgrade < 1) {
        return redirect('/grades');
     
    }
      
    if ($lessonunit < 1) {
        return redirect('/grades');
     
    }
    $lessonname = Lesson::where('id', $lesson_id)->first();
    $data = Lessonsection::where('lesson_id', $lesson_id)->where('hide', 0)->select('name', 'id', 'section_type')->orderBy('priority', 'asc')->get();

    if($doneexam == 0){
       return view('student.lessonsectionhomework', compact('data', 'lessonname', 'doneexam', 'exam'));
    }

    if($doneexam != 0){

      $exam = Exam::where('lesson_section_id', $lesson_section_id) ->whereIn('id', function ($query)  use($lesson_section_id) {
        $query->select('exam_id')
            ->from('studentexamanswers')->where('lesson_section_id', $lesson_section_id)->where('student_id', auth()->user()->id)->get();
            //->where('lesson_section_id',1);
    })->get();

      $studentanswer = Studentexamanswer::where('lesson_section_id', $lesson_section_id)->where('student_id', auth()->user()->id)->get();
     
   
      return view('student.lessonsectionhomework', compact('data', 'lessonname', 'doneexam', 'exam', 'studentanswer'));
   }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  
    
   
      
        
     

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function posthomework(Request $request)
    {
       
       
        $questionnumber = count($request->question);

      
        for ($i = 0; $i < $questionnumber; $i++) {

          //  return $request->question[$i]; 

          $exam_id = $request->question[$i];

          $right_answer = $request->right_answer[$i];

          if(!empty($request->answer[$exam_id])){
            $student_answer = $request->answer[$exam_id];
            }else{
              $student_answer = Null;
            }
         
          $lesson_section_id = $request->lesson_section_id[$i];


         
          
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
              'lesson_section_id' => $lesson_section_id,
              'is_right' =>   $is_right,
              'points' =>   $points,
          ]);

          
        }
        Studentlessonsectionfollowup::create([
          
          'student_id' => auth()->user()->id,
          'lesson_section_id' =>   $request->lesson_section_id[0],
          
      ]);

        return redirect()->back();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function lessonexam($grade_id, $unit_id, $lesson_id, $lesson_section_id)
    {
    
      $now = Carbon::now();

        $doneexam = Studentlessonsectionfollowup::where('lesson_section_id', $lesson_section_id)->where('student_id', auth()->user()->id)->count();

        $lessonsectionlesson = Lessonsection::where('id', $lesson_section_id)->where('lesson_id', $lesson_id)->where('start_time', '<=', $now )->where('end_time', '>=', $now )->where('hide', 0)->count();

      $lessonunit = Lesson::where('id', $lesson_id)->where('unit_id', $unit_id)->where('hide', 0)->count();
        
      $unitgrade = Unit::where('id', $unit_id)->where('grade_id', $grade_id)->where('hide', 0)->count();  
        
      $gradeuser =  GradeUser::where('user_id', auth()->user()->id)->where('grade_id', $grade_id)->count();
 
      if ($lessonsectionlesson < 1) {
        return redirect('/grades');
     
    }

      if ($gradeuser < 1) {
        return redirect('/grades');
     
    }
    
   if ($unitgrade < 1) {
        return redirect('/grades');
     
    }
      
    if ($lessonunit < 1) {
        return redirect('/grades');
     
    }
    

    $lessonname = Lesson::where('id', $lesson_id)->first();
    $data = Lessonsection::where('lesson_id', $lesson_id)->where('hide', 0)->where('start_time', '<=', $now )->where('end_time', '>=', $now )->select('name', 'id', 'section_type')->orderBy('priority', 'asc')->get();

    $time = Lessonsection::where('id', $lesson_section_id)->where('hide', 0)->where('start_time', '<=', $now )->where('end_time', '>=', $now )->select('start_time','end_time')->first();

    
    if($doneexam == 0){
      
       return view('student.lessonsectionexam', compact('data', 'lessonname', 'doneexam', 'time'));
    }

    if($doneexam != 0){
    
      $exam = Exam::where('lesson_section_id', $lesson_section_id)->whereIn('id', function ($query)  use($lesson_section_id) {
        $query->select('exam_id')
            ->from('studentexamanswers')->where('lesson_section_id', $lesson_section_id)->where('student_id', auth()->user()->id)->get();
            //->where('lesson_section_id',1);
    })->get();

      $studentanswer = Studentexamanswer::where('lesson_section_id', $lesson_section_id)->where('student_id', auth()->user()->id)->where('student_id', auth()->user()->id)->get();
     
    
       return view('student.lessonsectionexam', compact('data', 'lessonname', 'doneexam', 'exam', 'studentanswer', 'time'));
   }

      }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function lessonexamstart($grade_id, $unit_id, $lesson_id, $lesson_section_id)
    {
       
    $now = Carbon::now();

      $exam = Exam::where('lesson_section_id', $lesson_section_id)->where('hide', 0)->get();
      $doneexam = Studentlessonsectionfollowup::where('lesson_section_id', $lesson_section_id)->where('student_id', auth()->user()->id)->count();

      $lessonsectionlesson = Lessonsection::where('id', $lesson_section_id)->where('lesson_id', $lesson_id)->where('hide', 0)->where('start_time', '<=', $now )->where('end_time', '>=', $now )->count();

      $lessonunit = Lesson::where('id', $lesson_id)->where('unit_id', $unit_id)->where('hide', 0)->count();
        
      $unitgrade = Unit::where('id', $unit_id)->where('grade_id', $grade_id)->where('hide', 0)->count();  
        
      $gradeuser =  GradeUser::where('user_id', auth()->user()->id)->where('grade_id', $grade_id)->count();
 
      if ($lessonsectionlesson < 1) {
        return redirect('/grades');
     
    }

      if ($gradeuser < 1) {
        return redirect('/grades');
     
    }
    
   if ($unitgrade < 1) {
        return redirect('/grades');
     
    }
      
    if ($lessonunit < 1) {
        return redirect('/grades');
     
    }
    $lessonname = Lesson::where('id', $lesson_id)->first();
    $data = Lessonsection::where('id', $lesson_section_id)->where('hide', 0)->where('start_time', '<=', $now )->where('end_time', '>=', $now )->first();

    if($doneexam != 0){

     
    
      return redirect('/grade/'.$grade_id.'/unit/'.$unit_id.'/lesson/'.$lesson_id.'/lessonsectionexam/'.$lesson_section_id);
   }


   if($doneexam == 0){
/*
    Studentlessonsectionfollowup::create([
        
      'student_id' => auth()->user()->id,
      'lesson_section_id' =>   $lesson_section_id,
      
  ]); 
  */

  $datetime1 = strtotime($now); // convert to timestamps
  $datetime2 = strtotime($data->end_time); // convert to timestamps
  $mins = (int)(($datetime2 - $datetime1)/60); // will give the difference in days , 86400 is the timestamp difference of a day
  

  return view('student.lessonsectionexamstart', compact('data', 'lessonname','exam', 'mins'));
  }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    public function lessonexampost(Request $request)
    {
  
      
    Studentlessonsectionfollowup::create([
        
      'student_id' => auth()->user()->id,
      'lesson_section_id' =>   $request->lesson_section_id[0],
      
  ]);
       
        $questionnumber = count($request->question);

      
        for ($i = 0; $i < $questionnumber; $i++) {

          //  return $request->question[$i]; 

          $exam_id = $request->question[$i];

          $right_answer = $request->right_answer[$i];

          if(!empty($request->answer[$exam_id])){
            $student_answer = $request->answer[$exam_id];
            }else{
              $student_answer = Null;
            }
         
          $lesson_section_id = $request->lesson_section_id[$i];


         
          
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
              'lesson_section_id' => $lesson_section_id,
              'is_right' =>   $is_right,
              'points' =>   $points,
          ]);

          
        }
       

        return redirect()->back();

    }



////////////////////////////////////////////////////////////////////////////////


public function lessontextexam($grade_id, $unit_id, $lesson_id, $lesson_section_id)
{
   
  $now = Carbon::now();

    $doneexam = Studentlessonsectionfollowup::where('lesson_section_id', $lesson_section_id)->where('student_id', auth()->user()->id)->count();

    $lessonsectionlesson = Lessonsection::where('id', $lesson_section_id)->where('lesson_id', $lesson_id)->where('hide', 0)->where('start_time', '<=', $now )->where('end_time', '>=', $now )->count();

  $lessonunit = Lesson::where('id', $lesson_id)->where('unit_id', $unit_id)->where('hide', 0)->count();
    
  $unitgrade = Unit::where('id', $unit_id)->where('grade_id', $grade_id)->where('hide', 0)->count();  
    
  $gradeuser =  GradeUser::where('user_id', auth()->user()->id)->where('grade_id', $grade_id)->count();

  if ($lessonsectionlesson < 1) {
    return redirect('/grades');
 
}

  if ($gradeuser < 1) {
    return redirect('/grades');
 
}

if ($unitgrade < 1) {
    return redirect('/grades');
 
}
  
if ($lessonunit < 1) {
    return redirect('/grades');
 
}
$lessonname = Lesson::where('id', $lesson_id)->first();
$data = Lessonsection::where('lesson_id', $lesson_id)->where('hide', 0)->where('start_time', '<=', $now )->where('end_time', '>=', $now )->select('name', 'id', 'section_type')->orderBy('priority', 'asc')->get();

$time = Lessonsection::where('id', $lesson_section_id)->where('hide', 0)->where('start_time', '<=', $now )->where('end_time', '>=', $now )->select('end_time','start_time', 'id')->first();


if($doneexam == 0){
  
   return view('student.lessonsectiontextexam', compact('data', 'lessonname', 'doneexam', 'time'));
}

if($doneexam != 0){

  $exam = Exam::where('lesson_section_id', $lesson_section_id)->whereIn('id', function ($query)  use($lesson_section_id) {
    $query->select('exam_id')
        ->from('studentexamanswers')->where('lesson_section_id', $lesson_section_id)->where('student_id', auth()->user()->id)->get();
        //->where('lesson_section_id',1);
})->get();

  $studentanswer = Studentexamanswer::where('lesson_section_id', $lesson_section_id)->where('student_id', auth()->user()->id)->get();
 

   return view('student.lessonsectiontextexam', compact('data', 'lessonname', 'doneexam', 'exam', 'studentanswer', 'time'));
}

  }



///////////////////////////////////////////////////////////////////////////////////////////////////////


public function lessontextexamstart($grade_id, $unit_id, $lesson_id, $lesson_section_id)
    {

      $now = Carbon::now();
       
      $exam = Exam::where('lesson_section_id', $lesson_section_id)->where('hide', 0)->get();
      $doneexam = Studentlessonsectionfollowup::where('lesson_section_id', $lesson_section_id)->where('student_id', auth()->user()->id)->count();

        $lessonsectionlesson = Lessonsection::where('id', $lesson_section_id)->where('lesson_id', $lesson_id)->where('start_time', '<=', $now )->where('end_time', '>=', $now )->where('hide', 0)->count();

      $lessonunit = Lesson::where('id', $lesson_id)->where('unit_id', $unit_id)->where('hide', 0)->count();
        
      $unitgrade = Unit::where('id', $unit_id)->where('grade_id', $grade_id)->where('hide', 0)->count();  
        
      $gradeuser =  GradeUser::where('user_id', auth()->user()->id)->where('grade_id', $grade_id)->count();
 
      if ($lessonsectionlesson < 1) {
        return redirect('/grades');
     
    }

      if ($gradeuser < 1) {
        return redirect('/grades');
     
    }
    
   if ($unitgrade < 1) {
        return redirect('/grades');
     
    }
      
    if ($lessonunit < 1) {
        return redirect('/grades');
     
    }
    $lessonname = Lesson::where('id', $lesson_id)->first();
    $data = Lessonsection::where('id', $lesson_section_id)->where('start_time', '<=', $now )->where('end_time', '>=', $now )->where('hide', 0)->first();

    
    if($doneexam != 0){

     
    
      return redirect('/grade/'.$grade_id.'/unit/'.$unit_id.'/lesson/'.$lesson_id.'/lessonsectiontextexam/'.$lesson_section_id);
   }


   if($doneexam == 0){

    /*
    Studentlessonsectionfollowup::create([
      
      'student_id' => auth()->user()->id,
      'lesson_section_id' =>   $lesson_section_id,
      
  ]);
  */
  
     return view('student.lessonsectiontextexamstart', compact('data', 'lessonname','exam', 'data'));
  }





    }



///////////////////////////////////////////////////////////////////////////////////////



public function lessontextexampost(Request $request)
{
   
  Studentlessonsectionfollowup::create([
      
    'student_id' => auth()->user()->id,
    'lesson_section_id' =>   $request->lesson_section_id[0],
    
]);
   
    $questionnumber = count($request->question);

  
    for ($i = 0; $i < $questionnumber; $i++) {

      //  return $request->question[$i]; 

      $exam_id = $request->question[$i];

      

      if(!empty($request->answer[$exam_id])){
        $student_answer = $request->answer[$exam_id];
        }else{
          $student_answer = Null;
        }
        
        
      $lesson_section_id = $request->lesson_section_id[$i];


     
      if(empty($request->student_answer_picture[$exam_id])){

       Studentexamanswer::create([
      

          'student_id' => auth()->user()->id,
          'exam_id' =>   $exam_id,
          'student_answer' =>  $student_answer,
          'lesson_section_id' => $lesson_section_id,
         
      ]);
       
        }
      
        if(!empty($request->student_answer_picture[$exam_id])){

          $student_answer_picture = $this->saveImage($request->student_answer_picture[$exam_id], 'images/studentanswers');

          Studentexamanswer::create([
         
   
             'student_id' => auth()->user()->id,
             'exam_id' =>   $exam_id,
             'student_answer' =>  $student_answer,
             'lesson_section_id' => $lesson_section_id,
             'student_answer_picture' => $student_answer_picture,
            
         ]);
          
           }



    }
  

    return redirect()->back();

}

public function studentresults()
    {
     //   $examname = Studentlessonsectionfollowup::with('lessonsection', 'studentanswer', 'exam')->where('student_id', $id)->get();

     $examname = Studentlessonsectionfollowup::with('lessonsection:id,name,section_type,end_time', 'studentanswer:lesson_section_id,points,student_id', 'exam:lesson_section_id,points')->where('student_id', auth()->user()->id)->get();

   $unitname = Unitexamsectionfollowup::with('unitexamsection:id,name,type,end_time', 'studentanswer:unit_exam_section_id,points,student_id', 'exam:unit_exam_section_id,points')->where('student_id', auth()->user()->id)->get();




    //return $unitname;
     return view('student.studentresults', compact('examname', 'unitname'));
    
    
    }



    public function lcheckanswers($lesson_section_id)
    {


        $exam = Exam::where('lesson_section_id', $lesson_section_id) ->whereIn('id', function ($query)  use($lesson_section_id) {
            $query->select('exam_id')
                ->from('studentexamanswers')->where('lesson_section_id', $lesson_section_id)->where('student_id', auth()->user()->id)->get();
                //->where('lesson_section_id',1);
        })->get();

          $studentanswer = Studentexamanswer::where('lesson_section_id', $lesson_section_id)->where('student_id', auth()->user()->id)->get();


          return view('student.lcheckanswers', compact('exam', 'studentanswer'));

    }




    public function ucheckanswers($unit_exam_section_id)
    {

        $exam = Exam::where('unit_exam_section_id', $unit_exam_section_id) ->whereIn('id', function ($query)  use($unit_exam_section_id) {
            $query->select('exam_id')
                ->from('studentexamanswers')->where('unit_exam_section_id', $unit_exam_section_id)->where('student_id', auth()->user()->id)->get();
                //->where('lesson_section_id',1);
        })->get();

          $studentanswer = Studentexamanswer::where('unit_exam_section_id', $unit_exam_section_id)->where('student_id', auth()->user()->id)->get();


          return view('student.ucheckanswers', compact('exam', 'studentanswer'));


    }



    public function ltextcheckanswers($lesson_section_id)
    {

      
    $exam = Exam::where('lesson_section_id', $lesson_section_id)->whereIn('id', function ($query)  use($lesson_section_id) {
      $query->select('exam_id')
          ->from('studentexamanswers')->where('lesson_section_id', $lesson_section_id)->where('student_id', auth()->user()->id)->get();
          //->where('lesson_section_id',1);
  })->get();
  
    $studentanswer = Studentexamanswer::where('lesson_section_id', $lesson_section_id)->where('student_id', auth()->user()->id)->get();
   
  
     return view('student.ltextcheckanswers', compact('exam', 'studentanswer'));


    }


    
    public function utextcheckanswers($unit_exam_section_id)
    {

      $exam = Exam::where('unit_exam_section_id', $unit_exam_section_id)->whereIn('id', function ($query)  use($unit_exam_section_id) {
        $query->select('exam_id')
            ->from('studentexamanswers')->where('unit_exam_section_id', $unit_exam_section_id)->where('student_id',  auth()->user()->id)->get();
            //->where('lesson_section_id',1);
    })->get();
    
      $studentanswer = Studentexamanswer::where('unit_exam_section_id', $unit_exam_section_id)->where('student_id', auth()->user()->id)->get();
     
    
       return view('student.utextcheckanswers', compact('exam', 'studentanswer'));

    }






}
