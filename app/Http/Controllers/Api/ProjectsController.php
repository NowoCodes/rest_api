<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectCollection;
use App\Http\Resources\Project as ProjectResource;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Project::class, 'project');
    }

    /**
     * Display a listing of the resource.
     *
     * @return ProjectCollection
     */
    public function index(): ProjectCollection
    {
        $projects = Project::where('user_id', auth()->id())
            ->withCount('tasks')
            ->Paginate();
        return new ProjectCollection($projects);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return ProjectResource
     */
    public function store(Request $request): ProjectResource
    {
        $project = auth()->user()->projects()->create($request->all());
        return new ProjectResource($project);
    }

    /**
     * Display the specified resource.
     *
     * @param Project $project
     * @return ProjectResource
     */
    public function show(Project $project): ProjectResource
    {
        $project->tasks;
        return new ProjectResource($project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Project $project
     * @return ProjectResource
     */
    public function update(Request $request, Project $project): ProjectResource
    {
        $project->update($request->all());
        $project->tasks;
        return new ProjectResource($project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @return string[]
     */
    public function destroy(Project $project): array
    {
        $project->delete();
        return ['status' => 'OK'];
    }
}
