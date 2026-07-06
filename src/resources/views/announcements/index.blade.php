@extends('layouts.app')

@section('title', 'Pengumuman')

@section('content')
<section class="relative pt-24 sm:pt-28 lg:pt-32 pb-10 sm:pb-12 lg:pb-16 bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 overflow-hidden">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex mb-6 text-xs sm:text-sm text-blue-200" aria-label="Breadcrumb">
            <ol class="inline-flex items-center flex-wrap gap-y-1">
                <li><a href="{{ url('/') }}" class="hover:text-white transition">Beranda</a></li>
                <li><span class="mx-2">/</span></li>
                <li class="text-white font-medium">Pengumuman</li>
            </ol>
        </nav>
        <h1 class="text-2xl sm:text-3xl lg:text-4xl xl:text-5xl font-extrabold text-white leading-tight mb-3">Pengumuman</h1>
        <p class="text-sm sm:text-base text-blue-100/80 max-w-2xl">Informasi resmi dari SMA Negeri 3 Kabupaten Tangerang</p>
    </div>
</section>

<section class="py-8 sm:py-10 lg:py-12 bg-gray-50 reveal">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    @if($importantAnnouncements && $importantAnnouncements->count() > 0)
        <div class="mb-10">
            <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-exclamation-triangle text-amber-500 mr-2"></i>
                Pengumuman Penting
            </h2>
            <div class="space-y-4">
                @foreach($importantAnnouncements as $item)
                    <a href="{{ route('announcements.show', $item->slug) }}" class="block bg-amber-50 border-l-4 border-amber-500 rounded-r-lg p-5 hover:bg-amber-100 transition-colors duration-200">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mt-1">
                                <i class="fas fa-bullhorn text-amber-500"></i>
                            </div>
                            <div class="ml-3 flex-1">
                                <h3 class="font-bold text-gray-800">{{ $item->title }}</h3>
                                <p class="text-gray-600 text-sm mt-1">{{ Str::limit(strip_tags($item->content), 200) }}</p>
                                <p class="text-amber-600 text-xs mt-2">
                                    <i class="far fa-calendar-alt mr-1"></i>
                                    {{ \Carbon\Carbon::parse($item->published_at ?? $item->created_at)->format('d F Y') }}
                                </p>
                            </div>
                            <i class="fas fa-chevron-right text-amber-400 mt-1"></i>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif

    @if($announcements->count() > 0)
        <div class="space-y-6">
            @foreach($announcements as $item)
                <a href="{{ route('announcements.show', $item->slug) }}" class="block bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-all duration-200 hover:-translate-y-0.5">
                    <div class="flex items-start justify-between">
                        <div class="flex-1">
                            <h3 class="text-lg font-bold text-gray-800 hover:text-blue-600 transition-colors">{{ $item->title }}</h3>
                            <p class="text-gray-500 text-sm mt-2 leading-relaxed">{{ Str::limit(strip_tags($item->content), 250) }}</p>
                            <p class="text-gray-400 text-xs mt-3">
                                <i class="far fa-calendar-alt mr-1"></i>
                                {{ \Carbon\Carbon::parse($item->published_at ?? $item->created_at)->format('d F Y') }}
                            </p>
                        </div>
                        <i class="fas fa-chevron-right text-gray-300 mt-2 ml-4"></i>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $announcements->links() }}
        </div>
    @else
        <div class="text-center py-16">
            <i class="fas fa-bullhorn text-6xl text-gray-300 mb-4"></i>
            <p class="text-gray-500 text-lg">Belum ada pengumuman</p>
        </div>
    @endif
</div>
</section>
@endsection
