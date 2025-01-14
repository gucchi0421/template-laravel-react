<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    protected Task $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function index(): JsonResponse
    {
        $tasks = $this->task->getTask();
        return \response()->json($tasks, 200);
    }

    public function store(TaskRequest $request): JsonResponse
    {
        $reqTask = $request->validated();
        $task = $this->task->createTask($reqTask);
        return \response()->json($task, 201);
    }

    public function show(string $id): JsonResponse
    {
        $task = $this->task->getTaskById($id);
        return \response()->json($task, 200);
    }

    public function update(string $id, TaskRequest $request): JsonResponse
    {
        $reqTask = $request->validated();
        if (!$this->task->updateTask($id, $reqTask)) {
            return \response()->json(['message' => 'Task not found'], 404);
        }
        return \response()->json($reqTask, 200);
    }

    public function destroy(string $id): JsonResponse
    {
        if (!$this->task->deleteTask($id)) {
            return \response()->json(['message' => 'Task not found'], 404);
        }
        return \response()->json(['message' => 'Task deleted successfully'], 200);
    }
}
