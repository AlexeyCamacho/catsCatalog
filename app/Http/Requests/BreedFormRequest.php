<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BreedFormRequest extends FormRequest
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
            'id' => [],
            'name' => ['required', 'min:3'],
            'avr_life_time' => ['required', 'min:1', 'max:20'],
            'desc' => ['required', 'min:3']
        ];
    }
}
