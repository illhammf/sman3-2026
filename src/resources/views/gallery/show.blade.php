@extends('layouts.app')

@section('title', $gallery->title)

@push('styles')
<style>
.masonry-grid {
    column-count: 3;
    column-gap: 1.5rem;
}
.masonry-grid > div {
    break-inside: avoid;
    margin-bottom: 1.5rem;
}
@media (max-width: 1024px) {
    .masonry-grid { column-count: 2; }
}
@media (max-width: 640px) {
    .masonry-grid { column-count: 1; }
}
#lightbox {
    display: none;
    position: fixed;
    inset: 0;
    z-index: 9999;
    background: rgba(0,0,0,0.9);
    align-items: center;
    justify-content: center;
    cursor: pointer;
}
#lightbox.active {
    display: flex;
}
#lightbox img {
    max-width: 90%;
    max-height: 90%;
    object-fit: contain;
    border-radius: 0.5rem;
}
</style>
@endpush

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
                <li><a href="{{ route('gallery.index') }}" class="hover:text-white transition">Galeri</a></li>
                <li><span class="mx-2">/</span></li>
                <li class="text-white font-medium">{{ $gallery->title }}</li>
            </ol>
        </nav>
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">{{ $gallery->title }}</h1>
        @if($gallery->description)
            <p class="text-xl text-blue-100 max-w-3xl">{{ $gallery->description }}</p>
        @endif
    </div>
</div>

<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($gallery->images->count() > 0)
            <div class="masonry-grid">
                @foreach($gallery->images as $image)
                    <div class="group cursor-pointer" onclick="openLightbox('{{ Storage::url($image->file_path) }}')">
                        <div class="rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 relative">
                            <img src="{{ Storage::url($image->file_path) }}"
                                 alt="{{ $image->caption ?? $gallery->title }}"
                                 class="w-full h-auto object-cover group-hover:scale-105 transition-transform duration-500"
                                 loading="lazy">
                            @if($image->caption)
                                <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/70 to-transparent p-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <p class="text-white text-sm">{{ $image->caption }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-20">
                <div class="w-24 h-24 mx-auto bg-gray-100 rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-image text-4xl text-gray-400"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-600 mb-2">Belum Ada Gambar</h3>
                <p class="text-gray-400">Belum ada gambar yang tersedia di album ini.</p>
            </div>
        @endif
    </div>
</section>

<div id="lightbox" onclick="closeLightbox()">
    <button onclick="closeLightbox()" class="absolute top-4 right-4 text-white text-3xl hover:text-gray-300 transition">&times;</button>
    <img id="lightbox-img" src="" alt="Gallery Image">
</div>
@endsection

@push('scripts')
<script>
function openLightbox(src) {
    document.getElementById('lightbox-img').src = src;
    document.getElementById('lightbox').classList.add('active');
    document.body.style.overflow = 'hidden';
}
function closeLightbox() {
    document.getElementById('lightbox').classList.remove('active');
    document.body.style.overflow = '';
}
</script>
@endpush
