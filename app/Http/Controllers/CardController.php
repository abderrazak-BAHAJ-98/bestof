<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Http\Requests\StoreCardRequest;
use App\Http\Requests\UpdateCardRequest;
use App\Http\Resources\CardResource;
use Illuminate\Support\Facades\Auth;

class CardController extends Controller
{
    /// Get card 
    public function index()
    {
        return CardResource::collection(Card::where('user_id', Auth::user()->id)->get());
    }
    public function store(StoreCardRequest $req)
    {
        $card = new  Card();
        $card->card_number = $req->card_number;
        $card->card_date_expr = $req->card_date_expr;
        $card->card_sold = $req->card_sold;
        $card->user_id = Auth::user()->id;
        $card->save();
        return new CardResource($card);
    }

    public function destroy(Card $card)
    {
        if ($card->user_id != Auth::user()->id)
            return response("Unauthorized", 401);
        $card->delete();
        return response(null, 204);
    }
}
