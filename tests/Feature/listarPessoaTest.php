<?php

namespace Tests\Feature;

use Desafio\Models\Pessoa;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class listarPessoaTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();
        $this->pessoas = factory(Pessoa::class, 2)->create();

    }

    /** @test */
    public function listarPessoasTest()
    {
        $response = $this->json('get', '/api/v1/pessoas')
            ->assertStatus(200)
            ->baseResponse->getData()->data;

        $this->assertEquals(count($this->pessoas), count($response));
    }

    /** @test */
    public function detalharPessoatest()
    {
        $this->json('get', '/api/v1/pessoas/1')
            ->assertStatus(200)
            ->assertSee($this->pessoas[0]->nu_cpf);
    }
}
