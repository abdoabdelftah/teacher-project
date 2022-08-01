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
use Illuminate\Support\Facades\Hash;
class unitexamsectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

       
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
       
        Unitexamsection::create($request->all());

        return redirect('admin/lessons/'.$request->unit_id)->with(['message' => 'تم اضافه امتحان جديد  ']);
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
        return view('admin.addunitexamsection', compact('mainid', 'unit', 'grade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Unitexamsection::find($id);
         
        $unit = Unit::where('id', $data->unit_id)->first();
        
        $grade = Grade::where('id', $unit->grade_id)->first();

      //return $data;
        return view('admin.editunitexamsection', compact('data' , 'unit', 'grade'));
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
        $unitexamsection = Unitexamsection::find($request->id);
        if (!$unitexamsection)
            return redirect()->back();

        //update data

        $unitexamsection->update($request->all());
       

        return redirect('admin/lessons/'.$unitexamsection->unit_id)->with(['message' => ' تم التحديث بنجاح ']);
   
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
