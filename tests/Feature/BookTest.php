<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Book;
use App\Models\Author;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function testCreateBook()
    {
        $author = Author::factory()->create();

        $data = [
            'title' => $this->faker->sentence,
            'author_id' => $author->id,
            'genre' => $this->faker->word,
            'synopsis' => $this->faker->paragraph,
            'cover' => $this->faker->imageUrl,
            'publication_year' => $this->faker->year,
        ];

        $book = Book::create($data);

        $this->assertDatabaseHas('books', $data);
        $this->assertEquals($data['title'], $book->title);
        $this->assertEquals($data['genre'], $book->genre);
    }

    public function testReadBook()
    {
        $author = Author::factory()->create();
        $book = Book::factory()->create(['author_id' => $author->id]);

        $foundBook = Book::find($book->id);

        $this->assertEquals($book->title, $foundBook->title);
        $this->assertEquals($book->genre, $foundBook->genre);
    }

    public function testUpdateBook()
    {
        $author = Author::factory()->create();
        $book = Book::factory()->create(['author_id' => $author->id]);

        $data = [
            'title' => 'UpdatedTitle',
            'genre' => 'UpdatedGenre',
        ];

        $book->update($data);

        $this->assertDatabaseHas('books', $data);
        $this->assertEquals('UpdatedTitle', $book->fresh()->title);
        $this->assertEquals('UpdatedGenre', $book->fresh()->genre);
    }

    public function testDeleteBook()
    {
        $author = Author::factory()->create();
        $book = Book::factory()->create(['author_id' => $author->id]);

        $book->delete();

        $this->assertDatabaseMissing('books', ['id' => $book->id]);
    }
}
