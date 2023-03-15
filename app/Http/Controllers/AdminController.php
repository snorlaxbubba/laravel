<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $users = User::all();
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.index')
        ->with('users', $users)
        ->with('projects', $projects)
        ->with('categories', $categories)
        ->with('tags', $tags);
    }
}
