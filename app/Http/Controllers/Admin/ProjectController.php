<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $projectsArray = Project::all();

        // dd($projectsArray);

        return view('admin.projects.index', compact('projectsArray'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $typesCollection = Type::all();

        // dd($typesCollection);

        $technologiesCollection = Technology::all();

        // dd($technologiesCollection);

        return view('admin.projects.create', compact('typesCollection', 'technologiesCollection'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProjectRequest $request)
    {

        // dd($request);

        $projectsDataArray = $request->validated();

        // dd($projectsDataArray);

        $newProject = new Project();

        $newProject->fill($projectsDataArray);

        $newProject->slug = Str::slug($newProject->title, '_');

        $newProject->save();

        // Checkboxes control
        if ($request->has('technologies')) {
            $newProject->technologies()->attach($request->technologies);
        };

        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {

        // dd($project);

        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {

        // dd($project);

        $typesCollection = Type::all();

        // dd($typesCollection);

        $technologiesCollection = Technology::all();

        // dd($technologiesCollection);

        return view('admin.projects.edit', compact('project', 'typesCollection', 'technologiesCollection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {

        $projectsDataArray = $request->validated();

        // dd($projectsDataArray);

        $project->update($projectsDataArray);
        $project['slug'] = Str::slug($project['title'], '_');
        $project->save();

        // Checkboxes control
        if ($request->has('technologies')) {
            $project->technologies()->sync($request->technologies);
        };

        return redirect()->route('admin.projects.show', ['project' => $project->slug]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {

        $project->technologies()->detach();

        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
