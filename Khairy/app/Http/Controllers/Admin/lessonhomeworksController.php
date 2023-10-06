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
use App\Models\Exam;
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\Hash;
class lessonhomeworksController extends Controller
{

    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $lessonsection =  Lessonsection::where('id', $id)->first();

        $lesson =  Lesson::where('id', $lessonsection->lesson_id)->first();


        $unit = Unit::where('id', $lesson->unit_id)->first();
        
        $grade = Grade::where('id', $unit->grade_id)->first();

        $data = Exam::where('lesson_section_id', $id)->get();
   
        return view('admin.lessonhomeworks', compact('data', 'lessonsection', 'lesson', 'unit', 'grade'));
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
    public function store(Request $request)
    {
       

        Exam::create($request->all());

        $examid = Exam::max('id');
        return redirect('admin/lessonhomeworks/edit/'.$examid)->with(['message' => 'قم باكمال متطلبات السؤال  ']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $lessonsection =  Lessonsection::where('id', $id)->first();

        $lesson =  Lesson::where('id', $lessonsection->lesson_id)->first();


        $unit = Unit::where('id', $lesson->unit_id)->first();
        
        $grade = Grade::where('id', $unit->grade_id)->first();

        $mainid = Lessonsection::find($id);
        return view('admin.addlessonhomework', compact('mainid', 'lessonsection', 'lesson', 'unit', 'grade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Exam::find($id);

        $lessonsection =  Lessonsection::where('id', $data->lesson_section_id)->first();

        $lesson =  Lesson::where('id', $lessonsection->lesson_id)->first();


        $unit = Unit::where('id', $lesson->unit_id)->first();
        
        $grade = Grade::where('id', $unit->grade_id)->first();
      //return $data;
        return view('admin.editlessonhomework', compact('data', 'lessonsection', 'lesson', 'unit', 'grade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        if(! empty($request->question) && !empty($request->choose1)){

        $exam = Exam::find($request->id);
        if (!$exam)
            return redirect()->back();

        //update data

     
        if($exam->question_type == 1){
         $question = $request->question;

        }elseif($exam->question_type == 2){
            $question = $this->saveImage($request->question, 'images/exams');

        }


        if($exam->choose_type == 1){
            $choose1 = $request->choose1;
            $choose2 = $request->choose2;
            $choose3 = $request->choose3;
            $choose4 = $request->choose4;


           }elseif($exam->choose_type == 2){
               $choose1 = $this->saveImage($request->choose1, 'images/exams');
               $choose2 = $this->saveImage($request->choose2, 'images/exams');
               $choose3 = $this->saveImage($request->choose3, 'images/exams');
               $choose4 = $this->saveImage($request->choose4, 'images/exams');
           }



        $exam->update([
            'name' => $request->name,
            'right_answer' => $request->right_answer,
            'points' => $request->points,
            'question' => $question,
            'choose1' => $choose1,
            'choose2' => $choose2,
            'choose3' => $choose3,
            'choose4' => $choose4,
            'hide' => $request->hide,
        
            ]);

        }else{

            $exam = Exam::find($request->id);
            if (!$exam)
                return redirect()->back();

                $exam->update([
                    'name' => $request->name,
                    'right_answer' => $request->right_answer,
                    'points' => $request->points,
                    'hide' => $request->hide,
                 ]);
        }
       

        return redirect('admin/lessonhomeworks/'.$exam->lesson_section_id)->with(['message' => ' تم التحديث بنجاح ']);
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
