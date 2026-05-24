<?php

namespace App\Services;

use App\Models\Task;

class AIService
{
    public function generateSummary(Task $task): array
    {
        return [
            'ai_summary' =>
                'Task involves '.$task->title.
                '. Priority appears important based on description.',

            'ai_priority' =>
                str_contains(strtolower($task->description), 'urgent')
                    ? 'high'
                    : 'medium'
        ];
    }
}