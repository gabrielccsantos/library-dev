<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'published' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'category_id' => 'required'
        ];
    }

    public function mensages(): array
    {
        return [
            'required.title' => 'Campo Título do livro é obrigatório',
            'required.published' => 'Campo Ano de Publicação é obrigatório',
            'digits.published' => 'O campo ano deve ter exatamente 4 dígitos.',
            'integer.published' => 'O campo ano deve conter apenas números.',
            'min.published' => 'O ano deve ser no mínimo 1900.',
            'max.published' => 'O ano não pode ser maior que o ano atual.',
            'required.category_id' => 'O campo categoria é obrigatório'
        ];
    }
}
