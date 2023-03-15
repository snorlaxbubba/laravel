<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Project;
use App\Models\Tag;

class ProjectController extends Controller
{
    public function index()
    {   
        $category = null;
        $tag = null;
        return view('projects.index')
            ->with('projects', Project::latest('published_date')->paginate(6)->withQueryString())
            ->with('tag', $tag)
            ->with('category', $category);
    }

    public function show(Project $project)
    {
        return view('projects.project',['project' => $project]);
    }

    public function listByCategory(Category $category)
    {
        $tag = null;
        return view('projects.index')
        ->with('category', $category)
        ->with('tag', $tag)
        ->with('projects', $category->projects);
    }

    public function listByTag(Tag $tag)
    {
        $category = null;
        return view('projects.index')
        ->with('tag', $tag)
        ->with('category', $category)
        ->with('projects', $tag->projects);
    }

    public function create() {
        return view('admin.projects.create')
        ->with('project', null)
        ->with('tags', Tag::all())
        ->with('categories', Category::all());
    }

    public function store(Request $request) {
        // ddd(request()->all());

        $attributes = request()->validate([
            'title' => ['required', 'unique:projects,title'],
            'excerpt' => 'required',
            'body' => 'required',
            'url' => ['nullable', 'sometimes', 'url'],
            'published_date' => ['nullable', 'sometimes', 'date'],
            'image' => ['nullable','sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:2048'],
            'thumb' => ['nullable','sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:1024'],
            'category_id' => ['nullable', 'sometimes', 'exists:categories,id'],
        ]);        

        // Save upload in public storage and set path attributes 
        $image_path = $request->file('image')?->storeAs('images',$request->image->getClientOriginalName(), 'public');
        $attributes['image'] = $image_path;
        $thumb_path = $request->file('thumb')?->storeAs('images', $request->thumb->getClientOriginalName(), 'public');
        $attributes['thumb'] = $thumb_path;

        // Generate the slug from the title
        $attributes['slug'] = Str::slug($attributes['title']);

        $project = Project::create($attributes);

        $project->tags()->attach($request['tags']);

        // Set a flash message
        session()->flash('success','Project Created Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }

    public function edit(Project $project) {
        return view('admin.projects.create')
        ->with('project', $project)
        ->with('tags', Tag::all())
        ->with('categories', Category::all());

    }

    public function update(Project $project, Request $request) {

        $attributes = request()->validate([
            'title' => ['required','unique:projects,title,'.$project->id],
            'excerpt' => 'required',
            'body' => 'required',
            'url' => ['nullable','sometimes','url'],
            'published_date' => ['nullable','sometimes','date'],
            'image' => ['nullable','sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:2048',],
            'thumb' => ['nullable','sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:1024',],
            'category_id' => ['nullable','sometimes','exists:categories,id'],
        ]);
        $project->tags()->sync([2,4]);
        // Save upload in public storage and set path attributes 
        $image_path = $request->file('image')?->storeAs('images',$request->image->getClientOriginalName(), 'public');
        $attributes['image'] = $image_path;
        $thumb_path = $request->file('thumb')?->storeAs('images', $request->thumb->getClientOriginalName(), 'public');
        $attributes['thumb'] = $thumb_path;

        $attributes['slug'] = Str::slug($attributes['title']);

        $project->tags()->sync($request['tags']);
        // Save updates to the DB
        $project->update($attributes);

        // Set a flash message
        session()->flash('success','Project Updated Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }

    public function getProjectsJSON()
    {
        $projects = Project::with(['category','tags'])->get();
        return response()->json($projects);
    }

    public function destroy(Project $project) {
        $project->delete();
        $project->tags()->detach();
        // Set a flash message
        session()->flash('success','Project Deleted Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }

}
