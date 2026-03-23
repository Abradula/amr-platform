<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SampleTracking;
use App\Models\Facility;

class TrackingController extends Controller
{
    public function update(Request $request)
    {
        SampleTracking::create($request->all());

        return response()->json(['tracked' => true]);
    }

    public function facilities()
    {
        $facilities = Facility::all();

        return response()->json($facilities);
    }
}