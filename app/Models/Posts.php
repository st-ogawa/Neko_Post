<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManagerStatic as Image;

class Posts extends Model
{


    
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
    public function postStore($user_id, $data)
    {
        
        $file = $data['file'];
        $comment = $data['comment'];
        if($file){
            $file_name = time().'.'.$file->getClientOriginalName();
            $resize_image = Image::make($file)->fit(500,null, function ($constraint) {$constraint->aspectRatio();});
            $resize_image->orientate()->save(storage_path('app/public/images/'.$file_name));
            $this->image = 'storage/images/'. $file_name;
            $this->comment = $comment;
            if(!$user_id){
                $this->user_id = 1;
            }
            else{
                $this->user_id = $user_id;
            }
            $this->save();
            return;
        }
    }
    // public function postDestroy($user_id, $post_id){
    //     return $this->where('user_id', $user_id)->where('id', $post_id)->delete();
    // }
}
