<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Grade;
use App\Http\Controllers\AdminAuth;
use App\Http\Controllers\NotificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/logout', function(){
    Auth::logout();
    return redirect('/');
});

Route::view('/','index');
Route::view('/ping','ping');

require __DIR__.'/auth.php';





//////////////////////////////////////////////////Start user routes////////////////////////////
/*Route::view('/login','student.login')
->middleware('guest')
->name('login');*/


Route::get('/login', function () {
    if(Auth::check()) {
        return redirect()->route('dashboard');
    }

    return view('student.login');
})->middleware('guest')->name('login');

Route::post('/student/log', 'Student\StudentAuth@checkStudentLogin')->name('save.student.login');

Route::post('/mark-as-read/admin', [NotificationController::class, 'markAsReadAdmin'])->name('markAsReadAdmin');


Route::post('/mark-as-read/user', [NotificationController::class, 'markAsReadUser'])->name('markAsReadUser');

//////////////////////////////////////////////////Start user private/////////////////////////
Route::group(['middleware' => ['auth', 'CheckStudent']], function() {




  Route::get('/grades','Student\gradesController@grades')->name('dashboard');

 // Route::view('/testme', 'student.new.test');

//Route::get('/grade/{grade_id}/units','Student\gradesController@units');


  Route::get('/grade/{grade_id}/unit/{unit_id}/lessons','Student\gradesController@lessons');

  Route::get('/grade/{grade_id}/unit/{unit_id}/lesson/{lesson_id}/lessonsections','Student\gradesController@lessonsections');

  //lecture

  Route::get('/grade/{grade_id}/unit/{unit_id}/lesson/{lesson_id}/lessonsectionlecture/{lesson_section_id}','Student\gradesController@lecture');


/*Home work routes
  Route::get('/grade/{grade_id}/unit/{unit_id}/lesson/{lesson_id}/lessonsectionhomework/{lesson_section_id}','Student\examsController@homework');

  Route::get('/grade/{grade_id}/unit/{unit_id}/lesson/{lesson_id}/lessonsectionhomework/{lesson_section_id}/start','Student\examsController@starthomework');

  Route::post('/posthomework','Student\examsController@posthomework')->name('post.homework');
*/


  ///Lesson choose exam routes


  Route::get('/grade/{grade_id}/unit/{unit_id}/lesson/{lesson_id}/lessonsectionexam/{lesson_section_id}','Student\examsController@lessonexam');

 // Route::get('/grade/{grade_id}/unit/{unit_id}/lesson/{lesson_id}/lessonsectionexam/{lesson_section_id}/start','Student\examsController@lessonexamstart');

//  Route::post('/postlessonexam','Student\examsController@lessonexampost')->name('post.lessonexam');

Route::post('/save-student-answer', 'Student\examsController@saveStudentAnswer')->name('save_student_answer');


Route::post('/save-text-student-answer', 'Student\examsController@savetextStudentAnswer')->name('save_text_student_answer');


Route::post('/check-followup', 'Student\sectionsController@checkFollowup')->name('checkFollowup');


Route::post('/add-followup', 'Student\sectionsController@addFollowup')->name('addFollowup');


///lesson text exam
  Route::get('/grade/{grade_id}/unit/{unit_id}/lesson/{lesson_id}/lessonsectiontextexam/{lesson_section_id}','Student\examsController@lessontextexam');

  //Route::get('/grade/{grade_id}/unit/{unit_id}/lesson/{lesson_id}/lessonsectiontextexam/{lesson_section_id}/start','Student\examsController@lessontextexamstart');

 // Route::post('/postlessontextexam','Student\examsController@lessontextexampost')->name('post.lessontextexam');

 //Lesson Pdf exam
 Route::get('/grade/{grade_id}/unit/{unit_id}/lesson/{lesson_id}/pdfexam/{lesson_section_id}','Student\examsController@pdfexam');

 Route::post('/save-pdf-student-answer', 'Student\examsController@savepdfStudentAnswer')->name('save_pdf_student_answer');


////////Lesson forums


//Route::get('/grade/{grade_id}/unit/{unit_id}/lesson/{lesson_id}/lessonforums','Student\forumsController@show');

//Route::get('/grade/{grade_id}/unit/{unit_id}/lesson/{lesson_id}/lessonforum/{forum_id}/one','Student\forumsController@showone');

//Route::get('/grade/{grade_id}/unit/{unit_id}/lesson/{lesson_id}/lessonforums/add','Student\forumsController@add');

Route::post('/postforum','Student\forumsController@post')->name('post.forum');

Route::post('/postforumcomment','Student\forumsController@postcomment')->name('add.comment');


///student posted forums

Route::get('/student/forums','Student\forumsController@studentshow');

//Route::get('/student/forums/{forum_id}/forum','Student\forumsController@studentshowone');




///unit choose exam routes

/*
Route::get('/grade/{grade_id}/unit/{unit_id}/unitexam/{unit_exam_section_id}','Student\unitsController@unitexam');

Route::get('/grade/{grade_id}/unit/{unit_id}/unitexam/{unit_exam_section_id}/start','Student\unitsController@unitexamstart');

Route::post('/postunitexam','Student\unitsController@unitexampost')->name('post.unitexam');




///unit text exam routes


Route::get('/grade/{grade_id}/unit/{unit_id}/unittextexam/{unit_exam_section_id}','Student\unitsController@unittextexam');

Route::get('/grade/{grade_id}/unit/{unit_id}/unittextexam/{unit_exam_section_id}/start','Student\unitsController@unittextexamstart');

Route::post('/postunittextexam','Student\unitsController@unittextexampost')->name('post.unittextexam');

*/


/////////////////////Student results//////////////////////////////////

Route::get('/student/examsresults', 'Student\examsController@studentresults');


///////////////student exam view/////////////////////////

Route::get('/student/lexamcheckanswers/{lesson_section_id}', 'Student\examsController@lcheckanswers');


Route::get('/student/uexamcheckanswers/{unit_exam_section_id}', 'Student\examsController@ucheckanswers');


Route::get('/student/ltextexamcheckanswers/{lesson_section_id}', 'Student\examsController@ltextcheckanswers');


Route::get('/student/utextexamcheckanswers/{unit_exam_section_id}', 'Student\examsController@utextcheckanswers');



});







