<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Client;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'client_first_name' => $this->faker->firstName,
            'client_middle_name' => $this->faker->optional()->firstName,
            'client_last_name' => $this->faker->lastName,
            'client_address' => $this->faker->streetAddress,
            'client_contact_num' => $this->faker->phoneNumber,
        ];
        
    }
}