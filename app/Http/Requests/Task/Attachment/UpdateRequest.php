<?php

namespace App\Http\Requests\Task\Attachment;

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
    return false;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'attachment' => ['sometimes', 'file', 'max:4080'],
      'task_id' => ['required', 'integer', 'exists:tasks,id'],
      'flag_id' => ['sometimes', 'integer', 'exists:flags,id'],
    ];
  }
}
