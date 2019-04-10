<?php

namespace Tests\Unit;

use Desafio\Models\Pessoa;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class RegistrarPessoatest extends TestCase
{
    use DatabaseMigrations;

    /** @var Pessoa pessoa */
    private $pessoa;

    protected function setUp(): void
    {
        parent::setUp();
        $this->pessoa = factory(Pessoa::class)->create();
    }

    /** @test */
    public function assert_pessoa_tem_endereco()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->prestador->endereco);
    }
}
