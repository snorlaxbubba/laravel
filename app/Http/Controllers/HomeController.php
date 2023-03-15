<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller

{
    public function index()
    {   
        return view('welcome')
;
    }

    public function show(Project $project)
    {
        return view('projects.project',['project' => $project]);
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function short() {
        return view('short');
    }

    public function long() {
        return view('long');
    }   

}