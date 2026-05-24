<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Repositories\Contracts\TaskRepositoryInterface;
use App\Services\AIService;

class TaskService
{
    protected $repo;
    protected $aiService;

    public function __construct(
        TaskRepositoryInterface $repo,
        AIService $aiService
    ) {
        $this->repo = $repo;
        $this->aiService = $aiService;
    }

    public function getUsers()
    {
        return User::all();
    }

    public function findTask($id)
    {
        return $this->repo->find($id);
    }
    public function store(array $data)
    {
        return DB::transaction(function () use ($data) {

            $task = $this->repo->create($data);

            $aiData = $this->aiService->generateSummary($task);

            return $this->repo->update($task->id, $aiData);
        });
    }

    public function update(int $id, array $data)
    {
        return DB::transaction(function () use ($id, $data) {

            $task = $this->repo->update($id, $data);

            $aiData =
                $this->aiService->generateSummary($task);

            return $this->repo->update(
                $task->id,
                $aiData
            );
        });
    }

    public function getAllTasks()
    {
        return $this->repo->all();
    }
}
