<?php

namespace Database\Factories;

use App\Models\Faculty;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $facyltyIds = Faculty::all()->pluck('id')->random(1)->first();


        return [
            //
            'name'=>fake()->name,
            'faculty_id'=>$facyltyIds,
        ];
    }
}
