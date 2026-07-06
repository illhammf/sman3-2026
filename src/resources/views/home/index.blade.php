@extends('layouts.app')

@section('title', config('app.name', 'SMA Negeri 3 Kabupaten Tangerang') . ' - Website Resmi')

@section('content')
    @php $heroSliders = $sliders ?? collect(); @endphp

    {{-- Hero Section --}}
    <section id="hero-section" class="relative min-h-screen flex items-center justify-center overflow-hidden">
        @if($heroSliders->count() > 0)
            <div class="absolute inset-0">
                @foreach($heroSliders as $index => $slider)
                    <div class="hero-slide absolute inset-0 {{ $index === 0 ? 'opacity-100' : 'opacity-0' }} transition-opacity duration-1000">
                        <img src="{{ asset('storage/' . $slider->image) }}" alt="{{ $slider->title }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/90 via-blue-800/80 to-indigo-900/90"></div>
                    </div>
                @endforeach
            </div>
            @if($heroSliders->count() > 1)
                <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex gap-3 z-20">
                    @foreach($heroSliders as $index => $slider)
                        <button class="hero-dot w-3 h-3 rounded-full transition-all duration-300 {{ $index === 0 ? 'bg-white scale-110' : 'bg-white/40 hover:bg-white/70' }}" data-index="{{ $index }}"></button>
                    @endforeach
                </div>
            @endif
        @else
            <div class="absolute inset-0">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-900/95 via-blue-800/90 to-indigo-900/95"></div>
                <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1580582932707-520aed937b7b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80')] bg-cover bg-center bg-blend-overlay opacity-60"></div>
            </div>
        @endif

        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wMyI+PHBhdGggZD0iTTM2IDE4YzEuNjU3IDAgMy0xLjM0MyAzLTNzLTEuMzQzLTMtMy0zLTMgMS4zNDMtMyAzIDEuMzQzIDMgMyAzem0tMTIgMGMxLjY1NyAwIDMtMS4zNDMgMy0zcy0xLjM0My0zLTMtMy0zIDEuMzQzLTMgMyAxLjM0MyAzIDMgM3oiLz48L2c+PC9nPjwvc3ZnPg==')] opacity-30 z-[1]"></div>

        <div class="relative z-10 text-center px-4 sm:px-6 lg:px-8 max-w-5xl mx-auto w-full">
            @if($heroSliders->count() > 0)
                @foreach($heroSliders as $index => $slider)
                    <div class="hero-content {{ $index === 0 ? 'block' : 'hidden' }}" data-index="{{ $index }}">
                        <div class="inline-flex items-center gap-2 px-4 py-1.5 bg-white/10 backdrop-blur-sm text-white/90 text-sm font-medium rounded-full border border-white/10 mb-6 reveal">
                            <i class="fas fa-graduation-cap"></i>
                            <span>{{ $schoolName ?? 'SMA Negeri 3 Kabupaten Tangerang' }}</span>
                        </div>
                        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-extrabold text-white leading-tight mb-6 drop-shadow-lg reveal">
                            {{ $slider->title }}
                            @if($slider->subtitle)
                                <span class="block text-blue-200 text-xl md:text-2xl lg:text-3xl xl:text-4xl mt-3 font-bold">{{ $slider->subtitle }}</span>
                            @endif
                        </h1>
                        @if($slider->description)
                            <p class="text-base sm:text-lg md:text-xl text-blue-100/90 mb-10 max-w-3xl mx-auto leading-relaxed reveal">
                                {{ $slider->description }}
                            </p>
                        @endif
                        <div class="flex flex-col sm:flex-row gap-4 justify-center reveal">
                            <a href="{{ url('/profil/sejarah') }}" class="inline-flex items-center px-6 sm:px-8 py-3 sm:py-4 bg-white text-blue-900 font-bold rounded-full hover:bg-blue-50 transition-all shadow-2xl text-base sm:text-lg hover:scale-105 active:scale-95">
                                <i class="fas fa-school mr-2"></i>
                                Profil Sekolah
                            </a>
                            @if($slider->link)
                                <a href="{{ $slider->link }}" class="inline-flex items-center px-6 sm:px-8 py-3 sm:py-4 bg-yellow-400 text-gray-900 font-bold rounded-full hover:bg-yellow-300 transition-all shadow-2xl text-base sm:text-lg hover:scale-105 active:scale-95">
                                    <i class="fas fa-arrow-right mr-2"></i>
                                    {{ $slider->link_text ?? 'Selengkapnya' }}
                                </a>
                            @else
                                <a href="{{ url('/ppdb') }}" class="inline-flex items-center px-6 sm:px-8 py-3 sm:py-4 bg-yellow-400 text-gray-900 font-bold rounded-full hover:bg-yellow-300 transition-all shadow-2xl text-base sm:text-lg hover:scale-105 active:scale-95">
                                    <i class="fas fa-user-plus mr-2"></i>
                                    PPDB {{ date('Y') }}
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
                <div class="inline-flex items-center gap-2 px-4 py-1.5 bg-white/10 backdrop-blur-sm text-white/90 text-sm font-medium rounded-full border border-white/10 mb-6 reveal">
                    <i class="fas fa-graduation-cap"></i>
                    <span>SMA Negeri 3 Kabupaten Tangerang</span>
                </div>
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-extrabold text-white leading-tight mb-6 drop-shadow-lg reveal">
                    SMA Negeri 3
                    <span class="block text-blue-200 text-xl md:text-2xl lg:text-3xl xl:text-4xl mt-3">Kabupaten Tangerang</span>
                </h1>
                <p class="text-base sm:text-lg md:text-xl text-blue-100/90 mb-10 max-w-3xl mx-auto leading-relaxed reveal">
                    Mewujudkan generasi unggul, beriman, bertakwa, berakhlak mulia, dan berwawasan lingkungan
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center reveal">
                    <a href="{{ url('/profil/sejarah') }}" class="inline-flex items-center px-6 sm:px-8 py-3 sm:py-4 bg-white text-blue-900 font-bold rounded-full hover:bg-blue-50 transition-all shadow-2xl text-base sm:text-lg hover:scale-105 active:scale-95">
                        <i class="fas fa-school mr-2"></i>
                        Profil Sekolah
                    </a>
                    <a href="{{ url('/ppdb') }}" class="inline-flex items-center px-6 sm:px-8 py-3 sm:py-4 bg-yellow-400 text-gray-900 font-bold rounded-full hover:bg-yellow-300 transition-all shadow-2xl text-base sm:text-lg hover:scale-105 active:scale-95">
                        <i class="fas fa-user-plus mr-2"></i>
                        PPDB {{ date('Y') }}
                    </a>
                </div>
            @endif
        </div>

        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce z-10">
            <div class="w-6 h-10 border-2 border-white/30 rounded-full flex justify-center">
                <div class="w-1.5 h-3 bg-white/60 rounded-full mt-2 animate-pulse"></div>
            </div>
        </div>
    </section>

    {{-- Fitur Unggulan --}}
    @if(isset($superiorityFeatures) && $superiorityFeatures->count() > 0)
        <section class="relative py-16 sm:py-20 lg:py-24 bg-white overflow-hidden">
            <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r from-transparent via-blue-500 to-transparent"></div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12 lg:mb-16 reveal">
                    <span class="inline-flex items-center gap-2 px-4 py-1.5 bg-blue-50 text-blue-700 text-sm font-semibold rounded-full mb-4">
                        <i class="fas fa-star"></i>
                        Keunggulan Sekolah
                    </span>
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Mengapa Memilih SMA Negeri 3?</h2>
                    <div class="w-20 h-1 bg-blue-600 mx-auto rounded-full"></div>
                </div>

                @php
                    $colorMap = [
                        'blue' => ['bg' => 'bg-blue-50/80', 'icon' => 'bg-blue-100', 'iconColor' => 'text-blue-600', 'border' => 'hover:border-blue-300', 'badge' => 'bg-blue-500'],
                        'green' => ['bg' => 'bg-emerald-50/80', 'icon' => 'bg-emerald-100', 'iconColor' => 'text-emerald-600', 'border' => 'hover:border-emerald-300', 'badge' => 'bg-emerald-500'],
                        'yellow' => ['bg' => 'bg-amber-50/80', 'icon' => 'bg-amber-100', 'iconColor' => 'text-amber-600', 'border' => 'hover:border-amber-300', 'badge' => 'bg-amber-500'],
                        'red' => ['bg' => 'bg-red-50/80', 'icon' => 'bg-red-100', 'iconColor' => 'text-red-600', 'border' => 'hover:border-red-300', 'badge' => 'bg-red-500'],
                        'purple' => ['bg' => 'bg-purple-50/80', 'icon' => 'bg-purple-100', 'iconColor' => 'text-purple-600', 'border' => 'hover:border-purple-300', 'badge' => 'bg-purple-500'],
                        'indigo' => ['bg' => 'bg-indigo-50/80', 'icon' => 'bg-indigo-100', 'iconColor' => 'text-indigo-600', 'border' => 'hover:border-indigo-300', 'badge' => 'bg-indigo-500'],
                        'pink' => ['bg' => 'bg-pink-50/80', 'icon' => 'bg-pink-100', 'iconColor' => 'text-pink-600', 'border' => 'hover:border-pink-300', 'badge' => 'bg-pink-500'],
                        'orange' => ['bg' => 'bg-orange-50/80', 'icon' => 'bg-orange-100', 'iconColor' => 'text-orange-600', 'border' => 'hover:border-orange-300', 'badge' => 'bg-orange-500'],
                        'teal' => ['bg' => 'bg-teal-50/80', 'icon' => 'bg-teal-100', 'iconColor' => 'text-teal-600', 'border' => 'hover:border-teal-300', 'badge' => 'bg-teal-500'],
                        'cyan' => ['bg' => 'bg-cyan-50/80', 'icon' => 'bg-cyan-100', 'iconColor' => 'text-cyan-600', 'border' => 'hover:border-cyan-300', 'badge' => 'bg-cyan-500'],
                    ];
                @endphp

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-6">
                    @foreach($superiorityFeatures as $i => $feature)
                        @php
                            $colors = $colorMap[$feature->color] ?? $colorMap['blue'];
                            $delay = ($i * 100);
                        @endphp
                        <div class="group relative p-6 lg:p-8 rounded-2xl border border-gray-100 {{ $colors['bg'] }} {{ $colors['border'] }} transition-all duration-300 hover:shadow-lg hover:-translate-y-1 reveal" style="transition-delay: {{ $delay }}ms">
                            <div class="absolute top-0 left-0 w-full h-1 {{ $colors['badge'] }} rounded-t-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            @if($feature->image)
                                <div class="w-14 h-14 lg:w-16 lg:h-16 rounded-xl overflow-hidden mb-5 ring-1 ring-gray-200">
                                    <img src="{{ asset('storage/' . $feature->image) }}" alt="{{ $feature->title }}" class="w-full h-full object-cover">
                                </div>
                            @elseif($feature->icon)
                                <div class="w-14 h-14 lg:w-16 lg:h-16 rounded-xl {{ $colors['icon'] }} flex items-center justify-center mb-5 group-hover:scale-110 transition-transform">
                                    <i class="{{ $feature->icon }} {{ $colors['iconColor'] }} text-xl lg:text-2xl"></i>
                                </div>
                            @endif
                            <h3 class="text-base lg:text-lg font-bold text-gray-900 mb-2.5">{{ $feature->title }}</h3>
                            <p class="text-gray-600 text-xs lg:text-sm leading-relaxed">{{ $feature->description }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Stats Section --}}
    <section class="relative py-16 sm:py-20 lg:py-24 bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 overflow-hidden">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHZpZXdCb3g9IjAgMCA0MCA0MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNMCAwaDQwdjQwSDB6IiBmaWxsPSJub25lIi8+PHBhdGggZD0iTTI1IDIwaC0xMHYtMTBoMTB6TTEwIDI1aDEwdjEwSDEweiIgZmlsbD0iI2ZmZiIgZmlsbC1vcGFjaXR5PSIwLjAyIi8+PC9zdmc+')] opacity-50"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 reveal">
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-white mb-4">Dalam Angka</h2>
                <div class="w-20 h-1 bg-blue-400 mx-auto rounded-full"></div>
            </div>
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                <div class="relative bg-white/10 backdrop-blur-sm rounded-2xl p-6 sm:p-8 text-center border border-white/10 hover:bg-white/15 transition-all group reveal">
                    <div class="w-12 h-12 sm:w-16 sm:h-16 bg-blue-400/20 rounded-2xl flex items-center justify-center mx-auto mb-3 sm:mb-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-chalkboard-teacher text-white text-xl sm:text-3xl"></i>
                    </div>
                    <div class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-1 counter font-mono" data-target="65">0</div>
                    <div class="text-blue-200 text-xs sm:text-sm font-medium">Tenaga Pendidik</div>
                </div>
                <div class="relative bg-white/10 backdrop-blur-sm rounded-2xl p-6 sm:p-8 text-center border border-white/10 hover:bg-white/15 transition-all group reveal">
                    <div class="w-12 h-12 sm:w-16 sm:h-16 bg-emerald-400/20 rounded-2xl flex items-center justify-center mx-auto mb-3 sm:mb-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-user-graduate text-white text-xl sm:text-3xl"></i>
                    </div>
                    <div class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-1 counter font-mono" data-target="1080">0</div>
                    <div class="text-blue-200 text-xs sm:text-sm font-medium">Siswa Aktif</div>
                </div>
                <div class="relative bg-white/10 backdrop-blur-sm rounded-2xl p-6 sm:p-8 text-center border border-white/10 hover:bg-white/15 transition-all group reveal">
                    <div class="w-12 h-12 sm:w-16 sm:h-16 bg-amber-400/20 rounded-2xl flex items-center justify-center mx-auto mb-3 sm:mb-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-trophy text-white text-xl sm:text-3xl"></i>
                    </div>
                    <div class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-1 counter font-mono" data-target="156">0</div>
                    <div class="text-blue-200 text-xs sm:text-sm font-medium">Prestasi</div>
                </div>
                <div class="relative bg-white/10 backdrop-blur-sm rounded-2xl p-6 sm:p-8 text-center border border-white/10 hover:bg-white/15 transition-all group reveal">
                    <div class="w-12 h-12 sm:w-16 sm:h-16 bg-purple-400/20 rounded-2xl flex items-center justify-center mx-auto mb-3 sm:mb-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-building text-white text-xl sm:text-3xl"></i>
                    </div>
                    <div class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-1 counter font-mono" data-target="24">0</div>
                    <div class="text-blue-200 text-xs sm:text-sm font-medium">Fasilitas</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Berita Terbaru --}}
    <section class="relative py-16 sm:py-20 lg:py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 lg:mb-16 reveal">
                <span class="inline-flex items-center gap-2 px-4 py-1.5 bg-blue-50 text-blue-700 text-sm font-semibold rounded-full mb-4">
                    <i class="fas fa-newspaper"></i>
                    Informasi Terkini
                </span>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Berita Terbaru</h2>
                <div class="w-20 h-1 bg-blue-600 mx-auto rounded-full"></div>
                <p class="text-gray-600 mt-4 max-w-2xl mx-auto text-sm sm:text-base">Ikuti perkembangan dan kegiatan terbaru di SMA Negeri 3 Kabupaten Tangerang</p>
            </div>

            @if($news->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                    @foreach($news as $i => $item)
                        <div class="reveal" style="transition-delay: {{ $i * 80 }}ms">
                            <a href="{{ route('news.show', $item->slug) }}" class="group block bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 h-full">
                                <div class="relative h-44 sm:h-48 bg-gray-200 overflow-hidden">
                                    @if($item->featured_image)
                                        <img src="{{ asset('storage/' . $item->featured_image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" loading="lazy">
                                    @else
                                        <div class="w-full h-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                                            <i class="fas fa-newspaper text-white text-4xl sm:text-5xl opacity-50"></i>
                                        </div>
                                    @endif
                                    @if($item->category)
                                        <span class="absolute top-3 left-3 px-3 py-1 bg-blue-600/90 backdrop-blur-sm text-white text-[11px] font-semibold rounded-full">{{ $item->category->name }}</span>
                                    @endif
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                </div>
                                <div class="p-5 sm:p-6">
                                    <h3 class="text-sm sm:text-base lg:text-lg font-bold text-gray-900 group-hover:text-blue-600 transition line-clamp-2 mb-2">{{ $item->title }}</h3>
                                    <p class="text-gray-600 text-xs sm:text-sm leading-relaxed line-clamp-3 mb-4">{{ Str::limit(strip_tags($item->content), 120) }}</p>
                                    <div class="flex items-center text-[11px] sm:text-xs text-gray-400">
                                        <i class="far fa-calendar-alt mr-1.5"></i>
                                        {{ $item->published_at ? $item->published_at->format('d F Y') : $item->created_at->format('d F Y') }}
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="text-center mt-10 lg:mt-12 reveal">
                    <a href="{{ url('/berita') }}" class="inline-flex items-center px-6 py-3 border-2 border-blue-600 text-blue-600 font-semibold rounded-full hover:bg-blue-600 hover:text-white transition-all text-sm sm:text-base hover:scale-105 active:scale-95">
                        Lihat Semua Berita
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            @else
                <div class="text-center py-16 reveal">
                    <div class="w-20 h-20 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="far fa-newspaper text-gray-400 text-3xl"></i>
                    </div>
                    <p class="text-gray-500 text-lg">Belum ada berita tersedia</p>
                </div>
            @endif
        </div>
    </section>

    {{-- Prestasi & Pengumuman --}}
    <div class="relative bg-white">
        {{-- Prestasi Terbaru --}}
        @if($achievements->count() > 0)
            <section class="py-16 sm:py-20 lg:py-24">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-12 lg:mb-16 reveal">
                        <span class="inline-flex items-center gap-2 px-4 py-1.5 bg-amber-50 text-amber-700 text-sm font-semibold rounded-full mb-4">
                            <i class="fas fa-trophy"></i>
                            Prestasi
                        </span>
                        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Prestasi Terbaru</h2>
                        <div class="w-20 h-1 bg-blue-600 mx-auto rounded-full"></div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 lg:gap-6">
                        @foreach($achievements as $i => $achievement)
                            <div class="reveal" style="transition-delay: {{ $i * 80 }}ms">
                                <a href="{{ route('achievements.index') }}" class="group block relative rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                                    <div class="h-52 sm:h-56 lg:h-60 bg-gray-200">
                                        @if($achievement->photo)
                                            <img src="{{ asset('storage/' . $achievement->photo) }}" alt="{{ $achievement->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" loading="lazy">
                                        @else
                                            <div class="w-full h-full bg-gradient-to-br from-amber-400 to-amber-600 flex items-center justify-center">
                                                <i class="fas fa-trophy text-white text-5xl sm:text-6xl opacity-40"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                                    <div class="absolute bottom-0 left-0 right-0 p-4 sm:p-5">
                                        <span class="inline-block px-2.5 py-1 bg-white/20 backdrop-blur-sm text-white text-[10px] sm:text-xs font-semibold rounded-full mb-2">{{ $achievement->type ?? 'Prestasi' }}</span>
                                        <h3 class="text-sm sm:text-base lg:text-lg font-bold text-white leading-tight">{{ $achievement->title }}</h3>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center mt-10 lg:mt-12 reveal">
                        <a href="{{ route('achievements.index') }}" class="inline-flex items-center px-6 py-3 border-2 border-blue-600 text-blue-600 font-semibold rounded-full hover:bg-blue-600 hover:text-white transition-all text-sm sm:text-base hover:scale-105 active:scale-95">
                            Lihat Semua Prestasi
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </section>
        @endif

        {{-- Pengumuman --}}
        @if($announcements->count() > 0)
            <section class="py-16 sm:py-20 lg:py-24 bg-gray-50">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-12 lg:mb-16 reveal">
                        <span class="inline-flex items-center gap-2 px-4 py-1.5 bg-red-50 text-red-700 text-sm font-semibold rounded-full mb-4">
                            <i class="fas fa-bullhorn"></i>
                            Pengumuman
                        </span>
                        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Pengumuman</h2>
                        <div class="w-20 h-1 bg-blue-600 mx-auto rounded-full"></div>
                    </div>
                    <div class="max-w-3xl mx-auto space-y-3 sm:space-y-4">
                        @foreach($announcements as $announcement)
                            <a href="{{ route('announcements.show', $announcement->slug) }}" class="group flex items-center gap-3 sm:gap-4 bg-white p-4 sm:p-5 rounded-xl shadow-sm hover:shadow-md transition-all hover:-translate-y-0.5 reveal">
                                <div class="w-10 h-10 sm:w-12 sm:h-12 {{ $announcement->is_important ? 'bg-red-100' : 'bg-blue-100' }} rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="{{ $announcement->is_important ? 'fas fa-exclamation text-red-600' : 'fas fa-bullhorn text-blue-600' }} text-sm sm:text-base"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center gap-2 mb-0.5">
                                        @if($announcement->is_important)
                                            <span class="px-2 py-0.5 bg-red-100 text-red-700 text-[10px] font-semibold rounded">PENTING</span>
                                        @endif
                                    </div>
                                    <h3 class="text-sm sm:text-base font-semibold text-gray-900 group-hover:text-blue-600 transition truncate">{{ $announcement->title }}</h3>
                                    <p class="text-xs text-gray-400 mt-0.5">
                                        <i class="far fa-calendar-alt mr-1"></i>
                                        {{ $announcement->created_at->format('d F Y') }}
                                    </p>
                                </div>
                                <i class="fas fa-chevron-right text-gray-300 group-hover:text-blue-500 transition text-sm flex-shrink-0"></i>
                            </a>
                        @endforeach
                    </div>
                    <div class="text-center mt-8 sm:mt-10 reveal">
                        <a href="{{ route('announcements.index') }}" class="inline-flex items-center px-6 py-3 border-2 border-blue-600 text-blue-600 font-semibold rounded-full hover:bg-blue-600 hover:text-white transition-all text-sm sm:text-base hover:scale-105 active:scale-95">
                            Lihat Semua Pengumuman
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </section>
        @endif
    </div>

    {{-- CTA Section --}}
    <section class="relative py-16 sm:py-20 lg:py-24 bg-gradient-to-br from-blue-800 to-indigo-900 overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute top-0 left-0 w-full h-full bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wMyI+PHBhdGggZD0iTTM2IDM0YzEuNjU3IDAgMy0xLjM0MyAzLTNzLTEuMzQzLTMtMy0zLTMgMS4zNDMtMyAzIDEuMzQzIDMgMyAzem0wLTEyYzEuNjU3IDAgMy0xLjM0MyAzLTNzLTEuMzQzLTMtMy0zLTMgMS4zNDMtMyAzIDEuMzQzIDMgMyAzeiIvPjwvZz48L2c+PC9zdmc+')] opacity-30"></div>
            <div class="absolute -top-40 -right-40 w-80 h-80 bg-blue-400 rounded-full blur-3xl opacity-20"></div>
            <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-indigo-400 rounded-full blur-3xl opacity-20"></div>
        </div>
        <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="reveal">
                <span class="inline-flex items-center gap-2 px-4 py-1.5 bg-white/10 text-white text-sm font-semibold rounded-full mb-4 border border-white/10">
                    <i class="fas fa-user-plus"></i>
                    Penerimaan Peserta Didik Baru
                </span>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-white mb-4">Segera Daftar PPDB {{ date('Y') }}</h2>
                <p class="text-sm sm:text-base lg:text-lg text-blue-100/90 mb-8 max-w-2xl mx-auto leading-relaxed">
                    Bergabunglah bersama SMA Negeri 3 Kabupaten Tangerang. Daftarkan putra/putri Anda sekarang juga untuk meraih masa depan yang gemilang.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ url('/ppdb') }}" class="inline-flex items-center px-8 py-4 bg-yellow-400 text-gray-900 font-bold text-base sm:text-lg rounded-full hover:bg-yellow-300 transition-all shadow-2xl hover:scale-105 active:scale-95">
                        <i class="fas fa-arrow-right mr-2"></i>
                        Informasi PPDB
                    </a>
                    <a href="{{ url('/kontak') }}" class="inline-flex items-center px-8 py-4 bg-white/10 text-white font-semibold text-base sm:text-lg rounded-full hover:bg-white/20 transition-all border border-white/20 hover:scale-105 active:scale-95">
                        <i class="fas fa-phone mr-2"></i>
                    Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Scripts --}}
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const counters = document.querySelectorAll('.counter');
                const speed = 80;

                const animateCounter = (counter) => {
                    const target = parseInt(counter.getAttribute('data-target'));
                    const increment = Math.ceil(target / speed);
                    let current = 0;

                    const updateCount = () => {
                        current += increment;
                        if (current < target) {
                            counter.innerText = current.toLocaleString();
                            requestAnimationFrame(updateCount);
                        } else {
                            counter.innerText = target.toLocaleString();
                        }
                    };
                    updateCount();
                };

                const counterObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            animateCounter(entry.target);
                            counterObserver.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.3 });

                counters.forEach(counter => counterObserver.observe(counter));
            });
        </script>

        @if($heroSliders->count() > 1)
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const slides = document.querySelectorAll('.hero-slide');
                const contents = document.querySelectorAll('.hero-content');
                const dots = document.querySelectorAll('.hero-dot');
                let currentSlide = 0;
                let interval;

                function goToSlide(index) {
                    slides.forEach((s, i) => {
                        s.classList.toggle('opacity-100', i === index);
                        s.classList.toggle('opacity-0', i !== index);
                    });
                    contents.forEach((c, i) => {
                        c.classList.toggle('block', i === index);
                        c.classList.toggle('hidden', i !== index);
                    });
                    dots.forEach((d, i) => {
                        d.classList.toggle('bg-white', i === index);
                        d.classList.toggle('scale-110', i === index);
                        d.classList.toggle('bg-white/40', i !== index);
                        d.classList.toggle('hover:bg-white/70', i !== index);
                    });
                    currentSlide = index;
                }

                function nextSlide() {
                    goToSlide((currentSlide + 1) % slides.length);
                }

                dots.forEach((dot, index) => {
                    dot.addEventListener('click', () => {
                        clearInterval(interval);
                        goToSlide(index);
                        interval = setInterval(nextSlide, 5000);
                    });
                });

                interval = setInterval(nextSlide, 5000);
            });
        </script>
        @endif
    @endpush
@endsection
