<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditorRequest extends FormRequest
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
        $id = $this->route('manage_editor');

        $rules = [
            'editor_name' => 'required|string|max:255',
            'editor_email' => 'required|email|unique:editors,email,' . $id
        ];

        if ($this->isMethod('post')) {
            // Additional rules for the store request
            $rules['editor_password'] = 'required|min:8';
            $rules['editor_confirm_password'] = 'required|same:editor_password';
        }

        if ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules['editor_password'] = 'nullable|min:8';
            $rules['editor_confirm_password'] = 'nullable|same:editor_password';
        }

        return $rules;
    }

    /**
     * Get the custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'editor_name.required' => 'The name field is required.',
            'editor_email.required' => 'The email field is required.',
            'editor_email.email' => 'Please enter a valid email address.',
            'editor_email.unique' => 'This email is already registered.',
            'editor_status.required' => 'The status is required.',
            'editor_password.required' => 'Your password is required.',
            'editor_password.min' => 'Password must be at least 8 characters long.',
            'editor_c_password.required' => 'Your confirm password is required.',
            'editor_c_password.same' => 'Confirm password must match the password.',
        ];
    }
}
