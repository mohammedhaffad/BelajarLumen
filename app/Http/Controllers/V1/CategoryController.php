<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Repositories\Category\ICategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepo;

    public function __construct(ICategoryRepository $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
        $this->middleware('auth', ['except' => ['index', 'detailCategory']]);
    }

    public function index(Request $request)
    {

        $categories = $this->categoryRepo->getCategories($request);

        return response()->json([
            "data" => $categories
        ]);
    }

    public function detailCategory($id)
    {
        $categories = $this->categoryRepo->getCategoryDetail($id);

        return response()->json([
            "data" => $categories
        ]);
    }

    public function createCategory(Request $request)
    {
        $categories = $this->categoryRepo->createCategory($request);

        return response()->json([
            "data" => $categories
        ]);
    }

    public function updateCategory($id, Request $request)
    {
        $categories = $this->categoryRepo->updateCategory($id, $request);

        return response()->json([
            "data" => $categories
        ]);
    }

    public function deleteCategory($id)
    {
        $categories = $this->categoryRepo->deleteCategory($id);

        return response()->json([
            "data" => $categories
        ]);
    }
}
