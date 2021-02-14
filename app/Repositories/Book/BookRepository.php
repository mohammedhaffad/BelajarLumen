<?php

namespace App\Repositories\Book;

use App\Models\Book;
use App\Models\Category;
use App\Repositories\Book\IBookRepository;

class BookRepository implements IBookRepository
{
    public function getBooksbyCat($catid)
    {
        $category = Category::findOrFail($catid);
        $books = $category->books;
        return $books;
    }
    public function getAllBook()
    {
        $books = Book::all();

        return $books;
    }
    public function getBookById($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return;
        }
        return $book;
    }
    public function createBook($request, $catid)
    {
        $category = Category::find($catid);
        if (!$category) {
            return;
        }
        $book = new Book();
        $book->category_id = $category->id;
        $book->nama = $request->nama;
        $book->description = $request->description;
        $book->year = $request->year;
        
        $book->save();

        return $book;
    }
    public function updateBook($request, $id)
    {
        $book = Book::find($id);
        $category = Category::find($request->catid);
        if (!$book || !$category) {
            return;
        }
        
        $book->category_id = $category->id;
        $book->nama = $request->nama;
        $book->description = $request->description;
        $book->year = $request->year;
        
        $book->save();

        return $book;
    }
    public function deleteBook($id)
    {
        $book = Book::findOrFail($id);
        if (!$book) {
            return false;
        }
        $book->delete();

        return true;

    }
}
