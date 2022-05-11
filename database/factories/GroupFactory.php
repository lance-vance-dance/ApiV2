<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $course = mt_rand(1, 11);
        $classes_name = ['А', 'Б', 'В', 'Г'];
        $name = $classes_name[mt_rand(0, sizeof($classes_name) - 1)];
        
        return [
            'course' => $course,
            'name' => $name
        ];
    }
}
