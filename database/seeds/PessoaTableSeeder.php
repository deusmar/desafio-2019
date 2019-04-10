<?php

use Illuminate\Database\Seeder;
use \Desafio\Models\Pessoa;

class PessoaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Pessoa::class,100)->create();
    }
}
