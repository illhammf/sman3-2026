@extends('layouts.app')

@section('title', $announcement->title)

@section('content')
<div class="bg-gradient-to-r from-blue-600 to-blue-800 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <a href="{{ route('announcements.index') }}" class="inline-flex items-center text-blue-200 hover:text-white transition-colors mb-4">
            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Pengumuman
        </a>
        <h1 class="text-3xl font-bold text-white">{{ $announcement->title }}</h1>
    </div>
</div>

<div class="max-w-4xl mx-auto px-4 py-12">
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
@endsection
