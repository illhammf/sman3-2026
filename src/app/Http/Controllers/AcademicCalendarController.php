<?php

namespace App\Http\Controllers;

use App\Models\AcademicEvent;

class AcademicCalendarController extends Controller
{
    public function index()
    {
        $events = AcademicEvent::published()
            ->where('start_date', '>=', now()->startOfYear())
            ->orderBy('start_date')
            ->get();

        $groupedEvents = $events->groupBy(function ($event) {
            return $event->start_date->format('F Y');
        });

        return view('academic.index', compact('events', 'groupedEvents'));
    }
}
