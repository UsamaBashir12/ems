<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize(): bool
  {
    return true; // Adjust based on your authorization logic
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules(): array
  {
    return [
      'email' => ['required', 'email'],
      'password' => ['required', 'string'],
      'remember' => ['sometimes', 'boolean'],
    ];
  }

  /**
   * Customize the validation messages if needed.
   *
   * @return array
   */
  public function messages(): array
  {
    return [
      'email.required' => 'The email field is required.',
      'email.email' => 'Please enter a valid email address.',
      'password.required' => 'The password field is required.',
      'password.string' => 'The password must be a string.',
      'remember.boolean' => 'The remember me field must be true or false.',
    ];
  }
}
