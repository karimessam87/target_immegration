<?php

namespace App\Http\Requests\Marketing\Lead;

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
      'name' => ['required'],
      'description' => ['required'],
      'attachment' => ['sometimes', 'file', 'max:4080'],
      'status' => ['sometimes', 'boolean'],
      'flag_id' => ['required', 'exists:flags,id'],
      'label_id' => ['required', 'exists:labels,id'],
      'department_id' => ['required', 'exists:departments,id'],
      'project_id' => ['required', 'exists:projects,id'],

    ];
  }
}
