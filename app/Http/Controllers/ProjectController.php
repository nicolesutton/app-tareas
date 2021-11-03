<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
  
    public function index()
    {
        $projects = Project::all();
        return view('projects.index')->with('projects', $projects);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    { 
        $project = new Project;

        $project->name = $request->name;
        $project->description = $request->description;
        $project->status = $request->status;

        $project->save();

        return redirect()->back();

    }

    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

   
    public function update($id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
