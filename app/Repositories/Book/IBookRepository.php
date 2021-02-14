<?php

namespace App\Repositories\Book;

interface IBookRepository {
    public function getBooksbyCat($catid);
    public function getAllBook();
    public function getBookById($id);
    public function createBook($request, $catid);
    public function updateBook($request, $id);
    public function deleteBook($id);
}