<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'comment'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
