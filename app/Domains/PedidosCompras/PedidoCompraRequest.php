<?php

namespace App\Domains\PedidosCompras;

use Illuminate\Foundation\Http\FormRequest;

class PedidoCompraRequest extends FormRequest
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
            'nome' => 'required'
        ];
    }
}
