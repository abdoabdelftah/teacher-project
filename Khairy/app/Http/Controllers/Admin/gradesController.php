<?php




namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Grade;
use Illuminate\Support\Facades\Hash;
use App\Traits\ImageTrait;
class gradesController extends Controller
{

    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $grades = Grade::with('units.lessons.lessonsections')->get();

        return view('admin.new.grades', compact('grades'));
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


        $grade = new Grade;

        $grade->name = $request->name;

        if ($request->has('image')) {
            $grade->image = $this->saveImage($request->image, 'images/grades');
        }

        if ($request->has('hide')) {
            $grade->hide = 1;
        }else{
            $grade->hide = 0;
        }

        $grade->save();

        return redirect()->back()->with(['message' => 'تم اضافه كورس جديد ']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Grade::find($id);
      //return $data;
        //return view('admin.editgrade', compact('data'));
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

        $grade = Grade::find($request->id);
        if (!$grade)
            return redirect()->back();

        $grade->name = $request->name;

        if ($request->has('image')) {

            !empty($grade->image) ? $this->deleteImage($grade->image, 'grades'): '';

            $grade->image = $this->saveImage($request->image, 'images/grades');
        }

        if ($request->has('hide')) {

            $grade->hide = 1;
        }else{
            $grade->hide = 0;
        }

        $grade->save();

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
