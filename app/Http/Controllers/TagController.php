<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tag.index')->with('tags', $tags);
    }

    public function create()
    {
        return view('admin.tag.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'tag' => 'required'
        ]);

        $tag = new Tag();
        $tag->tag = $request->tag;
        $tag->save();

        toastr()->success('tag has been created successfully!');

        return redirect()->route('tags');
    }

    public function edit($id)
    {
        $tag = Tag::find($id);

        return view('admin.tag.edit')->with('tag', $tag);
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);

        $tag->tag = $request->tag;
        $tag->save();

        toastr()->success('tag has been updated successfully!');

        return redirect()->route('tags');
    }

    public function delete($id)
    {
        $tag = Tag::find($id);
        $tag->delete();

        toastr()->success('tag has been deleted successfully!');

        return redirect()->route('tags');
    }
}
