<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Register 
Route::post('/user/register',[UserController::class,'Register']);
Route::post('/user/login',[UserController::class,'Login']);

//Public Api
Route::get('/product/search/{keywords}',[ProductController::class,'search']);
Route::get('/product',[ProductController::class,'index']);
Route::get('/category',[CategoryController::class,'index']);
Route::get('/category/{category}',[CategoryController::class,'product']);
Route::get('/rate',[RateController::class,'index']);

Route::middleware('auth:api')->group(function(){

    ////
    ////Category
    Route::put('/category/{category}',[CategoryController::class,'update']);
    Route::post('/category',[CategoryController::class,'store']);
    Route::delete('/category/{category}',[CategoryController::class,'destroy']);


    ////
    ////Product Route
    Route::put('/product/{product}',[ProductController::class,'update']);
    Route::post('/product',[ProductController::class,'store']);
    Route::delete('/product/{product}',[ProductController::class,'destroy']);

    ///
    ///Cart Route
    Route::get('/cart',[CartController::class,'index']);
    Route::post('/cart',[CartController::class,'store']);
    Route::put('/cart/{cart}',[CartController::class,'update']);
    Route::delete('/cart/{cart}',[CartController::class,'destroy']);

    ///
    ///Card Route
    Route::get('/card',[CardController::class,'index']);
    Route::post('/card',[CardController::class,'store']);
    Route::delete('/card/{card}',[CardController::class,'destroy']);

    ///
    ///Favorite Route
    Route::get('/favorite',[FavoriteController::class,'index']);
    Route::post('/favorite',[FavoriteController::class,'store']);
    Route::delete('/favorite/{favorite}',[FavoriteController::class,'destroy']);

    ///
    ///Rate Route
    Route::post('/rate',[RateController::class,'store']);
    Route::delete('/rate/{rate}',[RateController::class,'destroy']);

    ///
    ///Order Route
    Route::get('/order',[OrderController::class,'index']);
    Route::post('/order',[OrderController::class,'store']);
    Route::delete('/order/{order}',[OrderController::class,'destroy']);
});
