<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Http\Requests\StoreRateRequest;
use App\Http\Requests\UpdateRateRequest;
use App\Http\Resources\RateResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RateController extends Controller
{
    /**
     * Method to Get All Rate  User 
     * @return array
     */

    public function index()
    {
        $rates = Rate::groupBy('product_id')->select('product_id',
                    DB::raw('count(*) as count_point'),
                    DB::raw('SUM(rate_point) as total_point'))->get();
        return RateResource::collection($rates);
    }

    /**
     * Method to Add Cart to  User 
     *
     * @return array
     */

    public function store(StoreRateRequest $request)
    {
        $newRate = new Rate();
        $newRate->rate_Point = $request->rate_Point;
        $newRate->product_id = $request->product_id;
        $newRate->user_id = Auth::user()->id;
        $newRate->save();
        return new RateResource($newRate);
    }

    /**
     * Method to Delete Cart using Soft Delete  
     *
     * @return array
     */

    public function destroy( $id)
    {
        $rate = Rate::where('product_id','=',$id)
                ->where('user_id', '=', Auth::user()->id)->first();
        if (!$rate) {
            return response("Unauthorized",401);
        }
        $rate->delete();
        $rates = Rate::groupBy('product_id')->select('product_id',
                    DB::raw('count(*) as count_point'),
                    DB::raw('SUM(rate_point) as total_point'))->get();
        return RateResource::collection($rates);
    }
}
