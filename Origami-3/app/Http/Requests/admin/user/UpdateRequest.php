<?php

namespace App\Http\Requests\admin\user;

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
        $id = request()->route()->id;
        return [
            'name' => ['required', 'unique:users,name,'.$id, 'max:30'],
            'email' => ['required', 'email', 'unique:users,email,'.$id, 'max:30'],
        ];
    }
}
