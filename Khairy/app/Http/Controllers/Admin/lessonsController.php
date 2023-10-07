<?php




namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Grade;
use App\Models\Unit;
use App\Models\Unitexamsection;
use App\Models\Lesson;
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\Hash;
class lessonsController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {


        $grades = Grade::with('units.lessons.lessonsections')->get();

        $lessons = Lesson::where('unit_id', $id)->get();


        return view('admin.new.lessons', compact('lessons', 'grades', 'id'));
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

        $lesson = new Lesson;

        $lesson->name = $request->name;
        $lesson->unit_id = $request->unit_id;
        if ($request->has('image')) {
            $lesson->image = $this->saveImage($request->image, 'images/grades');
        }

        if ($request->has('hide')) {
            $lesson->hide = 1;
        }else{
            $lesson->hide = 0;
        }

        $lesson->save();

        return redirect()->back()->with(['message' => 'تم اضافه درس جديد ']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unit = Unit::where('id', $id)->first();

        $grade = Grade::where('id', $unit->grade_id)->first();

        $mainid = Unit::find($id);
        return view('admin.addlesson', compact('mainid', 'unit', 'grade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Lesson::find($id);

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

        $lesson = Lesson::find($request->id);
        if (!$lesson)
            return redirect()->back();

        $lesson->name = $request->name;

        if ($request->has('image')) {

            !empty($lesson->image) ? $this->deleteImage($lesson->image, 'grades'): '';

            $lesson->image = $this->saveImage($request->image, 'images/grades');
        }

        if ($request->has('hide')) {

            $lesson->hide = 1;
        }else{
            $lesson->hide = 0;
        }

        $lesson->save();


        return redirect()->back()->with(['message' => ' تم التحديث بنجاح ']);

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
