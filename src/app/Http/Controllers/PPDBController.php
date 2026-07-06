<?php

namespace App\Http\Controllers;

use App\Models\PPDBRegistration;
use App\Models\Setting;
use Illuminate\Http\Request;

class PPDBController extends Controller
{
    public function index()
    {
        $settings = Setting::whereIn('key', [
            'ppdb_is_open', 'ppdb_start_date', 'ppdb_end_date',
            'ppdb_information', 'ppdb_requirements', 'ppdb_quota'
        ])->get()->keyBy('key');

        return view('ppdb.index', compact('settings'));
    }

    public function create()
    {
        $ppdbIsOpen = Setting::where('key', 'ppdb_is_open')->value('value');
        if ($ppdbIsOpen !== 'true') {
            return redirect()->route('ppdb.index')->with('error', 'Maaf, PPDB sedang tidak dibuka.');
        }

        return view('ppdb.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|max:255',
            'nickname' => 'nullable|max:255',
            'place_of_birth' => 'required|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:L,P',
            'address' => 'required',
            'rt_rw' => 'nullable|max:50',
            'village' => 'required|max:255',
            'district' => 'required|max:255',
            'city' => 'required|max:255',
            'postal_code' => 'nullable|max:10',
            'phone' => 'required|max:20',
            'email' => 'nullable|email|max:255',
            'previous_school' => 'required|max:255',
            'previous_school_address' => 'nullable',
            'nisn' => 'nullable|max:20',
            'father_name' => 'required|max:255',
            'father_education' => 'nullable|max:255',
            'father_occupation' => 'nullable|max:255',
            'father_phone' => 'nullable|max:20',
            'mother_name' => 'required|max:255',
            'mother_education' => 'nullable|max:255',
            'mother_occupation' => 'nullable|max:255',
            'mother_phone' => 'nullable|max:20',
            'guardian_name' => 'nullable|max:255',
            'guardian_education' => 'nullable|max:255',
            'guardian_occupation' => 'nullable|max:255',
            'guardian_phone' => 'nullable|max:20',
        ]);

        $registrationNumber = 'PPDB-' . date('Y') . '-' . strtoupper(substr(uniqid(), -6));

        $validated['registration_number'] = $registrationNumber;
        $validated['registration_date'] = now();
        $validated['status'] = 'pending';

        PPDBRegistration::create($validated);

        return redirect()->route('ppdb.index')
            ->with('success', 'Pendaftaran berhasil! Nomor pendaftaran Anda: <strong>' . $registrationNumber . '</strong>. Silakan simpan nomor ini untuk informasi selanjutnya.');
    }
}
