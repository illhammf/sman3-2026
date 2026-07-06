@extends('layouts.app')

@section('title', 'Berita')

@section('content')
    {{-- Hero Sub-header --}}
    <section class="relative pt-32 pb-16 bg-gradient-to-r from-blue-900 to-blue-800">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-4">
                    @if(isset($category))
                        Berita - {{ $category->name }}
                    @else
                        Berita
                    @endif
                </h1>
                <nav class="flex justify-center text-sm text-blue-200" aria-label="Breadcrumb">
                    <ol class="flex items-center space-x-2">
                        <li>
                            <a href="{{ url('/') }}" class="hover:text-white transition">Beranda</a>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-chevron-right mx-2 text-xs"></i>
                            <span class="text-white">Berita</span>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    {{-- Content --}}
    <section class="py-12 sm:py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-3 lg:gap-10">
                {{-- Main Content --}}
                <div class="lg:col-span-2">
                    @if(isset($category))
                        <div class="mb-8">
                            <span class="inline-flex items-center px-4 py-2 bg-blue-100 text-blue-800 rounded-full text-sm font-semibold">
                                <i class="fas fa-filter mr-2"></i>
                                Kategori: {{ $category->name }}
                                <a href="{{ url('/berita') }}" class="ml-2 text-blue-600 hover:text-blue-800">
                                    <i class="fas fa-times"></i>
                                </a>
                            </span>
                        </div>
                    @endif

                    @if($news->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @foreach($news as $article)
                                <article class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 group">
                                    <a href="{{ route('news.show', $article->slug) }}">
                                        <div class="relative h-48 bg-gray-200 overflow-hidden">
                                            @if($article->featured_image)
                                                <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                            @else
                                                <div class="w-full h-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                                                    <i class="fas fa-newspaper text-white text-5xl opacity-50"></i>
                                                </div>
                                            @endif
                                            @if($article->category)
                                                <span class="absolute top-3 left-3 px-3 py-1 bg-blue-600 text-white text-xs font-semibold rounded-full">{{ $article->category->name }}</span>
                                            @endif
                                        </div>
                                    </a>
                                    <div class="p-5">
                                        <a href="{{ route('news.show', $article->slug) }}">
                                            <h2 class="text-lg font-bold text-gray-900 group-hover:text-blue-600 transition line-clamp-2 mb-2">{{ $article->title }}</h2>
                                        </a>
                                        <p class="text-gray-600 text-sm leading-relaxed line-clamp-3 mb-4">
                                            {{ Str::limit(strip_tags($article->content), 150) }}
                                        </p>
                                        <div class="flex items-center text-xs text-gray-500">
                                            <i class="far fa-calendar-alt mr-1"></i>
                                            {{ $article->published_at ? $article->published_at->format('d F Y') : $article->created_at->format('d F Y') }}
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>

                        <div class="mt-10">
                            {{ $news->links() }}
                        </div>
                    @else
                        <div class="text-center py-16">
                            <div class="w-20 h-20 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="far fa-newspaper text-gray-400 text-3xl"></i>
                            </div>
                            <p class="text-gray-500 text-lg">Belum ada berita tersedia</p>
                        </div>
                    @endif
                </div>

                {{-- Sidebar --}}
                <aside class="mt-10 lg:mt-0">
                    {{-- Categories --}}
                    @if(isset($categories) && $categories->count() > 0)
                        <div class="bg-white rounded-2xl shadow-md p-6 mb-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                                <i class="fas fa-folder text-blue-600 mr-2"></i>
                                Kategori
                            </h3>
                            <ul class="space-y-2">
                                @foreach($categories as $cat)
                                    <li>
                                        <a href="{{ url('/berita?kategori=' . $cat->slug) }}" class="flex items-center justify-between px-4 py-2 rounded-lg text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-700 transition">
                                            <span>{{ $cat->name }}</span>
                                            <span class="bg-gray-100 text-gray-500 px-2 py-0.5 rounded-full text-xs">{{ $cat->news_count ?? 0 }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Latest News --}}
                    @if(isset($latestNews) && $latestNews->count() > 0)
                        <div class="bg-white rounded-2xl shadow-md p-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                                <i class="fas fa-clock text-blue-600 mr-2"></i>
                                Berita Terbaru
                            </h3>
                            <ul class="space-y-4">
                                @foreach($latestNews as $latest)
                                    <li>
                                        <a href="{{ route('news.show', $latest->slug) }}" class="flex gap-3 group">
                                            <div class="w-16 h-16 rounded-lg bg-gray-200 flex-shrink-0 overflow-hidden">
                                                @if($latest->featured_image)
                                                    <img src="{{ asset('storage/' . $latest->featured_image) }}" alt="{{ $latest->title }}" class="w-full h-full object-cover">
                                                @else
                                                    <div class="w-full h-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                                                        <i class="fas fa-newspaper text-white text-lg"></i>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <h4 class="text-sm font-semibold text-gray-900 group-hover:text-blue-600 transition line-clamp-2">{{ $latest->title }}</h4>
                                                <p class="text-xs text-gray-500 mt-1">
                                                    <i class="far fa-calendar-alt mr-1"></i>
                                                    {{ $latest->created_at->format('d F Y') }}
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </aside>
            </div>
        </div>
    </section>
@endsection
