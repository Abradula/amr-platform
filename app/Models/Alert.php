<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    protected $fillable = [
        'type',
        'message'
    ];

    const TYPE_AMR = 'AMR';
    const TYPE_ENV = 'ENVIRONMENT';
}
