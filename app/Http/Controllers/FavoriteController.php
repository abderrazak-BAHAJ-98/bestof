<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Http\Requests\StoreFavoriteRequest;
use App\Http\Requests\UpdateFavoriteRequest;
use App\Http\Resources\FavoriteResource;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorite = Favorite::where('user_id',Auth::user()->id)->get();
        return FavoriteResource::collection($favorite);
    }

    public function store(StoreFavoriteRequest $request)
    {
        $favorite = Favorite::create($request->only([
            'product_id'
        ]));
        $favorite->user_id = Auth::user()->id;
        return $favorite->save();
    }


    public function destroy(Favorite $favorite)
    {
         $favorite->delete();
         return response(null,204);
    }
}
