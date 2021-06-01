<?php

namespace App\Http\Controllers\Api;

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Posts;
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
        return Posts::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

        $file = request()->file;
        $comment = request()->comment;
        $user_id = request()->user_id;
        if($file){
            $file_name = time().'.'.$file->getClientOriginalName();
            Image::make($file)->resize(250,250)->save(storage_path('app/public/images/'.$file_name));
            $posts = new Posts;
            $posts->image = $file_name;
            $posts->comment = $comment;
            $posts->user_id = $user_id;
            $posts->save();

            return [$posts];
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
