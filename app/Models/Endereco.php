<?php

namespace Desafio\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = "tb_endereco";
    protected $primaryKey = "co_endereco";

    protected $fillable = [
        'co_pessoa',
        'ds_logradouro',
        'nu_endereco',
        'ds_complemento',
        'no_bairro',
        'no_cidade',
        'co_uf',
        'co_ibge',
        'nu_cep'
    ];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class,'co_endereco');
    }
}
