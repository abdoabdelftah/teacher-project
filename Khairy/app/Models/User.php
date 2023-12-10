<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'last_login_date',
        'grade_id',
        'subscription_end_date',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public $timestamps = false;
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function grades(){
        return $this -> belongsToMany('App\Models\Grade','grade_user','user_id','grade_id','id','id');
    }


    public function studentlessonsectionfollowups(){
        return $this -> hasMany('App\Models\Studentlessonsectionfollowup','student_id','id');
    }


    public function studentexamanswers(){
        return $this -> hasMany('App\Models\Studentexamanswer','student_id','id');
    }


    public function forums(){
        return $this -> hasMany('App\Models\Forum','student_id','id');
    }

    public function grade(){
        return $this -> belongsTo('App\Models\Grade','grade_id','id');
    }

    public function userGrades(){
        return $this -> belongsToMany('App\Models\Grade','grade_user','user_id','grade_id','id','id')->where('hide', 0);
    }


}
