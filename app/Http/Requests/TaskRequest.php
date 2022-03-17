<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskRequest extends FormRequest
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
            'title' => ['required'],
            'description' => ['nullable'],
            'deadline_time' => ['nullable'],
            'sprint_id' => ['required', 'exists:sprints,id'],
            'type' => ['required', Rule::in('task', 'bug', 'story')],
            'assign_to' => ['required', 'exists:users,id'],
            'parent_id' => ['nullable', 'exists:tasks,id']
        ];
    }
}
