<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property int $grade_id
 */
class Complaint extends Model
{
    /**
     * @var array
     */


protected $table = "complaints";

    protected $fillable = ['name', 'phone_number', 'message', 'seen'];
    public $timestamps = false;


}
