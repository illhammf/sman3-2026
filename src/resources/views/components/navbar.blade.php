<nav id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-transparent">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                    SMAN 3
                </div>
                <div class="hidden sm:block">
                    <p class="text-sm font-bold text-white drop-shadow-sm">SMA NEGERI 3</p>
                    <p class="text-xs text-gray-200">Kabupaten Tangerang</p>
                </div>
            </div>

            <div class="hidden lg:flex items-center space-x-1">
                <a href="{{ url('/') }}" class="nav-link px-3 py-2 text-sm font-medium text-white hover:text-blue-200 rounded-md transition">Beranda</a>

                <div class="relative group">
                    <a href="#" class="nav-link px-3 py-2 text-sm font-medium text-white hover:text-blue-200 rounded-md transition flex items-center">
                        Profil
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </a>
                    <div class="absolute left-0 mt-2 w-56 bg-white rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                        <div class="py-2">
                            <a href="{{ url('/profil/sejarah') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700">Sejarah</a>
                            <a href="{{ url('/profil/visi-misi') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700">Visi & Misi</a>
                            <a href="{{ url('/guru') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700">Guru</a>
                            <a href="{{ url('/staff') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700">Tata Usaha</a>
                        </div>
                    </div>
                </div>

                <a href="{{ url('/berita') }}" class="nav-link px-3 py-2 text-sm font-medium text-white hover:text-blue-200 rounded-md transition">Berita</a>
                <a href="{{ url('/pengumuman') }}" class="nav-link px-3 py-2 text-sm font-medium text-white hover:text-blue-200 rounded-md transition">Pengumuman</a>

                <div class="relative group">
                    <a href="#" class="nav-link px-3 py-2 text-sm font-medium text-white hover:text-blue-200 rounded-md transition flex items-center">
                        Layanan
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </a>
                    <div class="absolute left-0 mt-2 w-56 bg-white rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                        <div class="py-2">
                            <a href="{{ url('/ppdb') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700">PPDB</a>
                            <a href="{{ url('/ekstrakurikuler') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700">Ekstrakurikuler</a>
                            <a href="{{ url('/fasilitas') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700">Fasilitas</a>
                            <a href="{{ url('/prestasi') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700">Prestasi</a>
                            <a href="{{ url('/kalender-akademik') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700">Kalender Akademik</a>
                        </div>
                    </div>
                </div>

                <a href="{{ url('/galeri') }}" class="nav-link px-3 py-2 text-sm font-medium text-white hover:text-blue-200 rounded-md transition">Galeri</a>
                <a href="{{ url('/kontak') }}" class="nav-link px-3 py-2 text-sm font-medium text-white hover:text-blue-200 rounded-md transition">Kontak</a>

                <a href="{{ route('filament.admin.auth.login') }}" class="ml-4 px-4 py-2 text-sm font-medium bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition shadow-lg">
                    <i class="fas fa-sign-in-alt mr-1"></i> Login
                </a>
            </div>

            <button id="menu-btn" class="lg:hidden p-2 rounded-md text-white hover:bg-white/20 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>

    <div id="mobile-menu" class="hidden lg:hidden bg-white border-t shadow-lg">
        <div class="px-4 py-3 space-y-2">
            <a href="{{ url('/') }}" class="block px-3 py-2 text-gray-700 hover:bg-blue-50 rounded-md">Beranda</a>
            <a href="{{ url('/profil/sejarah') }}" class="block px-3 py-2 text-gray-700 hover:bg-blue-50 rounded-md">Sejarah</a>
            <a href="{{ url('/profil/visi-misi') }}" class="block px-3 py-2 text-gray-700 hover:bg-blue-50 rounded-md">Visi & Misi</a>
            <a href="{{ url('/guru') }}" class="block px-3 py-2 text-gray-700 hover:bg-blue-50 rounded-md">Guru</a>
            <a href="{{ url('/staff') }}" class="block px-3 py-2 text-gray-700 hover:bg-blue-50 rounded-md">Tata Usaha</a>
            <a href="{{ url('/berita') }}" class="block px-3 py-2 text-gray-700 hover:bg-blue-50 rounded-md">Berita</a>
            <a href="{{ url('/pengumuman') }}" class="block px-3 py-2 text-gray-700 hover:bg-blue-50 rounded-md">Pengumuman</a>
            <a href="{{ url('/ppdb') }}" class="block px-3 py-2 text-gray-700 hover:bg-blue-50 rounded-md">PPDB</a>
            <a href="{{ url('/ekstrakurikuler') }}" class="block px-3 py-2 text-gray-700 hover:bg-blue-50 rounded-md">Ekstrakurikuler</a>
            <a href="{{ url('/fasilitas') }}" class="block px-3 py-2 text-gray-700 hover:bg-blue-50 rounded-md">Fasilitas</a>
            <a href="{{ url('/prestasi') }}" class="block px-3 py-2 text-gray-700 hover:bg-blue-50 rounded-md">Prestasi</a>
            <a href="{{ url('/galeri') }}" class="block px-3 py-2 text-gray-700 hover:bg-blue-50 rounded-md">Galeri</a>
            <a href="{{ url('/kontak') }}" class="block px-3 py-2 text-gray-700 hover:bg-blue-50 rounded-md">Kontak</a>
            <a href="{{ url('/kalender-akademik') }}" class="block px-3 py-2 text-gray-700 hover:bg-blue-50 rounded-md">Kalender Akademik</a>
            <hr>
            <a href="{{ route('filament.admin.auth.login') }}" class="block px-3 py-2 text-blue-600 hover:bg-blue-50 rounded-md font-medium"><i class="fas fa-sign-in-alt mr-1"></i> Login Admin</a>
        </div>
    </div>
</nav>
