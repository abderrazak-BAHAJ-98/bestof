<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;

class CategoryController extends Controller
{

    public function index()
    {
        return  CategoryResource::collection(Category::all());
    }


    public function store(StoreCategoryRequest $request)
    {
        $newCategory = Category::create($request->only(['cat_name','cat_img']));

        return new CategoryResource($newCategory);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->only(['cat_name','cat_img']));
        return new CategoryResource($category);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response(null,204);
    }

    public function product(Category $category){
        return  ProductResource::collection($category->product()->paginate(15));
    }
}
