<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

// Form Requests 
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

// Models
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $validData = $request->validated();

        if (isset($validData['technologies'])) {
            foreach ($validData['technologies'] as $singleTechnologyId) {
                $project->technologies()->attach($singleTechnologyId);
            }
        }

        $coverImagePath = null;
        if(isset($validData['cover_image'])){
            $coverImagePath = Storage::disk('public')->put('images', $validData['cover_image']);
        }

        $validData['cover_image'] = $coverImagePath;

        $project = Project::create($validData);
        return redirect()->route('admin.projects.show', compact('project'));
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
    public function edit(Project $project)
    {   
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $validData = $request->validated();

        if (isset($validData['technologies'])) {
            $project->technologies()->sync($validData['technologies']);
        }
        else {
            $project->technologies()->detach();
        }

        $coverImagePath = $project->cover_image;
        if (isset($validData['cover_image'])){
            if ($project->cover_image != null){
                Storage::disk('public')->delete($project->cover_image);
            }

            $coverImagePath = Storage::disk('public')->put('images', $validData['cover_image']);
        }
        else if (isset($validData['delete_cover_image'])){
            Storage::disk('public')->delete($project->cover_image);

            $coverImagePath = null;
        }

        $validData['cover_image'] = $coverImagePath;

        $project->update($validData);

        return redirect()->route('admin.projects.show', compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->cover_image != null){
            Storage::disk('public')->delete($project->cover_image);
        }

        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
