<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $forum_id
 * @property string $name
 * @property int $comment_type
 * @property string $comment
 */
class Forumcomment extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['forum_id', 'picture', 'name', 'comment_type', 'comment'];
    public $timestamps = false;

    public function forum(){
        return $this -> belongsTo('App\Models\Forum','forum_id','id');
    }
}
