<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=> (string)$this->id,
            'user_id'=>(string)$this->user_id,
            'cart_number'=>$this->cart_number,
            'cart_date_expr'=>(string)$this->cart_date_expr,
            'cart_sold'=>(string)$this->cart_sold
            ];
    }
}
