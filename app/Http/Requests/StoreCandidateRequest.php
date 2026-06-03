<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCandidateRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'candidate_number' => 'required|integer|unique:candidates,candidate_number',
            'name' => 'required|string|max:255',
            'vision' => 'required|string',
            'mission' => 'required|string',
        ];
    }
}