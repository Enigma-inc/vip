<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestioncategoryRequest extends FormRequest
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
               'name'=> 'required',
               'index'=>'required||unique:question_categories,index'
        ];
    }

    public function messages(){
        return [
            'name.required'=>'Category title field is required',
            'index.unique'=>'Index should be unique,this one has already been taken'
        ];
    }
}
