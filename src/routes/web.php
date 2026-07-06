<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PPDBController;
use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AcademicCalendarController;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

Livewire::setUpdateRoute(function ($handle) {
    return Route::post(config('app.asset_prefix') . '/livewire/update', $handle);
});

Livewire::setScriptRoute(function ($handle) {
    return Route::get(config('app.asset_prefix') . '/livewire/livewire.js', $handle);
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('profil')->group(function () {
    Route::get('/{slug}', [PageController::class, 'show'])->name('pages.show');
});

Route::get('berita', [NewsController::class, 'index'])->name('news.index');
Route::get('berita/kategori/{slug}', [NewsController::class, 'category'])->name('news.category');
Route::get('berita/{slug}', [NewsController::class, 'show'])->name('news.show');

Route::get('guru', [TeacherController::class, 'index'])->name('teachers.index');
Route::get('staff', [StaffController::class, 'index'])->name('staff.index');

Route::get('galeri', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('galeri/{slug}', [GalleryController::class, 'show'])->name('gallery.show');

Route::get('kontak', [ContactController::class, 'index'])->name('contact.index');
Route::post('kontak', [ContactController::class, 'store'])->name('contact.store');

Route::prefix('ppdb')->name('ppdb.')->group(function () {
    Route::get('/', [PPDBController::class, 'index'])->name('index');
    Route::get('daftar', [PPDBController::class, 'create'])->name('create');
    Route::post('daftar', [PPDBController::class, 'store'])->name('store');
});

Route::get('ekstrakurikuler', [ExtracurricularController::class, 'index'])->name('extracurriculars.index');
Route::get('ekstrakurikuler/{slug}', [ExtracurricularController::class, 'show'])->name('extracurriculars.show');

Route::get('fasilitas', [FacilityController::class, 'index'])->name('facilities.index');

Route::get('prestasi', [AchievementController::class, 'index'])->name('achievements.index');

Route::get('pengumuman', [AnnouncementController::class, 'index'])->name('announcements.index');
Route::get('pengumuman/{slug}', [AnnouncementController::class, 'show'])->name('announcements.show');

Route::get('kalender-akademik', [AcademicCalendarController::class, 'index'])->name('academic.index');
