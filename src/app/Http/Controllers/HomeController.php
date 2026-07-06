<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\News;
use App\Models\Achievement;
use App\Models\Announcement;
use App\Models\AcademicEvent;
use App\Models\SuperiorityFeature;
use App\Models\Setting;

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
        $superiorityFeatures = SuperiorityFeature::active()->orderBy('sort_order')->get();

        $settings = Setting::whereIn('key', [
            'school_name', 'school_address', 'school_phone', 'school_email',
            'school_vision', 'facebook_url', 'instagram_url', 'youtube_url', 'tiktok_url',
            'twitter_url', 'ppdb_is_open',
        ])->get()->keyBy('key');

        return view('home.index', compact(
            'sliders', 'news', 'achievements', 'announcements', 'upcomingEvents',
            'superiorityFeatures', 'settings'
        ));
    }
}
