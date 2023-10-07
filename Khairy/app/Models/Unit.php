<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property int $grade_id
 */
class Unit extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'hide', 'grade_id', 'image'];
    public $timestamps = false;
    public function lessons(){
        return $this -> hasMany('App\Models\Lesson','unit_id','id');
    }

    public function unitexamsections(){
        return $this -> hasMany('App\Models\Unitexamsection','unit_id','id');
    }


    public function grade(){
        return $this -> belongsTo('App\Models\Grade','grade_id','id');
    }
}
