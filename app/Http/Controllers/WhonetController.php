<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TestResult;
use App\Models\Sample;
use App\Models\Facility;
use App\Models\SampleType;
use Illuminate\Support\Facades\DB;
use Exception;
class WhonetController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'upload_file' => 'required|mimes:csv,txt'
        ]);

        $file = $request->file('upload_file');
        
        DB::beginTransaction();

        try {
            $rows = array_map('str_getcsv', file($file->getRealPath()));
            array_shift($rows);

            foreach ($rows as $row) {
                if (count($row) < 4) continue;

                $facility_id = Facility::where('name', $row[1])->first()?->id;
                $sample_type_id = SampleType::where('name', $row[4])->first()?->id;

                $sample = Sample::create((
                    [
                        'sample_code' => $row[0],
                        'facility_id' => $facility_id,
                        'sample_type_id' => $sample_type_id,
                        'reagent' => $row[2],
                    ]
                ));

                $result = TestResult::create([
                    'sample_id' => $sample->id,
                    'organism' => $row[5],
                    'antibiotic' => $row[6],
                    'resistance_level' => $row[7],
                ]);

                app(\App\Services\AlertService::class)->checkResistance($result);
            }

            DB::commit();

            return response()->json(['status' => 'imported']);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}