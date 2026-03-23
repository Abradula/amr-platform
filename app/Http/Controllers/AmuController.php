<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AmuReport;

class AmuController extends Controller
{
    public function store(Request $request)
    {
        AmuReport::create($request->all());

        return response()->json(['success' => true]);
    }
}