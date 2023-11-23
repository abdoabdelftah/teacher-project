<?php




namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Grade;
use App\Models\GradeUser;
use App\Models\Unit;
use App\Models\Lecture;
use App\Models\Studentlessonsectionfollowup;
use App\Models\Studentexamanswer;
use App\Models\Exam;


use App\Models\Unitexamsectionfollowup;

use App\Models\Unitexamsection;
use App\Models\Lesson;
use App\Models\Lessonsection;
use App\Traits\ImageTrait;
use auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
class sectionsController extends Controller
{

  use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function checkFollowup(Request $reqeust){


       $follow_up =  Studentlessonsectionfollowup::where('student_id', $reqeust->student_id)->where('lesson_section_id', $reqeust->lesson_section_id)->first();


        return response()->json(['code' => $follow_up ? 200 : 400 , 'message' => $follow_up]);

     }

     public function addFollowup(Request $reqeust){

        Studentlessonsectionfollowup::updateOrcreate(
            ["student_id" => $reqeust->student_id,
            "lesson_section_id" => $reqeust->lesson_section_id,],
            [
                "done" => $reqeust->done,
            ]
        );

        return response()->json(['message' => 'added']);

     }




}
