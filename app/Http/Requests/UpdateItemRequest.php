<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItemRequest extends FormRequest
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
            'id_item'       => 'required|string|max:25',
            'name'          => 'required|string|max:255',
            'description'   => 'string|max:255',
            'image'         => 'image',
            'location_id'   => 'required|integer',
            'cost'          => 'numeric|min:0',
            'price'         => 'required|numeric|min:0',
            'unit_id'       => 'required|integer',
            'stock'         => 'integer|min:0',
            'stock_min'     => 'integer|min:0',
            'stock_max'     => 'integer|min:0',
            'include_iva'   => 'required|boolean',
            'tax_iva'       => 'required|integer|min:0',
            'max_discount'  => 'numeric|min:0',
            'state'         => 'required|boolean',
        ];
    }
    
}
