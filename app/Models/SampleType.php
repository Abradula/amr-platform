<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SampleType extends Model
{
    protected $fillable = ['name', 'collection_type_id'];

    public function collectionType()
    {
        return $this->belongsTo(CollectionType::class);
    }

    public function samples()
    {
        return $this->hasMany(Sample::class);
    }
}
