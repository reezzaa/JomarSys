<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCollectRequest extends FormRequest
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
            'ornumber' => 'required|unique',
            'paymentcost' => 'required',
            ];
    }
    public function messages()
    {
        return [
            'ornumber.required' => 'OR Number Field is required!',
            'ornumber.unique' => 'OR Number is already taken!',
            'paymentcost.required' => 'Payment Field is required!',
        ];
    }
}
