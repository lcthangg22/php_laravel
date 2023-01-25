<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return ['id' => $this->product_id,
            'name' => $this->product_name,
            'c' => $this->brand_id,
            'd' => $this->category_id,
            'year' => $this->model_year,
            'price' => $this->price];
    }
}
