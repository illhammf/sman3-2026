<?php

namespace App\Http\Controllers;

use App\Models\Facility;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::published()->orderBy('sort_order')->get();
        return view('facilities.index', compact('facilities'));
    }
}
