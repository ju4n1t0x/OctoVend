<?php

namespace Database\Factories;

use App\Enums\EmployeeType;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $country = Country::inRandomOrder()->first();
        $state = State::where('country_id', $country?->id)->inRandomOrder()->first();
        $city = City::where('state_id', $state?->id)->inRandomOrder()->first();

        return [
            'user_id' => User::factory()->employee(),
            'dni' => fake()->unique()->numerify('########'),
            'file_id' => fake()->unique()->numerify('####'),
            'employee_type' => fake()->randomElement(EmployeeType::cases()),
            'country_id' => $country?->id,
            'state_id' => $state?->id,
            'city_id' => $city?->id,
            'address' => fake()->streetAddress(),
            'postal_code' => fake()->postcode(),
            'telephone_number' => fake()->phoneNumber(),
            'birth_date' => fake()->dateTimeBetween('-60 years', '-18 years'),
        ];
    }
}
