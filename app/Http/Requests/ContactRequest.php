<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Contact form validation request
 * 
 * simplified: replaced inline validation with FormRequest class
 * follows Laravel 11 best practices for separation of concerns
 */
class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Contact form is public, no authorization needed
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'email' => ['required', 'email:rfc,dns', 'max:255'],
            'subject' => ['required', 'string', 'min:3', 'max:255'],
            'message' => ['required', 'string', 'min:10', 'max:1000'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'name.min' => 'Name must be at least 2 characters',
            'email.required' => 'Email is required',
            'email.email' => 'Please enter a valid email address',
            'subject.required' => 'Subject is required',
            'subject.min' => 'Subject must be at least 3 characters',
            'message.required' => 'Message is required',
            'message.min' => 'Message must be at least 10 characters',
            'message.max' => 'Message must not exceed 1000 characters',
        ];
    }
}
