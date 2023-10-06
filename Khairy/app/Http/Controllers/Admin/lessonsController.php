<?php




namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Grade;
use App\Models\Unit;
use App\Models\Unitexamsection;
use App\Models\Lesson;
use Illuminate\Support\Facades\Hash;
class lessonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $unit = Unit::where('id', $id)->first();
        
        $grade = Grade::where('id', $unit->grade_id)->first();
        
        $data = Lesson::where('unit_id', $id)->get();

        $examsection = Unitexamsection::where('unit_id', $id)->get();
   
        return view('admin.lessons', compact('data','examsection', 'unit', 'grade'));
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
       
       

        Lesson::create([
          
            'name' => $request->name,
            'unit_id' => $request->unit_id,
          
        ]);

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
        $unit = Unit::where('id', $data->unit_id)->first();
        
        $grade = Grade::where('id', $unit->grade_id)->first();
        //return $data;
        return view('admin.editlesson', compact('data', 'unit', 'grade'));
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

        //update data

        $lesson->update($request->all());
       

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
