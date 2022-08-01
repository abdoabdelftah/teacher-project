<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property int $type
 * @property string $content
 * @property int $lesson_id
 * @property int $lesson_section_id
 */
class Lecture extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'type', 'content', 'lesson_id', 'lesson_section_id'];
    public $timestamps = false;

    public function lesson(){
        return $this -> belongsTo('App\Models\Lesson','lesson_id','id');
    }

    public function lessonsection(){
        return $this -> belongsTo('App\Models\Lessonsection','lesson_section_id','id');
    }

}
