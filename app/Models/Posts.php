<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use SoftDeletes;

    
    protected $fillable = [
        'post_comment',  'post_image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorites::class);
    }

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }
}
