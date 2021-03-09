<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(6);
        return view('index', compact('posts'));
    }
}
