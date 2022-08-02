<?php

namespace App\Http\Requests\Client\FinancialReport;

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
      'bank_name' => ['required', 'min:3', 'max:255'],
      'balance' => ['required', 'integer', 'digits_between:1,9'],
      'statement_date' => ['required', 'date'],
      'due_date' => ['required', 'date'],
      'payment_date' => ['required', 'date'],
      'client_id' => ['required', 'integer', 'exists:clients,id'],
    ];
  }
}
