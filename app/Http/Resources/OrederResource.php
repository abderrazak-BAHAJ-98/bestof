<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrederResource extends JsonResource
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
            'id'=>(string)$this->id,
            'product_id'=>(string)$this->product_id,
            'user_id'=>(string)$this->user_id,
            'card_id'=>(string)$this->card_id,
            'quantity_product'=>(string)$this->quantity_product,
            'price_sall'=>$this->price_sall,
        ];
    }
}
