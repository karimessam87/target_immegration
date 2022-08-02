<?php

namespace App\Http\Requests\Client\WorkHistory;

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
      'resume' => ['required', 'file', 'max:4080'],
      'hr_letters' => ['required', 'file', 'max:4080'],
      'main_applicant' => ['required', 'min:3', 'max:255'],
      'company' => ['required', 'min:3', 'max:255'],
      'title' => ['required', 'min:3', 'max:255'],
      'noc' => ['required', 'min:3', 'max:255'],
      'country' => ['required', 'min:3', 'max:255'],
      'city' => ['required', 'min:3', 'max:255'],
      'flag_id' => ['sometimes'],
      'work_from' => ['required', 'date'],
      'work_to' => ['required', 'date', 'after:work_from'],
      'client_id' => ['required', 'integer', 'exists:clients,id'],
    ];
  }
}