//////////////////////////////////////////Start admin Routes//////////////////////////////
Route::view('/admin/login','admin.login');

Route::post('admin/login', 'Admin\AdminAuth@checkAdminLogin')->name('save.admin.login');

//Route::post('login', [AdminAuth::class, 'checkAdminLogin'])->name('save.admin.login');


Route::group(['middleware' => ['auth:admin'],'prefix' => 'admin'], function() {



  ///////////////////////////////////////////////////////Students routes////////////////////////////////
  //  Route::view('/students','admin.students');
    Route::get('/students/{activeFilter?}/{gradeFilter?}/{search?}', 'Admin\studentsController@index')->name('allStudents');
    Route::get('/student/edit/{id}', 'Admin\studentsController@edit');
    Route::post('/student/search', 'Admin\studentsController@search')->name('search.student');
    Route::post('/student/update', 'Admin\studentsController@update')->name('update.student');
    Route::get('/addstudent', 'Admin\studentsController@showgrade');
    Route::post('/storestudent', 'Admin\studentsController@store')->name('store.student');


    ///////////////////Routes for fast edit///////////////////

    Route::get('/newmonth/{id}', 'Admin\studentsController@newmonth');
    Route::get('/allowlogin/{id}', 'Admin\studentsController@allowlogin');


    Route::get('/deletestudent/{id}', 'Admin\studentsController@deletestudent');

/////////////////////Student results//////////////////////////////////

Route::get('/studentresults/{id}', 'Admin\studentsController@studentresults');

Route::get('/unitresult/delete/{unit_exam_section_id}/{student_id}', 'Admin\studentsController@unitanswer');


Route::get('/lessonresult/delete/{lesson_section_id}/{student_id}', 'Admin\studentsController@lessonanswer');


///////////////student exam view/////////////////////////

Route::get('/lcheckanswers/{student_id}/{lesson_section_id}', 'Admin\studentsController@lcheckanswers');


Route::get('/ltextcheckanswers/{student_id}/{lesson_section_id}', 'Admin\studentsController@ltextcheckanswers');


Route::get('/ucheckanswers/{student_id}/{unit_exam_section_id}', 'Admin\studentsController@ucheckanswers');




////lesson unit student follow up

Route::get('/student/lessonsection/answered/{id}', 'Admin\followstudentsController@lessonsectionanswered');


Route::get('/student/lessonsection/notanswered/{id}', 'Admin\followstudentsController@lessonsectionnotanswered');


Route::get('/student/unitexamsection/answered/{id}', 'Admin\followstudentsController@unitexamsectionanswered');


Route::get('/student/unitexamsection/notanswered/{id}', 'Admin\followstudentsController@unitexamsectionnotanswered');



/////////////unit text exam correct/////////////////////////////

Route::get('/student/{student_id}/unit/{unit_exam_section_id}', 'Admin\followstudentsController@correctunittextexam');

Route::post('/unitdone', 'Admin\followstudentsController@correctunittextexamdone')->name('correctunitexam.done');


Route::get('/unit/notcorrected', 'Admin\followstudentsController@showunitnotcorrected');




/////////////lesson text exam correct/////////////////////////////

Route::get('/student/{student_id}/lesson/{lesson_section_id}', 'Admin\followstudentsController@correctlessontextexam');

Route::post('/lessondone', 'Admin\followstudentsController@correctlessontextexamdone')->name('correctlessonexam.done');


Route::get('/lesson/notcorrected', 'Admin\followstudentsController@showlessonnotcorrected');




///////////////////forums//////////////////////////////////////////

Route::get('/allforums', 'Admin\forumsController@showforums');

Route::get('/forum/{forum_id}', 'Admin\forumsController@showoneforum');

Route::post('/fcomment', 'Admin\forumsController@postcomment')->name('postadmin.comment');


Route::post('/edit/forum', 'Admin\forumsController@editforums')->name('edit.forum');


    //////////////////////////////////////////////////////Grades route//////////////////////////////////////

    Route::get('/grades', 'Admin\gradesController@index')->name('allGrades');
    Route::get('/grades/edit/{id}', 'Admin\gradesController@edit');

    Route::post('/grades/update', 'Admin\gradesController@update')->name('update.grade');
    Route::view('/addgrade', 'admin.addgrade');
    Route::post('/storegrades', 'Admin\gradesController@store')->name('store.grade');



//////////////////////////////////////////////////////////Unit route/////////////////////////////////////

Route::get('/units/{id}', 'Admin\unitsController@index')->name('grade.units');
Route::get('/units/edit/{id}', 'Admin\unitsController@edit');

Route::post('/units/update', 'Admin\unitsController@update')->name('update.unit');

Route::get('/addunit/{id}', 'Admin\unitsController@show');

Route::post('/storeunits', 'Admin\unitsController@store')->name('store.unit');


/////////////////////////////////////////////////////lesson route//////////////////////////////////

Route::get('/lessons/{id}', 'Admin\lessonsController@index');
Route::get('/lessons/edit/{id}', 'Admin\lessonsController@edit');

Route::post('/lessons/update', 'Admin\lessonsController@update')->name('update.lesson');

Route::get('/addlesson/{id}', 'Admin\lessonsController@show');

Route::post('/storelessons', 'Admin\lessonsController@store')->name('store.lesson');



/////////////////////////////////lessonsection section//////////////////////////////////////


Route::get('/lessonsections/{id}', 'Admin\lessonsectionsController@index');
Route::get('/lessonsections/edit/{id}', 'Admin\lessonsectionsController@edit');

Route::post('/lessonsections/update', 'Admin\lessonsectionsController@update')->name('update.lessonsection');

Route::get('/addlessonsection/{id}', 'Admin\lessonsectionsController@show');

Route::post('/storelessonsections', 'Admin\lessonsectionsController@store')->name('store.lessonsection');

Route::post('/update-card-order', 'Admin\lessonsectionsController@updateOrder')->name('update.order');


Route::post('/movesection', 'Admin\lessonsectionsController@moveSection')->name('move.section');


/////////////////////////////Lecture//////////////////////
Route::get('/lectureedit/{id}', 'Admin\lecturesController@edit');
Route::post('/lecture/update', 'Admin\lecturesController@update')->name('update.lecture');



/////////////////////////////Lessonexam//////////////////////

Route::get('/lessonexams/{id}', 'Admin\lessonexamsController@index');
Route::get('/lessonexams/edit/{id}', 'Admin\lessonexamsController@edit');

Route::post('/lessonexams/update', 'Admin\lessonexamsController@update')->name('update.lessonexam');

Route::get('/addlessonexam/{id}', 'Admin\lessonexamsController@show');

Route::post('/storelessonexams', 'Admin\lessonexamsController@store')->name('store.lessonexam');


/////////////////////////////exam//////////////////////

Route::get('/exams/{id}', 'Admin\examsController@index');
Route::get('/exams/edit/{id}', 'Admin\examsController@edit');

Route::post('/exams/update', 'Admin\examsController@update')->name('update.exam');

Route::get('/addexam/{id}', 'Admin\examsController@show');

Route::post('/storeexams', 'Admin\examsController@store')->name('store.exam');


Route::get('/getUnits/{gradeId}', 'Admin\examsController@getUnits');
Route::get('/getLessons/{unitId}', 'Admin\examsController@getLessons');
Route::get('/getLessonSections/{lessonId}', 'Admin\examsController@getLessonSections');

Route::get('/gettextSections/{lessonId}', 'Admin\examsController@gettextSections');
Route::post('/moveexam', 'Admin\examsController@moveExam')->name('move.exam');


/////////////////////////////lesson  text exam//////////////////////

Route::get('/lessontextexam/{id}', 'Admin\examsController@index');
Route::get('/lessontextexams/edit/{id}', 'Admin\lessontextexamsController@edit');

Route::post('/lessontextexams/update', 'Admin\lessontextexamsController@update')->name('update.lessontextexam');

Route::get('/addlessontextexam/{id}', 'Admin\lessontextexamsController@show');

Route::post('/storelessontextexams', 'Admin\lessontextexamsController@store')->name('store.lessontextexam');

////////////////////////////lesson PDf exam///////////////////////////////

Route::get('/lessonpdfexam/{id}', 'Admin\lessontextexamsController@indexPdf');
Route::post('/updatepdfexam', 'Admin\lessontextexamsController@updatePdfExam')->name('update.pdfExam');

/////////////////////////////Unit exam section///////////////////////////


Route::get('/unitexamsections/edit/{id}', 'Admin\unitexamsectionsController@edit');

Route::post('/unitexamsections/update', 'Admin\unitexamsectionsController@update')->name('update.unitexamsection');

Route::get('/addunitexamsection/{id}', 'Admin\unitexamsectionsController@show');

Route::post('/storeunitexamsections', 'Admin\unitexamsectionsController@store')->name('store.unitexamsection');



/////////////////////////////Unit  choose exam//////////////////////

Route::get('/unitchooseexams/{id}', 'Admin\unitchooseexamsController@index');
Route::get('/unitchooseexams/edit/{id}', 'Admin\unitchooseexamsController@edit');

Route::post('/unitchooseexams/update', 'Admin\unitchooseexamsController@update')->name('update.unitchooseexam');

Route::get('/addunitchooseexam/{id}', 'Admin\unitchooseexamsController@show');

Route::post('/storeunitchooseexams', 'Admin\unitchooseexamsController@store')->name('store.unitchooseexam');




/////////////////////////////Unit  text exam//////////////////////

Route::get('/unittextexams/{id}', 'Admin\unittextexamsController@index');
Route::get('/unittextexams/edit/{id}', 'Admin\unittextexamsController@edit');

Route::post('/unittextexams/update', 'Admin\unittextexamsController@update')->name('update.unittextexam');

Route::get('/addunittextexam/{id}', 'Admin\unittextexamsController@show');

Route::post('/storeunittextexams', 'Admin\unittextexamsController@store')->name('store.unittextexam');




Route::get('/uresultsdownload/{id}', 'Admin\followstudentsController@unitanswerexport');


Route::get('/lresultsdownload/{id}', 'Admin\followstudentsController@lessonanswerexport');




/////////////////////////////////////////////////////delete section////////////////////////////////////


Route::get('/delete/question/{id}', 'Admin\deletesController@question');

Route::get('/delete/lessonsection/{id}', 'Admin\deletesController@lessonsection');

Route::get('/delete/lesson/{id}', 'Admin\deletesController@lesson');

Route::get('/delete/unitexam/{id}', 'Admin\deletesController@unitexam');

Route::get('/delete/unit/{id}', 'Admin\deletesController@unit');

Route::get('/delete/grade/{id}', 'Admin\deletesController@grade');






});
