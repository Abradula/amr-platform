<?php

namespace App\Services;

use App\Models\Alert;

class AlertService
{
    public function checkResistance($result)
    {
        if ($result->resistance_level > 80) {
            Alert::create([
                'type' => Alert::TYPE_AMR,
                'message' => 'High resistance detected for ' . $result->organism
            ]);
        }
    }
}