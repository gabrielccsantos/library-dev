<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Author;
use App\Models\Book;

class AuthorFeatureTest extends TestCase
{
    public function test_author_creation_success()
    {
        $authorData = Author::factory()->make()->toArray();

        $response = $this->post('/authors', $authorData);

        $response->assertStatus(302); 
        $this->assertDatabaseHas('authors', ['name' => $authorData['name']]);
    }

    public function test_author_creation_fails_invalid_name()
    {
        $response = $this->post('/authors', [
            'name' => '',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name']);
        $this->assertDatabaseMissing('authors', [
            'name' => '',
        ]);
    }

    public function test_author_show_success()
    {
        $author = Author::factory()->create();

        $response = $this->get("/authors/{$author->id}");

        $response->assertStatus(200);
        $response->assertViewIs('author.show');
        $response->assertSee($author->name);
    }

    public function test_author_show_fails_nonexistent_id()
    {
        $response = $this->get('/authors/999');

        $response->assertStatus(404);
    }

    public function test_author_update_success()
    {
        $author = Author::factory()->create();

        $updatedData = ['name' => 'Updated Author Name'];

        $response = $this->put("/authors/{$author->id}", $updatedData);

        $response->assertStatus(302);
        $this->assertDatabaseHas('authors', ['name' => 'Updated Author Name']);
    }

    public function test_author_update_fails_invalid_name()
    {
        $author = Author::factory()->create();

        $response = $this->put("/authors/{$author->id}", ['name' => '']);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name']);
        $this->assertDatabaseMissing('authors', ['name' => '']);
    }

    public function test_author_destroy_success()
    {
        $author = Author::factory()->create();

        $response = $this->delete("/authors/{$author->id}");

        $response->assertStatus(302);
        $this->assertDatabaseMissing('authors', ['id' => $author->id]);
    }

    public function test_author_destroy_fails_linked_books()
    {
        $book = Book::factory()->hasAuthors(1)->create();
        $author = $book->authors->first(); 

        $response = $this->delete("/authors/{$author->id}");

        $response->assertStatus(302); 
        $this->assertDatabaseHas('authors', ['id' => $author->id]);
    }
}
