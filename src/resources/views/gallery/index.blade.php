@extends('layouts.app')

@section('title', 'Galeri')

@section('content')
<section class="relative pt-24 sm:pt-28 lg:pt-32 pb-10 sm:pb-12 lg:pb-16 bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 overflow-hidden">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex mb-6 text-xs sm:text-sm text-blue-200" aria-label="Breadcrumb">
            <ol class="inline-flex items-center flex-wrap gap-y-1">
                <li><a href="{{ url('/') }}" class="hover:text-white transition">Beranda</a></li>
                <li><span class="mx-2">/</span></li>
                <li class="text-white font-medium">Galeri</li>
            </ol>
        </nav>
        <h1 class="text-2xl sm:text-3xl lg:text-4xl xl:text-5xl font-extrabold text-white leading-tight mb-3">Galeri</h1>
        <p class="text-sm sm:text-base text-blue-100/80 max-w-2xl">Dokumentasi kegiatan dan momen-momen berharga di SMA Negeri 3 Kabupaten Tangerang</p>
    </div>
</section>

<section class="py-8 sm:py-10 lg:py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($galleries->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 lg:gap-8">
                @foreach($galleries as $gallery)
                    <a href="{{ route('gallery.show', $gallery->slug) }}" class="group block reveal">
                        <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                            <div class="relative aspect-[4/3] overflow-hidden">
                                <img src="{{ $gallery->cover_image ? Storage::url($gallery->cover_image) : asset('images/placeholder-gallery.jpg') }}"
                                     alt="{{ $gallery->title }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                     loading="lazy">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                                <div class="absolute bottom-3 left-3 flex items-center text-white text-xs sm:text-sm bg-black/30 backdrop-blur-sm px-2.5 py-1 rounded-full">
                                    <i class="fas fa-images mr-1.5"></i>
                                    <span>{{ $gallery->photos_count }} Foto</span>
                                </div>
                            </div>
                            <div class="p-4 sm:p-5">
                                <h3 class="text-sm sm:text-base lg:text-lg font-semibold text-gray-800 group-hover:text-blue-600 transition-colors">{{ $gallery->title }}</h3>
                                @if($gallery->description)
                                    <p class="mt-1.5 text-xs sm:text-sm text-gray-500 line-clamp-2">{{ $gallery->description }}</p>
                                @endif
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="mt-6 sm:mt-8 reveal">
                {{ $galleries->links() }}
            </div>
        @else
            <div class="text-center py-16 sm:py-20 reveal">
                <div class="w-20 h-20 sm:w-24 sm:h-24 mx-auto bg-gray-100 rounded-full flex items-center justify-center mb-5 sm:mb-6">
                    <i class="fas fa-images text-3xl sm:text-4xl text-gray-400"></i>
                </div>
                <h3 class="text-lg sm:text-xl font-semibold text-gray-600 mb-2">Belum Ada Galeri</h3>
                <p class="text-sm sm:text-base text-gray-400">Belum ada album galeri yang tersedia saat ini. Silakan kembali lagi nanti.</p>
            </div>
        @endif
    </div>
</section>
@endsection
