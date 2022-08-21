<?php

namespace App\Http\Requests\admin\category;

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
        $id = request()->id;
        return [
            'name' => ['required', 'unique:category,name,'.$id, 'max:50'],
            'slug' => ['required', 'max:50'],
        ];
    }
}
