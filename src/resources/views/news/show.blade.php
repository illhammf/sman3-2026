@extends('layouts.app')

@section('title', $article->title)

@section('meta_description', Str::limit(strip_tags($article->content), 160))

@section('content')
    {{-- Hero Sub-header --}}
    <section class="relative pt-32 pb-16 bg-gradient-to-r from-blue-900 to-blue-800">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <nav class="flex justify-center text-sm text-blue-200 mb-4" aria-label="Breadcrumb">
                    <ol class="flex items-center space-x-2">
                        <li><a href="{{ url('/') }}" class="hover:text-white transition">Beranda</a></li>
                        <li class="flex items-center">
                            <i class="fas fa-chevron-right mx-2 text-xs"></i>
                            <a href="{{ url('/berita') }}" class="hover:text-white transition">Berita</a>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-chevron-right mx-2 text-xs"></i>
                            <span class="text-white">{{ $article->title }}</span>
                        </li>
                    </ol>
                </nav>
                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-white leading-tight">{{ $article->title }}</h1>
            </div>
        </div>
    </section>

    {{-- Content --}}
    <section class="py-12 sm:py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-3 lg:gap-10">
                {{-- Main Article --}}
                <div class="lg:col-span-2">
                    <article class="bg-white rounded-2xl shadow-md overflow-hidden">
                        @if($article->featured_image)
                            <div class="h-64 sm:h-80 lg:h-96 bg-gray-200">
                                <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
                            </div>
                        @endif

                        <div class="p-6 sm:p-8">
                            {{-- Meta --}}
                            <div class="flex flex-wrap items-center gap-4 mb-6 text-sm text-gray-500">
                                @if($article->category)
                                    <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-semibold">
                                        {{ $article->category->name }}
                                    </span>
                                @endif
                                <span class="flex items-center">
                                    <i class="far fa-user mr-1"></i>
                                    {{ $article->author ?? 'Admin' }}
                                </span>
                                <span class="flex items-center">
                                    <i class="far fa-calendar-alt mr-1"></i>
                                    {{ $article->published_at ? $article->published_at->format('d F Y') : $article->created_at->format('d F Y') }}
                                </span>
                            </div>

                            {{-- Content --}}
                            <div class="prose prose-lg max-w-none prose-headings:text-gray-900 prose-a:text-blue-600 prose-img:rounded-xl prose-img:shadow-md">
                                {!! $article->content !!}
                            </div>

                            {{-- Share Buttons --}}
                            <div class="mt-10 pt-8 border-t border-gray-200">
                                <div class="flex flex-wrap items-center gap-3">
                                    <span class="text-sm font-semibold text-gray-700">Bagikan:</span>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="w-10 h-10 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition" title="Bagikan ke Facebook">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?text={{ urlencode($article->title) }}&url={{ urlencode(request()->url()) }}" target="_blank" class="w-10 h-10 bg-sky-500 text-white rounded-full flex items-center justify-center hover:bg-sky-600 transition" title="Bagikan ke Twitter">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="https://wa.me/?text={{ urlencode($article->title . ' ' . request()->url()) }}" target="_blank" class="w-10 h-10 bg-green-500 text-white rounded-full flex items-center justify-center hover:bg-green-600 transition" title="Bagikan ke WhatsApp">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                    <a href="https://telegram.me/share/url?url={{ urlencode(request()->url()) }}&text={{ urlencode($article->title) }}" target="_blank" class="w-10 h-10 bg-blue-400 text-white rounded-full flex items-center justify-center hover:bg-blue-500 transition" title="Bagikan ke Telegram">
                                        <i class="fab fa-telegram-plane"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </article>

                    {{-- Related News --}}
                    @if(isset($relatedNews) && $relatedNews->count() > 0)
                        <div class="mt-12">
                            <h3 class="text-2xl font-bold text-gray-900 mb-6">Berita Terkait</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @foreach($relatedNews as $related)
                                    <a href="{{ route('news.show', $related->slug) }}" class="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300">
                                        <div class="relative h-40 bg-gray-200 overflow-hidden">
                                            @if($related->featured_image)
                                                <img src="{{ asset('storage/' . $related->featured_image) }}" alt="{{ $related->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                            @else
                                                <div class="w-full h-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                                                    <i class="fas fa-newspaper text-white text-4xl opacity-50"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="p-4">
                                            <h4 class="font-semibold text-gray-900 group-hover:text-blue-600 transition line-clamp-2">{{ $related->title }}</h4>
                                            <p class="text-xs text-gray-500 mt-2">
                                                <i class="far fa-calendar-alt mr-1"></i>
                                                {{ $related->created_at->format('d F Y') }}
                                            </p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                {{-- Sidebar --}}
                <aside class="mt-10 lg:mt-0">
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
