<?php

namespace App\Http\Requests;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Retrieve the user being updated from the route parameters
        $user = $this->route('user');
        return [
            'role' => 'required',
            'firstname' => 'required|string|max:25',
            'lastname' => 'required|string|max:25',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'address' => 'nullable',
            'age' => 'nullable',
            'image_url' => 'nullable',
        ];
    }
}
