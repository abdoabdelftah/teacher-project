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
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\Hash;
class lecturesController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {


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
    public function upload(Request $request)
    {

        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('upload')->move(public_path('images/lectures'), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/lectures/'.$fileName);
            $msg = 'Image successfully uploaded';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

           // @header('Content-type: text/html; charset=utf-8');
           echo $url;
           echo $response;
        }

        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grades = Grade::with('units.lessons.lessonsections')->get();

        $data = Lecture::where('lesson_section_id', $id)->first();

        if (!$data){
           $data = Lecture::Create(['lesson_section_id' => $id]);
        }
        return view('admin.new.editlecture', compact('data', 'grades', 'id'));
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
        $request->validate([
            'content' => 'required',
        ]);

        $lecture = Lecture::where('lesson_section_id', $request->id)->first();
        if (!$lecture)
            return redirect()->back();

            !empty($lecture->content) && ($lecture->type == 2 || $lecture->type == 3) ? $this->deleteImage($lecture->content, 'lectures'): '';

            $lecture->content = $request->type == 3 || $request->type == 2 ? $this->saveImage($request->content, 'images/lectures') : $request->content ;

            $lecture->type = $request->type;

            $lecture->save();


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
