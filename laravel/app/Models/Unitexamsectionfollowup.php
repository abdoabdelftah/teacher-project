<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $student_id
 * @property int $lesson_section_id
 */
class Unitexamsectionfollowup extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['student_id', 'unit_exam_section_id', 'time_posted', 'done'];
    public $timestamps = false;

    public function student(){
        return $this -> belongsTo('App\Models\User','student_id','id');
    }


    public function unitexamsection(){
        return $this -> belongsTo('App\Models\Unitexamsection','unit_exam_section_id','id');
    }

    public function studentanswer(){
        return $this -> hasMany('App\Models\Studentexamanswer','unit_exam_section_id','unit_exam_section_id');
    }

    public function exam(){
        return $this -> hasMany('App\Models\Exam','unit_exam_section_id','unit_exam_section_id');
    }

}
