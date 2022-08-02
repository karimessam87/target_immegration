<?php

namespace App\Http\Requests\Client\Document;

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
      'name' => ['sometimes', 'min:3', 'max:255'],
      'description' => ['sometimes', 'min:3', 'max:255'],
      'country_issue' => ['sometimes'],
      'file' => ['required', 'file', 'max:4080'],
      'issue_date' => ['required', 'date', 'before_or_equal:' . Date('Y-m-d')],
      'expire_date' => ['required', 'date', 'after_or_equal:' . Carbon::now()->addMonth()->format('Y-m-d')],
      'document_type_id' => ['required', 'integer', 'exists:document_types,id'],
      'flag_id' => ['required', 'integer', 'exists:flags,id'],
      'label_id' => ['required', 'integer', 'exists:labels,id'],
      'client_id' => ['required', 'integer', 'exists:clients,id'],

    ];
  }
}
