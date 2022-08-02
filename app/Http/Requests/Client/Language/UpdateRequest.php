<?php

namespace App\Http\Requests\Client\Language;

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
      'name' => ['required', 'min:3', 'max:255'],
      'test' => ['required', 'min:3', 'max:255'],
      'certificate_number' => ['required', 'min:3', 'max:255'],
      'listening' => ['required', 'min:1', 'max:6'],
      'reading' => ['required', 'min:1', 'max:6'],
      'writing' => ['required', 'min:1', 'max:6'],
      'speaking' => ['required', 'min:1', 'max:6'],
      'issue_date' => ['required', 'date', 'before_or_equal:' . Date('Y-m-d')],
      'expire_date' => ['required', 'date', 'after_or_equal:' . Carbon::now()->addMonth()],
      'flag_id' => ['required', 'integer', 'exists:flags,id'],
      'client_id' => ['required', 'integer', 'exists:clients,id'],
    ];
  }
}
