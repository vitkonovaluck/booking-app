<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UsersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        gender = $faker->randomElement(['male', 'female', 'others']);

        if($gender == "female")
            $avatar = $faker->randomElement(['girl.png', 'girl-1.png', 'girl-2.png']);
        else
            $avatar = $faker->randomElement(['boy.png', 'boy-1.png', 'man.png', 'man-1.png', 'man-2.png', 'man-3.png']);
        return [
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'gender' => $gender,
            'phone' => $faker->isbn10(),
            'address' => $faker->address,
            'email' => $faker->unique()->safeEmail,
            'password' => bcrypt('password'),
            'avatar' => $avatar,
            'about' => $faker->text($maxNbChars = 200),
            'role' => 'user',
            'status' => TRUE,
            'remember_token' => str_random(10),
        ];
    }
}
