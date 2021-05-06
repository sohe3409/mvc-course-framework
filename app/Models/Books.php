<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
* Columns in the table Books
*
* @property string $isbn
* @property string $author
* @property string $title
* @property string $picture
*/
class Books extends Model
{
    use HasFactory;

    public function getBooks()
    {
        $books = [];

        foreach (Books::all() as $book) {
            array_push($books, [
                'title' => $book->title,
                'author' => $book->author,
                'isbn' => $book->isbn,
                'picture' => $book->picture
            ]);
        }

        return $books;
    }
}
