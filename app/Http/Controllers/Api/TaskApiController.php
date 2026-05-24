<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Repositories\Contracts\TaskRepositoryInterface;
use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskApiController extends Controller
{
    protected $repo;
    protected $service;

    public function __construct(
        TaskRepositoryInterface $repo,
        TaskService $service
    ) {
        $this->repo = $repo;
        $this->service = $service;
    }

    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => $this->service->getAllTasks()
        ], 200);
    }

    public function store(StoreTaskRequest $request)
    {
        $task = $this->service->store(
            $request->validated()
        );

        return response()->json([
            'success' => true,
            'message' => 'Task created successfully',
            'data' => $task
        ], 201);
    }

    public function updateStatus(Request $request, $id)
    {
        $task = $this->service->update($id, [
            'status' => $request->status
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Task status updated',
            'data' => $task
        ], 200);
    }

    public function aiSummary($id)
    {
        $task = $this->service->findTask($id);

        return response()->json([
            'success' => true,
            'ai_summary' => $task->ai_summary,
            'ai_priority' => $task->ai_priority
        ], 200);
    }
}