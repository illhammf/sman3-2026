<?php

namespace App\Http\Controllers;

use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::published()->latest()->get();
        return view('gallery.index', compact('galleries'));
    }

    public function show($slug)
    {
        $gallery = Gallery::where('slug', $slug)->published()->firstOrFail();
        return view('gallery.show', compact('gallery'));
    }
}
