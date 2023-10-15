<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Author;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function testCreateAuthor()
    {
        $data = [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'birthdate' => $this->faker->date,
            'country' => $this->faker->country,
            'biography' => $this->faker->paragraph,
        ];

        $author = Author::create($data);

        $this->assertDatabaseHas('authors', $data);
        $this->assertEquals($data['first_name'], $author->first_name);
        $this->assertEquals($data['last_name'], $author->last_name);
    }

    public function testReadAuthor()
    {
        $author = Author::factory()->create();

        $foundAuthor = Author::find($author->id);

        $this->assertEquals($author->first_name, $foundAuthor->first_name);
        $this->assertEquals($author->last_name, $foundAuthor->last_name);
    }

    public function testUpdateAuthor()
    {
        $author = Author::factory()->create();

        $data = [
            'first_name' => 'UpdatedFirstName',
            'last_name' => 'UpdatedLastName',
        ];

        $author->update($data);

        $this->assertDatabaseHas('authors', $data);
        $this->assertEquals('UpdatedFirstName', $author->fresh()->first_name);
        $this->assertEquals('UpdatedLastName', $author->fresh()->last_name);
    }

    public function testDeleteAuthor()
    {
        $author = Author::factory()->create();

        $author->delete();

        $this->assertDatabaseMissing('authors', ['id' => $author->id]);
    }
}
