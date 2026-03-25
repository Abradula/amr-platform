<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    use HasFactory;

    protected $fillable = [
        'sample_code',
        'facility_id',
        'sample_type_id',
        'reagent',
        'status'
    ];

    // Relationships
    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }

    public function sampleType()
    {
        return $this->belongsTo(SampleType::class);
    }


    public function results()
    {
        return $this->hasMany(TestResult::class);
    }

    public function tracking()
    {
        return $this->hasMany(SampleTracking::class);
    }
}
