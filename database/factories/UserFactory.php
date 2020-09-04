<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => Hash::make('123456789'), // password
        'remember_token' => Str::random(10),
        'mentor' =>  $faker->randomElement([0, 1]),
        'activate' => 1,
        'work_email' => $faker->unique()->safeEmail,
        'cellphone' => '+923008989568',
        'occupation' => $faker->randomElement(['Student', 'Professor', 'Doctor', 'Developer', 'Nurse', 'Sportsman']),
        'industry' => $faker->randomElement(['Education', 'Health', 'Information Technology', 'Construction', 'Civil Services']),
        'passion' => $faker->randomElement(['Innovation', 'Blockchain', 'Education', 'Science', 'Augmented Reality', 'Social Impact']),
        'need' => $faker->randomElement(['Business Capital', 'Job', 'Loan', 'Developers']),
        'role' => 2,
    ];
});
