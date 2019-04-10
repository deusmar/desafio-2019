<?php

namespace Desafio\Http\Controllers;

use Desafio\Http\Requests\EnderecoRequest;
use Desafio\Http\Resources\EnderecoResource;
use Desafio\Models\Endereco;
use Desafio\Models\Pessoa;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    /**
     * @param Pessoa $pessoa
     * @return EnderecoResource
     */
    public function show(Pessoa $pessoa)
    {
        return new EnderecoResource($pessoa->endereco);
    }

    public function store(EnderecoRequest $request, Pessoa $pessoa)
    {
        try {
            $pessoa = Pessoa::find($pessoa->co_pessoa);
            $endereco = Endereco::create($request->all() + ['co_pessoa' => $pessoa->co_pessoa]);
            return new EnderecoResource($endereco);
        } catch (\Exception $ex) { // Anything that went wrong
            abort(500, 'Não foi possível vincular o Endereço a Pessoa.');
        }
    }

    /**
     * @param Request $request
     * @param Endereco $endereco
     */
    public function update(Request $request, Endereco $endereco)
    {

    }

    /**
     * @param Endereco $endereco
     */
    public function destroy(Endereco $endereco)
    {
        //
    }
}
