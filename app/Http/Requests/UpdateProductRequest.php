<?php

namespace App\Http\Requests;

use App\Models\Product;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:products,name,' . request()->route('product')->id,
            ],
            'barcode' => [
                // 'string',
                // 'required',
                'unique:products,barcode,' . request()->route('product')->id,
            ],
            'max_quantity' => [
                'integer',
                'required',
            ],
            'min_quantity' => [
                'integer',
                'required',
            ],
            'supplier' => [
                'required'
            ],
            'buying_price' => [
                'string',
                'required',
            ],
            'selling_price' => [
                'string',
                'required',
            ]
        ];
    }
}
