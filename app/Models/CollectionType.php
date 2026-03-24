<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CollectionType extends Model
{
    protected $fillable = ['name'];

    public function sampleTypes()
    {
        return $this->hasMany(SampleType::class);
    }
}
