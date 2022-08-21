<?php

namespace App\Http\Requests\admin\origami;

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
            'name' => ['required', 'unique:origami,name,'.$id, 'max:50'],
            'content' => ['required'],
            'category_id' => ['required'],
            'url' => ['max:100'],
            'slug' => ['required', 'max:50'],
        ];
    }

    public function attributes()
    {
        return [
            'category_id' => 'category',
        ];
    }
}
