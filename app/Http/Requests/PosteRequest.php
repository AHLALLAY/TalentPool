<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PosteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();
        return $user && $user->roles == 'Operator';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string', 'min:20', 'max:1000'],
            'expired_date' => ['required', 'date'],
            'user_id' => ['required', 'integer', 'min:1', 'exists:users,id'],
        ];
    }
}
