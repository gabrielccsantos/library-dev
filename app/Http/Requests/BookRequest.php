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
            'category' => 'required',
            'published' => 'required'
        ];
    }

    public function mensages(): array
    {
        return [
            'required.title' => 'Campo Título do livro é obrigatório',
            'required.category' => 'Campo Categória do livro é obrigatório',
            'required.published' => 'Campo Ano de Publicação é obrigatório'
        ];
    }
}
