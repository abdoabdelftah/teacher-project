<?php




namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;
use App\Models\Admin;
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
use App\Notifications\SendAdminNotification;
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

        if ($reqeust->done == 1){
            $admin = Admin::find(1); // Assuming you have a column is_admin to identify admins
            $section = Lessonsection::find($reqeust->lesson_section_id);

            $message = "";
            if($section->type == 1 || $section->type == 2){

                $message = "قام الطالب ".auth()->user()->name."بالاجابة على اختبار";

            }elseif($section->type == 3){

                $message = " امتحان مقالى يحتاج للتصحيح, الطالب". auth()->user()->name;
            }elseif($section->type == 4){

                $message = " امتحان يحتاج للتصحيح, الطالب". auth()->user()->name;
            } elseif($section->type == 5){

                $message = "قام الطالب ".auth()->user()->name."بمشاهدة محاضرة";
            }
            $link = "/#"; // You can customize the link as needed
            $admin->notify(new SendAdminNotification($message, $link));
            }

        return response()->json(['message' => 'added']);

    }




}
