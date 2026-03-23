<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $fillable = [
        'name',
        'type'
    ];

    public function samples()
    {
        return $this->hasMany(Sample::class);
    }

    public function amuReports()
    {
        return $this->hasMany(AmuReport::class);
    }
}