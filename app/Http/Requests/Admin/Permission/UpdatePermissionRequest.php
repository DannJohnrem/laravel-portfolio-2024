<?php

namespace App\Http\Requests\Admin\Permission;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePermissionRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:30', 'regex:/^[a-zA-Z\s]+$/',
                Rule::unique('permissions', 'name')->ignore($this->permission)
            ],
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
            'name.unique' => 'The permission name has already been taken.',
            'name.required' => 'The permission name field is required.',
            'name.string' => 'The permission name must be string only.',
            'name.regex' => 'The permission name must contain only alphabetic and underscore characters.',
        ];
    }
}
