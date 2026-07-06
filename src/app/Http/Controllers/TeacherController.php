<?php

namespace App\Http\Controllers;

use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::published()->orderBy('sort_order')->get();
        $principal = $teachers->firstWhere('position', 'Kepala Sekolah');
        $vicePrincipals = $teachers->filter(fn($t) => str_contains($t->position ?? '', 'Wakil'));
        $otherTeachers = $teachers->filter(fn($t) => !str_contains($t->position ?? '', 'Kepala') && !str_contains($t->position ?? '', 'Wakil'));

        return view('teachers.index', compact('teachers', 'principal', 'vicePrincipals', 'otherTeachers'));
    }
}
