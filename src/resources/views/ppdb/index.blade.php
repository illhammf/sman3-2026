@extends('layouts.app')

@section('title', 'PPDB ' . date('Y'))

@section('content')
<section class="relative pt-24 sm:pt-28 lg:pt-32 pb-12 sm:pb-16 lg:pb-20 bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 overflow-hidden">
    <div class="absolute inset-0">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-blue-400 rounded-full blur-3xl opacity-20"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-indigo-400 rounded-full blur-3xl opacity-20"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHZpZXdCb3g9IjAgMCA0MCA0MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNMjUgMjVoMTB2MTBIMjV6TTUgNWgxMHYxMEg1eiIgZmlsbD0iI2ZmZiIgZmlsbC1vcGFjaXR5PSIwLjAyIi8+PC9zdmc+')] opacity-30"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex mb-6 text-xs sm:text-sm text-blue-200" aria-label="Breadcrumb">
            <ol class="inline-flex items-center flex-wrap gap-y-1">
                <li><a href="{{ url('/') }}" class="hover:text-white transition">Beranda</a></li>
                <li><span class="mx-2">/</span></li>
                <li class="text-white font-medium">PPDB</li>
            </ol>
        </nav>
        <div class="lg:flex lg:items-end lg:justify-between gap-8">
            <div class="max-w-2xl">
                <span class="inline-flex items-center gap-2 px-3 py-1 bg-white/10 text-white/90 text-xs sm:text-sm font-medium rounded-full border border-white/10 mb-4">
                    <i class="fas fa-graduation-cap"></i>
                    Penerimaan Peserta Didik Baru
                </span>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-extrabold text-white leading-tight mb-4">
                    PPDB {{ date('Y') }}
                    <span class="block text-blue-200 text-lg sm:text-xl lg:text-2xl font-semibold mt-2">Tahun Ajaran {{ date('Y') }}/{{ date('Y') + 1 }}</span>
                </h1>
                <p class="text-sm sm:text-base lg:text-lg text-blue-100/80 max-w-xl leading-relaxed">
                    SMA Negeri 3 Kabupaten Tangerang membuka pendaftaran peserta didik baru untuk tahun ajaran {{ date('Y') }}/{{ date('Y') + 1 }}. Bergabunglah bersama kami!
                </p>
            </div>
            @if(isset($settings['ppdb_is_open']) && $settings['ppdb_is_open']->value === 'true')
                <div class="mt-6 lg:mt-0 flex-shrink-0">
                    <a href="{{ route('ppdb.create') }}" class="inline-flex items-center px-6 sm:px-8 py-3 sm:py-4 bg-yellow-400 text-gray-900 font-bold text-base sm:text-lg rounded-full hover:bg-yellow-300 transition-all shadow-2xl hover:scale-105 active:scale-95 w-full sm:w-auto justify-center">
                        <i class="fas fa-edit mr-2"></i>
                        Daftar Sekarang
                    </a>
                </div>
            @endif
        </div>
    </div>
</section>

@if(session('success'))
    <div class="bg-green-50 border-b border-green-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 sm:py-4">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 sm:w-10 sm:h-10 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-check-circle text-green-600 text-sm sm:text-base"></i>
                </div>
                <div class="text-green-800 text-sm sm:text-base font-medium">{!! session('success') !!}</div>
            </div>
        </div>
    </div>
@endif

@if(session('error'))
    <div class="bg-red-50 border-b border-red-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 sm:py-4">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 sm:w-10 sm:h-10 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-exclamation-circle text-red-600 text-sm sm:text-base"></i>
                </div>
                <div class="text-red-800 text-sm sm:text-base font-medium">{{ session('error') }}</div>
            </div>
        </div>
    </div>
@endif

