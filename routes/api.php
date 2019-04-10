<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::fallback(function () {
    return response()->json([
        'data' => [],
        'meta' => [
            'message' => 'Recurso não Encontrado'
        ]
    ], 404);
});

Route::prefix('v1')->group(function ($route) {
    $route->resource('pessoas', 'PessoaController')->except('create', 'edit');

    //Endereço
    $route->get('pessoas/{pessoa}/endereco', 'EnderecoController@show');
    $route->post('pessoas/{pessoa}/endereco', 'EnderecoController@store');
    $route->put('pessoas/{pessoa}/endereco', 'EnderecoController@update');
    $route->delete('pessoas/{pessoa}/endereco', 'EnderecoController@destroy');

});