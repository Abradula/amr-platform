<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class collectionType extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $collectionTypes = [
            ['id' => 1, 'name' => 'Human'],
            ['id' => 2, 'name' => 'Animal'],
            ['id' => 3, 'name' => 'Environmental']
        ];

        foreach ($collectionTypes as $type) {
            \App\Models\CollectionType::create($type);
        }

       $sampleTypes = [

            // Human (1)
            ['name' => 'Blood', 'sample_type_id' => 1],
            ['name' => 'Urine', 'sample_type_id' => 1],
            ['name' => 'Stool', 'sample_type_id' => 1],
            ['name' => 'Sputum', 'sample_type_id' => 1],
            ['name' => 'Wound Swab', 'sample_type_id' => 1],
            ['name' => 'Nasal/Throat Swab', 'sample_type_id' => 1],
            ['name' => 'CSF (Cerebrospinal Fluid)', 'sample_type_id' => 1],
            ['name' => 'Pus', 'sample_type_id' => 1],
            ['name' => 'Vaginal/Urethral Swab', 'sample_type_id' => 1],
            ['name' => 'Tissue Sample', 'sample_type_id' => 1],

            // Animal (2)
            ['name' => 'Blood', 'sample_type_id' => 2],
            ['name' => 'Milk', 'sample_type_id' => 2],
            ['name' => 'Feces', 'sample_type_id' => 2],
            ['name' => 'Nasal Swab', 'sample_type_id' => 2],
            ['name' => 'Tissue Sample', 'sample_type_id' => 2],
            ['name' => 'Urine', 'sample_type_id' => 2],
            ['name' => 'Wound Swab', 'sample_type_id' => 2],
            ['name' => 'Post-mortem Samples', 'sample_type_id' => 2],

            // Environmental (3)
            ['name' => 'Water', 'sample_type_id' => 3],
            ['name' => 'Soil', 'sample_type_id' => 3],
            ['name' => 'Air', 'sample_type_id' => 3],
            ['name' => 'Surface Swab', 'sample_type_id' => 3],
            ['name' => 'Wastewater', 'sample_type_id' => 3],
            ['name' => 'Animal Waste', 'sample_type_id' => 3],
            ['name' => 'Food Samples', 'sample_type_id' => 3],
            ['name' => 'Farm Environment Samples', 'sample_type_id' => 3],
        ];
        foreach ($sampleTypes as $sample) {
            \App\Models\SampleType::create($sample);    
        }
    }
}
