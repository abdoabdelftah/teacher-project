<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $unit_id
 * @property string $name
 * @property int $type
 */
class Unitexamsection extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['unit_id', 'hide', 'name', 'type', 'stop_watch', 'answer_time', 'start_time', 'end_time'];
    public $timestamps = false;

    public function unit(){
        return $this -> belongsTo('App\Models\Unit','unit_id','id');
    }

}
