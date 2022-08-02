<?php

namespace App\Http\Requests\File;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'number' => ['required', 'numeric'],
            'noc' => ['required'],
            'cic' => ['required'],
            'job_seeker_code' => ['required'],
            'score' => ['required'],
            'application_effective_date' => ['required', 'date', 'after_or_equal:today'],
            'file_type_id' => ['required', 'integer'],
            'file_statue_id' => ['required', 'integer'],
            'file_label_id' => ['sometimes', 'integer'],
            'client_id' => ['required', 'unique:files,client_id'],
        ];
    }
}
