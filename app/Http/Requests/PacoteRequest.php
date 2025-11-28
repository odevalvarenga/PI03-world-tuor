<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacoteRequest extends FormRequest
{
    public function authorize()
    {
        // permitir validação sempre
        return true;
    }

    public function rules()
    {
        return [
            'nome'        => 'required|string|maxLength:255',
            'continente'  => 'required|string|maxLength:255',
            'pais'        => 'required|string|maxLength:255',
            'descricao'   => 'required|string',
            'preco'       => 'required|numeric|min:0',
            'data_inicio' => 'required|date',
            'data_fim'    => 'required|date|after_or_equal:data_inicio',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome do pacote é obrigatório.',
            'continente.required' => 'O continente é obrigatório.',
            'pais.required' => 'O país é obrigatório.',
            'descricao.required' => 'A descrição é obrigatória.',
            'preco.required' => 'O preço é obrigatório.',
            'preco.numeric' => 'O preço deve ser um número.',
            'data_inicio.required' => 'A data de início é obrigatória.',
            'data_fim.required' => 'A data de término é obrigatória.',
            'data_fim.after_or_equal' => 'A data de término deve ser igual ou posterior à data de início.'
        ];
    }
}
