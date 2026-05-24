<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\PriorityEnum;
use App\Enums\StatusEnum;

class StoreTaskRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        
        return [
            'title' => 'required|string|max:255',

            'description' => 'nullable|string',

            'priority' => 'required|in:' .
                implode(',', PriorityEnum::values()),

            'status' => 'required|in:' .
                implode(',', StatusEnum::values()),

            'due_date' => 'nullable|date',

            'assigned_to' => 'required|exists:users,id',
        ];
    }
}