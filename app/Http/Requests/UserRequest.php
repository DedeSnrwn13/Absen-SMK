<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'avatar'   => 'nullable|file|image|mimes:png,jpg,jpeg|max:2048',
            'nik'      => 'required|string|max:25',
            'name'     => 'required|string|min:2|max:25',
            'no_hp'    => 'nullable|string|max:20',
            'email'    => 'required|string',
            'major'    => 'required|string',
            'subjects' => 'required|string|min:3|max:50',
            'username' => 'required|string|min:4|max:50',
            'password' => 'required|string|min:6|max:150',
        ];
    }
}
