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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'user' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Cliente::class, function (Faker\Generator $faker) {
    return [
        'nombre'       => $faker->name,
        'apellido'     => $faker->lastName,
        'direccion'    => $faker->address,
        'telefono'     => $faker->phoneNumber,
        'nit'          => $faker->ean8,
        'dpi'          => $faker->ean13,
        'tipoVehiculo' => $faker->biasedNumberBetween($min = 1, $max = 3, $function = 'sqrt'),
        'placa'        => $faker->e164PhoneNumber,
        'placa'        => $faker->colorName,
        'descuento'    => 0
    ];
});
