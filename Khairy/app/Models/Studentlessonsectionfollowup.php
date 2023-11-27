<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $student_id
 * @property int $lesson_section_id
 */
class Studentlessonsectionfollowup extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['student_id', 'lesson_section_id', 'done', 'done_correcting'];
    public $timestamps = false;

    public function student(){
        return $this -> belongsTo('App\Models\User','student_id','id');
    }


    public function lessonsection(){
        return $this -> belongsTo('App\Models\Lessonsection','lesson_section_id','id');
    }

    public function studentanswer(){
        return $this -> hasMany('App\Models\Studentexamanswer','lesson_section_id','lesson_section_id');
    }

    public function exam(){
        return $this -> hasMany('App\Models\Exam','lesson_section_id','lesson_section_id');
    }

}
