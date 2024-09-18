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
            'book_title' => 'required',
            'book_category' => 'required',
            'book_published' => 'required'
        ];
    }

    public function mensages(): array
    {
        return [
            'required.book_title' => 'Campo Título do livro é obrigatório',
            'required.book_category' => 'Campo Categória do livro é obrigatório',
            'required.book_published' => 'Campo Ano de Publicação é obrigatório'
        ];
    }
}
