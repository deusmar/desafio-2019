<?php

namespace Desafio\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EnderecoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'ds_logradouro'     => $this->ds_logradouro,
            'nu_endereco'       => $this->nu_endereco,
            'ds_complemento'    => $this->ds_complemento,
            'no_bairro'         => $this->no_bairro,
            'no_cidade'         => $this->no_cidade,
            'co_uf'             => $this->co_uf,
            'co_ibge'           => $this->co_ibge,
            'nu_cep'            => $this->nu_cep,
        ];
    }
}
