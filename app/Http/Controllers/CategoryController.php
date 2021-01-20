<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index')->with('categories', $categories);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        toastr()->success('Category has been created successfully!');

        return redirect()->route('categories');
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('admin.category.edit')->with('category', $category);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $category->name = $request->name;
        $category->save();

        toastr()->success('Category has been updated successfully!');

        return redirect()->route('categories');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();

        toastr()->success('Category has been deleted successfully!');

        return redirect()->route('categories');
    }
}
