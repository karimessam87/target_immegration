<?php

namespace App\Http\Requests\Client\Detail;

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
      'nationality_number' => ['required', 'integer'],
      'passport_number' => ['required'],
      'passport_date' => ['required', 'date', 'after_or_equal:' . Carbon::today()->addMonth()],
      'additional_phone' => ['sometimes'],
      'cic_username' => ['sometimes'],
      'cic_password' => ['sometimes'],
      'additional_email' => ['sometimes'],
      'sponsor_name' => ['sometimes'],
      'sponsor_eligibility' => ['sometimes', 'boolean'],
      'canadian_status' => ['sometimes'],

    ];
  }
}
