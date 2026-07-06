<?php

namespace App\Http\Controllers;

use App\Models\Announcement;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::published()->latest('published_at')->paginate(10);
        $importantAnnouncements = Announcement::published()->important()->latest('published_at')->take(5)->get();

        return view('announcements.index', compact('announcements', 'importantAnnouncements'));
    }

    public function show($slug)
    {
        $announcement = Announcement::where('slug', $slug)->published()->firstOrFail();
        return view('announcements.show', compact('announcement'));
    }
}
