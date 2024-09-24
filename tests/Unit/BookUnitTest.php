<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Requests\BookRequest;
use Illuminate\Support\Facades\Validator;

class BookUnitTest extends TestCase
{

    public function test_book_valid_integer()
    {
        $data = ['title' => 'Livro Exemplo', 'category' => 'Ficção', 'published' => 'abc'];
        $request = new BookRequest();
        $validator = Validator::make($data, $request->rules());

        $this->assertTrue($validator->fails());
        $this->assertEquals('O campo ano deve conter apenas números.', $validator->errors()->first('published'));
    }

    public function test_book_year_valid()
    {
        $data = ['title' => 'Livro Exemplo', 'category' => 'Ficção', 'published' => 'abc'];
        $request = new BookRequest();
        $validator = Validator::make($data, $request->rules());

        $data['published'] = '202';
        $validator = Validator::make($data, $request->rules());
        $this->assertTrue($validator->fails());
        $this->assertEquals('O campo ano deve ter exatamente 4 dígitos.', $validator->errors()->first('published'));

        $data['published'] = '2023';
        $validator = Validator::make($data, $request->rules());
        $this->assertFalse($validator->fails());

        $data['published'] = '202';
        $validator = Validator::make($data, $request->rules());
        $this->assertTrue($validator->fails());
        $this->assertEquals('O campo ano deve ter exatamente 4 dígitos.', $validator->errors()->first('published'));
    }
}
