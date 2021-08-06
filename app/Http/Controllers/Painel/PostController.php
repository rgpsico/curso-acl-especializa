<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $post;

    public function __construct(Post $post)
    {
     $this->post = $post;   
    }
    public function index()
    {
        $posts = $this->post->all();
        return view('painel.posts.index',compact('posts'));


    }
}
