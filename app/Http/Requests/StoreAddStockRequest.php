<?php

namespace App\Http\Requests;

use App\Models\AddStock;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAddStockRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('add_stock_create');
    }

    public function rules()
    {
        return [
            'barcode' => [
                // 'string',
                'nullable',
            ],
            'quantity' => [
                'required',
                // 'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
