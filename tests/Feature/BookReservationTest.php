<?php

namespace Tests\Feature;

use App\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookReservationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_book_can_be_added_to_the_library()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/books', [
            'title' => 'Prima carte',
            'author' => 'Primul Autor',
        ]);

        $response->assertOk();
        $this->assertCount(1, Book::all());
    }

    /** @test */
    public function a_title_is_required()
    {
        // $this->withoutExceptionHandling();

        $response = $this->post('/books', [
            'title' => '',
            'author' => 'Primul Autor',
        ]);

        $response->assertSessionHasErrors('title');
    }

    /** @test */
    public function an_author_is_required()
    {
        // $this->withoutExceptionHandling();

        $response = $this->post('/books', [
            'title' => 'Prima carte',
            'author' => '',
        ]);

        $response->assertSessionHasErrors('author');
    }

    /** @test */
    public function a_book_can_be_updated()
    {
        $this->withoutExceptionHandling();
        
        $this->post('/books', [
            'title' => 'Prima carte',
            'author' => 'Primul Autor',
        ]);

        $book = Book::first();

        $response = $this->patch('/books/'.$book->id, [
            'title' => 'Prima carte nou',
            'author' => 'Primul Autor nou',
        ]);

        $this->assertEquals('Prima carte nou', Book::first()->title);
        $this->assertEquals('Primul Autor nou', Book::first()->author);
    }
}