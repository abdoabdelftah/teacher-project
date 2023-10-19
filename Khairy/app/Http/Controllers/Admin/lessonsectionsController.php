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

        $userCount = User::whereHas('grades.units.lessons', function($query) use ($id) {
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

        $type = $request->section_type;

        if($type == 5){

            Lessonsection::create([

                'name' => $request->name,
                'lesson_id' => $request->lesson_id,
                'section_type' => $request->section_type,
                'priority' => $request->priority,

            ]);

            $lesson_section_id = Lessonsection::max('id');

            Lecture::create([

                'name' => $request->name,
                'lesson_id' => $request->lesson_id,
                'lesson_section_id' => $lesson_section_id,


            ]);

        }else{

        Lessonsection::create([

            'name' => $request->name,
            'lesson_id' => $request->lesson_id,
            'section_type' => $request->section_type,
            'priority' => $request->priority,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,


            //'stop_watch' => $request->stop_watch,

        ]);

        }

        return redirect('admin/lessonsections/'.$request->lesson_id)->with(['message' => 'تم اضافه فقرة جديدة  ']);
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
        }else{
            $lessonsection->hide = 0;
        }

        if ($request->has('block')) {

            $lessonsection->block = 1;
        }else{
            $lessonsection->block = 0;
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
}
