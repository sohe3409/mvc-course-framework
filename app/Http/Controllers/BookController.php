<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Books;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function view()
    {
        $bookDb = new Books();

        $books = $bookDb->getBooks();

        return view('books', [
            'title' => "Books",
            'books' => $books
        ]);
    }
}
