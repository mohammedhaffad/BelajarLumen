<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Repositories\Book\IBookRepository;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $bookRepo;

    public function __construct(IBookRepository $bookRepo)
    {
        $this->bookRepo = $bookRepo;
        $this->middleware('authrole', ['except' => ['getBooksbyCat', 'getAllBooks', 'getBookById']]);
    }

    public function getBooksbyCat($catid)
    {
        $books = $this->bookRepo->getBooksbyCat($catid);

        return response()->json([
            "data" => $books
        ]);
    }

    public function getAllBooks()
    {
        $books = $this->bookRepo->getAllBook();

        return response()->json([
            "data" => $books
        ]);
    }

    public function getBookById($id)
    {
        $books = $this->bookRepo->getBookById($id);

        return response()->json([
            "data" => $books
        ]);
    }

    public function createBook(Request $request)
    {
        $books = $this->bookRepo->createBook($request);

        return response()->json([
            "data" => $books
        ]);
    }

    public function updateBook(Request $request, $id)
    {
        $books = $this->bookRepo->updateBook($request, $id);

        return response()->json([
            "data" => $books
        ]);
    }

    public function deleteBook($id)
    {
        $books = $this->bookRepo->deleteBook($id);

        return response()->json([
            "data" => $books
        ]);
    }
}
