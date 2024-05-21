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
            'abreviatura' => $this->abreviatura,
            'idioma' => new IdiomaResource($this->whenLoaded('idioma')),
            'quadrinhos' => new QuadrinhosCollection($this->whenLoaded('quadrinhos')),
            'links' => array(
                array(
                    'rel' => 'Alterar tradução',
                    'type' => 'PUT',
                    'url' => route('traducao.update', $this->id)
                ),
                array(
                    'rel' => 'Excluir tradução',
                    'type' => 'DELETE',
                    'url' => route('traducao.destroy', $this->id)
                )
            )
        );
    }
}
