<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\News;
use App\Models\Achievement;
use App\Models\Announcement;
use App\Models\AcademicEvent;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::active()->orderBy('sort_order')->get();
        $news = News::published()->latest('published_at')->take(6)->get();
        $achievements = Achievement::published()->latest('achievement_date')->take(6)->get();
        $announcements = Announcement::published()->latest('published_at')->take(3)->get();
        $upcomingEvents = AcademicEvent::published()
            ->where('start_date', '>=', now())
            ->orderBy('start_date')
            ->take(5)
            ->get();

        return view('home.index', compact('sliders', 'news', 'achievements', 'announcements', 'upcomingEvents'));
    }
}
