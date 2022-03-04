<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        return Cart::where('user_id',Auth::user()->id)->get();
    }
    public function store(StoreCartRequest $req)
    {
        $cart = Cart::create($req->only([
            'cart_number',
            'cart_date_expr',
            'cart_sold',
        ]));
        $cart->user_id = Auth::user()->id;
        $cart->save();
        return $cart;
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return response(null,204);
    }
}
