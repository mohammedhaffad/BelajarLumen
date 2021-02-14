<?php

namespace App\Repositories\Category;

interface ICategoryRepository {
    public function getCategories($request);
    public function getCategoryDetail($id);
    public function createCategory($request);
    public function updateCategory($id, $request);
    public function deleteCategory($id);
}