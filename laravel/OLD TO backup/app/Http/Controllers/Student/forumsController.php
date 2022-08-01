<?php




namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Grade;
use App\Models\GradeUser;
use App\Models\Forum;
use App\Models\Forumcomment;
use App\Models\Lesson;
use App\Traits\ImageTrait;
use auth;
use Illuminate\Support\Facades\Hash;
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
       
       
      if(empty($request->picture)){

       Forumcomment::create([
       
 
           'forum_id' => $request->forum_id,
           'comment' =>   $request->comment,
          
          
       ]);
        
         }
       
         if(!empty($request->picture)){
 
           $comment_picture = $this->saveImage($request->picture, 'images/forums');
 
           Forumcomment::create([
       
 
            'forum_id' => $request->forum_id,
            'comment' =>   $request->comment,
            'picture' =>   $comment_picture,
           
        ]);
           
            }

return redirect()->back();

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
       
       
      if(empty($request->picture)){

       Forum::create([
       
 
           'lesson_id' => $request->lesson_id,
           'head' =>   $request->head,
           'question' =>   $request->question,
           'student_id' =>   auth()->user()->id,
          
       ]);
        
         }
       
         if(!empty($request->picture)){
 
           $comment_picture = $this->saveImage($request->picture, 'images/forums');
 
           Forum::create([
       
 
            'lesson_id' => $request->lesson_id,
            'head' =>   $request->head,
            'question' =>   $request->question,
            'picture' =>   $comment_picture,
            'student_id' =>   auth()->user()->id,
          
        ]);
           
            }

return redirect('/student/forums');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    public function studentshow()
    {
       
     $data = Forum::where('student_id', auth()->user()->id)->where('hide', 0)->paginate(10);
    
       return view('student.studentforums', compact('data'));
    

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
       
       
      $data = Forum::where('id', $forum_id)->where('hide', 0)->with('forumcomments')->first();

   
      return view('student.studentoneforum', compact('data'));

    }




////////////////////////////////////////////////////////////////////////////////











}
