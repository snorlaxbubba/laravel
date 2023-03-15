<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function create()
    {
        return view('admin.categories.create')
        ->with('category', null);
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required',
        ]);
        $attributes['slug'] = Str::slug($attributes['name']);
        Category::create($attributes);
        session()->flash('success', 'Category created successfully');
        return redirect('/admin');
    }
    public function edit(Category $category) {
        return view('admin.categories.create')
        ->with('category', $category);
    }

    public function update(Category $category) {

        $attributes = request()->validate([
            'name' => ['required']

        ]);
        $attributes['slug'] = Str::slug($attributes['name']);

        // Save updates to the DB
        $category->update($attributes);

        // Set a flash message
        session()->flash('success','Category Updated Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }
    public function getCategoriesJSON()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    public function destroy(Category $category) {
        $category->delete();
        // Set a flash message
        session()->flash('success','Category Deleted Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }
}
