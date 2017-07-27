<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationSessionRequest extends FormRequest
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
            'title'=>'required|unique:application_sessions,title',
            'opening-date'=>'required|date|after:yesterday',
            'closing-date'=>'required|date|after:today'
        ];
    }

    public function messages(){
        return [
            'opening-date.required' => 'Opening date field is required.',
            'opening-date.date' => 'Please provide a valid date.',
            'opening-date.after' => 'This date has passed.',
            'closing-date.after' => 'Closing date should be in the future.',
            'closing-date.date' => 'Please provide a valid date',
            'closing-date.required' => 'Closing date field is required.',
            'closing-date.required' => 'Closing date field is required.',
        ];
    }
}
