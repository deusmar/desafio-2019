<?php

namespace Desafio\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class PessoaRequest extends FormRequest
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
            'no_pessoa'     => 'required|max:200',
            'nu_cpf'        => 'required|numeric|digits:11',
            'dt_nascimento' => 'nullable|date',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = new JsonResponse(['data' => [],
            'meta' => [
                'message' => 'Dados inválidos',
                'errors' => $validator->errors()
            ]], 422);

        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }

    public function attributes()
    {
        return [
            'no_pessoa'     => 'Nome',
            'nu_cpf'        => 'CPF',
            'dt_nascimento' => 'Data de Nascimento'
        ];
    }
}
