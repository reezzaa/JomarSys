<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateIndClientRequest extends FormRequest
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
            'strIndClientFName' => 'required|max:45',
            'strIndClientMName' => 'max:45',
            'strIndClientLName' => 'required|max:45',
            'strIndClientContactNo' => 'required|max:13',
            'strIndClientTIN' => 'required',
            'strIndClientAddress' => 'required|max:100',
            'strIndClientCity' => 'required|max:30',
            'strIndClientProv' => 'required|max:30',

        ];
    }
    public function messages()
    {
        return [
            'strIndClientFName.required' => 'First Name field is required',
            'strIndClientFName.max' => 'First Name may not be greater than 40 characters',
            'strIndClientMName.max' => 'Middle Name may not be greater than 40 characters',
            'strIndClientLName.max' => 'Last Name may not be greater than 40 characters',
            'strIndClientLName.required' => 'Last Name field is required',
            'strIndClientContactNo.required' => 'Contact # field is required',
            'strIndClientContactNo.max' => 'Contact # may not be greater than 40 characters',
            'strIndClientTIN.required' => 'TIN field is required',
            'strIndClientTIN.unique' => 'TIN has already been taken',
            'strIndClientAddress.required' => 'Address field is required',
            'strIndClientAddress.max' => 'Address may not be greater than 40 characters',
            'strIndClientCity.required' => 'City field is required',
            'strIndClientCity.max' => 'City may not be greater than 40 characters',
            'strIndClientProv.required' => 'Province field is required',
            'strIndClientProv.max' => 'Province may not be greater than 40 characters',


        ];
    }
}
