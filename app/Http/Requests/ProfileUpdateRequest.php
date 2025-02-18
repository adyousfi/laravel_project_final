<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            
            'name' => ['nullable', 'string', 'max:255'],

            'email' => [
                'nullable',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],

            'username'  => ['nullable', 'string', 'max:255'],
            'birthday'  => ['nullable', 'date'],
            'about_me'  => ['nullable', 'string', 'max:1000'],
        ];
    }
}
