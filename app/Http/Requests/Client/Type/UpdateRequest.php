<?php

namespace App\Http\Requests\Client\Type;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['sometimes', 'min:3', 'max:255'],
            'description' => ['sometimes', 'min:3', 'max:255'],
            'color' => ['sometimes', 'min:3', 'max:10'],
            'status' => ['sometimes', 'boolean'],

        ];
    }
}
