<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
   public function getBanner(){
       return Post::first();
   }

   public function updateBanner(Request $request){
       $post = Post::find($request->id);
       $post->description = $request->description;
       $post->link = $request->link;
       $post->save();

       return [
           'status' => true,
           'message' => 'post was updated',
           'record' => $post->toArray()
       ];

   }
}
