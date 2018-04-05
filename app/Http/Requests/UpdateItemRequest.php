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
            'location_id'   => 'integer',
            'cost'          => 'numeric|min:0',
            'price'         => 'required|numeric|min:0',
            'unit_id'       => 'integer',
            'stock'         => 'integer|min:0',
            'stock_min'     => 'integer|min:0',
            'stock_max'     => 'integer|min:0',
            'tax_iva'       => 'required|integer|min:0',
            'max_discount'  => 'numeric|min:0',
        ];
    }
    
    public function messages(){
        return [ 
            'id_item.required'      => 'Código No puede ser vacío',
            'id_item.max'           => 'Código tiene mas de 25 caracteres',
            'name.required'         => 'Nombre No puede ser vacío',
            'name.max'              => 'Nombre tiene mas de 255 caracteres',
            'description.max'       => 'Nombre tiene mas de 255 caracteres',
            'image.image'           => trans('adminlte::adminlte.image_update_error'),
            'cost.min'              => 'Costo debe ser un valor mayor a 0',
            'cost.numeric'          => 'Costo Máximo debe ser un valor numérico',
            'price.required'        => 'Precio no puede ser vacío',
            'price.min'             => 'Precio debe ser un valor mayor a 0',
            'price.numeric'         => 'Precio Máximo debe ser un valor numérico',
            'stock.min'             => 'Existencia Actual debe ser un valor mayor a 0',
            'stock.integer'         => 'Existencia Actual debe ser un valor numérico',
            'stock_min.min'         => 'Existencia Mínima debe ser un valor mayor a 0',
            'stock_min.integer'     => 'Existencia Actual debe ser un valor numérico',
            'stock_max.min'         => 'Existencia Máxima debe ser un valor mayor a 0',
            'stock_max.integer'     => 'Existencia Actual debe ser un valor numérico',
            'tax_iva.required'      => 'Tarifa IVA no puede ser vacío',
            'tax_iva.min'           => 'Tarifa IVA debe ser un valor mayor a 0',
            'tax_iva.integer'       => 'Tarifa IVA debe ser un valor numérico',
            'max_discount'          => 'Descuento Máximo debe ser un valor mayor a 0',
            'max_discount.numeric'  => 'Descuento Máximo debe ser un valor numérico',
        ];
    }
}
