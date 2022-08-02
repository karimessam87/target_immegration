<?php

namespace App\Http\Requests\Client\CanadianConnection;

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
      'firstname' => ['required', 'min:3', 'max:255'],
      'lastname' => ['required', 'min:3', 'max:255'],
      'related' => ['required', 'min:3', 'max:255'],
      'document' => ['sometimes', 'file', 'max:4080'],
      'relationship' => ['required', 'min:3', 'max:255'],
      'province' => ['required', 'min:3', 'max:255'],
      'education' => ['sometimes', 'boolean'],
      'education_note' => ['nullable', 'min:3', 'max:255'],
      'work' => ['sometimes', 'boolean'],
      'work_note' => ['nullable', 'min:3', 'max:255'],
      'status' => ['sometimes', 'boolean'],
      'note' => ['sometimes', 'min:3', 'max:255'],
      'client_id' => ['required', 'integer', 'exists:clients,id'],
    ];
  }
}
