<?php

namespace App\Http\Requests;

use App\Enums\PriorityEnum;
use App\Enums\StatusEnum;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
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
