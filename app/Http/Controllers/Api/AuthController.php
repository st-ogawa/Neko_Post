<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Exceptions\HttpResponseException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Validator; 

class AuthController extends Controller
{
    public function register(Request $request){

        $rules = [
           'name' => ['required','max:255'],
           'email' => ['required','unique:users','email'],
           'password' => ['required','min:8'],
        ];

        $messages = [
            'email.required'   => 'メールアドレスを入力してください。',           
            'email.email'      => '正しいメールアドレスを入力してください。',   
            'email.unique'     => 'そのメールアドレスはすでに登録済みです',
            'name.required'    => '名前を入力してください。',                      
            'name.max'         => '名前は:max文字以内で入力してください。',   
            'password.required'=> 'パスワードを入力してください',
            'password.min'     => 'パスワードは:min文字以上で入力してください。',    
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->errors()){
            $response['message']['name'] = $validator->errors()->first('name');
            $response['message']['email'] = $validator->errors()->first('email');
            $response['message']['password'] = $validator->errors()->first('password');
            throw new HttpResponseException(response()->json($response, 422));
        }

        $validated = $validator->validate();
        $users = new User;
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->password = Hash::make($request->input("password"));
        $users->save();

        $token = $users->createToken('users_token')->accessToken;
        return ['user' => $users, 'token' => $token];
        
    }

    public function login(Request $request){

        $credentials = $request->only('email', 'password');
        
        if(auth()->attempt($credentials)) {

            $user = auth()->user();
            
            $token = $user->createToken('users_token')->accessToken;
            return ['user' => $user, 'token' => $token];

        }
        else{
            abort(401, 'メールかパスワードが間違っています');
        }  
    }
}
