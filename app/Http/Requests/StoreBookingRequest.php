<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
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
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'trainer_id' => ['required', 'integer', 'exists:trainers,id'],
            'class_time_id' => ['required', 'integer', 'exists:class_times,id'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone_number' => ['required', 'string', 'min:11', 'max:15'],
            'date' => ['required', 'date', 'after_or_equal:today'],
            'start_time' => ['required', 'date_format:H:i'],
            'end_time' => ['required', 'date_format:H:i', 'after:start_time'],
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'User ID is required.',
            'trainer_id.required' => 'Trainer ID is required.',
            'class_time_id.required' => 'Class Time ID is required.',
            'name.required' => 'Your full name is required.',
            'email.required' => 'Your email address is required.',
            'phone_number.required' => 'Your phone number is required.',
            'date.required' => 'Class date is required.',
            'start_time.required' => 'Start time is required.',
            'end_time.required' => 'End time is required and must be after the start time.',
        ];
    }
}
