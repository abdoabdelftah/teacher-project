<?php




namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Grade;
use App\Models\Unit;
use App\Models\Unitexamsection;
use App\Models\Lesson;
use App\Models\Lecture;
use App\Models\Lessonsection;
use App\Models\Exam;
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\Hash;
class lessontextexamsController extends Controller
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

        $data = Exam::where('lesson_section_id', $id)->where('type' , '6')->get();

        return view('admin.lessontextexams', compact('data', 'lessonsection', 'lesson', 'unit', 'grade'));
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
        return redirect('admin/lessontextexams/edit/'.$examid)->with(['message' => 'قم باكمال متطلبات السؤال  ']);
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
        return view('admin.addlessontextexam', compact('mainid', 'lessonsection', 'lesson', 'unit', 'grade'));
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
        return view('admin.editlessontextexam', compact('data', 'lessonsection', 'lesson', 'unit', 'grade'));
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



        $exam = Exam::find($request->id);
        if (!$exam)
            return redirect()->back();

        //update data


        if($exam->question_type == 1){
         $question = $request->question;

        }elseif($exam->question_type == 2){
            $question = $this->saveImage($request->question, 'images/exams');

        }






        $exam->update([
            'name' => $request->name,

            'points' => $request->points,
            'question' => $question,

            'hide' => $request->hide,

            ]);




        return redirect('admin/lessontextexams/'.$exam->lesson_section_id)->with(['message' => ' تم التحديث بنجاح ']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function indexPdf($id)
    {

        $grades = Grade::with('units.lessons.lessonsections')->get();


        $exam = Exam::where('lesson_section_id', $id)->first();

        if (!$exam){
            $exam = Exam::Create(['lesson_section_id' => $id]);
         }

        return view('admin.new.pdfExam', compact('exam', 'id', 'grades'));

    }

    public function updatePdfExam(Request $request)
    {

        $request->validate([
            'pdf' => 'required',
        ]);

        $exam = Exam::where('lesson_section_id', $request->id)->first();
        if (!$exam)
            return redirect()->back();

            !empty($exam->question)  ? $this->deleteImage($exam->question, 'exams'): '';

            $exam->question = $this->saveImage($request->pdf, 'images/exams');

            $exam->save();


        return redirect()->back()->with(['message' => ' تم التحديث بنجاح ']);


    }

}
