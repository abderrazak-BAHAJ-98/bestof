<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Http\Requests\StoreFavoriteRequest;
use App\Http\Requests\UpdateFavoriteRequest;
use App\Http\Resources\FavoriteResource;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
     /**
     * Method to Get All Favorite 
     *
     * @return array
     */
    public function index()
    {
        $favorite = Favorite::where('user_id',Auth::user()->id)->get();
        return FavoriteResource::collection($favorite);
    }
     /**
     * Method to Add Favorite 
     *
     * @return array
     */
    public function store(StoreFavoriteRequest $request)
    {
        $favorite = new Favorite();
        $favorite->product_id = $request->product_id;
        $favorite->user_id = Auth::user()->id;
        $favorite->save();
        return new FavoriteResource($favorite);
    }

    /**
     * Method to Delete Favorite 
     *
     * @return array
     */
    public function destroy(Favorite $favorite)
    {
        if($favorite->user_id != Auth::user()->id)
            return response("Unauthorized",401);
         $favorite->delete();
         return response(null,204);
    }
}
