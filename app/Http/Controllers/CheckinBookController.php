<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

use function Psy\bin;

class CheckinBookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Book $book)
    {
        try {
            $book->checkin(auth()->user());
        } catch (\Throwable $th) {
            return response([], 404);
        }
    }
}
