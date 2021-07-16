<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Posts;
use App\Models\User;

use App\Models\Comment;

use Validator; 


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::latest()->get();
        $user = User::where('id',1)->first();
        return ['user' => $user, 'posts' => $posts];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Posts $posts) 
    {
        $rules = [
            'file' => 'required|image|max:5000'
        ];

        $messages = [
            'file.required' => '投稿には画像が必要です',
            'file.max' => '5MBを超える画像は投稿できません',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
       
        if($validator->errors()->first()){
            $response['message'] = $validator->errors()->first('file');
            throw new HttpResponseException(response()->json($response, 422));
        };
        
        $validated = $validator->validate();
        $user_id = request()->user_id;
        $data = request()->all();
        $posts->postStore($user_id, $data);
        return $posts;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($post_id)
    {  
        $posts = new Posts();
        $post = $posts->with('user')->where('id',$post_id)->first();
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($post)
    {
        //
    }
}
