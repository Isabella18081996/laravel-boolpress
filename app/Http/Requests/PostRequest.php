<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title'=> 'required|max:10',
            'content'=> 'required|min:3'
        ];
    }
    public function messages(){
        return[
            'title.required'=>'Il titolo è un campo obbligatorio',
            'content.required'=>'Il contenuto è un campo obbligatorio',
            'content.min'=>'Il testo del contenuto deve avere almeno :min caratteri',
            'title.max'=>'Il testo del titolo deve avere massimo :max caratteri',
        ];
    }
}
