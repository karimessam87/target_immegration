<?php

namespace App\Http\Requests\Client\Education;

use Carbon\Carbon;
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
      'faculty_name' => ['required', 'min:3', 'max:255'],
      'university' => ['required', 'min:3', 'max:255'],
      'field' => ['required', 'min:3', 'max:255'],
      'degree' => ['required', 'min:1'],
      'certificate' => ['required', 'file', 'max:4080'],
      'eca' => ['sometimes', 'min:3', 'max:255'],
      'country_issue' => ['sometimes', 'min:3', 'max:255'],
      'transcript' => ['sometimes'],
      'credential_report' => ['required', 'file', 'max:4080'],
      'issue_date' => ['required', 'date', 'before_or_equal:' . Date('Y-m-d')],

      'graduation_date' => ['required', 'date'],
      'from_date' => ['required', 'date'],
      'to_date' => ['required', 'date'],

      'flag_id' => ['required', 'integer', 'exists:flags,id'],
      'task_id' => ['sometimes', 'integer'],
      'client_id' => ['required', 'integer', 'exists:clients,id'],

    ];
  }
}
