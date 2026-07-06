@php
    $footerSettings = \App\Models\Setting::whereIn('key', [
        'school_name', 'school_address', 'school_phone', 'school_email',
        'school_vision', 'facebook_url', 'instagram_url', 'youtube_url',
        'tiktok_url', 'twitter_url', 'school_village', 'school_district',
        'school_city', 'school_province', 'school_postal_code', 'school_logo',
    ])->get()->keyBy('key');

    $schoolName = $footerSettings->has('school_name') ? $footerSettings['school_name']->value : 'SMA Negeri 3 Kabupaten Tangerang';
    $schoolVision = $footerSettings->has('school_vision') ? $footerSettings['school_vision']->value : '';
    $address = $footerSettings->has('school_address') ? $footerSettings['school_address']->value : '';
    $village = $footerSettings->has('school_village') ? $footerSettings['school_village']->value : '';
    $district = $footerSettings->has('school_district') ? $footerSettings['school_district']->value : '';
    $city = $footerSettings->has('school_city') ? $footerSettings['school_city']->value : 'Kabupaten Tangerang';
    $province = $footerSettings->has('school_province') ? $footerSettings['school_province']->value : 'Banten';
    $postalCode = $footerSettings->has('school_postal_code') ? $footerSettings['school_postal_code']->value : '';
    $phone = $footerSettings->has('school_phone') ? $footerSettings['school_phone']->value : '';
    $email = $footerSettings->has('school_email') ? $footerSettings['school_email']->value : '';
    $schoolLogo = $footerSettings->has('school_logo') ? $footerSettings['school_logo']->value : '';

    $facebook = $footerSettings->has('facebook_url') ? $footerSettings['facebook_url']->value : '#';
    $instagram = $footerSettings->has('instagram_url') ? $footerSettings['instagram_url']->value : '#';
    $youtube = $footerSettings->has('youtube_url') ? $footerSettings['youtube_url']->value : '#';
    $tiktok = $footerSettings->has('tiktok_url') ? $footerSettings['tiktok_url']->value : '#';
    $twitter = $footerSettings->has('twitter_url') ? $footerSettings['twitter_url']->value : '#';

    $addressParts = array_filter([$address, $village, $district, $city, $province, $postalCode ? 'Kode Pos ' . $postalCode : '']);
    $fullAddress = implode(', ', $addressParts) ?: 'Jl. Contoh No. 123, Kecamatan, ' . $city . ', ' . $province;
@endphp

