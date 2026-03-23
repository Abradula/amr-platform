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
        'type',
        'collection_date',
        'collected_by',
        'status'
    ];

    protected $casts = [
        'collection_date' => 'datetime',
    ];

    // Relationships
    public function facility()
    {
        return $this->belongsTo(Facility::class);
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
