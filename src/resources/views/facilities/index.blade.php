@extends('layouts.app')

@section('title', 'Fasilitas')

@section('content')
<section class="relative pt-24 sm:pt-28 lg:pt-32 pb-10 sm:pb-12 lg:pb-16 bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 overflow-hidden">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex mb-6 text-xs sm:text-sm text-blue-200" aria-label="Breadcrumb">
            <ol class="inline-flex items-center flex-wrap gap-y-1">
                <li><a href="{{ url('/') }}" class="hover:text-white transition">Beranda</a></li>
                <li><span class="mx-2">/</span></li>
                <li class="text-white font-medium">Fasilitas</li>
            </ol>
        </nav>
        <h1 class="text-2xl sm:text-3xl lg:text-4xl xl:text-5xl font-extrabold text-white leading-tight mb-3">Fasilitas</h1>
        <p class="text-sm sm:text-base text-blue-100/80 max-w-2xl">Sarana dan prasarana pendukung kegiatan belajar mengajar</p>
    </div>
</section>

<section class="py-8 sm:py-10 lg:py-12 bg-gray-50 reveal">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    @if($facilities->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($facilities as $item)
                <div class="group relative bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <div class="h-52 overflow-hidden">
                        @if($item->photo)
                            <img src="{{ Storage::url($item->photo) }}" alt="{{ $item->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-blue-100 to-blue-50 flex items-center justify-center">
                                <i class="fas fa-building text-6xl text-blue-300 group-hover:text-blue-400 transition-colors duration-300"></i>
                            </div>
                        @endif
                    </div>
                    <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/70 to-transparent p-6 pt-12">
                        <h3 class="text-lg font-bold text-white">{{ $item->name }}</h3>
                        @if($item->description)
                            <p class="text-gray-200 text-sm mt-1 line-clamp-2">{{ $item->description }}</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-16">
            <i class="fas fa-building text-6xl text-gray-300 mb-4"></i>
            <p class="text-gray-500 text-lg">Belum ada data fasilitas</p>
        </div>
    @endif
</div>
</section>
@endsection
