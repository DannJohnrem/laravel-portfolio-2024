<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class UpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:30',
            'email' => ['required', 'string', 'email', 'lowercase', 'max:30',
                Rule::unique('users', 'email')->ignore($this->user)
            ],
            'password' => ['nullable', 'confirmed'],
            'roles' => ['sometimes', 'array'],
            'permissions' => ['sometimes', 'array']
        ];
    }
}
