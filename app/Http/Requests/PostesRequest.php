<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:50'],
            'type' => ['required', 'string', 'in:stage,CDI,CDD,Anapec'],
            'description' => ['required', 'string', 'max:5000', 'min:50'],
            'launch_date' => ['required', 'date'],
            'expired_date' => ['required', 'date'],
            'operator' => ['required', 'integer'],
        ];
    }
}
