<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    public function run()
    {
        $users = User::all()->shuffle(); // Shuffle the user collection

        $clients = [
            [
                'client_first_name' => 'John',
                'client_last_name' => 'Doe',
                'client_middle_name' => 'M.',
                'client_address' => '245 Manila',
                'client_contact_num' => '0994522522',
                'user_id' => $users->pop()->id, // Pop the last user from the shuffled collection
            ],
            [
                'client_first_name' => 'Jane',
                'client_last_name' => 'Doe',
                'client_middle_name' => 'M.',
                'client_address' => '260 San Juan',
                'client_contact_num' => '09945227732',
                'user_id' => $users->pop()->id,
            ],
            [
                'client_first_name' => 'Bryan',
                'client_last_name' => 'Alejo',
                'client_middle_name' => 'M.',
                'client_address' => '260 Mandaluyong',
                'client_contact_num' => '09613326890',
                'user_id' => $users->pop()->id,
            ],
            // Add more clients here...
        ];

        foreach ($clients as $client) {
            \App\Models\Client::create($client);
        }
    }
}
