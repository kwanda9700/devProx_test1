<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FieldRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|alpha|min:2|max:255',
            'surname' => 'required|alpha|min:2|max:255',
            'id_number' => 'required|digits:13',
            'date_of_birth' => 'required|date_format:d-m-Y|before:today',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'A name is required',
            'surname.required'  => 'A surname is required',
            'id_number.required'  => 'An ID number is required',
            'date_of_birth.required' => 'A Date of Birth is required',
            'date_of_birth.date_format' => 'The date of birth does not match the format dd-mm-YYYY.',
        ];
    }
}
