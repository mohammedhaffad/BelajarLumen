<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\Category\ICategoryRepository;

class CategoryRepository  implements ICategoryRepository
{

    public function getCategories($request)
    {
        $categories = Category::with('books')->get();
        $code = isset($request->code) ? $request->code : null;
        if ($code != null) {
            $categories = $categories->where('code', $code);
        }
        return $categories;
    }

    public function getCategoryDetail($id)
    {
        $categories = Category::with('books')->find($id);
        $categories = isset($categories) ? $categories : $categories;
        return $categories;
    }

    public function createCategory($request)
    {
        $category = new Category;
        
        $category->code = $request->code;
        $category->name = $request->name;
        $category->save();

        return $category;
    }

    public function updateCategory($id, $request)
    {
        $category = Category::find($id);
        if (!$category) {
            return $category;
        }
        $category->code = $request->code;
        $category->name = $request->name;
        $category->save();

        return $category;
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return false;
        }
        $category->delete();

        return true;
    }
}
