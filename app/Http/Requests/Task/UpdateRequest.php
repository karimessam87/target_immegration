<?php

namespace App\Http\Requests\Task;

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
      'name' => ['required', 'min:4', 'max:255'],
      'description' => ['required', 'min:4', 'max:255'],
      'attachment' => ['sometimes', 'max:4080'],
      'flag_to_file_id' => ['sometimes'],
      'expire_date' => ['required', 'date', 'after:' . Date('Y-m-d')],
      'due_date' => ['sometimes', 'date', 'before_or_equal:expire_date'],
      'expire_time' => ['required', 'date_format:H:i', 'after_or_equal:' . Date('H')],
      'due_time' => ['sometimes', 'date', 'before_or_equal:expire_time'],
      'flag_id' => ['required', 'integer', 'exists:flags,id'],
      'label_id' => ['required', 'integer', 'exists:labels,id'],
      'employee_id' => ['required', 'integer', 'exists:employees,id'],
      'leader_id' => ['sometimes', 'integer', 'exists:employees,id'],
      'task_type_id' => ['required', 'integer', 'exists:task_types,id'],
      'department_id' => ['required', 'integer', 'exists:departments,id'],
      'started_at' => ['sometimes'],
    ];
  }
}
