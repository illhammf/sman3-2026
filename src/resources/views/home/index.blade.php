@extends('layouts.app')

@section('title', 'SMA Negeri 3 Kabupaten Tangerang - Website Resmi')

@section('content')
    {{-- Hero Section --}}
    <section class="relative min-h-screen flex items-center justify-center bg-gray-800">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/90 to-blue-700/80"></div>
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1580582932707-520aed937b7b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80')] bg-cover bg-center mix-blend-overlay"></div>
        <div class="relative z-10 text-center px-4 sm:px-6 lg:px-8 max-w-5xl mx-auto">
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
        </div>
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
            <i class="fas fa-chevron-down text-white text-2xl opacity-75"></i>
        </div>
    </section>

    {{-- News Section --}}
    <section class="py-16 sm:py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
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
    <section class="py-16 sm:py-20 bg-gradient-to-r from-blue-900 to-blue-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
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

    {{-- Achievements Section --}}
    @if($achievements->count() > 0)
        <section class="py-16 sm:py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
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

    {{-- Announcements Section --}}
    @if($announcements->count() > 0)
        <section class="py-16 sm:py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">Pengumuman</h2>
                    <div class="w-20 h-1 bg-blue-600 mx-auto rounded-full"></div>
                </div>
                <div class="max-w-4xl mx-auto space-y-4">
                    @foreach($announcements as $announcement)
                        <a href="{{ route('announcements.index') }}" class="flex items-center gap-4 bg-white p-5 rounded-xl shadow-sm hover:shadow-md transition border-l-4 border-blue-600">
                            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-bullhorn text-blue-600"></i>
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
    @endpush
@endsection
