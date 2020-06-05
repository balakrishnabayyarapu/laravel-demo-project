<?php

namespace App\Http\Requests;

use App\Rules\PasswordValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
           
            'first_name'=>'required|regex:/^[A-Za-z0-9 ]+$/',
            'last_name'=>'required|regex:/^[A-Za-z0-9 ]+$/',
            'email'=>'required|email|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|in:admin,manager,customer',
            'password'=>['required', new PasswordValidationRule],
      
        ];
    }
}
