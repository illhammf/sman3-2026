<?php

namespace App\Http\Controllers;

use App\Models\Staff;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::published()->orderBy('sort_order')->get();
        return view('staff.index', compact('staff'));
    }
}
