<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

//$factory->define(Agenda\User::class, function ($faker) {
//    return [
//        'name' => $faker->name,
//        'email' => $faker->email,
//    ];
//});
$factory->define(Agenda\Pessoa::class, function ($faker) {
    return [
        'nome' => $faker->name,
        'apelido' => $faker->firstName,
        'sexo' => $faker->randomElement(['M','F'])
    ];
});
$factory->define(Agenda\Telefone::class, function ($faker) {
    return [
        'descricao' => $faker->randomElement(['Residencial','Comercial','Celular','Recados']),
        'codpais' => $faker->optional(0.7,55)->numberBetween(1,197),
        'ddd' =>$faker->numberBetween(11,91),
        'prefixo' => $faker->randomNumber(4),
        'sufixo' => $faker->randomNumber(4),
        'pessoa_id' =>$faker->numberBetween(1,30),
    ];
});