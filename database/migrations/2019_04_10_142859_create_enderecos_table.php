<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_endereco', function (Blueprint $table) {
            $table->bigIncrements('co_endereco');
            $table->unsignedInteger('co_pessoa');
            $table->string('ds_logradouro',200);
            $table->string('nu_endereco', 10);
            $table->string('ds_complemento', 100);
            $table->string('no_bairro', 100);
            $table->string('no_cidade', 100);
            $table->string('co_uf',2);
            $table->string('co_ibge', 7);
            $table->string('nu_cep', 8);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_endereco');
    }
}
