<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        static $number = 1;
        return [
            'room_number' => $number++,
            'description' => $this->faker->text,
            'available' => TRUE,
            'status' => TRUE,
            'room_type_id' => $this->faker->numberBetween($min = 1, $max = 6),
        ];
    }
}
