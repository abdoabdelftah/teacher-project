<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property int $unit_id
 * @property int $forum_id
 */
class Lesson extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'hide', 'unit_id', 'forum_id', 'image', 'description'];
    public $timestamps = false;

    public function lessonsections(){
        return $this -> hasMany('App\Models\Lessonsection','lesson_id','id');
    }
    public function exams(){
        return $this -> hasMany('App\Models\Exam','lesson_id','id');
    }

    public function unit(){
        return $this -> belongsTo('App\Models\Unit','unit_id','id');
    }

    public function forums(){
        return $this -> hasMany('App\Models\Forum','lesson_id','id');
    }

    public function userLessonsections(){
        return $this -> hasMany('App\Models\Lessonsection','lesson_id','id')->where('hide', 0);
    }

}
