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


        $lesson =  Lesson::where('id', $id)->first();


        $unit = Unit::where('id', $lesson->unit_id)->first();
        
        $grade = Grade::where('id', $unit->grade_id)->first();

     

        $data = Lessonsection::where('lesson_id', $id)->orderBy('priority', 'ASC')->get();
   
        return view('admin.lessonsections', compact('data', 'lesson', 'unit', 'grade'));
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

        $lesson =  Lesson::where('id', $data->lesson_id)->first();


        $unit = Unit::where('id', $lesson->unit_id)->first();
        
        $grade = Grade::where('id', $unit->grade_id)->first();

      //return $data;
        return view('admin.editlessonsection', compact('data', 'lesson', 'unit', 'grade'));
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

        //update data

        $lessonsection->update($request->all());
       

        return redirect('admin/lessonsections/'.$lessonsection->lesson_id)->with(['message' => ' تم التحديث بنجاح ']);
   
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
