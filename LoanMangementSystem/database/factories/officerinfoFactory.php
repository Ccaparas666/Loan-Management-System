<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Helpers\Helper;
use App\Models\officerInfo;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\officerinfo>
 */
class officerinfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          
            'offId' => Helper::IDGenerator(new officerinfo, 'offId', 5, 'OFL'),
            'offFname' => fake()->firstName(),
            'offMname' => fake()->randomLetter(),
            'offLname' => fake()->lastName(),
            'offSuffix' => fake()->suffix(),
            'offCOntact' => fake()->phoneNumber(),
            'offEmail' => fake()->unique()->safeEmail(),
            'offAddress' => fake()->address(),
            'offDob' => fake()->date(),
            'offGender' => fake()->randomElement(array ('male', 'female')),
            'offpassword' => fake()->password(),
        ];
    }
}
