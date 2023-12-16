<?php




namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Grade;
use App\Models\Unit;
use App\Models\Lesson;

use App\Models\Forum;
use App\Models\Forumcomment;
use App\Models\GradeUser;
use App\Notifications\SendAdminNotification;
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

        $forums = Forum::with('student')
        ->where('hide', 0)
        ->whereDoesntHave('forumcomments', function ($query) {
            $query->where('commentor', 1)
                ->where('id', function ($subquery) {
                    $subquery->from('forumcomments')
                        ->select('id')
                        ->whereColumn('forum_id', 'forums.id')
                        ->orderByDesc('id')
                        ->limit(1);
                });
        })
        ->paginate(10);


       return view('admin.new.allforums', compact('forums'));
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

        $forum = Forum::with('student')
        ->where('id', $forum_id)
        ->first();


       return view('admin.new.oneforum', compact('forum'));




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postcomment(Request $request)
    {

        $comment = new Forumcomment();
        $comment->forum_id = $request->input('forum_id');
        $comment->commentor = 1;
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

        $main_forum = Forum::find($request->input('forum_id'));
        $user = User::find($main_forum->student_id); // Assuming you have a column is_admin to identify admins

        $lessonName = $comment->forum->lesson->name;
        $message = "  تمت الاجابة على سؤالك في درس $lessonName";
        $link = "/oneforum/".$comment->forum->id; // You can customize the link as needed

        $user->notify(new SendAdminNotification($message, $link));

        // You can return a response or redirect as needed
        return response()->json(['message' => 'Comment created successfully', 'comment' => $comment]);



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
