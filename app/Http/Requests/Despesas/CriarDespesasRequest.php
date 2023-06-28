<?php

namespace App\Http\Requests\Despesas;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class CriarDespesasRequest extends FormRequest
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
            'descricao'  => 'required|string',
            'data'       => 'required|string',
            'usuario_id' => 'required|uuid',
            'valor'      => 'required|int'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'É obrigatório um valor para o campo :attribute. ',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'descricao'  => 'Descrição',
            'data'       => 'Data',
            'usuario_id' => 'Usuário',
            'valor'      => 'Valor'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $message = '';

        foreach ($validator->errors()->messages() as $value) {
            $message .= $value[0];
        }

        throw new HttpResponseException(response()->json([
            'message' => $message,
            'success' => false
        ], 403));
    }
}