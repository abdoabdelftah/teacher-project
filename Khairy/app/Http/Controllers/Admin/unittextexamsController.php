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
class unittextexamsController extends Controller
{

    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $unitexamsection =  Unitexamsection::where('id', $id)->first();
         
        $unit = Unit::where('id', $unitexamsection->unit_id)->first();
        
        $grade = Grade::where('id', $unit->grade_id)->first();

        $data = Exam::where('unit_exam_section_id', $id)->where('type' , '4')->get();
   
        return view('admin.unittextexams', compact('data', 'unitexamsection', 'unit', 'grade'));
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
        return redirect('admin/unittextexams/edit/'.$examid)->with(['message' => 'قم باكمال متطلبات السؤال  ']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unitexamsection =  Unitexamsection::where('id', $id)->first();
         
        $unit = Unit::where('id', $unitexamsection->unit_id)->first();
        
        $grade = Grade::where('id', $unit->grade_id)->first();

        $mainid = Unitexamsection::find($id);
        return view('admin.addunittextexam', compact('mainid', 'unitexamsection', 'unit', 'grade'));
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

        $unitexamsection =  Unitexamsection::where('id', $data->unit_exam_section_id)->first();
         
        $unit = Unit::where('id', $unitexamsection->unit_id)->first();
        
        $grade = Grade::where('id', $unit->grade_id)->first();

      //return $data;
        return view('admin.editunittextexam', compact('data', 'unitexamsection', 'unit', 'grade'));
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

     
       

        return redirect('admin/unittextexams/'.$exam->unit_exam_section_id)->with(['message' => ' تم التحديث بنجاح ']);
   
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
