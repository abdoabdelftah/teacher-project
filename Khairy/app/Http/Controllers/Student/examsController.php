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
use App\Traits\SectionTrait;
use auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class examsController extends Controller
{

  use ImageTrait;
  use SectionTrait;
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
        $checkGate = $this->checkGate($grade_id, $unit_id, $lesson_id, $lesson_section_id);
        if($checkGate){
            return redirect($checkGate);
        }

        $section = Lessonsection::where('id', $lesson_section_id)->with(['sectionFollowup' => function($q){
            $q->where('student_id', auth()->user()->id);
        }])->first();

        if(! in_array($section->lesson->unit->grade->id, auth()->user()->grades->flatten()->pluck('id')->toArray())){
            return redirect('/grades');
        }


        $data = Exam::where('lesson_section_id', $lesson_section_id)->with(['studentexamanswers' =>function($q){
            $q->where('student_id', auth()->user()->id);
        }])->get();

        $lesson = Lesson::where('id', $lesson_id)->where('hide', 0)->with([
            'userLessonsections' =>function($q){
                $q->where('hide', 0)->orderBy('priority', 'asc');
                $q->with(['sectionFollowup' =>function($sq){
                    $sq->where('student_id', auth()->user()->id);
                }]);
            }
        ])->first();

        if($section->section_type == 1 || $section->section_type == 2){
        return view('student.new.exam', compact('data', 'section', 'lesson'));
        }elseif($section->section_type == 3){
        return view('student.new.text-exam', compact('data', 'section', 'lesson'));
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

    $checkGate = $this->checkGate($grade_id, $unit_id, $lesson_id, $lesson_section_id);
        if($checkGate){
            return redirect($checkGate);
        }

    $section = Lessonsection::where('id', $lesson_section_id)->with(['sectionFollowup' => function($q){
        $q->where('student_id', auth()->user()->id);
    }])->first();

    if(! in_array($section->lesson->unit->grade->id, auth()->user()->grades->flatten()->pluck('id')->toArray())){
        return redirect('/grades');
    }


    $data = Exam::where('lesson_section_id', $lesson_section_id)->with(['studentexamanswers' =>function($q){
        $q->where('student_id', auth()->user()->id);
    }])->get();

    $lesson = Lesson::where('id', $lesson_id)->where('hide', 0)->with([
        'userLessonsections' =>function($q){
            $q->where('hide', 0)->orderBy('priority', 'asc');
            $q->with(['sectionFollowup' =>function($sq){
                $sq->where('student_id', auth()->user()->id);
            }]);
        }
    ])->first();

    if($section->section_type == 1 || $section->section_type == 2){
    return view('student.new.exam', compact('data', 'section', 'lesson'));
    }elseif($section->section_type == 3){
    return view('student.new.text-exam', compact('data', 'section', 'lesson'));
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

     $follow_up = Studentlessonsectionfollowup::with('lessonsection.lesson.unit.grade', 'studentanswer:lesson_section_id,points,student_id', 'exam:lesson_section_id,points')->where('student_id', auth()->user()->id)->get();




    //return $unitname;
     return view('student.new.allExams', compact('follow_up'));


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




    public function saveStudentAnswer(Request $request)
    {


        $student_id = $request->input('student_id');
        $exam_id = $request->input('exam_id');
        $student_answer = $request->input('student_answer');
        $exam = Exam::where('id', $exam_id)->first();
        $right_answer = $exam->right_answer;
        $is_right = $student_answer == $right_answer ? 1 : 0;
        $points = $student_answer == $right_answer ? $exam->points : 0;
        // Use updateOrcreate to create or update the record
        Studentexamanswer::updateOrcreate(
            ['student_id' => $student_id, 'exam_id' => $exam_id],
            [
                'lesson_section_id' => $exam->lessonsection->id,
                'student_answer' => $student_answer,
                'right_answer' => $right_answer,
                'is_right' => $is_right,
                'points' => $points,
            ]
        );


        return response()->json(['message' => 'Answer saved successfully']);
    }




    public function savetextStudentAnswer(Request $request)
    {


        $student_id = $request->input('student_id');
        $exam_id = $request->input('exam_id');
        $exam = Exam::where('id', $exam_id)->first();

        // Check if an image file is present
        if ($request->hasFile('student_answer_image')) {

            $validator = Validator::make($request->all(), [
                'student_answer_image' => 'image|mimes:jpeg,png,jpg,gif|max:30720', // Maximum file size is 30 MB
            ], [
                'student_answer_image.mimes' => 'نحن نقبل الاشكال التالية من الصور فقط',
                'student_answer_image.max' => 'نحن نقبل الاشكال التالية من الصور فقط ويجب أن يكون حجم الصورة أقل من 30 ميجابايت',
            ]);

            if ($validator->fails()) {

                return response()->json([
                    'code' => '401',
                    'message' => 'نحن نقبل الاشكال المعروفة من الصور فقط ويجب أن يكون حجم الصورة من 30 ميجابايت'
                ], 401, [], JSON_UNESCAPED_UNICODE);


            }

            $imagePath = $this->saveImage($request->file('student_answer_image'), 'images/studentanswers');

            // Save the image path in the database
            Studentexamanswer::updateOrcreate(
                ['student_id' => $student_id, 'exam_id' => $exam_id],
                [
                    'lesson_section_id' => $exam->lessonsection->id,
                    'student_answer_picture' => $imagePath,
                ]
            );

            return response()->json(['message' => 'Student answer saved successfully', 'student_answer_image' => $imagePath], 200, [], JSON_UNESCAPED_SLASHES);

        } else {
        $student_answer_text = $request->input('student_answer_text');
            // Save text answer in the database
            Studentexamanswer::updateOrcreate(
                ['student_id' => $student_id, 'exam_id' => $exam_id],
                [
                    'lesson_section_id' => $exam->lessonsection->id,
                    'student_answer' => $student_answer_text,
                ]
            );
        }

        // You can return a response if needed
        return response()->json(['message' => 'Student answer saved successfully']);

    }

    public function pdfexam($grade_id, $unit_id, $lesson_id, $lesson_section_id){

        $checkGate = $this->checkGate($grade_id, $unit_id, $lesson_id, $lesson_section_id);
        if($checkGate){
            return redirect($checkGate);
        }

        $section = Lessonsection::where('id', $lesson_section_id)->with(['sectionFollowup' => function($q){
            $q->where('student_id', auth()->user()->id);
        }])->first();

        if(! in_array($section->lesson->unit->grade->id, auth()->user()->grades->flatten()->pluck('id')->toArray())){
            return redirect('/grades');
        }


        $exam = Exam::where('lesson_section_id', $lesson_section_id)->with(['studentexamanswers' =>function($q){
            $q->where('student_id', auth()->user()->id);
        }])->first();

        $lesson = Lesson::where('id', $lesson_id)->where('hide', 0)->with([
            'userLessonsections' =>function($q){
                $q->where('hide', 0)->orderBy('priority', 'asc');
                $q->with(['sectionFollowup' =>function($sq){
                    $sq->where('student_id', auth()->user()->id);
                }]);
            }
        ])->first();

        return view('student.new.pdf-exam', compact('exam', 'section', 'lesson'));

        }



        public function savepdfStudentAnswer(Request $request)
        {


            $student_id = $request->input('student_id');
            $exam_id = $request->input('exam_id');
            $exam = Exam::where('id', $exam_id)->first();

            // Check if an image file is present
            if ($request->hasFile('student_answer_image')) {

                $validator = Validator::make($request->all(), [
                    'student_answer_image' => 'file|mimes:pdf|max:102400', // Maximum file size is 30 MB
                ], [
                    'student_answer_image.mimes' => 'نحن نقبل الاشكال التالية من الملفات PDF فقط',
                    'student_answer_image.max' => 'نحن نقبل الاشكال التالية من الملفات PDF فقط ويجب أن يكون حجم الملف أقل من 30 ميجابايت',
                ]);

                if ($validator->fails()) {

                    return response()->json([
                        'code' => '401',
                        'message' => 'نحن نقبل الملفات فقط ويجب أن يكون حجم الملف اقل من 100 ميجابايت'
                    ], 401, [], JSON_UNESCAPED_UNICODE);


                }

                $imagePath = $this->saveImage($request->file('student_answer_image'), 'images/studentanswers');

                // Save the image path in the database
                Studentexamanswer::updateOrcreate(
                    ['student_id' => $student_id, 'exam_id' => $exam_id],
                    [
                        'lesson_section_id' => $exam->lessonsection->id,
                        'student_answer_picture' => $imagePath,
                    ]
                );

                return response()->json(['message' => 'Student answer saved successfully', 'student_answer_image' => $imagePath], 200, [], JSON_UNESCAPED_SLASHES);

            }

        }


    }


