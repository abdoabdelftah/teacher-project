<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $student_id
 * @property int $type
 * @property int $exam_id
 * @property int $lesson_section_id
 * @property string $student_answer
 * @property string $right_answer
 * @property int $is_right
 * @property int $points
 * @property string $time_to_show_answer
 * @property int $unit_exam_section_id
 * @property string $student_answer_picture
 */
class Studentexamanswer extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['student_id', 'type', 'exam_id', 'lesson_section_id', 'student_answer', 'right_answer', 'is_right', 'points', 'time_to_show_answer', 'unit_exam_section_id', 'student_answer_picture', 'right_answer_picture'];
    public $timestamps = false;
    public function exam(){
        return $this -> belongsTo('App\Models\Exam','exam_id','id');
    }

    public function student(){
        return $this -> belongsTo('App\Models\User','student_id','id');
    }
}
