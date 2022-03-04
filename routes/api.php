<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Register 
Route::post('/user/register',[UserController::class,'Register']);
Route::post('/user/login',[UserController::class,'Login']);

//Public Api
Route::get('/product/search/{keywords}',[ProductController::class,'search']);
Route::get('/product',[ProductController::class,'index']);
Route::get('/category',[CategoryController::class,'index']);
Route::get('/category/{category}',[CategoryController::class,'product']);

Route::middleware('auth:api')->group(function(){

    ////
    ////Category
    Route::put('/category/{category}',[CategoryController::class,'update']);
    Route::post('/category',[CategoryController::class,'store']);
    Route::delete('/category/{category}',[CategoryController::class,'destroy']);


    ////
    ////Product
    Route::put('/product/{product}',[CategoryController::class,'update']);
    Route::post('/product',[CategoryController::class,'store']);
    Route::delete('/product/{product}',[CategoryController::class,'destroy']);

    ///
    ///Cart
    Route::get('/cart',[CartController::class,'index']);
    Route::post('/cart',[CartController::class,'store']);
    Route::delete('/cart/{id}',[CartController::class,'destroy']);
});
