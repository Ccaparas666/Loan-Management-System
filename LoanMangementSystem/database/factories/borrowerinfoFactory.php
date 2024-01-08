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
            'borAccount' => $this->faker->unique()->regexify('[A-Z0-9]{5}'),
            'borFname' => $this->faker->firstName(),
            'borMname' => $this->faker->randomLetter(),
            'borLname' => $this->faker->lastName(),
            'borSuffix' => $this->faker->suffix(),
            'borContact' => $this->faker->phoneNumber(),
            'borEmail' => $this->faker->unique()->safeEmail(),
            'borAddress' => $this->faker->address(),
            'borDob' => $this->faker->date(),
            'loanstatus' => 'Not Registered',
            'borGender' => $this->faker->randomElement(['male', 'female']),
        ];
    }
}
