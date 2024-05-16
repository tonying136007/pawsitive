<?php
namespace Database\Seeders;
use App\Models\Client;
use Illuminate\Database\Seeder;

class PetsSeeder extends Seeder
{
    public function run()
    {
        $clients = Client::all()->shuffle(); // Shuffle the user collection

        $pets = [
            [
                'pet_name' => 'Bitoy',
                'pet_type' => 'feline',
                'pet_breed' => 'Puspin',
                'pet_bdate' => '12-10-2023',
                'client_id' => $clients->pop()->id, // Pop the last user from the shuffled collection
            ],
            [
                'pet_name' => 'Bunag',
                'pet_type' => 'canine',
                'pet_breed' => 'Aspin',
                'pet_bdate' => '12-12-2021',
                'client_id' => $clients->pop()->id,
            ],
            [
                'pet_name' => 'Bryan',
                'pet_type' => 'Parrot',
                'pet_breed' => 'Mandaluyong Breed',
                'pet_bdate' => '01-01-2023',
                'client_id' => $clients->pop()->id,
            ],
            // Add more clients here...
        ];

        foreach ($pets as $pet) {
            \App\Models\Pet::create($pet);
        }
    }
}
