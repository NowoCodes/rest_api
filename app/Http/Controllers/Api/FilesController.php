<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;
use App\Http\Requests\FileRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\Project as ProjectResource;
use Illuminate\Auth\Access\AuthorizationException;

class FilesController extends Controller
{
    /**
     * @throws AuthorizationException
     */
    public function store(FileRequest $request): ProjectResource
    {
        $project = Project::findOrFail($request->project_id);
        $this->authorize('upload', $project);
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('/public', $filename);
        $project->image = $filename;
        $project->save();

        return new ProjectResource($project);
    }
}
