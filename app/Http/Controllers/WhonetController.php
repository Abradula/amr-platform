<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WhonetController extends Controller
{
    public function upload(Request $request)
    {
        $file = $request->file('file');

        $rows = array_map('str_getcsv', file($file));

        foreach ($rows as $row) {
            TestResult::create([
                'sample_id' => $row[0],
                'organism' => $row[1],
                'antibiotic' => $row[2],
                'resistance_level' => $row[3],
            ]);
        }

        return response()->json(['status' => 'imported']);
    }
}