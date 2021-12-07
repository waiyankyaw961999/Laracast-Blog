<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;


class PostController extends Controller
{
    
    public function index()
    {
        $posts = Post::latest();
        return view('posts.index',
        ['posts'=>Post::latest()->filter(request(['search',
                                                  'category',
                                                  'author']))->Simplepaginate(6)->withQueryString()
    ]);
      
    }
    
    public function show(Post $post)
    {
        return view('posts.show',['post'=>$post]);
    }

   
}
