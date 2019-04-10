<?php

namespace Tests\Feature;

use Desafio\Models\Pessoa;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class RegistrarPessoaTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();
        $this->pessoa = factory(Pessoa::class)->create()->toArray();
    }

    /** @test */
    public function registrarPessoaComSucesso()
    {
        $payload = [
            'no_pessoa' => 'Matias Benjamin Gonçalves',
            'nu_cpf' => '02034588741'
        ];

        $this->json('post', '/api/v1/pessoas', $this->pessoa)
            ->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                    'co_pessoa',
                    'no_pessoa',
                    'nu_cpf',
                    'dt_nascimento',
                ],
            ]);
    }

    /** @test */
    public function exigirNome()
    {
        $payload = [
            'no_pessoa' => '',
            'nu_cpf' => ''
        ];

        $this->json('post', '/api/v1/pessoas', $payload)
            ->assertStatus(422)
            ->assertJson([
                    'data' => [],
                    'meta' => [
                        'message' => 'Dados inválidos',
                        'errors' => [
                            'no_pessoa' => [
                                'O campo Nome é obrigatório.'
                            ]
                        ]
                    ]
                ]
            );
    }

    /** @test */
    public function exigirCpf()
    {
        $payload = [
            'no_pessoa' => 'Teste',
            'nu_cpf' => ''
        ];

        $this->json('post', '/api/v1/pessoas', $payload)
            ->assertStatus(422)
            ->assertJson([
                    'data' => [],
                    'meta' => [
                        'message' => 'Dados inválidos',
                        'errors' => [
                            'nu_cpf' => [
                                'O campo CPF é obrigatório.'
                            ]
                        ]
                    ]
                ]
            );
    }
}
