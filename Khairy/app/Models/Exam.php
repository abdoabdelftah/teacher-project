<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property int $lesson_section_id
 * @property int $type
 * @property int $lesson_id
 * @property int $question_type
 * @property int $choose_type
 * @property string $question
 * @property string $choose1
 * @property string $choose2
 * @property string $choose3
 * @property string $choose4
 * @property string $right_answer
 * @property int $points
 * @property string $time_for_answer
 * @property string $stop_watch
 * @property int $unit_id
 * @property int $unit_exam_section_id
 * @property string $text_answer
 */
class Exam extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'hide', 'lesson_section_id', 'type', 'lesson_id', 'question_type', 'choose_type', 'question', 'choose1', 'choose2', 'choose3', 'choose4', 'right_answer', 'points', 'time_for_answer', 'stop_watch', 'unit_id', 'unit_exam_section_id', 'text_answer'];

    public $timestamps = false;
    public function studentexamanswers(){
        return $this -> hasMany('App\Models\Studentexamanswer','exam_id','id');
    }


    public function lessonsection(){
        return $this -> belongsTo('App\Models\Lessonsection','lesson_section_id','id');
    }
    
    public function lesson(){
        return $this -> belongsTo('App\Models\Lesson','lesson_id','id');
    }

    public function unitexamsection(){
        return $this -> belongsTo('App\Models\Unitexamsection','unit_exam_section_id','id');
    }

    public function unit(){
        return $this -> belongsTo('App\Models\Unit','unit_id','id');
    }
}
