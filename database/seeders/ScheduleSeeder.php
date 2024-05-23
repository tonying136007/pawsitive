<?php

namespace Database\Seeders;

use App\Models\Schedule;
use App\Models\User;
use App\Models\Pet;
use App\Models\Diagnosis;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    public function run()
    {
        $users = User::all()->shuffle(); 
        $pets = Pet::all()->shuffle();
        $diagnoses = Diagnosis::all()->shuffle();

        $appointments = [
            [
                'start_time' => now()->addHours(2),
                'finish_time' => now()->addHours(4),
                'comments' => 'Initial consultation',
                'user_id' => $users->pop()->id,
                'type' => 'Consultation',
                'doctor' => 'Dr. Smith',
                'pet_id' => $pets->pop()->id,
                'diagnosis_id' => $diagnoses->pop()->id,
            ],
            [
                'start_time' => now()->addHours(5),
                'finish_time' => now()->addHours(7),
                'comments' => 'Follow-up appointment',
                'user_id' => $users->pop()->id,
                'type' => 'Follow-up',
                'doctor' => 'Dr. Johnson',
                'pet_id' => $pets->pop()->id,
                'diagnosis_id' => $diagnoses->pop()->id,
            ],
            [
                'start_time' => now()->addHours(10),
                'finish_time' => now()->addHours(12),
                'comments' => 'Regular check-up',
                'user_id' => $users->pop()->id,
                'type' => 'Check-up',
                'doctor' => 'Dr. Williams',
                'pet_id' => $pets->pop()->id,
                'diagnosis_id' => $diagnoses->pop()->id,
            ],
            // Add more appointments here...
        ];

        foreach ($appointments as $appointment) {
            Schedule::create($appointment);
        }
    }
}
