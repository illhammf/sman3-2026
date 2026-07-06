<footer class="bg-gray-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div>
                <div class="flex items-center space-x-3 mb-4">
                    <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold text-lg">
                        SMAN 3
                    </div>
                    <div>
                        <p class="font-bold text-lg">SMA NEGERI 3</p>
                        <p class="text-sm text-gray-400">Kabupaten Tangerang</p>
                    </div>
                </div>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Terwujudnya peserta didik yang beriman, bertakwa, berakhlak mulia, unggul dalam prestasi, berbudaya, dan berwawasan lingkungan.
                </p>
            </div>

            <div>
                <h3 class="font-bold text-lg mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="{{ url('/profil/sejarah') }}" class="text-gray-400 hover:text-white transition text-sm">Profil Sekolah</a></li>
                    <li><a href="{{ url('/berita') }}" class="text-gray-400 hover:text-white transition text-sm">Berita</a></li>
                    <li><a href="{{ url('/pengumuman') }}" class="text-gray-400 hover:text-white transition text-sm">Pengumuman</a></li>
                    <li><a href="{{ url('/ppdb') }}" class="text-gray-400 hover:text-white transition text-sm">PPDB</a></li>
                    <li><a href="{{ url('/galeri') }}" class="text-gray-400 hover:text-white transition text-sm">Galeri</a></li>
                    <li><a href="{{ url('/kontak') }}" class="text-gray-400 hover:text-white transition text-sm">Kontak</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-bold text-lg mb-4">Layanan</h3>
                <ul class="space-y-2">
                    <li><a href="{{ url('/guru') }}" class="text-gray-400 hover:text-white transition text-sm">Data Guru</a></li>
                    <li><a href="{{ url('/staff') }}" class="text-gray-400 hover:text-white transition text-sm">Tata Usaha</a></li>
                    <li><a href="{{ url('/ekstrakurikuler') }}" class="text-gray-400 hover:text-white transition text-sm">Ekstrakurikuler</a></li>
                    <li><a href="{{ url('/fasilitas') }}" class="text-gray-400 hover:text-white transition text-sm">Fasilitas</a></li>
                    <li><a href="{{ url('/prestasi') }}" class="text-gray-400 hover:text-white transition text-sm">Prestasi</a></li>
                    <li><a href="{{ url('/kalender-akademik') }}" class="text-gray-400 hover:text-white transition text-sm">Kalender Akademik</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-bold text-lg mb-4">Kontak</h3>
                <ul class="space-y-3 text-sm text-gray-400">
                    <li class="flex items-start space-x-2">
                        <i class="fas fa-map-marker-alt mt-1 text-blue-400"></i>
                        <span>Jl. Contoh No. 123, Kecamatan, Kabupaten Tangerang, Banten</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        <i class="fas fa-phone text-blue-400"></i>
                        <span>(021) 1234-5678</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        <i class="fas fa-envelope text-blue-400"></i>
                        <span>info@sman3kabtangerang.sch.id</span>
                    </li>
                </ul>
                <div class="flex space-x-3 mt-4">
                    <a href="#" class="w-10 h-10 bg-gray-700 hover:bg-blue-600 rounded-full flex items-center justify-center transition">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-gray-700 hover:bg-pink-600 rounded-full flex items-center justify-center transition">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-gray-700 hover:bg-red-600 rounded-full flex items-center justify-center transition">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-gray-700 hover:bg-blue-400 rounded-full flex items-center justify-center transition">
                        <i class="fab fa-tiktok"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <p class="text-center text-sm text-gray-500">
                &copy; {{ date('Y') }} SMA Negeri 3 Kabupaten Tangerang. All rights reserved.
            </p>
        </div>
    </div>
</footer>
