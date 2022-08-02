<?php

namespace App\Http\Requests\File\Status;

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
            'value' => ['required', 'integer', 'between:0,6'],
            'color' => ['required', 'min:3', 'max:10'],
        ];
    }
}
