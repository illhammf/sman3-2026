@extends('layouts.app')

@section('title', 'PPDB ' . date('Y'))

@section('content')
<section class="relative pt-32 pb-20 bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 overflow-hidden">
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-blue-400 rounded-full blur-3xl opacity-20"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-indigo-400 rounded-full blur-3xl opacity-20"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex mb-6 text-sm text-blue-200" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-2">
                <li><a href="{{ url('/') }}" class="hover:text-white transition">Beranda</a></li>
                <li><span class="mx-2">/</span></li>
                <li class="text-white font-medium">PPDB</li>
            </ol>
        </nav>
        <div class="lg:flex lg:items-center lg:justify-between">
            <div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-4">
                    PPDB {{ date('Y') }}
                    <span class="block text-blue-200 text-2xl md:text-3xl font-semibold mt-2">Penerimaan Peserta Didik Baru</span>
                </h1>
                <p class="text-lg text-blue-100 max-w-2xl leading-relaxed">
                    SMA Negeri 3 Kabupaten Tangerang membuka pendaftaran peserta didik baru untuk tahun ajaran {{ date('Y') }}/{{ date('Y') + 1 }}.
                </p>
            </div>
            @if(isset($settings['ppdb_is_open']) && $settings['ppdb_is_open']->value === 'true')
                <div class="mt-6 lg:mt-0 flex-shrink-0">
                    <a href="{{ route('ppdb.create') }}" class="inline-flex items-center px-8 py-4 bg-yellow-400 text-gray-900 font-bold text-lg rounded-full hover:bg-yellow-300 transition shadow-2xl">
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
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-check-circle text-green-600"></i>
                </div>
                <div class="text-green-800 font-medium">{!! session('success') !!}</div>
            </div>
        </div>
    </div>
@endif

@if(session('error'))
    <div class="bg-red-50 border-b border-red-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-exclamation-circle text-red-600"></i>
                </div>
                <div class="text-red-800 font-medium">{{ session('error') }}</div>
            </div>
        </div>
    </div>
@endif

<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Status PPDB --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8 mb-8">
            <div class="flex flex-col md:flex-row md:items-center gap-6">
                <div class="flex items-center gap-4">
                    @php $isOpen = isset($settings['ppdb_is_open']) && $settings['ppdb_is_open']->value === 'true'; @endphp
                    <div class="w-16 h-16 rounded-2xl flex items-center justify-center {{ $isOpen ? 'bg-green-100' : 'bg-red-100' }}">
                        <i class="{{ $isOpen ? 'fas fa-door-open text-green-600' : 'fas fa-door-closed text-red-600' }} text-2xl"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Status PPDB</p>
                        @if($isOpen)
                            <p class="text-xl font-bold text-green-600">DIBUKA</p>
                        @else
                            <p class="text-xl font-bold text-red-600">DITUTUP</p>
                        @endif
                    </div>
                </div>
                @if(isset($settings['ppdb_start_date']) && $settings['ppdb_start_date']->value)
                    <div class="flex items-center gap-4">
                        <div class="w-16 h-16 rounded-2xl bg-blue-100 flex items-center justify-center">
                            <i class="fas fa-calendar-alt text-blue-600 text-2xl"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Periode Pendaftaran</p>
                            <p class="text-lg font-bold text-gray-800">
                                {{ \Carbon\Carbon::parse($settings['ppdb_start_date']->value)->format('d M Y') }}
                                @if(isset($settings['ppdb_end_date']) && $settings['ppdb_end_date']->value)
                                    — {{ \Carbon\Carbon::parse($settings['ppdb_end_date']->value)->format('d M Y') }}
                                @endif
                            </p>
                        </div>
                    </div>
                @endif
                @if(isset($settings['ppdb_quota']) && $settings['ppdb_quota']->value)
                    <div class="flex items-center gap-4">
                        <div class="w-16 h-16 rounded-2xl bg-purple-100 flex items-center justify-center">
                            <i class="fas fa-users text-purple-600 text-2xl"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Kuota</p>
                            <p class="text-lg font-bold text-gray-800">{{ $settings['ppdb_quota']->value }} Siswa</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-8">
                {{-- Informasi PPDB --}}
                @if(isset($settings['ppdb_information']) && $settings['ppdb_information']->value)
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                            <i class="fas fa-info-circle text-blue-600 mr-3"></i>
                            Informasi PPDB
                        </h2>
                        <div class="prose prose-lg max-w-none prose-headings:text-gray-900 prose-a:text-blue-600">
                            {!! $settings['ppdb_information']->value !!}
                        </div>
                    </div>
                @endif

                {{-- Persyaratan --}}
                @if(isset($settings['ppdb_requirements']) && $settings['ppdb_requirements']->value)
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                            <i class="fas fa-check-circle text-green-600 mr-3"></i>
                            Persyaratan Pendaftaran
                        </h2>
                        <div class="prose prose-lg max-w-none prose-headings:text-gray-900 prose-a:text-blue-600">
                            {!! $settings['ppdb_requirements']->value !!}
                        </div>
                    </div>
                @endif
            </div>

            <div class="space-y-6">
                {{-- CTA Card --}}
                <div class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-2xl p-6 text-white sticky top-28">
                    <div class="w-14 h-14 bg-white/20 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-user-plus text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Tertarik Bergabung?</h3>
                    <p class="text-blue-100 text-sm mb-6 leading-relaxed">Daftarkan diri Anda sekarang juga dan raih masa depan cerah bersama SMA Negeri 3 Kabupaten Tangerang.</p>
                    @if($isOpen)
                        <a href="{{ route('ppdb.create') }}" class="block w-full py-3 bg-yellow-400 text-gray-900 font-bold text-center rounded-xl hover:bg-yellow-300 transition shadow-lg">
                            <i class="fas fa-arrow-right mr-2"></i>
                            Daftar Sekarang
                        </a>
                    @else
                        <div class="w-full py-3 bg-white/10 text-white/70 text-center rounded-xl cursor-not-allowed">
                            <i class="fas fa-clock mr-2"></i>
                            Pendaftaran Ditutup
                        </div>
                    @endif
                </div>

                {{-- Kontak --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <h3 class="font-bold text-gray-900 mb-4 flex items-center">
                        <i class="fas fa-headset text-blue-600 mr-2"></i>
                        Butuh Bantuan?
                    </h3>
                    <ul class="space-y-3 text-sm text-gray-600">
                        <li class="flex items-center gap-2">
                            <i class="fas fa-phone text-blue-500 w-4"></i>
                            <span>Hubungi (021) 1234-5678</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fas fa-envelope text-blue-500 w-4"></i>
                            <span>ppdb@sman3kabtangerang.sch.id</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fas fa-map-marker-alt text-blue-500 w-4"></i>
                            <span>Datang langsung ke sekolah</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
