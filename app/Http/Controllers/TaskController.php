<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskAssigneeRequest;
use App\Http\Requests\TaskStatusRequest;
use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskStoreRequest $request)
    {
        $task = Task::create(
            $request->safe()->toArray()
        );
        $task->save();

        return [
            "message" => "Task created.",
            "task" => new TaskResource($task)
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return [
            "message" => "Task found.",
            "task" => new TaskResource($task),
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskUpdateRequest $request, Task $task)
    {
        $task->update(
            $request->safe()->toArray(),
        );

        return [
            "message" => "Task updated.",
            "task" => new TaskResource($task),
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return [
            "message" => "Task deleted.",
        ];
    }

    /**
     * Search for tasks by status
     */
    public function tasksByStatus(TaskStatusRequest $request)
    {
        $tasks = DB::table('tasks')->whereIn('status', [$request->status])->get();

        if ($tasks->count() > 0) {

            return [
                "message" => "Search for a task by status successful.",
                "tasks" => $tasks,
            ];
        }

        return response()->json([
            'message' => 'Sorry, but task status entered incorrectly.',
        ], 404);
    }

    /**
     * Search for tasks by assignee
     */
    public function tasksByAssignee(TaskAssigneeRequest $request)
    {
        $tasks = DB::table('tasks')->whereIn('assignee', [$request->assignee])->get();

        if ($tasks->count() > 0) {

            return [
                "message" => "Search for a task by assignee successful.",
                "tasks" => $tasks,
            ];
        }

        return response()->json([
            'message' => 'Sorry, but task assignee entered incorrectly or such user does not exist',
        ], 404);
    }
}
