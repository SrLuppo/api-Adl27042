<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HistoriesResource extends JsonResource
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
                'sku' => $this->sku,
                'qtd' => json_decode($this->qtd, true),
                'productID' => $this->productID,
                'atualizadoEm' => $this->updated_at
            ];
        } else {
            return [];
        }
    }
}
