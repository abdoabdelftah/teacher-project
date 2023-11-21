<?php




namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Grade;
use App\Models\GradeUser;
use App\Models\Unit;
use App\Models\Lecture;

use App\Models\Unitexamsection;
use App\Models\Lesson;
use App\Models\Lessonsection;
use auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class gradesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function grades()
    {
        $student = auth()->user();

        $grades = $student->userGrades()
            ->with([
                'userUnits' => function ($query) {
                    $query->where('units.hide', 0);
                },
                'userUnits.userLessons' => function ($query) {
                    $query->where('hide', 0);
                },
                'userUnits.userLessons.userLessonsections' => function ($query) {
                    $query->where('hide', 0);
                },
            ])
            ->get();

        $follow_up = $student->studentlessonsectionfollowups()->get();


        $percentages = [];

        foreach ($grades as $grade) {
            foreach ($grade->userUnits as $userUnit) {
                $totalLessonSections = $userUnit->userLessons->sum(function ($lesson) {
                    return $lesson->userLessonsections->count();
                });

                $completedLessonSections = $follow_up
                    ->whereIn('lesson_section_id', $userUnit->userLessons->pluck('userLessonsections')->flatten()->pluck('id'))
                    ->count();

                $percentage = $totalLessonSections > 0 ? ($completedLessonSections / $totalLessonSections) * 100 : 0;

                $percentages[$userUnit->id] = number_format($percentage, 0);
            }
        }

        return view('student.new.grades', compact('grades', 'percentages'));
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
    public function units($grade_id)
    {

        $data = Unit::where('grade_id', $grade_id)->where('hide', 0)->get();

        $gradeuser =  GradeUser::where('user_id', auth()->user()->id)->where('grade_id', $grade_id)->count();


        if ($gradeuser < 1) {
            return redirect('/grades');
        }




        return view('student.units', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function lessons($grade_id, $unit_id)
    {
        $now = Carbon::now();

        $data = Lesson::where('unit_id', $unit_id)->where('hide', 0)->get();


        $unitgrade = Unit::where('id', $unit_id)->where('grade_id', $grade_id)->where('hide', 0)->get();

        $gradeuser =  GradeUser::where('user_id', auth()->user()->id)->where('grade_id', $grade_id)->count();


        if ($gradeuser < 1 || $unitgrade->count() < 1) {
            return redirect('/grades');
        }
        return view('student.new.lessons', compact('data', 'unitgrade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function lecture($grade_id, $unit_id, $lesson_id, $lesson_section_id)
    {

        $lecture = Lecture::where('lesson_section_id', $lesson_section_id)->first();

        $lessonsectionlesson = Lessonsection::where('id', $lesson_section_id)->where('lesson_id', $lesson_id)->where('hide', 0)->count();

        $lessonunit = Lesson::where('id', $lesson_id)->where('unit_id', $unit_id)->where('hide', 0)->count();

        $unitgrade = Unit::where('id', $unit_id)->where('grade_id', $grade_id)->where('hide', 0)->count();

        $gradeuser =  GradeUser::where('user_id', auth()->user()->id)->where('grade_id', $grade_id)->count();

        if ($lessonsectionlesson < 1) {
            return redirect('/grades');
        }

        if ($gradeuser < 1) {
            return redirect('/grades');
        }

        if ($unitgrade < 1) {
            return redirect('/grades');
        }

        if ($lessonunit < 1) {
            return redirect('/grades');
        }
        $lessonname = Lesson::where('id', $lesson_id)->first();
        $data = Lessonsection::where('lesson_id', $lesson_id)->where('hide', 0)->select('name', 'id', 'section_type')->orderBy('priority', 'asc')->get();
        return view('student.lessonsectionlecture', compact('data', 'lessonname', 'lecture'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function lessonsections($grade_id, $unit_id, $lesson_id)
    {
        $now = Carbon::now();

        $data = Lessonsection::where('lesson_id', $lesson_id)->where('start_time', '<=', $now)->where('end_time', '>=', $now)->where('hide', 0)->orderBy('priority', 'asc')->get();

        $lessonunit = Lesson::where('id', $lesson_id)->where('unit_id', $unit_id)->where('hide', 0)->count();

        $unitgrade = Unit::where('id', $unit_id)->where('grade_id', $grade_id)->where('hide', 0)->count();

        $gradeuser =  GradeUser::where('user_id', auth()->user()->id)->where('grade_id', $grade_id)->count();


        if ($gradeuser < 1) {
            return redirect('/grades');
        }

        if ($unitgrade < 1) {
            return redirect('/grades');
        }

        if ($lessonunit < 1) {
            return redirect('/grades');
        }
        $lessonname = Lesson::where('id', $lesson_id)->first();

        return view('student.lessonsections', compact('data', 'lessonname'));
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
