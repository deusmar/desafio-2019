<?php

namespace Desafio\Http\Controllers;

use Desafio\Http\Requests\PessoaRequest;
use Desafio\Http\Resources\PessoaResource;
use Desafio\Models\Pessoa;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PessoaController extends Controller
{
    public function index() : AnonymousResourceCollection
    {
        return PessoaResource::collection(Pessoa::all());
    }

    /**
     * @param PessoaRequest $request
     * @return PessoaResource
     */
    public function store(PessoaRequest $request) : PessoaResource
    {
        $pessoa = Pessoa::create($request->all());
        return new PessoaResource($pessoa);
    }

    public function show(Pessoa $pessoa)
    {
        return new PessoaResource($pessoa);
    }


    public function update(PessoaRequest $request, Pessoa $pessoa): PessoaResource
    {
        $pessoa->update($request->toArray());

        return new PessoaResource($pessoa);
    }


    public function destroy(Pessoa $pessoa)
    {
        $pessoa->delete();

        return response()->json(null, 204);
    }
}
