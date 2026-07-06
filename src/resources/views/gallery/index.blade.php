@extends('layouts.app')

@section('title', 'Galeri')

@section('content')
<div class="relative bg-gradient-to-br from-blue-600 to-blue-800">
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute inset-0 bg-black/30"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32">
        <nav class="flex mb-4 text-sm text-blue-100" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-2">
                <li><a href="{{ url('/') }}" class="hover:text-white transition">Beranda</a></li>
                <li><span class="mx-2">/</span></li>
                <li class="text-white font-medium">Galeri</li>
            </ol>
        </nav>
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Galeri</h1>
        <p class="text-xl text-blue-100 max-w-2xl">Dokumentasi kegiatan dan momen-momen berharga di SMA Negeri 3 Kabupaten Tangerang</p>
    </div>
</div>

<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($galleries->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($galleries as $gallery)
                    <a href="{{ route('gallery.show', $gallery->slug) }}" class="group block">
                        <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <div class="relative aspect-[4/3] overflow-hidden">
                                <img src="{{ $gallery->cover_image ? Storage::url($gallery->cover_image) : asset('images/placeholder-gallery.jpg') }}"
                                     alt="{{ $gallery->title }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                                <div class="absolute bottom-3 left-3 flex items-center text-white text-sm">
                                    <i class="fas fa-images mr-2"></i>
                                    <span>{{ $gallery->photos_count }} Foto</span>
                                </div>
                            </div>
                            <div class="p-5">
                                <h3 class="text-lg font-semibold text-gray-800 group-hover:text-blue-600 transition-colors">{{ $gallery->title }}</h3>
                                @if($gallery->description)
                                    <p class="mt-2 text-sm text-gray-500 line-clamp-2">{{ $gallery->description }}</p>
                                @endif
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="mt-8">
                {{ $galleries->links() }}
            </div>
        @else
            <div class="text-center py-20">
                <div class="w-24 h-24 mx-auto bg-gray-100 rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-images text-4xl text-gray-400"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-600 mb-2">Belum Ada Galeri</h3>
                <p class="text-gray-400">Belum ada album galeri yang tersedia saat ini. Silakan kembali lagi nanti.</p>
            </div>
        @endif
    </div>
</section>
@endsection
