<?php




namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Grade;
use App\Models\Unit;
use App\Models\Lesson;
use App\Models\Lecture;
use App\Models\Lessonsection;
use App\Models\Unitexamsection;
use App\Models\Exam;

use App\Models\Studentlessonsectionfollowup;
use App\Models\Unitexamsectionfollowup;

use App\Models\Studentexamanswer;

use App\Exports\ResultsExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\GradeUser;
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\Hash;
class followstudentsController extends Controller
{

    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lessonsectionanswered($id)
    {
        $lessonsection =  Lessonsection::where('id', $id)->first();

        $lesson =  Lesson::where('id', $lessonsection->lesson_id)->first();


        $unit = Unit::where('id', $lesson->unit_id)->first();

        $grade = Grade::where('id', $unit->grade_id)->first();

        $examname = Studentlessonsectionfollowup::with('student:id,name', 'studentanswer:lesson_section_id,points,student_id', 'exam:lesson_section_id,points')->where('lesson_section_id', $id)->paginate(10);

        return view('admin.lessonsectionanswered', compact('examname', 'lessonsection', 'lesson', 'unit', 'grade'));
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
    public function lessonsectionnotanswered($id)
    {

        $lessonsection =  Lessonsection::where('id', $id)->first();

        $lesson =  Lesson::where('id', $lessonsection->lesson_id)->first();


        $unit = Unit::where('id', $lesson->unit_id)->first();

        $grade = Grade::where('id', $unit->grade_id)->first();

        $lesson_id = Lessonsection::where('id', $id)->select('lesson_id')->first();


        $unit_id = Lesson::where('id', $lesson_id->lesson_id)->select('unit_id')->first();


        $grade_id = Unit::where('id', $unit_id->unit_id)->select('grade_id')->first();



            $students = User::whereIn('id', function ($query)  use($grade_id) {
                $query->select('user_id')
                    ->from('grade_user')->where('grade_id', $grade_id->grade_id)->get();
                    //->where('lesson_section_id',1);
            })
           // ->where('subscription_end_date', '>', now())
                ->whereNotIn('id', function ($query) use($id) {
                    $query->select('student_id')
                        ->from('studentlessonsectionfollowups')->where('lesson_section_id', $id)->get();
                        //->where('lesson_section_id',1);
                })
                ->paginate(10);


         return view('admin.lessonsectionnotanswered', compact('students', 'lessonsection', 'lesson', 'unit', 'grade'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unitexamsectionanswered($id)
    {

        $unitexamsection =  Unitexamsection::where('id', $id)->first();


        $unit = Unit::where('id', $unitexamsection->unit_id)->first();

        $grade = Grade::where('id', $unit->grade_id)->first();


        $examname = Unitexamsectionfollowup::with('student:id,name', 'studentanswer:unit_exam_section_id,points,student_id', 'exam:unit_exam_section_id,points')->where('unit_exam_section_id', $id)->paginate(10);

        //return $examname;
        return view('admin.unitsectionanswered', compact('examname', 'unitexamsection', 'unit', 'grade'));
    }

    public function unitanswerexport($id) 
{

    
   

    $examname = Unitexamsectionfollowup::with('student:id,name', 'studentanswer:unit_exam_section_id,points,student_id', 'exam:unit_exam_section_id,points')->where('unit_exam_section_id', $id)->get();

$downloadname = Unitexamsection::where('id', $id)->first();
    return Excel::download(new ResultsExport($examname), ' درجات الطلاب فى '.$downloadname->name.'.xlsx');
}



public function lessonanswerexport($id) 
{

    
   

    $examname = Studentlessonsectionfollowup::with('student:id,name', 'studentanswer:lesson_section_id,points,student_id', 'exam:lesson_section_id,points')->where('lesson_section_id', $id)->get();

  
   
$downloadname = Lessonsection::where('id', $id)->first();

return Excel::download(new ResultsExport($examname), ' درجات الطلاب فى '.$downloadname->name.'.xlsx');
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unitexamsectionnotanswered($id)
    {

        $unitexamsection =  Unitexamsection::where('id', $id)->first();


        $unit = Unit::where('id', $unitexamsection->unit_id)->first();

        $grade = Grade::where('id', $unit->grade_id)->first();



        $unit_id = Unitexamsection::where('id', $id)->select('unit_id')->first();




        $grade_id = Unit::where('id', $unit_id->unit_id)->select('grade_id')->first();



            $students = User::whereIn('id', function ($query)  use($grade_id) {
                $query->select('user_id')
                    ->from('grade_user')->where('grade_id', $grade_id->grade_id)->get();
                    //->where('lesson_section_id',1);
            })
           // ->where('subscription_end_date', '>', now())
                ->whereNotIn('id', function ($query) use($id) {
                    $query->select('student_id')
                        ->from('unitexamsectionfollowups')->where('unit_exam_section_id', $id)->get();
                        //->where('lesson_section_id',1);
                })
                ->paginate(10);


         return view('admin.unitsectionnotanswered', compact('students', 'unitexamsection', 'unit', 'grade'));


    }




    public function correctunittextexam($student_id, $unit_exam_section_id)
    {



      $doneexamtime = Unitexamsectionfollowup::where('unit_exam_section_id', $unit_exam_section_id)->where('student_id', $student_id)->first();


      $exam = Exam::where('unit_exam_section_id', $unit_exam_section_id)
      ->whereIn('id', function ($query)  use($unit_exam_section_id, $student_id) {
        $query->select('exam_id')
            ->from('studentexamanswers')->where('unit_exam_section_id', $unit_exam_section_id)->where('student_id', $student_id)->get();
            //->where('lesson_section_id',1);
    })
    ->get();

      $studentanswer = Studentexamanswer::where('unit_exam_section_id', $unit_exam_section_id)->where('student_id',$student_id)->get();


       return view('admin.correctunitexam', compact('exam', 'studentanswer', 'doneexamtime'));


      }




      public function correctunittextexamdone(Request $request)
      {

      $questionnumber = count($request->question);


      for ($i = 0; $i < $questionnumber; $i++) {

        //  return $request->question[$i];

        $exam_id = $request->question[$i];



        $right_answer = $request->right_answer[$exam_id];



        $unit_exam_section_id = $request->unit_exam_section_id[$i];

        $student_id = $request->student_id[$i];

        $points = $request->points[$exam_id];


        $studentexamanswer = Studentexamanswer::where('exam_id' , $exam_id)->where('student_id', $student_id)->where('unit_exam_section_id', $unit_exam_section_id )->first();

        if(empty($request->right_answer_picture[$exam_id])){

        $studentexamanswer->update([


            'right_answer' => $right_answer,
            'points' =>   $points,

        ]);

        }


        if(!empty($request->right_answer_picture[$exam_id])){

            $right_answer_picture = $this->saveImage($request->right_answer_picture[$exam_id], 'images/rightanswers');

            $studentexamanswer->update([


                'right_answer' => $right_answer,
                'points' =>   $points,
                'right_answer_picture' => $right_answer_picture,
            ]);

            }



      }

      $unitexamsectionfollowup = Unitexamsectionfollowup::where('student_id', $request->student_id[0])->where('unit_exam_section_id', $request->unit_exam_section_id[0]);

      $unitexamsectionfollowup->update([

        'done' => 1,


    ]);

      return redirect("/admin/student/unitexamsection/answered/".$request->unit_exam_section_id[0]);


}



public function showunitnotcorrected()
{
    $examname = Unitexamsectionfollowup::with('student')->with('unitexamsection')->where('done', 0)->get();

    return view('admin.unitnotcorrected', compact('examname'));
}


public function showlessonnotcorrected()
{
    $examname = Studentlessonsectionfollowup::with('student')->with('lessonsection')->where('done', 0)->get();

    return view('admin.lessonnotcorrected', compact('examname'));
}



public function correctlessontextexam($student_id, $lesson_section_id)
    {



      $doneexamtime = Studentlessonsectionfollowup::where('lesson_section_id', $lesson_section_id)->where('student_id', $student_id)->first();


      $exam = Exam::where('lesson_section_id', $lesson_section_id)->whereIn('id', function ($query)  use($lesson_section_id, $student_id) {
        $query->select('exam_id')
            ->from('studentexamanswers')->where('lesson_section_id', $lesson_section_id)->where('student_id', $student_id)->get();
            //->where('lesson_section_id',1);
    })
    ->get();

      $studentanswer = Studentexamanswer::where('lesson_section_id', $lesson_section_id)->where('student_id',$student_id)->get();



       return view('admin.correctlessonexam', compact('exam', 'studentanswer', 'doneexamtime'));


      }





      public function correctlessontextexamdone(Request $request)
      {

      $questionnumber = count($request->question);


      for ($i = 0; $i < $questionnumber; $i++) {

        //  return $request->question[$i];

        $exam_id = $request->question[$i];



        $right_answer = $request->right_answer[$exam_id];



        $lesson_section_id = $request->lesson_section_id[$i];

        $student_id = $request->student_id[$i];

        $points = $request->points[$exam_id];


        $studentexamanswer = Studentexamanswer::where('exam_id' , $exam_id)->where('student_id', $student_id)->where('lesson_section_id', $lesson_section_id )->first();

        if(empty($request->right_answer_picture[$exam_id])){

        $studentexamanswer->update([


            'right_answer' => $right_answer,
            'points' =>   $points,

        ]);

        }


        if(!empty($request->right_answer_picture[$exam_id])){

            $right_answer_picture = $this->saveImage($request->right_answer_picture[$exam_id], 'images/rightanswers');

            $studentexamanswer->update([


                'right_answer' => $right_answer,
                'points' =>   $points,
                'right_answer_picture' => $right_answer_picture,
            ]);

            }



      }

      $studentlessonsectionfollowup = Studentlessonsectionfollowup::where('student_id', $request->student_id[0])->where('lesson_section_id', $request->lesson_section_id[0]);

      $studentlessonsectionfollowup->update([

        'done' => 1,


    ]);

      return redirect("/admin/student/lessonsection/answered/".$request->lesson_section_id[0]);


}







}
