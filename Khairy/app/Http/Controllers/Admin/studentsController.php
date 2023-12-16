<?php




namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Forum;
use App\Models\Studentlessonsectionfollowup;
use App\Models\Unitexamsectionfollowup;

use App\Models\Exam;
use App\Models\Lessonsection;
use App\Models\Studentexamanswer;
use App\Models\Grade;
use App\Models\GradeUser;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
class studentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $activeFilter = 0 , $gradeFilter = 0, $search = '')
    {
        $search = $request->search ? $request->search : "" ;

        $data = User::with('grade');

        if($gradeFilter != 0){
           $data->whereHas('grades', function($query) use ($gradeFilter){
            $query->where('grade_id', $gradeFilter);
        });
        }

        if($activeFilter == 1){
             $data->where('subscription_end_date', '>', Carbon::now());
        }

        if($activeFilter == 2){
            $data->where('subscription_end_date', '<', Carbon::now());
       }

       if(isset($search) && !empty($search)) {

            $data->where('name', 'like', '%' . $search . '%')->orWhere('phone_number', 'like', '%' . $search . '%');
        }

       $data = $data->orderBy('id', 'desc')->paginate(10);
    // Count of all users
    $totalUsers = User::count();

    // Count of users with subscription_end_date > now
    $activeUsers = User::where('subscription_end_date', '>', now())->count();

    $grades = Grade::get();

    $plusMonth =  Carbon::now()->addMonth()->format('Y-m-d');
    return view('admin.new.students', compact('data', 'totalUsers', 'activeUsers', 'grades', 'activeFilter', 'gradeFilter', 'search', 'plusMonth'));
    }


    public function allowlogin($id)
    {


        $student = User::find($id);
        if (!$student)
            return redirect()->back();


        $student->update([

            'last_login_date' => '2020-1-1',

            ]);



            return redirect('admin/students')->with(['message' => ' تم التحديث بنجاح ']);



    }


    public function newmonth($id)
    {


        $student = User::find($id);
        if (!$student)
            return redirect()->back();


            $subscription_end_date = $student->subscription_end_date != Null ? Carbon::create($student->subscription_end_date)->addMonth() : Carbon::now()->addMonth();


        $student->update([

            'subscription_end_date' => $subscription_end_date,

            ]);



            return redirect('admin/students')->with(['message' => ' تم التحديث بنجاح ']);





    }




    public function deletestudent($id)
    {


        $student = User::find($id);
        if (!$student)
            return redirect()->back();


           Studentexamanswer::where('student_id', $id)->forceDelete();
            //$studentanswer->forceDelete();

           GradeUser::where('user_id', $id)->forceDelete();
            //$degrade->forceDelete();

            Forum::where('student_id', $id)->forceDelete();
            //$forums->forceDelete();


            Studentlessonsectionfollowup::where('student_id', $id)->forceDelete();
            //$lessonfollow->forceDelete();

           Unitexamsectionfollowup::where('student_id', $id)->forceDelete();
            //$unitfollow->forceDelete();


            $student->forceDelete();

            return redirect('admin/students')->with(['message' => ' تم مسح الطالب بنجاح ']);





    }




    public function lcheckanswers($student_id ,$lesson_section_id)
    {


        $lessonsection =  Lessonsection::where('id', $lesson_section_id)->first();

        $grades = Grade::with('units.lessons.lessonsections')->get();


        $data = Exam::where('lesson_section_id', $lesson_section_id)->with(['studentexamanswers' => function($q) use ($student_id){
            $q->where('student_id', $student_id);
        }])->get();


    return view('admin.new.studentAnswer', compact('data', 'grades', 'lessonsection'));

    }


    public function ltextcheckanswers($student_id ,$lesson_section_id)
    {


        $lessonsection =  Lessonsection::where('id', $lesson_section_id)->with(['sectionFollowup' => function($q) use ($student_id){
            $q->where('student_id', $student_id);
        }])->first();


        $grades = Grade::with('units.lessons.lessonsections')->get();


        $data = Exam::where('lesson_section_id', $lesson_section_id)->with(['studentexamanswers' => function($q) use ($student_id){
            $q->where('student_id', $student_id);
        }])->get();

    return view('admin.new.studentTextAnswer', compact('data', 'grades', 'lessonsection'));

    }

    public function lpdfcheckanswers($student_id ,$lesson_section_id){

        $lessonsection =  Lessonsection::where('id', $lesson_section_id)->with(['sectionFollowup' => function($q) use ($student_id){
            $q->where('student_id', $student_id);
        }])->first();


        $grades = Grade::with('units.lessons.lessonsections')->get();


        $data = Exam::where('lesson_section_id', $lesson_section_id)->with(['studentexamanswers' => function($q) use ($student_id){
            $q->where('student_id', $student_id);
        }])->get();


        return view('admin.new.studentPdfAnswer', compact('data', 'grades', 'lessonsection'));


    }



    public function ucheckanswers($student_id ,$unit_exam_section_id)
    {

        $exam = Exam::where('unit_exam_section_id', $unit_exam_section_id) ->whereIn('id', function ($query)  use($unit_exam_section_id, $student_id) {
            $query->select('exam_id')
                ->from('studentexamanswers')->where('unit_exam_section_id', $unit_exam_section_id)->where('student_id', $student_id)->get();
                //->where('lesson_section_id',1);
        })->get();

          $studentanswer = Studentexamanswer::where('unit_exam_section_id', $unit_exam_section_id)->where('student_id', $student_id)->get();


          return view('admin.ucheckanswers', compact('exam', 'studentanswer'));


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $data = User::with('grade')->where('name', 'LIKE', '%'. $request->search .'%')->orwhere('phone_number', 'LIKE', '%'. $request->search .'%')->paginate('20');
        //return $data;
          return view('admin.students', compact('data'));
    }


    public function studentresults($id)
    {


     $grades = Grade::with('units.lessons.lessonsections')->get();

     $student = User::find($id);

     $content = Studentlessonsectionfollowup::whereHas('lessonsection' , function($q){
         $q->where('section_type', '!=',5);
     })->with('lessonsection:id,name,section_type', 'studentanswer:lesson_section_id,points,student_id', 'exam:lesson_section_id,points')->where('student_id', $id)->paginate(10);


     return view('admin.new.studentProgress', compact('grades', 'content', 'student'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = User::where('phone_number',$request->phone_number)->first();
        if ($student)
            return redirect()->back()->with(['message' => 'فشلت العملية. هذا الرقم قد تم استخدامه من قبل']);

        $password = Hash::make($request->password);

       // $subscription_end_date = Carbon::now()->addMonth();

        User::create([

            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'password' => $password,
            'last_login_date' => '2020-1-1',
            'subscription_end_date' => $request->subscription_end_date,
            'admin_id' => Auth::user()->id,
        ]);

        $student_id = User::max('id');

        $requestgrade = count($request->grade_id);
        //echo $requestgrade;
              //  foreach($requestgrade as $newgrade){

                for ($i = 0; $i < $requestgrade; $i++) {
                $newgrade = $request->grade_id[$i];
                GradeUser::create([


                    'grade_id' => $newgrade,
                    'user_id' => $student_id,

                ]);

                }

                return redirect('admin/students')->with(['message' => 'تم اضافة طالب جديد بنجاح']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showgrade()
    {
        $grades = Grade::get();

        return view('admin.addstudent', compact('grades'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::with('grades')->find($id);
      //return $data;
      $grades = Grade::get();

        return view('admin.new.editstudent', compact('data', 'grades'));


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
        $student = User::find($request->id);
        if (!$student)
            return redirect()->back();

        //update data

       // $student->update($request->all());
       if(!empty($request->password)){
        $password = Hash::make($request->password);
       }

       if(!empty($request->password)){
        $student->update([
            'password' => $password,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'last_login_date' => $request->last_login_date,
            'subscription_end_date' => $request->subscription_end_date,
        ]);
       }

       if(empty($request->password)){
        $student->update([

            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'last_login_date' => $request->last_login_date,
          'subscription_end_date' => $request->subscription_end_date,
        ]);
       }

        //delete old grades
        $student_id = $request->id;
        $hisgrades = GradeUser::where('user_id',$student_id);

        $hisgrades->forceDelete();

        //insert new grades
      //  echo $request->grade_id;
        $requestgrade = count($request->grade_id);
//echo $requestgrade;
      //  foreach($requestgrade as $newgrade){

        for ($i = 0; $i < $requestgrade; $i++) {
        $newgrade = $request->grade_id[$i];
        GradeUser::create([


            'grade_id' => $newgrade,
            'user_id' => $student_id,

        ]);

        }


       return redirect()->back()->with(['message' => ' تم التحديث بنجاح ']);


    }

    public function unitanswer($unit_exam_section_id, $student_id)
    {
        //


        $student_record = Unitexamsectionfollowup::where('unit_exam_section_id', $unit_exam_section_id)->where('student_id', $student_id)->first();

        $student_ex_answer = Studentexamanswer::where('unit_exam_section_id', $unit_exam_section_id)->where('student_id', $student_id)->delete();


         $student_record->delete();


        return redirect()->back();
    }




    public function lessonanswer($lesson_section_id, $student_id)
    {
        //

        $student_record = Studentlessonsectionfollowup::where('lesson_section_id', $lesson_section_id)->where('student_id', $student_id)->first();


        $student_ex_answer = Studentexamanswer::where('lesson_section_id', $lesson_section_id)->where('student_id', $student_id)->delete();



        $student_record->delete();

        $student_ex_answer->delete();

        return redirect()->back();
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
