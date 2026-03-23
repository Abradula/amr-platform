<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sample;
use App\Models\Alert;
use App\Models\AmuReport;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'samples' => Sample::count(),
            'alerts' => Alert::count(),
            'amu' => AmuReport::sum('quantity'),
        ]);
    }
}