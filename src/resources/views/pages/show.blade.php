@extends('layouts.app')

@section('title', $page->title)

@section('content')
    {{-- Hero Sub-header --}}
    <section class="relative pt-24 sm:pt-28 lg:pt-32 pb-10 sm:pb-12 lg:pb-16 bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 overflow-hidden">
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex mb-6 text-xs sm:text-sm text-blue-200" aria-label="Breadcrumb">
                <ol class="inline-flex items-center flex-wrap gap-y-1">
                    <li><a href="{{ url('/') }}" class="hover:text-white transition">Beranda</a></li>
                    <li><span class="mx-2">/</span></li>
                    <li class="text-white font-medium">{{ $page->title }}</li>
                </ol>
            </nav>
            <h1 class="text-2xl sm:text-3xl lg:text-4xl xl:text-5xl font-extrabold text-white leading-tight mb-3">{{ $page->title }}</h1>
        </div>
    </section>

    {{-- Content --}}
    <section class="py-8 sm:py-10 lg:py-12 bg-white reveal">
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
