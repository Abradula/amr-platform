<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AmuReport extends Model
{
    protected $fillable = [
        'facility_id',
        'drug_name',
        'quantity',
        'report_date'
    ];

    protected $casts = [
        'report_date' => 'date',
    ];

    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }
}