<footer class="bg-gray-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">
            <div class="sm:col-span-2 lg:col-span-1">
                <div class="flex items-center space-x-3 mb-4">
                    @if($schoolLogo)
                        <img src="{{ asset('storage/' . $schoolLogo) }}" alt="{{ $schoolName }}" class="w-10 h-10 lg:w-12 lg:h-12 rounded-full object-cover ring-2 ring-blue-400/30">
                    @else
                        <div class="w-10 h-10 lg:w-12 lg:h-12 bg-gradient-to-br from-blue-500 to-blue-700 rounded-full flex items-center justify-center text-white font-bold text-sm lg:text-lg shadow-lg">S3</div>
                    @endif
                    <div>
                        <p class="font-bold text-sm lg:text-base">{{ $schoolName }}</p>
                        <p class="text-[11px] lg:text-xs text-gray-400">{{ $city }}</p>
                    </div>
                </div>
                @if($schoolVision)
                    <p class="text-gray-400 text-xs lg:text-sm leading-relaxed">{{ $schoolVision }}</p>
                @endif
                @if($facebook !== '#' || $instagram !== '#' || $youtube !== '#' || $tiktok !== '#' || $twitter !== '#')
                    <div class="flex flex-wrap gap-2 mt-5">
                        @if($facebook && $facebook !== '#')
                            <a href="{{ $facebook }}" target="_blank" rel="noopener noreferrer" class="w-9 h-9 bg-gray-800 hover:bg-blue-600 rounded-lg flex items-center justify-center transition-all hover:scale-110" aria-label="Facebook">
                                <i class="fab fa-facebook-f text-sm"></i>
                            </a>
                        @endif
                        @if($instagram && $instagram !== '#')
                            <a href="{{ $instagram }}" target="_blank" rel="noopener noreferrer" class="w-9 h-9 bg-gray-800 hover:bg-pink-600 rounded-lg flex items-center justify-center transition-all hover:scale-110" aria-label="Instagram">
                                <i class="fab fa-instagram text-sm"></i>
                            </a>
                        @endif
                        @if($youtube && $youtube !== '#')
                            <a href="{{ $youtube }}" target="_blank" rel="noopener noreferrer" class="w-9 h-9 bg-gray-800 hover:bg-red-600 rounded-lg flex items-center justify-center transition-all hover:scale-110" aria-label="Youtube">
                                <i class="fab fa-youtube text-sm"></i>
                            </a>
                        @endif
                        @if($tiktok && $tiktok !== '#')
                            <a href="{{ $tiktok }}" target="_blank" rel="noopener noreferrer" class="w-9 h-9 bg-gray-800 hover:bg-blue-400 rounded-lg flex items-center justify-center transition-all hover:scale-110" aria-label="TikTok">
                                <i class="fab fa-tiktok text-sm"></i>
                            </a>
                        @endif
                        @if($twitter && $twitter !== '#')
                            <a href="{{ $twitter }}" target="_blank" rel="noopener noreferrer" class="w-9 h-9 bg-gray-800 hover:bg-sky-500 rounded-lg flex items-center justify-center transition-all hover:scale-110" aria-label="Twitter">
                                <i class="fab fa-twitter text-sm"></i>
                            </a>
                        @endif
                    </div>
                @endif
            </div>

            <div>
                <h3 class="font-bold text-sm uppercase tracking-wider text-blue-400 mb-4">Quick Links</h3>
                <ul class="space-y-2.5">
                    <li><a href="{{ url('/profil/sejarah') }}" class="text-gray-400 hover:text-white transition text-sm flex items-center gap-2"><i class="fas fa-chevron-right text-[10px] text-blue-500"></i> Profil Sekolah</a></li>
                    <li><a href="{{ url('/berita') }}" class="text-gray-400 hover:text-white transition text-sm flex items-center gap-2"><i class="fas fa-chevron-right text-[10px] text-blue-500"></i> Berita</a></li>
                    <li><a href="{{ url('/pengumuman') }}" class="text-gray-400 hover:text-white transition text-sm flex items-center gap-2"><i class="fas fa-chevron-right text-[10px] text-blue-500"></i> Pengumuman</a></li>
                    <li><a href="{{ url('/ppdb') }}" class="text-gray-400 hover:text-white transition text-sm flex items-center gap-2"><i class="fas fa-chevron-right text-[10px] text-blue-500"></i> PPDB</a></li>
                    <li><a href="{{ url('/galeri') }}" class="text-gray-400 hover:text-white transition text-sm flex items-center gap-2"><i class="fas fa-chevron-right text-[10px] text-blue-500"></i> Galeri</a></li>
                    <li><a href="{{ url('/kontak') }}" class="text-gray-400 hover:text-white transition text-sm flex items-center gap-2"><i class="fas fa-chevron-right text-[10px] text-blue-500"></i> Kontak</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-bold text-sm uppercase tracking-wider text-blue-400 mb-4">Layanan</h3>
                <ul class="space-y-2.5">
                    <li><a href="{{ url('/guru') }}" class="text-gray-400 hover:text-white transition text-sm flex items-center gap-2"><i class="fas fa-chevron-right text-[10px] text-blue-500"></i> Data Guru</a></li>
                    <li><a href="{{ url('/staff') }}" class="text-gray-400 hover:text-white transition text-sm flex items-center gap-2"><i class="fas fa-chevron-right text-[10px] text-blue-500"></i> Tata Usaha</a></li>
                    <li><a href="{{ url('/ekstrakurikuler') }}" class="text-gray-400 hover:text-white transition text-sm flex items-center gap-2"><i class="fas fa-chevron-right text-[10px] text-blue-500"></i> Ekstrakurikuler</a></li>
                    <li><a href="{{ url('/fasilitas') }}" class="text-gray-400 hover:text-white transition text-sm flex items-center gap-2"><i class="fas fa-chevron-right text-[10px] text-blue-500"></i> Fasilitas</a></li>
                    <li><a href="{{ url('/prestasi') }}" class="text-gray-400 hover:text-white transition text-sm flex items-center gap-2"><i class="fas fa-chevron-right text-[10px] text-blue-500"></i> Prestasi</a></li>
                    <li><a href="{{ url('/kalender-akademik') }}" class="text-gray-400 hover:text-white transition text-sm flex items-center gap-2"><i class="fas fa-chevron-right text-[10px] text-blue-500"></i> Kalender Akademik</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-bold text-sm uppercase tracking-wider text-blue-400 mb-4">Kontak</h3>
                <ul class="space-y-3.5 text-sm">
                    <li class="flex items-start gap-3">
                        <div class="w-8 h-8 bg-blue-600/20 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                            <i class="fas fa-map-marker-alt text-blue-400 text-xs"></i>
                        </div>
                        <span class="text-gray-400 leading-relaxed">{{ $fullAddress }}</span>
                    </li>
                    @if($phone)
                        <li class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-blue-600/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-phone text-blue-400 text-xs"></i>
                            </div>
                            <a href="tel:{{ $phone }}" class="text-gray-400 hover:text-white transition">{{ $phone }}</a>
                        </li>
                    @endif
                    @if($email)
                        <li class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-blue-600/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-envelope text-blue-400 text-xs"></i>
                            </div>
                            <a href="mailto:{{ $email }}" class="text-gray-400 hover:text-white transition break-all">{{ $email }}</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>

    <div class="border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-2">
                <p class="text-xs sm:text-sm text-gray-500 text-center sm:text-left">
                    &copy; {{ date('Y') }} {{ $schoolName }}. All rights reserved.
                </p>
                <p class="text-xs text-gray-600">
                    <i class="fas fa-graduation-cap mr-1"></i> Unggul, Beriman, Berakhlak Mulia
                </p>
            </div>
        </div>
    </div>
</footer>
