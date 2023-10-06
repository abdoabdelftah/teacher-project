<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $lesson_id
 * @property int $section_type
 * @property string $name
 * @property int $section_id
 * @property int $priority
 */
class Lessonsection extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['lesson_id', 'hide', 'section_type', 'name', 'section_id', 'priority', 'stop_watch', 'start_time', 'end_time'];
    public $timestamps = false;
    public function lesson(){
        return $this -> belongsTo('App\Models\Lesson','lesson_id','id');
    }

}
