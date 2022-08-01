<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $head
 * @property int $question_type
 * @property string $question
 * @property int $student_id
 * @property string $student_name
 * @property int $lesson_id
 * @property int $is_closed
 */
class Forum extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['head', 'hide', 'picture', 'question_type', 'question', 'student_id', 'student_name', 'lesson_id', 'is_closed'];
    public $timestamps = false;

    public function forumcomments(){
        return $this -> hasMany('App\Models\Forumcomment','forum_id','id');
    }

    public function lesson(){
        return $this -> belongsTo('App\Models\Lesson','lesson_id','id');
    }

    public function student(){
        return $this -> belongsTo('App\Models\User','student_id','id');
    }
}
