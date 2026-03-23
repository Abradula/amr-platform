<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EnvironmentalData;

class IoTController extends Controller
{
    public function store(Request $request)
    {
        EnvironmentalData::create($request->all());

        return response()->json(['stored' => true]);
    }
}