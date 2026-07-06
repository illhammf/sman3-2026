@extends('layouts.app')

@section('title', $announcement->title)

@section('content')
<section class="relative pt-24 sm:pt-28 lg:pt-32 pb-10 sm:pb-12 lg:pb-16 bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 overflow-hidden">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex mb-6 text-xs sm:text-sm text-blue-200" aria-label="Breadcrumb">
            <ol class="inline-flex items-center flex-wrap gap-y-1">
                <li><a href="{{ url('/') }}" class="hover:text-white transition">Beranda</a></li>
                <li><span class="mx-2">/</span></li>
                <li><a href="{{ route('announcements.index') }}" class="hover:text-white transition">Pengumuman</a></li>
                <li><span class="mx-2">/</span></li>
                <li class="text-white font-medium">{{ $announcement->title }}</li>
            </ol>
        </nav>
        <h1 class="text-2xl sm:text-3xl lg:text-4xl xl:text-5xl font-extrabold text-white leading-tight mb-3">{{ $announcement->title }}</h1>
    </div>
</section>

<section class="py-8 sm:py-10 lg:py-12 bg-gray-50 reveal">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-xl shadow-md p-8">
        @if($announcement->is_important)
            <div class="flex items-center bg-amber-50 border border-amber-200 rounded-lg px-4 py-3 mb-6">
                <i class="fas fa-exclamation-triangle text-amber-500 mr-3"></i>
                <span class="text-amber-700 font-semibold text-sm">Pengumuman Penting</span>
            </div>
        @endif

        <div class="flex items-center text-gray-400 text-sm mb-6">
            <i class="far fa-calendar-alt mr-2"></i>
            <span>{{ \Carbon\Carbon::parse($announcement->published_at ?? $announcement->created_at)->format('d F Y') }}</span>
            @if($announcement->author)
                <span class="mx-2">|</span>
                <i class="fas fa-user mr-2"></i>
                <span>{{ $announcement->author }}</span>
            @endif
        </div>

        <div class="prose max-w-none text-gray-700 leading-relaxed">
            {!! nl2br(e($announcement->content)) !!}
        </div>

        <div class="mt-8 pt-6 border-t border-gray-100">
            <a href="{{ route('announcements.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium transition-colors">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke daftar pengumuman
            </a>
        </div>
    </div>
</div>
</section>
@endsection
