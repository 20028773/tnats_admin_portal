<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index(){
        $posts = auth()->user()->posts;
        return response()->json([
            'success' => true,
            'posts' => $posts
        ]);
    }

    public function store(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required'
        ]);
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;

        if(auth()->user()->posts()->save($post)){
            return response()->json(['success' => true,
                                        'data'=>$post->toArray()]);
        }
        else{
            return response()->json(['success' => false,
                                        'message'=>'post not created',
                                    ],500);
        }
    }

    public function show($id){
        $post = auth()->user()->posts()->find($id);
        if(!$post){
            return response()->json(['success' => false,
                                    'message'=>'item not found',
                                    ],400);
        }
        return response()->json(['success' => true,
                                'data'=>$post->toArray()],
                                200);
    }

    public function update(Request $request, $id){
        $post = auth()->user()->posts()->find($id);
        if(!$post){
            return response()->json(['message' => 'cannot find post'],401);
        }
        $updated = $post->fill($request->all())->save();

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
        $post = auth()->user()->posts()->find($id);
        if(!$post){
            return response()->json(['message' => 'cannot find post'],401);
        }
        if($post->delete()){
            return response()->json(['success' => true]);
        }
        else{
            return response()->json(['success' => false,
                                        'message'=>'post cannot be deleted'],
                                    500);
        }

    }

}
