<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterCategoryRiskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $masterCategoryRisks = [
            [
                'name' => 'Kejadian Risiko',
                'description' => 'Description 1',
                'val_name' => 'Severity',
            ],
            [
                'name' => 'Sumber Risiko',
                'description' => 'Description 2',
                'val_name' => 'Occurrence',
            ],
            [
                'name' => 'Mitigasi Risiko',
                'description' => 'Description 3',
                'val_name' => 'Dk',
            ],
        ];

        foreach ($masterCategoryRisks as $masterCategoryRisk) {
            \App\Models\MasterCategoryRisk::create($masterCategoryRisk);
        }
    }
}
