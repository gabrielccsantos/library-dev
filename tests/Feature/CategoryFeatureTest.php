<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Category;
use App\Models\Book;

class CategoryFeatureTest extends TestCase
{
    public function test_category_creation_success()
    {
        $categoryData = Category::factory()->make()->toArray();

        $response = $this->post(route('category.store'), $categoryData);

        $response->assertStatus(302);

        $this->assertDatabaseHas('categories', [
            'name' => $categoryData['name'],
        ]);
    }

    public function test_category_creation_fails_with_invalid_name()
    {
        $response = $this->post('/categories', [
            'name' => '',
        ]);

        $response->assertStatus(302);

        $response->assertSessionHasErrors(['name']);

        $this->assertDatabaseMissing('categories', [
            'name' => '',
        ]);
    }


    public function test_category_show_success()
    {
        $category = Category::factory()->create();

        $response = $this->get(route('category.show', $category->id));

        $response->assertStatus(200);

        $response->assertSee($category->name);
    }

    public function test_category_update_success()
    {
        $category = Category::factory()->create();

        $updatedData = [
            'name' => 'Updated Category Name',
        ];

        $response = $this->put(route('category.update', $category->id), $updatedData);

        $response->assertStatus(302);

        $this->assertDatabaseHas('categories', [
            'id' => $category->id,
            'name' => 'Updated Category Name',
        ]);
    }

    public function test_category_destroy_success()
    {
        $category = Category::factory()->create();

        $response = $this->delete(route('category.destroy', $category->id));

        $response->assertStatus(302);

        $this->assertDatabaseMissing('categories', [
            'id' => $category->id,
        ]);
    }

    public function test_category_destroy_fails_linked_to_books()
    {
        $category = Category::factory()->create();
        $book = Book::factory()->for($category)->create();

        $response = $this->delete(route('category.destroy', $category->id));

        $response->assertStatus(302);

        $this->assertDatabaseHas('categories', [
            'id' => $category->id,
        ]);
    }
}
