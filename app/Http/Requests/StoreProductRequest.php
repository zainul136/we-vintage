<?php

namespace App\Http\Requests;

use App\Models\Product;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProductRequest extends FormRequest
{
    public function authorize()

    {
        return Gate::allows('product_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            // 'barcode' => [
            //     'string',
            //     'required',
            //     'unique:products',
            // ],
            // 'max_quantity' => [
            //     'integer',
            //     'required',
            // ],
            'min_quantity' => [
                'integer',
                'required',
            ],
            'supplier' => [
                'required',
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
