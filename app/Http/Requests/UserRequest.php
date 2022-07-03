<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email, ' . $this->user,
            'password' => 'nullable|string|min:6|max:30|confirmed',
            'roles.*' => 'required|integer|exists:roles,id'
        ];
    }
}
