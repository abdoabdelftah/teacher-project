<?php




namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Grade;
use App\Models\GradeUser;
use App\Models\Unit;
use App\Models\Lecture;

use App\Models\Unitexamsection;
use App\Models\Lesson;
use App\Models\Lessonsection;
use auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
class gradesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function grades()
    {
        $student = auth()->user();
        
        $data = $student->grades;
   
       
        return view('student.grades', compact('data'));
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
    public function units($grade_id)
    {
       
        $data = Unit::where('grade_id', $grade_id)->where('hide', 0)->get();
        
      $gradeuser =  GradeUser::where('user_id', auth()->user()->id)->where('grade_id', $grade_id)->count();

    
      if ($gradeuser < 1) {
        return redirect('/grades');
     
    }
    
   
      
        
       return view('student.units', compact('data'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function lessons($grade_id, $unit_id)
    {
        $now = Carbon::now();

        $data = Lesson::where('unit_id', $unit_id)->where('hide', 0)->get();

        $unitdata = Unitexamsection::where('unit_id', $unit_id)->where('hide', 0)->where('start_time', '<=', $now )->where('end_time', '>=', $now )->get();

      $unitgrade = Unit::where('id', $unit_id)->where('grade_id', $grade_id)->where('hide', 0)->count();  
        
      $gradeuser =  GradeUser::where('user_id', auth()->user()->id)->where('grade_id', $grade_id)->count();


      if ($gradeuser < 1) {
        return redirect('/grades');
     
    }
    
   if ($unitgrade < 1) {
        return redirect('/grades');
     
    }
      
        
       return view('student.lessons', compact('data', 'unitdata'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function lecture($grade_id, $unit_id, $lesson_id, $lesson_section_id)
    {
       
        $lecture = Lecture::where('lesson_section_id', $lesson_section_id)->first();

        $lessonsectionlesson = Lessonsection::where('id', $lesson_section_id)->where('lesson_id', $lesson_id)->where('hide', 0)->count();

      $lessonunit = Lesson::where('id', $lesson_id)->where('unit_id', $unit_id)->where('hide', 0)->count();
        
      $unitgrade = Unit::where('id', $unit_id)->where('grade_id', $grade_id)->where('hide', 0)->count();  
        
      $gradeuser =  GradeUser::where('user_id', auth()->user()->id)->where('grade_id', $grade_id)->count();
 
      if ($lessonsectionlesson < 1) {
        return redirect('/grades');
     
    }

      if ($gradeuser < 1) {
        return redirect('/grades');
     
    }
    
   if ($unitgrade < 1) {
        return redirect('/grades');
     
    }
      
    if ($lessonunit < 1) {
        return redirect('/grades');
     
    }
    $lessonname = Lesson::where('id', $lesson_id)->first();
    $data = Lessonsection::where('lesson_id', $lesson_id)->where('hide', 0)->select('name', 'id', 'section_type')->orderBy('priority', 'asc')->get();
       return view('student.lessonsectionlecture', compact('data', 'lessonname', 'lecture'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function lessonsections($grade_id, $unit_id, $lesson_id)
    {
        $now = Carbon::now();

        $data = Lessonsection::where('lesson_id', $lesson_id)->where('start_time', '<=', $now )->where('end_time', '>=', $now )->where('hide', 0)->orderBy('priority', 'asc')->get();

      $lessonunit = Lesson::where('id', $lesson_id)->where('unit_id', $unit_id)->where('hide', 0)->count();
        
      $unitgrade = Unit::where('id', $unit_id)->where('grade_id', $grade_id)->where('hide', 0)->count();  
        
      $gradeuser =  GradeUser::where('user_id', auth()->user()->id)->where('grade_id', $grade_id)->count();
 
      
      if ($gradeuser < 1) {
        return redirect('/grades');
     
    }
    
   if ($unitgrade < 1) {
        return redirect('/grades');
     
    }
      
    if ($lessonunit < 1) {
        return redirect('/grades');
     
    }
    $lessonname = Lesson::where('id', $lesson_id)->first();
        
       return view('student.lessonsections', compact('data', 'lessonname'));

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
