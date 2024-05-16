<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TraducaoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return array(
            'id' => $this->id,
            'nome' => $this->nome,
            'idioma' => new IdiomaResource($this->whenLoaded('idioma')),
            'quadrinhos' => new QuadrinhosCollection($this->whenLoaded('quadrinhos')),
        );
    }
}
