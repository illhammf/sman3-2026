@extends('layouts.app')

@section('title', 'Ekstrakurikuler')

@section('content')
<section class="relative pt-24 sm:pt-28 lg:pt-32 pb-10 sm:pb-12 lg:pb-16 bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 overflow-hidden">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex mb-6 text-xs sm:text-sm text-blue-200" aria-label="Breadcrumb">
            <ol class="inline-flex items-center flex-wrap gap-y-1">
                <li><a href="{{ url('/') }}" class="hover:text-white transition">Beranda</a></li>
                <li><span class="mx-2">/</span></li>
                <li class="text-white font-medium">Ekstrakurikuler</li>
            </ol>
        </nav>
        <h1 class="text-2xl sm:text-3xl lg:text-4xl xl:text-5xl font-extrabold text-white leading-tight mb-3">Ekstrakurikuler</h1>
        <p class="text-sm sm:text-base text-blue-100/80 max-w-2xl">Kegiatan pengembangan minat dan bakat siswa</p>
    </div>
</section>

<section class="py-8 sm:py-10 lg:py-12 bg-gray-50 reveal">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    @if($extracurriculars->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($extracurriculars as $item)
                <a href="{{ route('extracurriculars.show', $item->slug) }}" class="group block">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-2 h-full">
                        <div class="h-48 bg-gradient-to-br from-blue-100 to-blue-50 flex items-center justify-center overflow-hidden">
                            @if($item->photo)
                                <img src="{{ Storage::url($item->photo) }}" alt="{{ $item->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                            @else
                                <i class="fas fa-futbol text-6xl text-blue-400 group-hover:text-blue-600 transition-colors duration-300"></i>
                            @endif
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800 group-hover:text-blue-600 transition-colors duration-300">{{ $item->name }}</h3>
                            <p class="text-gray-500 mt-2 text-sm leading-relaxed">{{ Str::limit($item->description, 120) }}</p>
                            <div class="mt-4 pt-4 border-t border-gray-100 flex items-center justify-between text-sm">
                                <div class="flex items-center text-gray-500">
                                    <i class="fas fa-user-tie w-4 text-blue-500 mr-2"></i>
                                    <span>{{ $item->coach }}</span>
                                </div>
                                <div class="flex items-center text-gray-500">
                                    <i class="fas fa-clock w-4 text-blue-500 mr-2"></i>
                                    <span>{{ $item->schedule }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <div class="text-center py-16">
            <i class="fas fa-futbol text-6xl text-gray-300 mb-4"></i>
            <p class="text-gray-500 text-lg">Belum ada data ekstrakurikuler</p>
        </div>
    @endif
</div>
</section>
@endsection
