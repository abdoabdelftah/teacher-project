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
use Illuminate\Support\Facades\Hash;

class lessonsectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $grades = Grade::with('units.lessons.lessonsections')->get();

        $data = Lessonsection::where('lesson_id', $id)->withCount('sectionFollowup')->orderBy('priority', 'ASC')->get();

        $userCount = User::whereHas('grades.units.lessons', function ($query) use ($id) {
            $query->where('lessons.id', $id);
        })->count();


        return view('admin.new.lessonsections', compact('data', 'grades', 'id', 'userCount'));
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

        $request->validate([
            'name' => 'required',
        ]);

        $lessonsection = new Lessonsection;


        $lessonsection->name = $request->name;

        $lessonsection->lesson_id = $request->lesson_id;
        $lessonsection->section_type = $request->add_section_type;

        if ($request->has('hide')) {

            $lessonsection->hide = 1;
        } else {
            $lessonsection->hide = 0;
        }

        if ($request->has('block')) {

            $lessonsection->block = 1;
        } else {
            $lessonsection->block = 0;
        }

        if ($request->has('time')) {
            $lessonsection->has_time = 1;
            $lessonsection->stop_watch = $request->minutes;
        } else {
            $lessonsection->has_time = 0;
        }
        $lessonsection->save();

        if ($request->add_section_type == 1) {
            return redirect()->intended('/admin/exams/' . $lessonsection->id);
        }
        if ($request->add_section_type == 3) {
            return redirect()->intended('/admin/lessontextexams/' . $lessonsection->id);
        }
        if ($request->add_section_type == 4) {
            return redirect()->intended('/admin/lessonpdfexam/' . $lessonsection->id);
        }
        if ($request->add_section_type == 5) {
            return redirect()->intended('/admin/lectureedit/' . $lessonsection->id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson =  Lesson::where('id', $id)->first();


        $unit = Unit::where('id', $lesson->unit_id)->first();

        $grade = Grade::where('id', $unit->grade_id)->first();

        $mainid = Lesson::find($id);
        return view('admin.addlessonsection', compact('mainid', 'lesson', 'unit', 'grade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $data = Lessonsection::find($id);

        return response()->json($data);
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

        $lessonsection = Lessonsection::find($request->id);
        if (!$lessonsection)
            return redirect()->back();

        $lessonsection->name = $request->name;

        if ($request->has('hide')) {

            $lessonsection->hide = 1;
        } else {
            $lessonsection->hide = 0;
        }

        if ($request->has('block')) {

            $lessonsection->block = 1;
        } else {
            $lessonsection->block = 0;
        }

        if ($request->has('time')) {
            $lessonsection->has_time = 1;
            $lessonsection->stop_watch = $request->minutes;
        } else {
            $lessonsection->has_time = 0;
        }

        $lessonsection->save();


        return redirect()->back()->with(['message' => ' تم التحديث بنجاح ']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function updateOrder(Request $request)
    {


        $priorities = $request->input('priorities');

        foreach ($priorities as $index => $priorityData) {
            $sectionId = $priorityData['id'];
            $priority = $index + 1;

            // Update the priority in the database
            // Assuming you have a Section model and a priority column
            Lessonsection::where('id', $sectionId)->update(['priority' => $priority]);
        }

        return response()->json(['success' => true]);
    }


    public function destroy($id)
    {
        //
    }


    public function moveSection(Request $request) {

        $to_lesson_id = $request->lesson_id;

         $section = Lessonsection::find($request->section_id);

         $newSection = $section->replicate()->fill(
            [
                'lesson_id' => $to_lesson_id,
            ]
        );

         $newSection->save();

         if($section->section_type == 1){
         foreach($section->exams()->get() as $exam){

            $newExam = $exam->replicate()->fill(
                [
                    'lesson_section_id' => $newSection->id,
                ]
            );

             $newExam->save();

           }
          }

          if($section->section_type == 5){

            $newExam = $section->lecture()->first()->replicate()->fill(
                [
                    'lesson_section_id' => $newSection->id,
                ]
            );

             $newExam->save();

          }



         return redirect()->back()->with(['message' => ' تم النسخ بنجاح ', 'target' => $to_lesson_id]);

    }


}
