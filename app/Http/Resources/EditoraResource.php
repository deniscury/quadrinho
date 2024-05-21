<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EditoraResource extends JsonResource
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
            'quadrinhos' => new QuadrinhosCollection($this->whenLoaded('quadrinho')),
            'links' => array(
                array(
                    'rel' => 'Alterar editora',
                    'type' => 'PUT',
                    'url' => route('editora.update', $this->id)
                ),
                array(
                    'rel' => 'Excluir editora',
                    'type' => 'DELETE',
                    'url' => route('editora.destroy', $this->id)
                )
            )
        );
    }
}
