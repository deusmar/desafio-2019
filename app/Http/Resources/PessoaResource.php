<?php

namespace Desafio\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PessoaResource extends JsonResource
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
            'co_pessoa'     => $this->co_pessoa,
            'no_pessoa'     => $this->no_pessoa,
            'nu_cpf'        => $this->nu_cpf,
            'dt_nascimento' => $this->dt_nascimento === null ? "" : $this->dt_nascimento->format('Y-m-d')
        ];
    }
}
