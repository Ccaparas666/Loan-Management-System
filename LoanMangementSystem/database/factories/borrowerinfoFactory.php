<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\borrowerinfo>
 */
class borrowerinfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       
        return [
            //
            'borFname' => fake()->firstName(),
            'borMname' => fake()->randomLetter(),
            'borLname' => fake()->lastName(),
            'borSuffix' => fake()->suffix(),
            'borCOntact' => fake()->phoneNumber(),
            'borEmail' => fake()->unique()->safeEmail(),
            'borAddress' => fake()->address(),
            'borAge' => fake()->randomNumber(),
            'borGender' => fake()->word(['male', 'female']),
            
        ];
    }
}
