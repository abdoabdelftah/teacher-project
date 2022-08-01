<?php




namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Grade;
use App\Models\Unit;
use Illuminate\Support\Facades\Hash;
class unitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $grade = Grade::where('id', $id)->first();

        $data = Unit::where('grade_id', $id)->get();
   
        return view('admin.units', compact('data', 'grade'));
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
       
       

        Unit::create([
          
            'name' => $request->name,
            'grade_id' => $request->grade_id,
          
        ]);

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
        $grade = Grade::where('id', $data->grade_id)->first();
      //return $data;
        return view('admin.editunit', compact('data' , 'grade'));
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

        //update data

        $unit->update($request->all());
       

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
