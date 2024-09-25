<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Category;
use App\Models\Author;
use App\Models\Book;
use Database\Factories\BookFactory;

class BookFeatureTest extends TestCase
{
    public function test_book_creation_success()
    {

        $category = Category::factory()->create();

        $book = Book::factory()
            ->for($category)
            ->hasAuthors(3)
            ->create();

        $response = $this->post('/books', [
            'title' => $book->title,
            'published' => $book->published,
            'category_id' => $book->category_id,
            'authors' => $book->authors->pluck('id')->toArray(),
        ]);


        $response->assertStatus(302);


        $this->assertDatabaseHas('books', [
            'title' => $book->title,
            'published' => $book->published,
            'category_id' => $category->id,
        ]);

        $this->assertCount(3, $book->fresh()->authors);
    }

    public function test_book_creation_fails_without_title()
    {
        $category = Category::factory()->create();

        $authors = Author::factory()->count(3)->create();

        $bookData = Book::factory()->make([
            'title' => '',
            'category_id' => $category->id,
        ])->toArray();

        $response = $this->post('/books', array_merge($bookData, [
            'authors' => $authors->pluck('id')->toArray(),
        ]));

        $response->assertStatus(302);

        $response->assertSessionHasErrors(['title']);
    }

    public function test_book_creation_fails_incorrect_published()
    {

        $category = Category::factory()->create();
        $authors = Author::factory()->count(3)->create();

        $response = $this->post('/books', [
            'title' => 'Livro Exemplo',
            'published' => 'abcd',
            'category_id' => $category->id,
            'authors' => $authors->pluck('id')->toArray(),
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('published');
    }

    public function test_book_show__success()
    {
        $book = Book::factory()->create();

        $response = $this->get(route('book.show', $book->id));

        $response->assertStatus(200);

        $response->assertSee($book->title);

        $response->assertSee($book->published);
    }

    public function test_book_edit_success()
    {
        $category = Category::factory()->create();
        $book = Book::factory()->for($category)->hasAuthors(2)->create();

        $updatedData = [
            'title' => 'Updated Book Title',
            'published' => '2021',
            'category_id' => $category->id,
            'authors' => Author::factory()->count(2)->create()->pluck('id')->toArray() // Cria 2 novos autores
        ];

        $response = $this->put(route('book.update', $book->id), $updatedData);

        $response->assertStatus(302);

        $this->assertDatabaseHas('books', [
            'id' => $book->id,
            'title' => 'Updated Book Title',
            'published' => '2021',
            'category_id' => $category->id,
        ]);

        $this->assertCount(2, $book->fresh()->authors);
    }

    public function test_book_edit_fails_invalid_data()
    {
        $category = Category::factory()->create();
        $book = Book::factory()->for($category)->create();

        $invalidData = [
            'title' => '',
            'published' => '2020',
            'category_id' => $category->id,
            'authors' => Author::factory()->count(2)->create()->pluck('id')->toArray()
        ];

        $response = $this->put(route('book.update', $book->id), $invalidData);

        $response->assertStatus(302);

        $response->assertSessionHasErrors(['title']);

        $this->assertDatabaseMissing('books', [
            'id' => $book->id,
            'title' => '',
        ]);
    }

    public function test_book_destroy_success()
    {
        $category = Category::factory()->create();
        $book = Book::factory()->for($category)->create();

        $response = $this->delete(route('book.destroy', $book->id));

        $response->assertStatus(302);

        $this->assertDatabaseMissing('books', [
            'id' => $book->id,
        ]);
    }
}
