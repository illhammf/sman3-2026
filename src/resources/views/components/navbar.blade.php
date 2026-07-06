@php
    $navSettings = \App\Models\Setting::whereIn('key', ['school_name', 'school_logo'])->get()->keyBy('key');
    $schoolName = $navSettings->has('school_name') ? $navSettings['school_name']->value : 'SMA Negeri 3 Kabupaten Tangerang';
    $schoolLogo = $navSettings->has('school_logo') ? $navSettings['school_logo']->value : '';
@endphp

<nav id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-500 bg-transparent">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 lg:h-20">
            <a href="{{ url('/') }}" class="flex items-center space-x-3 group">
                @if($schoolLogo)
                    <img src="{{ asset('storage/' . $schoolLogo) }}" alt="{{ $schoolName }}" class="w-10 h-10 lg:w-12 lg:h-12 rounded-full object-cover ring-2 ring-white/20 group-hover:ring-white/40 transition-all">
                @else
                    <div class="w-10 h-10 lg:w-12 lg:h-12 bg-gradient-to-br from-blue-500 to-blue-700 rounded-full flex items-center justify-center text-white font-bold text-sm lg:text-lg shadow-lg">
                        SMAN 3
                    </div>
                @endif
                <div class="hidden sm:block">
                    <p class="text-xs lg:text-sm font-bold text-white drop-shadow-sm leading-tight">{{ strtoupper($schoolName) }}</p>
                    <p class="text-[10px] lg:text-xs text-blue-200">Kabupaten Tangerang</p>
                </div>
            </a>

            <div class="hidden lg:flex items-center space-x-1">
                <a href="{{ url('/') }}" class="nav-link px-3 py-2 text-sm font-medium text-white/90 hover:text-white rounded-lg hover:bg-white/10 transition-all">Beranda</a>

                <div class="relative">
                    <button class="desktop-dropdown-toggle nav-link px-3 py-2 text-sm font-medium text-white/90 hover:text-white rounded-lg hover:bg-white/10 transition-all flex items-center">
                        Profil
                        <svg class="w-4 h-4 ml-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="absolute left-0 mt-2 w-56 bg-white rounded-xl shadow-2xl opacity-0 invisible transition-all duration-200 z-50 border border-gray-100 overflow-hidden">
                        <div class="py-2">
                            <a href="{{ url('/profil/sejarah') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition font-medium">Sejarah</a>
                            <a href="{{ url('/profil/visi-misi') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition font-medium">Visi & Misi</a>
                            <div class="border-t border-gray-100 my-1"></div>
                            <a href="{{ url('/guru') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition font-medium">Guru</a>
                            <a href="{{ url('/staff') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition font-medium">Tata Usaha</a>
                        </div>
                    </div>
                </div>

                <a href="{{ url('/berita') }}" class="nav-link px-3 py-2 text-sm font-medium text-white/90 hover:text-white rounded-lg hover:bg-white/10 transition-all">Berita</a>
                <a href="{{ url('/pengumuman') }}" class="nav-link px-3 py-2 text-sm font-medium text-white/90 hover:text-white rounded-lg hover:bg-white/10 transition-all">Pengumuman</a>

                <div class="relative">
                    <button class="desktop-dropdown-toggle nav-link px-3 py-2 text-sm font-medium text-white/90 hover:text-white rounded-lg hover:bg-white/10 transition-all flex items-center">
                        Layanan
                        <svg class="w-4 h-4 ml-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="absolute left-0 mt-2 w-56 bg-white rounded-xl shadow-2xl opacity-0 invisible transition-all duration-200 z-50 border border-gray-100 overflow-hidden">
                        <div class="py-2">
                            <a href="{{ url('/ppdb') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition font-medium">PPDB</a>
                            <a href="{{ url('/ekstrakurikuler') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition font-medium">Ekstrakurikuler</a>
                            <a href="{{ url('/fasilitas') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition font-medium">Fasilitas</a>
                            <a href="{{ url('/prestasi') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition font-medium">Prestasi</a>
                            <div class="border-t border-gray-100 my-1"></div>
                            <a href="{{ url('/kalender-akademik') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition font-medium">Kalender Akademik</a>
                        </div>
                    </div>
                </div>

                <a href="{{ url('/galeri') }}" class="nav-link px-3 py-2 text-sm font-medium text-white/90 hover:text-white rounded-lg hover:bg-white/10 transition-all">Galeri</a>
                <a href="{{ url('/kontak') }}" class="nav-link px-3 py-2 text-sm font-medium text-white/90 hover:text-white rounded-lg hover:bg-white/10 transition-all">Kontak</a>

                <a href="{{ route('filament.admin.auth.login') }}" class="ml-3 px-4 py-2 text-sm font-medium bg-white/15 hover:bg-white/25 text-white rounded-xl transition-all shadow-lg backdrop-blur-sm border border-white/20">
                    <i class="fas fa-sign-in-alt mr-1.5"></i> Login
                </a>
            </div>

            <button id="menu-btn" class="lg:hidden relative w-10 h-10 flex items-center justify-center rounded-lg text-white hover:bg-white/10 transition" aria-label="Buka menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>

    <div id="menu-overlay" class="fixed inset-0 bg-black/50 z-40 hidden opacity-0 transition-opacity duration-300 lg:hidden"></div>

    <div id="mobile-menu" class="fixed top-0 right-0 h-full w-72 max-w-[85vw] bg-white shadow-2xl z-50 transform translate-x-full transition-transform duration-300 ease-in-out lg:hidden overflow-y-auto">
        <div class="flex items-center justify-between p-4 border-b border-gray-100">
            <div class="flex items-center space-x-2">
                @if($schoolLogo)
                    <img src="{{ asset('storage/' . $schoolLogo) }}" alt="{{ $schoolName }}" class="w-8 h-8 rounded-full object-cover">
                @else
                    <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-blue-700 rounded-full flex items-center justify-center text-white font-bold text-xs">S3</div>
                @endif
                <span class="text-sm font-bold text-gray-800">Menu</span>
            </div>
            <button id="menu-close" class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-gray-100 text-gray-500 transition" aria-label="Tutup menu">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <div class="py-2">
            <a href="{{ url('/') }}" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition font-medium">
                <i class="fas fa-home w-5 text-center text-gray-400"></i> Beranda
            </a>

            <div class="px-4 py-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">Profil</div>
            <a href="{{ url('/profil/sejarah') }}" class="flex items-center gap-3 px-4 pl-9 py-2.5 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-700 transition">Sejarah</a>
            <a href="{{ url('/profil/visi-misi') }}" class="flex items-center gap-3 px-4 pl-9 py-2.5 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-700 transition">Visi & Misi</a>
            <a href="{{ url('/guru') }}" class="flex items-center gap-3 px-4 pl-9 py-2.5 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-700 transition">Guru</a>
            <a href="{{ url('/staff') }}" class="flex items-center gap-3 px-4 pl-9 py-2.5 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-700 transition">Tata Usaha</a>

            <div class="border-t border-gray-100 my-2"></div>
            <a href="{{ url('/berita') }}" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition font-medium">
                <i class="fas fa-newspaper w-5 text-center text-gray-400"></i> Berita
            </a>
            <a href="{{ url('/pengumuman') }}" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition font-medium">
                <i class="fas fa-bullhorn w-5 text-center text-gray-400"></i> Pengumuman
            </a>

            <div class="border-t border-gray-100 my-2"></div>
            <div class="px-4 py-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">Layanan</div>
            <a href="{{ url('/ppdb') }}" class="flex items-center gap-3 px-4 pl-9 py-2.5 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-700 transition">
                <i class="fas fa-user-plus w-5 text-center"></i> PPDB
            </a>
            <a href="{{ url('/ekstrakurikuler') }}" class="flex items-center gap-3 px-4 pl-9 py-2.5 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-700 transition">Ekstrakurikuler</a>
            <a href="{{ url('/fasilitas') }}" class="flex items-center gap-3 px-4 pl-9 py-2.5 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-700 transition">Fasilitas</a>
            <a href="{{ url('/prestasi') }}" class="flex items-center gap-3 px-4 pl-9 py-2.5 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-700 transition">Prestasi</a>
            <a href="{{ url('/kalender-akademik') }}" class="flex items-center gap-3 px-4 pl-9 py-2.5 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-700 transition">Kalender Akademik</a>

            <div class="border-t border-gray-100 my-2"></div>
            <a href="{{ url('/galeri') }}" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition font-medium">
                <i class="fas fa-images w-5 text-center text-gray-400"></i> Galeri
            </a>
            <a href="{{ url('/kontak') }}" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition font-medium">
                <i class="fas fa-envelope w-5 text-center text-gray-400"></i> Kontak
            </a>

            <div class="p-4 mt-2">
                <a href="{{ route('filament.admin.auth.login') }}" class="flex items-center justify-center gap-2 w-full py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl transition shadow-lg">
                    <i class="fas fa-sign-in-alt"></i> Login Admin
                </a>
            </div>
        </div>
    </div>
</nav>
