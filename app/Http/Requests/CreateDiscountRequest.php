<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDiscountRequest extends FormRequest
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
            'strDiscountName' => 'required|max:30',
            'dblDiscountPercent' => 'required|max:30',
        ];
    }
    public function messages()
    {
        return [
            'strDiscountName.required' => 'Discount Name field is required',
            'strDiscountName.max' => 'Discount Name may not be greater than 40 characters',
            'strDiscountName.unique' => 'Discount Name has already been taken',
            'dblDiscountPercent.max' => 'Percentage may not be greater than 40 characters',
            'dblDiscountPercent.required' => 'Percentage field is required',
        ];
    }
}
