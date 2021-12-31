<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        // validation
        return [
            'barcode' => ['required','string', 'max:50'],
            'name_ar' => ['required','string', 'max: 50'],
            'name_en' => ['required','string', 'max: 50'],
            'cost' => ['required', 'numeric','max: 9999.99', 'min: 1'],
            'price' => ['required', 'numeric','max: 9999.99', 'min: 1'],
            'stock' => ['nullable', 'numeric', 'max: 999', 'min: 1'],
            'status' => ['required', 'integer', 'min:0', 'max: 1'],
            'description_ar' => ['required', 'string'],
            'description_en' => ['required', 'string'],
            'brand_id' => ['nullable', 'integer'],
            'subcategory_id' => ['required', 'integer'],
            'image' => ['nullable', 'max: 1000', 'mimes: png,jpg,jpeg'],
        ];
        // $request->validate($request->rules);
    }
}
