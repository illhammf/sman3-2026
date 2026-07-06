<?php

namespace App\Http\Controllers;

use App\Models\Achievement;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = Achievement::published()->latest('achievement_date')->paginate(12);
        $studentAchievements = Achievement::published()->where('type', 'student')->latest('achievement_date')->take(6)->get();
        $teacherAchievements = Achievement::published()->where('type', 'teacher')->latest('achievement_date')->take(6)->get();
        $schoolAchievements = Achievement::published()->where('type', 'school')->latest('achievement_date')->take(6)->get();

        return view('achievements.index', compact('achievements', 'studentAchievements', 'teacherAchievements', 'schoolAchievements'));
    }
}
