@extends('layouts.app')

@section('title', $page->title)

@section('content')
    {{-- Hero Sub-header --}}
    <section class="relative pt-32 pb-16 bg-gradient-to-r from-blue-900 to-blue-800">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-4">{{ $page->title }}</h1>
                <nav class="flex justify-center text-sm text-blue-200" aria-label="Breadcrumb">
                    <ol class="flex items-center space-x-2">
                        <li>
                            <a href="{{ url('/') }}" class="hover:text-white transition">Beranda</a>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-chevron-right mx-2 text-xs"></i>
                            <span class="text-white">{{ $page->title }}</span>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    {{-- Content --}}
    <section class="py-12 sm:py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($page->featured_image)
                <div class="mb-8 rounded-2xl overflow-hidden shadow-lg">
                    <img src="{{ asset('storage/' . $page->featured_image) }}" alt="{{ $page->title }}" class="w-full h-auto">
                </div>
            @endif

            <article class="prose prose-lg max-w-none prose-headings:text-gray-900 prose-a:text-blue-600 prose-img:rounded-xl">
                {!! $page->content !!}
            </article>
        </div>
    </section>
@endsection
