<?php

namespace Desafio\Models;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $table = 'tb_pessoa';
    protected $primaryKey = 'co_pessoa';

    protected $fillable = ['no_pessoa','nu_cpf','dt_nascimento'];

    protected $dates = ['created_at', 'updated_at', 'dt_nascimento'];

    public function endereco()
    {
        return $this->hasOne(Endereco::class,'co_pessoa', 'co_pessoa');
    }
}
