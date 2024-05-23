<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::All();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $exist = Project::where('title', $request->title)->first();
        if($exist){
            return redirect()->route('admin.projects.index')->with('error', 'Progetto già esistente');
        }else{
            $new_project = new Project();
            $new_project->title = $request->title;
            $new_project->description = $request->description;
            $new_project->save();

            return redirect()->route('admin.projects.index')->with('success', 'Progetto aggiunto correttamente');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {

        $validate_data = $request->validate([
            'title' => 'required|min:5|max:100'
        ],
        [
            'title.required' => 'Il titolo è obbligatorio',
            'title.min' => 'Il titolo deve contenere almeno :min caratteri',
            'title.max' => 'Il titolo deve contenere massimo :max caratteri'
        ]);



        $exist = Project::where('title', $request->title)->first();
        if($exist){
            return redirect()->route('admin.projects.index')->with('error', 'Progetto non modificato perchè già esistente');
        }else{
            $project->update($validate_data);
            return redirect()->route('admin.projects.index')->with('success', 'Progetto modificato correttamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Progetto eliminato correttamente');

    }
}
