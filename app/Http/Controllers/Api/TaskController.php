<?php

namespace App\Http\Controllers\Api;

use App\Models\Task;
use App\Http\Requests\TaskRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\Task as TaskResource;
use Illuminate\Auth\Access\AuthorizationException as AuthorizationExceptionAlias;

class TaskController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param TaskRequest $request
     * @return TaskResource
     * @throws AuthorizationExceptionAlias
     */
    public function store(TaskRequest $request): TaskResource
    {
        $this->authorize('create', [Task::class, $request->project_id]);
        $task = Task::create($request->all());
        return new TaskResource($task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TaskRequest $request
     * @param Task $task
     * @return TaskResource
     * @throws AuthorizationExceptionAlias
     */
    public function update(TaskRequest $request, Task $task): TaskResource
    {
        $this->authorize('update', $task);
        $task->update($request->all());
        return new TaskResource($task);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Task $task
     * @return array
     * @throws AuthorizationExceptionAlias
     */
    public function destroy(Task $task): array
    {
        $this->authorize('delete', $task);
        $task->delete();
        return ['status' => 'OK'];
    }
}
