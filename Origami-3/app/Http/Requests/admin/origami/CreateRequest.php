<?php

namespace App\Http\Requests\admin\origami;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'name' => ['required', 'unique:origami,name', 'max:50'],
            'content' => ['required'],
            'category_id' => ['required'],
            'intro_image' => ['required', 'mimes:jpeg,jpg,png', 'max:2000'],
            'url' => ['max:100'],
        ];
    }

    public function attributes()
    {
        return [
            'category_id' => 'category',
            'intro_image' => 'image',
        ];
    }
}
