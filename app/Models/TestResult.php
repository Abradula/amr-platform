<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestResult extends Model
{
    protected $fillable = [
        'sample_id',
        'organism',
        'antibiotic',
        'resistance_level'
    ];

    public function sample()
    {
        return $this->belongsTo(Sample::class);
    }
}