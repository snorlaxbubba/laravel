<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Str;

class TagController extends Controller
{

    public function create()
    {
        return view('admin.tags.create')
        ->with('tag', null);
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required',
        ]);
        $attributes['slug'] = Str::slug($attributes['name']);
        Tag::create($attributes);
        session()->flash('success', 'Tag created successfully');
        return redirect('/admin');
    }

    public function edit(Tag $tag) {
        return view('admin.tags.create')
        ->with('tag', $tag);
    }

    public function update(Tag $tag) {

        $attributes = request()->validate([
            'name' => ['required']

        ]);
        $attributes['slug'] = Str::slug($attributes['name']);

        // Save updates to the DB
        $tag->update($attributes);

        // Set a flash message
        session()->flash('success','Tag Updated Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }

    public function getTagsJSON()
    {
        $tags = Tag::all();
        return response()->json($tags);
    }

    public function destroy(Tag $tag) {
        $tag->delete();
        // Set a flash message
        session()->flash('success','Tag Deleted Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }
}
