<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'name'              => 'required',
            'cat_id'            => 'required|integer',
            'sub_cat_id'        => 'required|integer',
            'brand_id'          => 'required|integer',
            'qty'               => 'required|integer',
            'regular_price'     => 'required',
            'buy_price'         => 'required',
            'product_address'   => 'required',
            'inside_dhaka'      => 'required',
            'outside_dhaka'     => 'required',
            'delivery_time'     => 'required',
            'product_type'      => 'required',
            'sku'               => 'required',
            'stock'             => 'required|integer',
            'short_description' => 'required',
            'long_description'  => 'required',
            'vat_tax'           => 'required',
        ];
    }
}
