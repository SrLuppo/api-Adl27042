<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductsRequest extends FormRequest
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
            'name' => 'required',
            'sku' => 'required',
            'qtd' => 'required'
        ];
    }

    /**
     * Function to return the error of validation
     */
    public function failedValidation(Validator $validator)
    {
    throw new HttpResponseException(response()->json([
        'success'   => false,
        'message'   => 'Erro de validação',
        'data'      => $validator->errors()
    ]));
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'nome é obrigatório!',
            'sku.required' => 'sku é obrigatório!',
            'qtd.required' => 'qtd é obrigatório!'
        ];
    }
}
