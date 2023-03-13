<?php

namespace App\Http\Requests;

use App\Models\Task;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            "name"        => ["required", "string", "min:3", "max:100"],
            "description" => ["required", "string", "min:3", "max:500"],
            "status"      => ["required", Rule::in(Task::STATUSES)],
            "assignee"    => ["required", "numeric", Rule::exists("users", "id")],
        ];
    }
}
