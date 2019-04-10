<?php

use Faker\Generator as Faker;
use Faker\Provider\pt_BR\Address;
Use \Desafio\Models\Endereco;

$factory->define(Endereco::class, function (Faker $faker) {
    $faker->addProvider(new Address($faker));

    return [
        'ds_logradouro' => $faker->streetName,
        'nu_endereco' => $faker->buildingNumber,
        'ds_complemento' => $faker->secondaryAddress,
        'no_bairro' => "{$faker->cityPrefix} {$faker->name}",
        'no_cidade' => $faker->city,
        'co_uf' => $faker->stateAbbr,
        'co_ibge' => $faker->numberBetween(1500107, 5300000),
        'nu_cep' => str_replace("-","",$faker->postcode),
    ];
});
