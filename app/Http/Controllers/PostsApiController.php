<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsApiController extends Controller
{
    //list user
    public function index(){
        return Post::all();
    }

    //create user
    public function store(){
        request()->validate([
                'username' => 'required',
                'age' => 'required',
        ]);
        return Post::create([
            'username' => request('username'),
            'age' => request('age'),
        ]);
        
    }

    //update
    public function update(Post $post){
        request()->validate([
            'username' => 'required',
            'age' => 'required',
        ]);
        $success = $post->update([
            'username' =>request('username'),
            'age' =>request('age'),
        ]);
    
        return [
            'success' => $success
        ];
    }

    //show user
    public function show(Post $post){
        return $post;
    }

    //delete
    public function remove(Post $post){
        $success = $post->delete();

    return [
        'success' => $success
    ];
    }
}
