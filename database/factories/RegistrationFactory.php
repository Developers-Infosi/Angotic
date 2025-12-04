<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RegistrationFactory extends Factory
{
    public function definition(): array
    {
        $based = $this->faker->randomElement(['Yes', 'No']);

        return [
            'code' => strtoupper(Str::random(8)),

            // Delegate info
            'type' => $this->faker->randomElement(['Yes', 'No']),
            'based' => $based,
            'nationality' => $this->faker->country(),
            'title' => $this->faker->randomElement(['Dr', 'Miss', 'Mrs', 'Ms', 'Mr', 'Prof']),
            'fullname' => $this->faker->name(),
            'phone' => '+244 ' . $this->faker->numerify('9## ### ###'),
            'email' => $this->faker->unique()->safeEmail(),

            // Organization
            'org_type' => $this->faker->randomElement([
                'Academia', 'Civil society', 'Government', 'Think Tank',
                'Corporate/Private Sector', 'International Organisation'
            ]),
            'org_name' => $this->faker->company(),
            'position' => $this->faker->jobTitle(),
            'head_of_delegation' => $this->faker->randomElement(['Yes', 'No']),

            // Accommodation & Diet
            'accommodation' => $based === 'No' ? $this->faker->randomElement(['Yes','No']) : null,
            'diet' => $based === 'No' ? $this->faker->randomElement([
                'None','Vegetarian','Vegan','Halal','Kosher','Gluten-Free','Lactose-Free','Allergies','Other'
            ]) : null,

            // Travel Info
            'passport_number' => $based === 'No' ? strtoupper($this->faker->bothify('??######')) : null,
            'passport_type' => $based === 'No' ? $this->faker->randomElement(['Ordinary','Diplomatic','Service']) : null,
            'visa_status' => $based === 'No' ? $this->faker->randomElement([
                'Already Have a Valid Visa',
                'Will Apply Before Travel',
                'Visa on Arrival',
                'Visa Exempt'
            ]) : null,
            'country_of_departure' => $based === 'No' ? $this->faker->country() : null,
            'arrival_date' => $based === 'No' ? $this->faker->dateTimeBetween('+1 week', '+1 month') : null,
            'departure_date' => $based === 'No' ? $this->faker->dateTimeBetween('+1 month', '+2 months') : null,

            // Defaults
            'level' => 'PARTICIPANT',
            'status' => $this->faker->randomElement(['IMPRESSO','EMITIDO','RECEBIDO','DUPLICADO']),
        ];
    }
}
