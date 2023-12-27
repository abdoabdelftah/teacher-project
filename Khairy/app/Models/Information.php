<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property int $grade_id
 */
class Information extends Model
{
    /**
     * @var array
     */

protected $table = "information";
    protected $fillable = ['data'];
    public $timestamps = false;


}
