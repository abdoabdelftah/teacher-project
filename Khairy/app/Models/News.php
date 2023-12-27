<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property int $grade_id
 */
class News extends Model
{
    /**
     * @var array
     */


protected $table = "news";

    protected $fillable = ['image', 'title', 'content', 'type'];
    public $timestamps = false;


}
