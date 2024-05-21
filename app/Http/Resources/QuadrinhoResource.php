<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class QuadrinhoResource extends JsonResource
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
            'ano' => $this->ano,
            'autor' => $this->autor,
            'capa' => Storage::disk('public')->url($this->capa),
            'editora' => new EditoraResource($this->whenLoaded('editora')),
            'traducao' => new TraducaoResource($this->whenLoaded('traducao')),
            'links' => array(
                array(
                    'rel' => 'Alterar quadrinho',
                    'type' => 'PUT',
                    'url' => route('quadrinho.update', $this->id)
                ),
                array(
                    'rel' => 'Excluir quadrinho',
                    'type' => 'DELETE',
                    'url' => route('quadrinho.destroy', $this->id)
                )
            )
        );
    }
}
