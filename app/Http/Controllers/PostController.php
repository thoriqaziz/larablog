<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        
        return view('admin.post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.create', compact('categories', 'tags'));
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
        $post->slug = Str::slug($request->title);
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

        $post->tags()->attach($request->tags);

        toastr()->success('Post has been created successfully!');

        return redirect()->route('posts');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.post.edit', compact('post', 'categories', 'tags'));
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

        $post->tags()->sync($request->tags);
        
        toastr()->success('Post has been updated successfully!');

        return redirect()->route('posts');
    }

    public function trash($id)
    {
        $post = Post::find($id);

        // if(file_exists($post->featured)){
        //     unlink($post->featured);
        // }
        
        $post->delete();
        toastr()->success('Post has been trashed successfully!');

        return redirect()->route('posts');
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();

        return view('admin.post.trashed', compact('posts'));
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();

        $post->restore();
        toastr()->success('Post has been restored successfully!');

        return redirect()->back();
    }

    public function delete($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();

        if(file_exists($post->featured)){
            unlink($post->featured);
        }

        $post->forceDelete();
        toastr()->success('Post has been deleted successfully!');

        return redirect()->back();
    }
}
