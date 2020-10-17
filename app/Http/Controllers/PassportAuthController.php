<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PassportAuthController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function register(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:4',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password'=>bcrypt($request->password)
        ]);

        $token = $user->createToken('LaravelAuthApp')->accessToken;

        return response()->json(['token'=> $token],200);

    }

    public function login(Request $request){
        $data = [
            'email'=> $request->email,
            'password'=> $request->password
        ];

        if(auth()->attempt($data)){
            $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
            return response()->json(['token'=>$token],200);
        }
        else{
           return response()->json(['error'=>'authorised'],401);
        }
    }
}
