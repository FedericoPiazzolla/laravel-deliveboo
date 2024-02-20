<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDishRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:200', 'min:5', Rule::unique('dishes')->ignore($this->dish)],
            'price' => ['required', 'decimal:2'],
            'available' => ['required', 'boolean', Rule::in([0, 1])],
            'description' => ['nullable'],
        ];
    }
}
