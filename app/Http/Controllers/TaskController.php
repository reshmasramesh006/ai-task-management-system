<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use App\Models\User;
use App\Repositories\Contracts\TaskRepositoryInterface;
use App\Services\TaskService;

class TaskController extends Controller
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
        //  dd('controller reached');
        $tasks = $this->service->getAllTasks();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $users = $this->service->getUsers();

        return view('tasks.create', compact('users'));
    }

    public function store(StoreTaskRequest $request)
    {
        $this->service->store($request->validated());

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task created');
    }

    public function show($id)
    {
        $task = $this->service->findTask($id);

        $this->authorize('view', $task);

        return view('tasks.show', compact('task'));
    }

    public function edit($id)
    {
        $task = $this->service->findTask($id);

        $this->authorize('update', $task);

        $users = $this->service->getUsers();

        return view('tasks.edit', compact('task', 'users'));
    }

    public function update(
        UpdateTaskRequest $request,
        $id
    ) {
        $task = $this->service->findTask($id);

        $this->authorize('update', $task);

        $this->service->update(
            $id,
            $request->validated()
        );

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task updated');
    }

}
