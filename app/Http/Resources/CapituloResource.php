<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CapituloResource extends JsonResource
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
            'resumo' => $this->resumo,
            'quadrinho' => new QuadrinhoResource($this->whenLoaded('quadrinho')),
            'links' => array(
                array(
                    'rel' => 'Alterar capítulo',
                    'type' => 'PUT',
                    'url' => route('capitulo.update', $this->id)
                ),
                array(
                    'rel' => 'Excluir capítulo',
                    'type' => 'DELETE',
                    'url' => route('capitulo.destroy', $this->id)
                )
            )
        );
    }
}
