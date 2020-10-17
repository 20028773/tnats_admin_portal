<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserManagementController extends Controller
{
    public function index(){
        $users = auth()->user()->users;
        return response()->json([
                                    'success' => true,
                                    'posts' => $users
                                ]);
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        if(auth()->user()->users()->save($user)){
            return response()->json(['success' => true,
                                        'data'=>$user->toArray()]);
        }
        else{
            return response()->json(['success' => false,
                                        'message'=>'post not created',
                                    ],500);
        }
    }

    public function show($id){
        $user = auth()->user()->users()->find($id);
        if(!$user){
            return response()->json(['success' => false,
                                        'message'=>'user not found',
                                    ],400);
        }
        return response()->json(['success' => true,
                                    'data'=>$user->toArray()],
                                200);
    }

    public function update(Request $request, $id){
        $user = auth()->user()->users()->find($id);
        if(!$user){
            return response()->json(['message' => 'cannot find post'],401);
        }
        $updated = $user->fill($request->all())->save();

        if($updated){
            return response()->json(['success' => true]);
        }
        else{
            return response()->json(['success' => false,
                                        'message'=>'post cannot be updated'],
                                    500);
        }
    }

    public function destroy($id){
        $user = auth()->user()->users()->find($id);
        if(!$user){
            return response()->json(['message' => 'cannot find post'],401);
        }
        if($user->delete()){
            return response()->json(['success' => true]);
        }
        else{
            return response()->json(['success' => false,
                                        'message'=>'post cannot be deleted'],
                                    500);
        }

    }
}
