<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class facilities extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $facilities = [
            ['name' => 'Central Hospital', 'type' => 'Central District'],
            ['name' => 'North Clinic', 'type' => 'Hospital District'],
            ['name' => 'East Health Center', 'type' => 'Health Center'],
            ['name' => 'West Medical Facility', 'type' => 'Dispensary'],
            ['name' => 'South Care Unit', 'type' => 'Standalone Clinic'],
        ];

        foreach ($facilities as $facility) {
            \App\Models\Facility::create($facility);
        }
    }
}
