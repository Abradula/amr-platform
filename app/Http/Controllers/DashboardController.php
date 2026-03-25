<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sample;
use App\Models\Alert;
use App\Models\AmuReport;
use App\Models\TestResult;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'samples' => Sample::count(),
            'alerts' => Alert::count(),
            'amu' => AmuReport::sum('quantity'),
            'resistance_levels' => TestResult::select('resistance_level', \DB::raw('count(*) as total'))
                ->groupBy('resistance_level')
                ->get()
                ->map(function ($item) {
                    $item->label = match($item->resistance_level) {
                        0 => 'Susceptible',
                        1 => 'Intermediate',
                        2 => 'Resistant',
                        default => 'Unknown'
                    };
                    return $item;
                }),

            'samples_by_facility' => Sample::select('facility_id', \DB::raw('count(*) as total'))
                ->groupBy('facility_id')
                ->with('facility')
                ->get(),

            'sample_type_distribution' => Sample::select('sample_type_id', \DB::raw('count(*) as total'))
                ->groupBy('sample_type_id')
                ->with('sampleType')
                ->get(),
        ]);
    }
}