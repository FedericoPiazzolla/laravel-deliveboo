<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDishRequest extends FormRequest
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
            'name' => ['required', 'max:200', 'min:5', 'unique:dishes'],
            'description' => ['nullable'],
            'price' => ['required','decimal:2']

        ];
    }
    public function messages()
    {
        return
        [ 
            'name.required' => 'Il nome è obbligatorio',
            'name.min' => 'Il nome deve essere lungo almeno :min caratteri',
            'name.max' =>'Il nome deve essere lungo massimo :max caratteri',
        ];
       
    }
}
