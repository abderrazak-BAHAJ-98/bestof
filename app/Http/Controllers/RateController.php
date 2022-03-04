<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Http\Requests\StoreRateRequest;
use App\Http\Requests\UpdateRateRequest;

class RateController extends Controller
{
    public function store(StoreRateRequest $request)
    {
        
    }
    public function update(UpdateRateRequest $request, Rate $rate)
    {
        //
    }

    public function destroy(Rate $rate)
    {
        //
    }
}
