<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
            "name"     => ["required", "string", "min:3", "max:50"],
            "password" => ["required", "string"],
            "role"     => ["required", Rule::in(User::ROLES)],
            "email"    => ["required", "email", Rule::unique("users", "email")],
        ];
    }
}
