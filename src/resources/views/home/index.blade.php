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
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/85 via-blue-800/75 to-indigo-900/85"></div>
                    </div>
                @endforeach
            </div>
            @if($heroSliders->count() > 1)
                <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex gap-3 z-20">
                    @foreach($heroSliders as $index => $slider)
                        <button class="hero-dot w-3 h-3 rounded-full transition-all duration-300 {{ $index === 0 ? 'bg-white scale-110' : 'bg-white/50 hover:bg-white/80' }}" data-index="{{ $index }}"></button>
                    @endforeach
                </div>
            @endif
        @else
            <div class="absolute inset-0">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-900/90 to-blue-700/80"></div>
                <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1580582932707-520aed937b7b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80')] bg-cover bg-center mix-blend-overlay"></div>
            </div>
        @endif

        <div class="relative z-10 text-center px-4 sm:px-6 lg:px-8 max-w-5xl mx-auto">
            @if($heroSliders->count() > 0)
                @foreach($heroSliders as $index => $slider)
                    <div class="hero-content {{ $index === 0 ? 'block' : 'hidden' }}" data-index="{{ $index }}">
                        <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-extrabold text-white leading-tight mb-6 drop-shadow-lg">
                            {{ $slider->title }}
                            @if($slider->subtitle)
                                <span class="block text-blue-200 text-2xl md:text-3xl lg:text-4xl mt-2">{{ $slider->subtitle }}</span>
                            @endif
                        </h1>
                        @if($slider->description)
                            <p class="text-lg sm:text-xl md:text-2xl text-blue-100 mb-10 max-w-3xl mx-auto leading-relaxed">
                                {{ $slider->description }}
                            </p>
                        @endif
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <a href="{{ url('/profil/sejarah') }}" class="inline-flex items-center px-8 py-4 bg-white text-blue-900 font-bold rounded-full hover:bg-blue-50 transition shadow-2xl text-lg">
                                <i class="fas fa-school mr-2"></i>
                                Profil Sekolah
                            </a>
                            @if($slider->link)
                                <a href="{{ $slider->link }}" class="inline-flex items-center px-8 py-4 bg-yellow-400 text-gray-900 font-bold rounded-full hover:bg-yellow-300 transition shadow-2xl text-lg">
                                    <i class="fas fa-arrow-right mr-2"></i>
                                    {{ $slider->link_text ?? 'Selengkapnya' }}
                                </a>
                            @else
                                <a href="{{ url('/ppdb') }}" class="inline-flex items-center px-8 py-4 bg-yellow-400 text-gray-900 font-bold rounded-full hover:bg-yellow-300 transition shadow-2xl text-lg">
                                    <i class="fas fa-user-plus mr-2"></i>
                                    PPDB {{ date('Y') }}
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
                <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-extrabold text-white leading-tight mb-6 drop-shadow-lg">
                    SMA Negeri 3
                    <span class="block text-blue-200">Kabupaten Tangerang</span>
                </h1>
                <p class="text-lg sm:text-xl md:text-2xl text-blue-100 mb-10 max-w-3xl mx-auto leading-relaxed">
                    Mewujudkan generasi unggul, beriman, bertakwa, berakhlak mulia, dan berwawasan lingkungan
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ url('/profil/sejarah') }}" class="inline-flex items-center px-8 py-4 bg-white text-blue-900 font-bold rounded-full hover:bg-blue-50 transition shadow-2xl text-lg">
                        <i class="fas fa-school mr-2"></i>
                        Profil Sekolah
                    </a>
                    <a href="{{ url('/ppdb') }}" class="inline-flex items-center px-8 py-4 bg-yellow-400 text-gray-900 font-bold rounded-full hover:bg-yellow-300 transition shadow-2xl text-lg">
                        <i class="fas fa-user-plus mr-2"></i>
                        PPDB {{ date('Y') }}
                    </a>
                </div>
            @endif
        </div>
        <div class="absolute bottom-20 left-1/2 -translate-x-1/2 animate-bounce">
            <i class="fas fa-chevron-down text-white text-2xl opacity-75"></i>
        </div>
    </section>

    {{-- Fitur Unggulan --}}
    @if(isset($superiorityFeatures) && $superiorityFeatures->count() > 0)
        <section class="relative py-20 bg-white overflow-hidden">
            <div class="absolute inset-0 opacity-[0.03]">
                <div class="absolute top-0 left-0 w-96 h-96 bg-blue-600 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
                <div class="absolute bottom-0 right-0 w-96 h-96 bg-indigo-600 rounded-full blur-3xl translate-x-1/2 translate-y-1/2"></div>
            </div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-14">
                    <span class="inline-flex items-center px-4 py-1.5 bg-blue-50 text-blue-700 text-sm font-semibold rounded-full mb-4">
                        <i class="fas fa-star mr-2"></i>
                        Keunggulan Sekolah
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">Mengapa Memilih SMA Negeri 3?</h2>
                    <div class="w-20 h-1 bg-blue-600 mx-auto rounded-full"></div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                    @php
                        $colorMap = [
                            'blue' => ['bg' => 'bg-blue-50', 'icon' => 'bg-blue-100', 'iconColor' => 'text-blue-600', 'hover' => 'hover:border-blue-200'],
                            'green' => ['bg' => 'bg-green-50', 'icon' => 'bg-green-100', 'iconColor' => 'text-green-600', 'hover' => 'hover:border-green-200'],
                            'yellow' => ['bg' => 'bg-yellow-50', 'icon' => 'bg-yellow-100', 'iconColor' => 'text-yellow-600', 'hover' => 'hover:border-yellow-200'],
                            'red' => ['bg' => 'bg-red-50', 'icon' => 'bg-red-100', 'iconColor' => 'text-red-600', 'hover' => 'hover:border-red-200'],
                            'purple' => ['bg' => 'bg-purple-50', 'icon' => 'bg-purple-100', 'iconColor' => 'text-purple-600', 'hover' => 'hover:border-purple-200'],
                            'indigo' => ['bg' => 'bg-indigo-50', 'icon' => 'bg-indigo-100', 'iconColor' => 'text-indigo-600', 'hover' => 'hover:border-indigo-200'],
                            'pink' => ['bg' => 'bg-pink-50', 'icon' => 'bg-pink-100', 'iconColor' => 'text-pink-600', 'hover' => 'hover:border-pink-200'],
                            'orange' => ['bg' => 'bg-orange-50', 'icon' => 'bg-orange-100', 'iconColor' => 'text-orange-600', 'hover' => 'hover:border-orange-200'],
                            'teal' => ['bg' => 'bg-teal-50', 'icon' => 'bg-teal-100', 'iconColor' => 'text-teal-600', 'hover' => 'hover:border-teal-200'],
                            'cyan' => ['bg' => 'bg-cyan-50', 'icon' => 'bg-cyan-100', 'iconColor' => 'text-cyan-600', 'hover' => 'hover:border-cyan-200'],
                        ];
                    @endphp
                    @foreach($superiorityFeatures as $feature)
                        @php $colors = $colorMap[$feature->color] ?? $colorMap['blue']; @endphp
                        <div class="group relative p-8 rounded-2xl border border-gray-100 {{ $colors['bg'] }} {{ $colors['hover'] }} transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                            @if($feature->image)
                                <div class="w-16 h-16 rounded-xl overflow-hidden mb-5">
                                    <img src="{{ asset('storage/' . $feature->image) }}" alt="{{ $feature->title }}" class="w-full h-full object-cover">
                                </div>
                            @elseif($feature->icon)
                                <div class="w-16 h-16 rounded-xl {{ $colors['icon'] }} flex items-center justify-center mb-5">
                                    <i class="{{ $feature->icon }} {{ $colors['iconColor'] }} text-2xl"></i>
                                </div>
                            @endif
                            <h3 class="text-lg font-bold text-gray-900 mb-3">{{ $feature->title }}</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">{{ $feature->description }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Berita Terbaru --}}
    <section class="py-16 sm:py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="inline-flex items-center px-4 py-1.5 bg-blue-50 text-blue-700 text-sm font-semibold rounded-full mb-4">
                    <i class="fas fa-newspaper mr-2"></i>
                    Informasi Terkini
                </span>
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">Berita Terbaru</h2>
                <div class="w-20 h-1 bg-blue-600 mx-auto rounded-full"></div>
                <p class="text-gray-600 mt-4 max-w-2xl mx-auto">Ikuti perkembangan dan kegiatan terbaru di SMA Negeri 3 Kabupaten Tangerang</p>
            </div>

            @if($news->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($news as $item)
                        <a href="{{ route('news.show', $item->slug) }}" class="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300">
                            <div class="relative h-48 bg-gray-200 overflow-hidden">
                                @if($item->featured_image)
                                    <img src="{{ asset('storage/' . $item->featured_image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                                        <i class="fas fa-newspaper text-white text-5xl opacity-50"></i>
                                    </div>
                                @endif
                                @if($item->category)
                                    <span class="absolute top-3 left-3 px-3 py-1 bg-blue-600 text-white text-xs font-semibold rounded-full">{{ $item->category->name }}</span>
                                @endif
                            </div>
                            <div class="p-6">
                                <h3 class="text-lg font-bold text-gray-900 group-hover:text-blue-600 transition line-clamp-2 mb-2">{{ $item->title }}</h3>
                                <p class="text-gray-600 text-sm leading-relaxed line-clamp-3 mb-4">{{ Str::limit(strip_tags($item->content), 150) }}</p>
                                <div class="flex items-center text-xs text-gray-500">
                                    <i class="far fa-calendar-alt mr-1"></i>
                                    {{ $item->published_at ? $item->published_at->format('d F Y') : $item->created_at->format('d F Y') }}
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="text-center mt-10">
                    <a href="{{ url('/berita') }}" class="inline-flex items-center px-6 py-3 border-2 border-blue-600 text-blue-600 font-semibold rounded-full hover:bg-blue-600 hover:text-white transition">
                        Lihat Semua Berita
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
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
    </section>

    {{-- Stats Section --}}
    <section class="py-16 sm:py-20 bg-gradient-to-r from-blue-900 via-blue-800 to-indigo-900 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-72 h-72 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-96 h-96 bg-yellow-300 rounded-full blur-3xl"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="relative bg-white/10 backdrop-blur-sm rounded-2xl p-8 text-center border border-white/10 hover:bg-white/20 transition">
                    <div class="w-16 h-16 bg-blue-400/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-chalkboard-teacher text-white text-3xl"></i>
                    </div>
                    <div class="text-4xl font-bold text-white mb-1 counter" data-target="65">0</div>
                    <div class="text-blue-200 font-medium">Guru</div>
                </div>
                <div class="relative bg-white/10 backdrop-blur-sm rounded-2xl p-8 text-center border border-white/10 hover:bg-white/20 transition">
                    <div class="w-16 h-16 bg-green-400/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-graduate text-white text-3xl"></i>
                    </div>
                    <div class="text-4xl font-bold text-white mb-1 counter" data-target="1080">0</div>
                    <div class="text-blue-200 font-medium">Siswa</div>
                </div>
                <div class="relative bg-white/10 backdrop-blur-sm rounded-2xl p-8 text-center border border-white/10 hover:bg-white/20 transition">
                    <div class="w-16 h-16 bg-yellow-400/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-trophy text-white text-3xl"></i>
                    </div>
                    <div class="text-4xl font-bold text-white mb-1 counter" data-target="156">0</div>
                    <div class="text-blue-200 font-medium">Prestasi</div>
                </div>
                <div class="relative bg-white/10 backdrop-blur-sm rounded-2xl p-8 text-center border border-white/10 hover:bg-white/20 transition">
                    <div class="w-16 h-16 bg-purple-400/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-building text-white text-3xl"></i>
                    </div>
                    <div class="text-4xl font-bold text-white mb-1 counter" data-target="24">0</div>
                    <div class="text-blue-200 font-medium">Fasilitas</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Prestasi Terbaru --}}
    @if($achievements->count() > 0)
        <section class="py-16 sm:py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <span class="inline-flex items-center px-4 py-1.5 bg-yellow-50 text-yellow-700 text-sm font-semibold rounded-full mb-4">
                        <i class="fas fa-trophy mr-2"></i>
                        Prestasi
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">Prestasi Terbaru</h2>
                    <div class="w-20 h-1 bg-blue-600 mx-auto rounded-full"></div>
                    <p class="text-gray-600 mt-4 max-w-2xl mx-auto">Berbagai prestasi yang telah diraih oleh siswa dan siswi SMA Negeri 3 Kabupaten Tangerang</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($achievements as $achievement)
                        <a href="{{ route('achievements.index') }}" class="group relative rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300">
                            <div class="h-64 bg-gray-200">
                                @if($achievement->photo)
                                    <img src="{{ asset('storage/' . $achievement->photo) }}" alt="{{ $achievement->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-yellow-400 to-yellow-600 flex items-center justify-center">
                                        <i class="fas fa-trophy text-white text-6xl opacity-50"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                            <div class="absolute bottom-0 left-0 right-0 p-5">
                                <h3 class="text-white font-bold text-lg leading-tight">{{ $achievement->title }}</h3>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="text-center mt-10">
                    <a href="{{ route('achievements.index') }}" class="inline-flex items-center px-6 py-3 border-2 border-blue-600 text-blue-600 font-semibold rounded-full hover:bg-blue-600 hover:text-white transition">
                        Lihat Semua Prestasi
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </section>
    @endif

    {{-- Pengumuman --}}
    @if($announcements->count() > 0)
        <section class="py-16 sm:py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <span class="inline-flex items-center px-4 py-1.5 bg-red-50 text-red-700 text-sm font-semibold rounded-full mb-4">
                        <i class="fas fa-bullhorn mr-2"></i>
                        Pengumuman
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">Pengumuman</h2>
                    <div class="w-20 h-1 bg-blue-600 mx-auto rounded-full"></div>
                </div>
                <div class="max-w-4xl mx-auto space-y-4">
                    @foreach($announcements as $announcement)
                        <a href="{{ route('announcements.show', $announcement->slug) }}" class="flex items-center gap-4 bg-white p-5 rounded-xl shadow-sm hover:shadow-md transition border-l-4 {{ $announcement->is_important ? 'border-red-500' : 'border-blue-600' }}">
                            <div class="w-12 h-12 {{ $announcement->is_important ? 'bg-red-100' : 'bg-blue-100' }} rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="{{ $announcement->is_important ? 'fas fa-exclamation text-red-600' : 'fas fa-bullhorn text-blue-600' }}"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h3 class="font-semibold text-gray-900 truncate">{{ $announcement->title }}</h3>
                                <p class="text-sm text-gray-500 mt-1">
                                    <i class="far fa-calendar-alt mr-1"></i>
                                    {{ $announcement->created_at->format('d F Y') }}
                                </p>
                            </div>
                            <i class="fas fa-chevron-right text-gray-400 flex-shrink-0"></i>
                        </a>
                    @endforeach
                </div>
                <div class="text-center mt-8">
                    <a href="{{ route('announcements.index') }}" class="inline-flex items-center px-6 py-3 border-2 border-blue-600 text-blue-600 font-semibold rounded-full hover:bg-blue-600 hover:text-white transition">
                        Lihat Semua Pengumuman
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </section>
    @endif

    {{-- CTA Section --}}
    <section class="relative py-20 bg-gradient-to-r from-blue-800 to-blue-600 overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-72 h-72 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-96 h-96 bg-yellow-300 rounded-full blur-3xl"></div>
        </div>
        <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-flex items-center px-4 py-1.5 bg-white/10 text-white text-sm font-semibold rounded-full mb-4">
                <i class="fas fa-user-plus mr-2"></i>
                Penerimaan Peserta Didik Baru
            </span>
            <h2 class="text-3xl sm:text-4xl font-bold text-white mb-4">Segera Daftar PPDB {{ date('Y') }}</h2>
            <p class="text-lg text-blue-100 mb-8 max-w-2xl mx-auto">Penerimaan Peserta Didik Baru SMA Negeri 3 Kabupaten Tangerang telah dibuka. Daftarkan segera putra/putri Anda.</p>
            <a href="{{ url('/ppdb') }}" class="inline-flex items-center px-10 py-4 bg-yellow-400 text-gray-900 font-bold text-lg rounded-full hover:bg-yellow-300 transition shadow-2xl">
                <i class="fas fa-arrow-right mr-2"></i>
                Daftar Sekarang
            </a>
        </div>
    </section>

    {{-- Counter Animation Script --}}
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const counters = document.querySelectorAll('.counter');
                const speed = 50;

                const animateCounter = (counter) => {
                    const target = parseInt(counter.getAttribute('data-target'));
                    const increment = target / speed;

                    const updateCount = () => {
                        const count = parseInt(counter.innerText);
                        if (count < target) {
                            counter.innerText = Math.ceil(count + increment);
                            requestAnimationFrame(updateCount);
                        } else {
                            counter.innerText = target.toLocaleString();
                        }
                    };

                    updateCount();
                };

                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            animateCounter(entry.target);
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.5 });

                counters.forEach(counter => observer.observe(counter));
            });
        </script>

        {{-- Hero Slider --}}
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
                        d.classList.toggle('bg-white/50', i !== index);
                        d.classList.toggle('hover:bg-white/80', i !== index);
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
