<?php




namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Grade;
use App\Models\Unit;
use App\Models\Lesson;

use App\Models\Forum;
use App\Models\Forumcomment;
use App\Models\GradeUser;
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\Hash;
class forumsController extends Controller
{

    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showforums()
    {

      $forums = Forum::with('student')->where('is_closed', 0)->where('hide', 0)->paginate(10);
  
       return view('admin.allforums', compact('forums'));
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
    public function showoneforum($forum_id)
    {

        $data = Forum::with('forumcomments', 'student')->where('id', $forum_id)->first();
        return view('admin.oneforum', compact('data'));
    
    }

    /**
     * Display the specified resource.
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editforums(Request $request)
    {
       
        

      $forum = Forum::where('id', $request->forum_id)->first();

      $forum->update([
        'hide' => $request->hide,
        'is_closed' => $request->is_closed,
    ]);

    return redirect('/admin/allforums');

    }




    





   
}
