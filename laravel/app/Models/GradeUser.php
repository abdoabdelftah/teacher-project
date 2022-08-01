<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 */
class GradeUser extends Model
{
    /**
     * @var array
     */
    protected $table = "grade_user";

    protected $fillable = ['user_id', 'grade_id'];

    public $timestamps = false;
    


}
