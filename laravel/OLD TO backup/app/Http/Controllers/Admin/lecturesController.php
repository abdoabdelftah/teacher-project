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

        $lessonsection =  Lessonsection::where('id', $id)->first();

        $lesson =  Lesson::where('id', $lessonsection->lesson_id)->first();


        $unit = Unit::where('id', $lesson->unit_id)->first();
        
        $grade = Grade::where('id', $unit->grade_id)->first();

        $data = Lecture::where('lesson_section_id', $id)->first();
      //return $data;
        return view('admin.editlecture', compact('data', 'lessonsection', 'lesson', 'unit', 'grade'));
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
      


        if($request->type == 3 || $request->type == 2 ){

            if(! empty($request->content)){
            $content = $this->saveImage($request->content, 'images/lectures');


            
          $lecture = Lecture::find($request->id);
          if (!$lecture)
              return redirect()->back();
  
          //update data
  
        $lecture->update([
                'name' => $request->name,
                'type' => $request->type,
                'content' => $content,
            ]);
            return redirect('admin/lessonsections/'.$lecture->lesson_id)->with(['message' => ' تم التحديث بنجاح ']);
     
          }else{

          $lecture = Lecture::find($request->id);
          if (!$lecture)
              return redirect()->back();
  
          //update data
  
        $lecture->update([
                'name' => $request->name,
                'type' => $request->type,
               
            ]);

            return redirect('admin/lessonsections/'.$lecture->lesson_id)->with(['message' => ' تم التحديث بنجاح ']);
        }
         
        }elseif($request->type = 1){
             
            $content = $request->content;
        
            $lecture = Lecture::find($request->id);
            if (!$lecture)
                return redirect()->back();
    
            //update data
    
          $lecture->update([
                  'name' => $request->name,
                  'type' => $request->type,
                  'content' => $request->content,
              ]);

            return redirect('admin/lessonsections/'.$lecture->lesson_id)->with(['message' => ' تم التحديث بنجاح ']);
        }else{

         

            $lecture = Lecture::find($request->id);
            if (!$lecture)
                return redirect()->back();
    
            //update data
    
          $lecture->update([
                  'name' => $request->name,
                  'type' => $request->type,
                  
              ]);

              //return redirect()->back()->with(['message' => ' الرجاء اضافة المحتوى بالاسفل ']);
              
            return redirect('admin/lectureedit/'.$lecture->lesson_section_id)->with(['message' => '  الرجاء اضافة المحتوى بالاسفل']);

        }


      
       
    
     //   if($lecture->content != 'Null'){
      
      //  }


      
 

      
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
