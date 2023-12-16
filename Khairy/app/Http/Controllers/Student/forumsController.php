<?php




namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Grade;
use App\Models\GradeUser;
use App\Models\Forum;
use App\Models\Forumcomment;
use App\Models\Lesson;
use App\Notifications\CustomNotification;
use App\Notifications\SendAdminNotification;
use App\Traits\ImageTrait;
use auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator as ValidationValidator;

class forumsController extends Controller
{

  use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($grade_id, $unit_id, $lesson_id)
    {

     $data = Forum::where('lesson_id', $lesson_id)->where('hide', 0)->paginate(10);
     $lessonname = Lesson::where('id', $lesson_id)->first();

       return view('student.forums', compact('data', 'lessonname'));


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







    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showone($grade_id, $unit_id, $lesson_id, $forum_id)
    {


      $data = Forum::where('id', $forum_id)->where('hide', 0)->with('forumcomments')->first();
      $lessonname = Lesson::where('id', $lesson_id)->first();

      return view('student.oneforum', compact('data', 'lessonname'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function postcomment(Request $request)
    {

        $rules = [
            'comment' => 'required_without:picture', // Comment is required if picture is not present
            'picture' => 'required_without:comment|image|mimes:jpeg,png,jpg,gif|max:5048', // Picture is required if comment is not present, and it must be an image
        ];

        // Define custom error messages
        $messages = [
            'comment.required_without' => 'Either a comment or a picture is required.',
            'picture.required_without' => 'Either a comment or a picture is required.',
            'picture.image' => 'The file must be an image.',
            'picture.mimes' => 'The image must be of type: jpeg, png, jpg, gif.',
            'picture.max' => 'The image may not be greater than 2 MB.',
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules, $messages);

        // Check if the validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
            // You can customize the response as needed, for example, redirect back with errors in case of a web request
        }

        $comment = new Forumcomment();
        $comment->forum_id = $request->input('forum_id');
        $comment->commentor = auth()->user()->id;
        $comment->comment_type = $request->hasFile('picture') ? '1' : '2';

        // Handle file upload if a picture is present
        if ($request->hasFile('picture')) {
            $picturePath = $this->saveImage($request->file('picture'), 'images/forums');;
            $comment->picture = $picturePath;
        }

        if ($request->hasFile('record')) {
            $picturePath = $this->saveImage($request->file('record'), 'images/forums');;
            $comment->picture = $picturePath;
            $comment->type = 2;
        }

        $comment->comment = $request->input('comment');
        $comment->save();

        $admin = Admin::find(1); // Assuming you have a column is_admin to identify admins

        $lessonName = $comment->forum->lesson->name;
        $message = "تعليق جديد من " . auth()->user()->name . " على سؤال في درس $lessonName";
        $link = "/admin/forum/".$comment->forum->id;  // You can customize the link as needed

        $admin->notify(new SendAdminNotification($message, $link));

        // You can return a response or redirect as needed
        return response()->json(['message' => 'Comment created successfully', 'comment' => $comment]);


    }








    public function add($grade_id, $unit_id, $lesson_id)
    {



      $lessonname = Lesson::where('id', $lesson_id)->first();

      return view('student.addforum', compact('lesson_id', 'lessonname'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function post(Request $request)
    {

        $forum = new Forum();

        $forum->lesson_id = $request->lesson_id;
        $forum->student_id = auth()->user()->id;

        if(!empty($request->question)){
        $forum->question = $request->question;
        }
        if($request->hasFile('image')){
            $rules = [

                'image' => 'image|mimes:jpeg,png,jpg,gif|max:5048', // Picture is required if comment is not present, and it must be an image
            ];

            // Define custom error messages
            $messages = [
                'picture.image' => 'The file must be an image.',
                'picture.mimes' => 'The image must be of type: jpeg, png, jpg, gif.',
                'picture.max' => 'The image may not be greater than 2 MB.',
            ];

            // Validate the request
            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
                // You can customize the response as needed, for example, redirect back with errors in case of a web request
            }

        $forum->picture = $this->saveImage($request->image, 'images/forums');

        }

        $forum->save();

        $admin = Admin::find(1); // Assuming you have a column is_admin to identify admins

        $lessonName = $forum->lesson->name;
        $message = "سؤال جديد من " . auth()->user()->name . " على درس $lessonName";
        $link = "/admin/forum/".$forum->id; // You can customize the link as needed

        $admin->notify(new SendAdminNotification($message, $link));

        return redirect()->back()->with(['message' => 'تم اضافة سؤال جديد']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function studentshow()
    {

     $data = Forum::where('student_id', auth()->user()->id)->where('hide', 0)->orderBy('id', 'desc')->paginate(10);

       return view('student.new.allForums', compact('data'));


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







    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function studentshowone($forum_id)
    {

        $forum = Forum::with('student')
        ->where('id', $forum_id)
        ->first();


       return view('student.new.oneforum', compact('forum'));

    }

    public function oenForum($forum_id){

        $forum = Forum::with('student')
        ->where('id', $forum_id)
        ->first();


       return view('student.new.oneForum', compact('forum'));

    }



////////////////////////////////////////////////////////////////////////////////











}
