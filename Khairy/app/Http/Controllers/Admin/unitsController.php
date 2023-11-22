<?php




namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Grade;
use App\Models\Unit;
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\Hash;
class unitsController extends Controller
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

        return view('admin.new.units', compact('id', 'grades'));
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

        $unit = new Unit;

        $unit->name = $request->name;
        $unit->description = $request->description;
        $unit->grade_id = $request->grade_id;
        if ($request->has('image')) {
            $unit->image = $this->saveImage($request->image, 'images/grades');
        }

        if ($request->has('hide')) {
            $unit->hide = 1;
        }else{
            $unit->hide = 0;
        }

        $unit->save();


        return redirect()->back()->with(['message' => 'تم اضافه وحدة جديد ']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grade = Grade::where('id', $id)->first();


        $mainid = Grade::find($id);
        return view('admin.addunit', compact('mainid' , 'grade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data = Unit::find($id);

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
        $unit = Unit::find($request->id);
        if (!$unit)
            return redirect()->back();

        $unit->name = $request->name;
        $unit->description = $request->description;

        if ($request->has('image')) {

            !empty($unit->image) ? $this->deleteImage($unit->image, 'grades'): '';

            $unit->image = $this->saveImage($request->image, 'images/grades');
        }

        if ($request->has('hide')) {

            $unit->hide = 1;
        }else{
            $unit->hide = 0;
        }

        $unit->save();

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
