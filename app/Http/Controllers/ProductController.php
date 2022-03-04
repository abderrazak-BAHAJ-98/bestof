<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function index()
    {
        return  ProductResource::collection(Product::orderBy('created_at','DESC')->paginate(12));
    }


    public function store(StoreProductRequest $request)
    {
        $newProduct = Product::create($request->only([
            'category_id',
            'p_name',
            'p_slug',
            'p_description',
            'p_image_1',
            'p_image_2',
            'p_image_3',
            'p_image_4',
            'p_color',
            'p_price',
        ]));
        return new ProductResource($newProduct);
    }


    public function show(Product $product)
    {
        return new ProductResource($product);
    }


    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update(
            $request->only(
                [
                    'category_id',
                    'p_name',
                    'p_slug',
                    'p_description',
                    'p_image_1',
                    'p_image_2',
                    'p_image_3',
                    'p_image_4',
                    'p_color',
                    'p_price',
                ]));
        return new ProductResource($product);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response(null,204);
    }

    public function search($keywords)
    {   
        $products = ProductResource::collection(Product::search($keywords)->orderBy('created_at','DESC')->paginate(15));
        return $products;
    }
}
