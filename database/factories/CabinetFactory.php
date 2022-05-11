<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CabinetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'number' => mt_rand(111, 333)
        ];
    }
}
