<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Method to Get All Product 
     *
     * @return array
     */

    public function index()
    {
        return  ProductResource::collection(Product::orderBy('created_at','DESC')->paginate(12));
    }


     /**
     * Method to Add Product 
     *
     * @return array
     */

    public function store(StoreProductRequest $request)
    {
        $newProduct = new Product();
        $newProduct->user_id = Auth::user()->id;
        $newProduct->category_id =$request->category_id;
        $newProduct->p_name =$request->p_name;
        $newProduct->p_slug =Str::slug($request->p_name);
        $newProduct->p_description = $request->p_description;
        $newProduct->p_color =$request->p_color;
        $newProduct->p_price =$request->p_price;

        //
        // rename Image 
        //

        if($request->hasFile('p_image_1'))
        {
            $p_image_1 = $request->p_image_1.time().'1.'.$request->p_image_1->getClientOriginalExtension();
            $path = $request->p_image_1->storeAs('public/category-img',$p_image_1);
            $newProduct->p_image_1 = $path;
        }
        if($request->hasFile('p_image_2'))
        {
            $p_image_2 = $request->p_image_2.time().'2.'.$request->p_image_2->getClientOriginalExtension();
            $path = $request->p_image_2->storeAs('public/category-img',$p_image_2);
            $newProduct->p_image_2 = $path;
        }
        if($request->hasFile('p_image_3'))
        {
            $p_image_3 = $request->p_image_3.time().'3.'.$request->p_image_3->getClientOriginalExtension();
            $path = $request->p_image_3->storeAs('public/category-img',$p_image_3);
            $newProduct->p_image_3 = $path;
        }
        if($request->hasFile('p_image_4'))
        {
            $p_image_4 = $request->p_image_4.time().'4.'.$request->p_image_4->getClientOriginalExtension();
            $path = $request->p_image_4->storeAs('public/category-img',$p_image_4);
            $newProduct->p_image_4 = $path;
        }
        $newProduct->save();
        return new ProductResource($newProduct);
    }

    
     /**
     * Method to Update Product 
     *
     * @return array
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        if($product->user_id != Auth::user()->id){
            return response("Unauthorized",401);
        }
        $product->category_id =$request->category_id;
        $product->p_name =$request->p_name;
        $product->p_slug =Str::slug($request->p_name);
        $product->p_description = $request->p_description;
        $product->p_color =$request->p_color;
        $product->p_price =$request->p_price;

        //
        // rename Image 
        //

        if($request->hasFile('p_image_1'))
        {
            $p_image_1 = time().'.'.$request->p_image_1->getClientOriginalExtension();
            $path1 = $request->p_image_1->move(public_path('public/product-img'), $p_image_1);
            $product->p_image_1 = $path1 ;
        }
        if($request->hasFile('p_image_2'))
        {
            $p_image_2 = time().'.'.$request->p_image_2->getClientOriginalExtension();
            $path2 = $request->p_image_2->move(public_path('public/product-img'), $p_image_2);
            $product->p_image_2 = $path2 ;
        }
        if($request->hasFile('p_image_3'))        
        {
            $p_image_3 = time().'.'.$request->p_image_3->getClientOriginalExtension();
            $path3 = $request->p_image_3->move(public_path('public/product-img'), $p_image_3);
            $product->p_image_3 = $path3 ;
        }
        if($request->hasFile('p_image_4'))
        {
            $p_image_4 = time().'.'.$request->p_image_4->getClientOriginalExtension();
            $path4 = $request->p_image_4->move(public_path('public/product-img'), $p_image_4);
            $product->p_image_4 = $path4;
        }
       
        $product->save();
        return new ProductResource($product);
    }


     /**
     * Method to Delete Product 
     *
     * @return array
     */

    public function destroy(Product $product)
    {
        if($product->user_id != Auth::user()->id)
            return response("Unauthorized",401);
        $product->delete();
        return response(null,204);
    }

     /**
     * Method to Search  Product by name 
     *
     * @return array
     */

    public function search($keywords)
    {   
        $products = ProductResource::collection(Product::search($keywords)->orderBy('created_at','DESC')->paginate(15));
        return $products;
    }
}
