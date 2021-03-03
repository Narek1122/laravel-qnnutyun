<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function createPost(Request $request,$id){
      $validated = $request->validate([
        'data' => 'required'
      ]);

      $validated['user_id'] = $id;
      // dd($validated);
      Post::create($validated);

    }

    public function DelPost($id){
      Post::where('id','=',$id)->delete();
      
    }
}