<section class="py-10 sm:py-12 lg:py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @php $isOpen = isset($settings['ppdb_is_open']) && $settings['ppdb_is_open']->value === 'true'; @endphp

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5 mb-8 sm:mb-10 reveal">
            <div class="bg-white rounded-xl sm:rounded-2xl p-4 sm:p-6 shadow-sm border border-gray-100 flex items-center gap-4">
                <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-xl {{ $isOpen ? 'bg-green-100' : 'bg-red-100' }} flex items-center justify-center flex-shrink-0">
                    <i class="{{ $isOpen ? 'fas fa-door-open text-green-600' : 'fas fa-door-closed text-red-600' }} text-lg sm:text-xl"></i>
                </div>
                <div>
                    <p class="text-[11px] sm:text-xs text-gray-500 font-medium">Status</p>
                    <p class="text-sm sm:text-base font-bold {{ $isOpen ? 'text-green-600' : 'text-red-600' }}">{{ $isOpen ? 'DIBUKA' : 'DITUTUP' }}</p>
                </div>
            </div>
            @if(isset($settings['ppdb_start_date']) && $settings['ppdb_start_date']->value)
                <div class="bg-white rounded-xl sm:rounded-2xl p-4 sm:p-6 shadow-sm border border-gray-100 flex items-center gap-4">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-xl bg-blue-100 flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-calendar-alt text-blue-600 text-lg sm:text-xl"></i>
                    </div>
                    <div>
                        <p class="text-[11px] sm:text-xs text-gray-500 font-medium">Periode</p>
                        <p class="text-xs sm:text-sm font-bold text-gray-800 leading-tight">
                            {{ \Carbon\Carbon::parse($settings['ppdb_start_date']->value)->format('d M Y') }}
                            @if(isset($settings['ppdb_end_date']) && $settings['ppdb_end_date']->value)
                                <br>— {{ \Carbon\Carbon::parse($settings['ppdb_end_date']->value)->format('d M Y') }}
                            @endif
                        </p>
                    </div>
                </div>
            @endif
            @if(isset($settings['ppdb_quota']) && $settings['ppdb_quota']->value)
                <div class="bg-white rounded-xl sm:rounded-2xl p-4 sm:p-6 shadow-sm border border-gray-100 flex items-center gap-4">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-xl bg-purple-100 flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-users text-purple-600 text-lg sm:text-xl"></i>
                    </div>
                    <div>
                        <p class="text-[11px] sm:text-xs text-gray-500 font-medium">Kuota</p>
                        <p class="text-sm sm:text-base font-bold text-gray-800">{{ $settings['ppdb_quota']->value }} Siswa</p>
                    </div>
                </div>
            @endif
            <div class="bg-white rounded-xl sm:rounded-2xl p-4 sm:p-6 shadow-sm border border-gray-100 flex items-center gap-4">
                <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-xl bg-amber-100 flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-clock text-amber-600 text-lg sm:text-xl"></i>
                </div>
                <div>
                    <p class="text-[11px] sm:text-xs text-gray-500 font-medium">Tahun Ajaran</p>
                    <p class="text-sm sm:text-base font-bold text-gray-800">{{ date('Y') }}/{{ date('Y') + 1 }}</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 sm:gap-8">
            <div class="lg:col-span-2 space-y-6 sm:space-y-8">
                @if(isset($settings['ppdb_information']) && $settings['ppdb_information']->value)
                    <div class="bg-white rounded-xl sm:rounded-2xl shadow-sm border border-gray-100 p-5 sm:p-6 lg:p-8 reveal">
                        <h2 class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-900 mb-4 sm:mb-6 flex items-center gap-3">
                            <div class="w-8 h-8 sm:w-10 sm:h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-info-circle text-blue-600 text-sm sm:text-base"></i>
                            </div>
                            Informasi PPDB
                        </h2>
                        <div class="prose prose-sm sm:prose-base lg:prose-lg max-w-none prose-headings:text-gray-900 prose-a:text-blue-600">
                            {!! $settings['ppdb_information']->value !!}
                        </div>
                    </div>
                @endif

                @if(isset($settings['ppdb_requirements']) && $settings['ppdb_requirements']->value)
                    <div class="bg-white rounded-xl sm:rounded-2xl shadow-sm border border-gray-100 p-5 sm:p-6 lg:p-8 reveal">
                        <h2 class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-900 mb-4 sm:mb-6 flex items-center gap-3">
                            <div class="w-8 h-8 sm:w-10 sm:h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-check-circle text-green-600 text-sm sm:text-base"></i>
                            </div>
                            Persyaratan Pendaftaran
                        </h2>
                        <div class="prose prose-sm sm:prose-base lg:prose-lg max-w-none prose-headings:text-gray-900 prose-a:text-blue-600">
                            {!! $settings['ppdb_requirements']->value !!}
                        </div>
                    </div>
                @endif

                @if(!isset($settings['ppdb_information']) || !$settings['ppdb_information']->value)
                    @if(!isset($settings['ppdb_requirements']) || !$settings['ppdb_requirements']->value)
                        <div class="bg-white rounded-xl sm:rounded-2xl shadow-sm border border-gray-100 p-8 sm:p-12 text-center reveal">
                            <div class="w-16 h-16 sm:w-20 sm:h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-file-alt text-gray-400 text-2xl sm:text-3xl"></i>
                            </div>
                            <h3 class="text-base sm:text-lg font-semibold text-gray-600 mb-2">Belum Ada Informasi</h3>
                            <p class="text-sm sm:text-base text-gray-400 max-w-md mx-auto">Informasi PPDB sedang dipersiapkan. Silakan kembali lagi nanti atau hubungi pihak sekolah untuk informasi lebih lanjut.</p>
                        </div>
                    @endif
                @endif
            </div>

            <div class="space-y-4 sm:space-y-6">
                <div class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-xl sm:rounded-2xl p-5 sm:p-6 text-white sticky top-24 reveal">
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-user-plus text-lg sm:text-xl"></i>
                    </div>
                    <h3 class="text-base sm:text-lg font-bold mb-2">Tertarik Bergabung?</h3>
                    <p class="text-blue-100 text-xs sm:text-sm mb-5 leading-relaxed">Daftarkan diri Anda sekarang dan raih masa depan cerah bersama SMA Negeri 3 Kabupaten Tangerang.</p>
                    @if($isOpen)
                        <a href="{{ route('ppdb.create') }}" class="flex items-center justify-center gap-2 w-full py-3 bg-yellow-400 text-gray-900 font-bold rounded-xl hover:bg-yellow-300 transition-all shadow-lg text-sm sm:text-base hover:scale-[1.02] active:scale-[0.98]">
                            <i class="fas fa-arrow-right"></i>
                            Daftar Sekarang
                        </a>
                    @else
                        <div class="flex items-center justify-center gap-2 w-full py-3 bg-white/10 text-white/60 rounded-xl cursor-not-allowed text-sm sm:text-base">
                            <i class="fas fa-clock"></i>
                            Pendaftaran Ditutup
                        </div>
                    @endif
                </div>

                <div class="bg-white rounded-xl sm:rounded-2xl shadow-sm border border-gray-100 p-5 sm:p-6 reveal">
                    <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2 text-sm sm:text-base">
                        <div class="w-7 h-7 sm:w-8 sm:h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-headset text-blue-600 text-xs sm:text-sm"></i>
                        </div>
                        Butuh Bantuan?
                    </h3>
                    <ul class="space-y-3 text-xs sm:text-sm text-gray-600">
                        <li class="flex items-center gap-2.5">
                            <i class="fas fa-phone text-blue-500 w-4 text-center"></i>
                            <span>Hubungi {{ isset($settings['school_phone']) && $settings['school_phone']->value ? $settings['school_phone']->value : '(021) 1234-5678' }}</span>
                        </li>
                        <li class="flex items-center gap-2.5">
                            <i class="fas fa-envelope text-blue-500 w-4 text-center"></i>
                            <span>{{ isset($settings['school_email']) && $settings['school_email']->value ? $settings['school_email']->value : 'ppdb@sman3kabtangerang.sch.id' }}</span>
                        </li>
                        <li class="flex items-center gap-2.5">
                            <i class="fas fa-map-marker-alt text-blue-500 w-4 text-center"></i>
                            <span>Datang langsung ke sekolah</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
