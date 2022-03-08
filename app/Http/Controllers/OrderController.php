<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Card;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return OrderResource::collection(Order::where('user_id',Auth::user()->id)->get());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $card = Card::find($request->card_id);
        if(!isset($card)){
            return response("Unauthorized",401);
        }
        if($card->user_id != Auth::user()->id){
            return response("Error set Card card",401);
        }
        $product = Product::find($request->product_id);

        if(!isset($product)){
            return response("Error set Product Not Found",401);
        }
        $totalPrice = $request->quantity_product * $product->p_price;
        if($totalPrice > $card->card_sold ){
            return response("Sold Insufisone",401);
        }
        $card->card_sold -= $totalPrice;
        $card->save();
        $newOrder = new Order();
        $newOrder->product_id = $request->product_id;
        $newOrder->user_id = Auth::user()->id;
        $newOrder->card_id = $request->card_id;
        $newOrder->price_sale = $product->p_price;
        $newOrder->quantity_product = $request->quantity_product;
        $newOrder->save();
        return new OrderResource($newOrder);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        if($order->user_id != Auth::user()->id)
            return response("Unauthorized",401);
        $order->delete();
        return response(null,204);
    }
}
