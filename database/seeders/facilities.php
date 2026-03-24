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
            ['name' => 'Muhimbili National Hospital', 'type' => 'National Hospital', 'location' => 'Upanga'],
            ['name' => 'Amana Hospital', 'type' => 'District Hospital', 'location' => 'Ilala'],
            ['name' => 'Mwananyamala Hospital', 'type' => 'District Hospital', 'location' => 'Mwananyamala'],
            ['name' => 'Temeke Regional Referral Hospital', 'type' => 'Regional Referral Hospital', 'location' => 'Temeke'],
            ['name' => 'Morogoro Regional Referral Hospital', 'type' => 'Regional Referral Hospital', 'location' => 'Kichangani'],
            ['name' => 'St. Francis Referral Hospital', 'type' => 'Referral Hospital', 'location' => 'Ifakara'],
            ['name' => 'Kilosa District Hospital', 'type' => 'District Hospital', 'location' => 'Kilosa Mjini'],
            ['name' => 'Turiani Hospital', 'type' => 'District Hospital', 'location' => 'Turiani'],
            ['name' => 'Tanga Regional Referral Hospital', 'type' => 'Regional Referral Hospital', 'location' => 'Bombo'],
            ['name' => 'Bombo Hospital', 'type' => 'District Hospital', 'location' => 'Bombo']
        ];

        foreach ($facilities as $facility) {
            \App\Models\Facility::create($facility);
        }
    }
}
