<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 */
class Grade extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'hide', 'admin_id', 'image', 'hide'];

    public $timestamps = false;
    public function units(){
        return $this -> hasMany('App\Models\Unit','grade_id','id');
    }

    public function users() {
        return $this->belongsToMany(User::class, 'grade_user');
    }


    public function userUnits(){
        return $this -> hasMany('App\Models\Unit','grade_id','id')->where('hide', 0);
    }

}
