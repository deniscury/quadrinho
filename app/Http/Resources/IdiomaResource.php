<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IdiomaResource extends JsonResource
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
            'traducoes' => new TraducoesCollection($this->whenLoaded('traducoes')),
            'links' => array(
                array(
                    'rel' => 'Alterar idioma',
                    'type' => 'PUT',
                    'url' => route('idioma.update', $this->id)
                ),
                array(
                    'rel' => 'Excluir idioma',
                    'type' => 'DELETE',
                    'url' => route('idioma.destroy', $this->id)
                )
            )
        );
    }
}
