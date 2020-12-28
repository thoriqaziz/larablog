<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        
        return view('admin.post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->content = $request->content;
        
        $image_path = "";
        if($request->hasFile('featured')){
            $image = $request->featured;
            $image_name = time().$image->getClientOriginalName();
            $image->move('uploads/post/', $image_name);

            $image_path = 'uploads/post/'.$image_name;
        }

        $post->featured = $image_path;
        $post->save();

        return redirect()->route('posts');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();

        return view('admin.post.edit', compact('post', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required',
        ]);

        $post = Post::find($id);

        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->content = $request->content;

        if($request->hasFile('featured')){
            if(file_exists($post->featured)){
                unlink($post->featured);
            }

            $image = $request->featured;
            $image_name = time().$image->getClientOriginalName();
            $image->move('uploads/post/', $image_name);

            $post->featured = 'uploads/post/'.$image_name;
        }

        $post->save();

        return redirect()->route('posts');
    }

    public function delete($id)
    {
        $post = Post::find($id);

        if(file_exists($post->featured)){
            unlink($post->featured);
        }
        
        $post->delete();

        return redirect()->route('posts');
    }
}
