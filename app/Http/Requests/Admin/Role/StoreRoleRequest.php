<?php

namespace App\Http\Requests\Admin\Role;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRoleRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:30', 'regex:/^[a-zA-Z]+$/',
                Rule::unique('roles', 'name')
            ],
            'permissions' => ['sometimes', 'array'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.unique' => 'The role name has already been taken.',
            'name.required' => 'The role name field is required.',
            'name.string' => 'The role name must be string only.',
            'name.regex' => 'The role name must contain only alphabetic characters.',
        ];
    }
}
