<?php

use Faker\Generator as Faker;
use \Desafio\Models\Pessoa;
use Faker\Provider\pt_BR\Person;

$factory->define(Pessoa::class, function (Faker $faker) {
    $faker->addProvider(new Person($faker));

    return [
        'no_pessoa' => $faker->name,
        'nu_cpf' => $faker->cpf(false),
        'dt_nascimento' => $faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});
