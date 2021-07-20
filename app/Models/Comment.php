<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'comment'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function commentStore($user_id, $data){
    //     $this->user_id = $user_id;
    //     $this->post_id = $data['post_id'];
    //     $this->comment = $data['comment'];
    //     $this->save();
    //     return;
    // }
}
