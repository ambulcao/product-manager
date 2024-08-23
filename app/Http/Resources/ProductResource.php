<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        //Log::debug($this->resolve($request));
        //dd($this);

        return [
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'preco' => $this->preco,
            'data_de_validade' => $this->data_de_validade,
            'imagem' => $this->imagem,
            'categoria_id' => $this->categoria_id,
        ];
    }
}