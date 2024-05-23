<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Diagnosis;

class DiagnosisSeeder extends Seeder
{
    public function run()
    {
        $diagnoses = [
            [
                'diag_name' => 'Diabetes',
                'diag_type' => 'Chronic',
                'diag_expected_life_exp' => 10,
                'diag_treatment' => 'Insulin therapy, lifestyle changes',
            ],
            [
                'diag_name' => 'Arthritis',
                'diag_type' => 'Chronic',
                'diag_expected_life_exp' => 5,
                'diag_treatment' => 'Pain management, physical therapy',
            ],
            [
                'diag_name' => 'Heartworm',
                'diag_type' => 'Parasitic',
                'diag_expected_life_exp' => 2,
                'diag_treatment' => 'Medications, surgical removal',
            ],
            // Add more diagnoses here...
        ];

        foreach ($diagnoses as $diagnosis) {
            Diagnosis::create($diagnosis);
        }
    }
}
