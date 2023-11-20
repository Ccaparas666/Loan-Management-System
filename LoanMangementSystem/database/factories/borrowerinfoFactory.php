<?php

namespace Database\Factories;
use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\borrowerinfo;
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
            'borAccount' => Helper::AccountNumberGenerator(new borrowerinfo, 'borAccount', 5, 'BAC'),
            'borFname' => fake()->firstName(),
            'borMname' => fake()->randomLetter(),
            'borLname' => fake()->lastName(),
            'borSuffix' => fake()->suffix(),
            'borCOntact' => fake()->phoneNumber(),
            'borEmail' => fake()->unique()->safeEmail(),
            'borAddress' => fake()->address(),
            'borDob' => fake()->date(),
            'borGender' => fake()->randomElement(array ('male', 'female')),
          
            
        ];
    }
}
