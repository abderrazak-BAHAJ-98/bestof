<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use Illuminate\Http\UploadedFile;

class CategoryController extends Controller
{
     /**
     * Method to Get All Category 
     *
     * @return array
     */
    public function index()
    {
        return  CategoryResource::collection(Category::all());
    }

     /**
     * Method to Add Category 
     *
     * @return array
     */
    public function store(StoreCategoryRequest $request)
    {
        $newCategory = new Category();
        $newCategory->cat_name =  $request->cat_name;
        if($request->hasFile('cat_name'))
        {
            $newName = $request->cat_name.time().'.'.$request->cat_img->getClientOriginalExtension();
            $path = $request->cat_img->storeAs('public/category-img',$newName);
            $newCategory->cat_img = $path;
        }
        $newCategory->save();
        return new CategoryResource($newCategory);
    }

     /**
     * Method to Update Category 
     *
     * @return array
     */

    public function update(UpdateCategoryRequest $request,Category $category)
    {
        $category->cat_name = $request->cat_name;
        if($request->hasFile('cat_name'))
        {
            $newName = $request->cat_name.time().'.'.$request->cat_img->getClientOriginalExtension();
            $path = $request->cat_img->storeAs('public/category-img',$newName);
            $category->cat_img = $path;
        }
        $category->save();
        return new CategoryResource($category);
    }

     /**
     * Method to Delete Category
     *
     * @return array
     */

    public function destroy(Category $category)
    {
        $category->delete();
        return response(null,204);
    }

     /**
     * Method to Get  Product by Category
     *
     * @return array
     */

    public function product(Category $category){
        return  ProductResource::collection($category->product()->paginate(15));
    }
}
