<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CollectionType;
use App\Models\SampleType;

class CollectionTypeController extends Controller
{
    public function index()
    {
        $collectionTypes = CollectionType::all();
        return response()->json($collectionTypes);
    }

    public function sampleTypes($id)
    {
        $sampleTypes = SampleType::where('sample_type_id',$id)->get();
        return response()->json($sampleTypes);
    }
}
