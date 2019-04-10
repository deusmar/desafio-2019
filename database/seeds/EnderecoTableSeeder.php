<?php

use Desafio\Models\Endereco;
use Desafio\Models\Pessoa;
use Illuminate\Database\Seeder;

class EnderecoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Pessoa::all() as $pessoa) {
            factory(Endereco::class)->create(['co_pessoa' => $pessoa->co_pessoa]);
        }
    }
}
