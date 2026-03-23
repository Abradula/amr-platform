<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sample;
use App\Models\TestResult;
use Illuminate\Support\Facades\DB;
use Exception;

class LimsController extends Controller
{
    public function store(Request $request)
    {

        DB::beginTransaction();

        try {
        $sample = Sample::create($request->only(['sample_code', 'facility_id', 'type']));

        foreach ($request->results as $res) {
            $result = TestResult::create([
                'sample_id' => $sample->id,
                'organism' => $res['organism'],
                'antibiotic' => $res['antibiotic'],
                'resistance_level' => $res['resistance_level'],
            ]);

            app(\App\Services\AlertService::class)->checkResistance($result);
        }

        DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
        return response()->json(['success' => true]);
    }
}