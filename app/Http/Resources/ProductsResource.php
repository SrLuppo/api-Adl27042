<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if($request) {
            return [
                'id' => $this->id,
                'name' => $this->name,
                'sku' => $this->sku,
                'qtd' => $this->qtd
            ];
        } else {
            return [];
        }
    }
}
