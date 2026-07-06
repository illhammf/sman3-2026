<?php

namespace App\Http\Controllers;

use App\Models\Extracurricular;

class ExtracurricularController extends Controller
{
    public function index()
    {
        $extracurriculars = Extracurricular::active()->get();
        return view('extracurriculars.index', compact('extracurriculars'));
    }

    public function show($slug)
    {
        $extracurricular = Extracurricular::where('slug', $slug)->active()->firstOrFail();
        return view('extracurriculars.show', compact('extracurricular'));
    }
}
