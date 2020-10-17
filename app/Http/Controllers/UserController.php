<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Middleware\Requests\StoreUserRequest;

class UserController extends Controller
{
    public function index(Request $request){
        $users = User::Paginate(5);
        return view('users.index',compact('users'));
    }

    public function create(){
        return view('users.create');
    }

    public function store(StoreUserRequest $request){
        $user = User::create($request->all());
        return redirect('/users');

    }

    public function show($id){
        $user = User::find($id);
        return view('users.show',compact('user'));

    }

    public function edit($id){
        $user = User::find($id);
        return view('users.update',compact('user'));

    }

    public function update($id){
        $user = User::find($id);
        $user->name = request('name');
        $user->email = request('email');
        $user->password = request('password');
        $user->save();
        return redirect('users/'.$user->id);
    }

    public function delete(User $user){
        return view('users.delete',compact('user'));
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/users');
    }

    public function search(Request $request)
    {
        $data = User::select("name as name","email as email","name as desc")->where("names","LIKE","%{$request->input('query')}%")->get();

        return response()->json($data);
    }
}
