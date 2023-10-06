<?php




namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Traits\DeleteTrait;


use App\Models\User;
use App\Models\Grade;
use App\Models\Unit;
use App\Models\Exam;
use App\Models\GradeUser;
use App\Models\Studentexamanswer;
use App\Models\Studentlessonsectionfollowup;
use App\Models\Unitexamsection;
use App\Models\Unitexamsectionfollowup;
use App\Models\Lesson;
use App\Models\Lecture;
use App\Models\Lessonsection;
use Illuminate\Support\Facades\Hash;
class deletesController extends Controller
{

    use DeleteTrait;


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function question($id)
    {


        $exam = Exam::find($id);
        if (!$exam)
            return redirect()->back();

        
            $q = $this->deleteExampic($exam->question);
            $c1 = $this->deleteExampic($exam->choose1);
            $c2 = $this->deleteExampic($exam->choose2);
            $c3 = $this->deleteExampic($exam->choose3);
            $c4 = $this->deleteExampic($exam->choose4);    

        ////////////////Delete the student answers/////////////////
            $studentexamanswers = Studentexamanswer::where('exam_id',$id)->get();
            foreach($studentexamanswers as $sanswer){

                if(!empty($sanswer->student_answer_picture)){
                    $ans = $this->deleteExamans($sanswer->student_answer_picture);
                   
                }

                if(!empty($sanswer->right_answer_picture)){
                    $ans = $this->deleteExamright($sanswer->right_answer_picture);
                   
                }

                Studentexamanswer::where('id', $sanswer->id)->forceDelete();

            }

        /////////////////End Delete Answers////////////////////////


           Exam::where('id', $id)->forceDelete();


            return redirect()->back()->with(['message' => ' تم المسح بنجاح ']);

}



public function lessonsection($id)
{

    $lessonsection = Lessonsection::find($id);
    if (!$lessonsection)
        return redirect()->back();


        ///////////////Delete questions of exam///////////////
        $lessoncontent = Exam::where('lesson_section_id', $id)->get();
    
        foreach ($lessoncontent as $content){
            $dcontent = $this->question($content->id);
        }
         
        //////Delete lecture content////////////////
        $lessonlecture = Lecture::where('lesson_section_id', $id)->get();
    
        foreach ($lessonlecture as $lcontent){
            $lfile = $this->deleteLec($lcontent->content);

            Lecture::where('id', $lcontent->id)->forceDelete();

        }


        //////Delete Student Lesson Section Follow up//////////

        Studentlessonsectionfollowup::where('lesson_section_id', $id)->forceDelete();

        ///////Delete the lessonsection//////

        Lessonsection::where('id', $id)->forceDelete();


        return redirect()->back()->with(['message' => ' تم المسح بنجاح ']);
        
    

    
}

public function lesson($id)
{


    $lesson = Lesson::find($id);
    if (!$lesson)
        return redirect()->back();


        ///////////////Delete sections of lesson///////////////
        $lessonc = lessonsection::where('lesson_id', $id)->get();
    
        foreach ($lessonc as $contentc){
            $ccontent = $this->lessonsection($contentc->id);
        }

Lesson::where('id', $id)->forceDelete();


return redirect()->back()->with(['message' => ' تم المسح بنجاح ']);


}


public function unitexam($id)
{


    
       $unitexamsection = Unitexamsection::find($id);
       if (!$unitexamsection)
       return redirect()->back();


        ///////////////Delete questions of exam///////////////
        $unitcontent = Exam::where('unit_exam_section_id', $id)->get();
    
        foreach ($unitcontent as $ucontent){
            $ucontent = $this->question($ucontent->id);
        }
         
        


        //////Delete Student Unit Section Follow up//////////

        Unitexamsectionfollowup::where('unit_exam_section_id', $id)->forceDelete();

        ///////Delete the unit section//////

        Unitexamsection::where('id', $id)->forceDelete();


        return redirect()->back()->with(['message' => ' تم المسح بنجاح ']);




    
}



public function unit($id)
{

    $unit = Unit::find($id);
    if (!$unit)
    return redirect()->back();


     ///////////////Delete Lessons of the Unit///////////////
     $unitlessons = Lesson::where('unit_id', $id)->get();
 
     foreach ($unitlessons as $ulesson){
         $ualesson = $this->lesson($ulesson->id);
     }

     
     ///////////////Delete Unit Exams of the Unit///////////////
     $unitexams = Unitexamsection::where('unit_id', $id)->get();
 
     foreach ($unitexams as $uexam){
         $uaexam = $this->unitexam($uexam->id);
     }
 

     Unit::where('id', $id)->forceDelete();


     return redirect()->back()->with(['message' => ' تم المسح بنجاح ']);



    
    
}



public function grade($id)
{


    $grade = Grade::find($id);
    if (!$grade)
    return redirect()->back();


     ///////////////Delete Lessons of the Unit///////////////
     $gradeunits = Unit::where('grade_id', $id)->get();
 
     foreach ($gradeunits as $gunit){
         $gu = $this->unit($gunit->id);
     }

     GradeUser::where('grade_id', $id)->forceDelete();

     Grade::where('id', $id)->forceDelete();


     return redirect()->back()->with(['message' => ' تم المسح بنجاح ']);

    
}





}
