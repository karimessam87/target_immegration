<?php

namespace App\Http\Requests\Client\Flag;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => ['required', 'min:3', 'max:255'],
            'label' => ['required', 'min:3', 'max:255'],
            'color' => ['required', 'min:3', 'max:10'],

        ];
    }
}
