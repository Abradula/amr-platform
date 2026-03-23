<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SampleTracking extends Model
{
    protected $fillable = [
        'sample_id',
        'status',
        'location',
        'handled_by'
    ];

    public function sample()
    {
        return $this->belongsTo(Sample::class);
    }
}
