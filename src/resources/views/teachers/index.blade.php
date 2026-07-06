@extends('layouts.app')

@section('title', 'Guru')

@section('content')
<section class="relative pt-24 sm:pt-28 lg:pt-32 pb-10 sm:pb-12 lg:pb-16 bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 overflow-hidden">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex mb-6 text-xs sm:text-sm text-blue-200" aria-label="Breadcrumb">
            <ol class="inline-flex items-center flex-wrap gap-y-1">
                <li><a href="{{ url('/') }}" class="hover:text-white transition">Beranda</a></li>
                <li><span class="mx-2">/</span></li>
                <li class="text-white font-medium">Guru</li>
            </ol>
        </nav>
        <h1 class="text-2xl sm:text-3xl lg:text-4xl xl:text-5xl font-extrabold text-white leading-tight mb-3">Guru</h1>
        <p class="text-sm sm:text-base text-blue-100/80 max-w-2xl">Tenaga pendidik profesional yang berdedikasi tinggi dalam mendidik dan membimbing siswa</p>
    </div>
</section>

<section class="py-8 sm:py-10 lg:py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Principal --}}
        @if(isset($principal))
            <div class="mb-12 sm:mb-16 reveal">
                <div class="bg-white rounded-2xl shadow-sm hover:shadow-lg transition-all overflow-hidden max-w-4xl mx-auto border border-gray-100">
                    <div class="md:flex">
                        <div class="md:w-72 lg:w-80 h-72 sm:h-80 bg-gray-200 flex-shrink-0">
                            @if($principal->photo)
                                <img src="{{ asset('storage/' . $principal->photo) }}" alt="{{ $principal->name }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center">
                                    <i class="fas fa-user-tie text-white text-6xl sm:text-7xl"></i>
                                </div>
                            @endif
                        </div>
                        <div class="p-6 sm:p-8 lg:p-10 flex flex-col justify-center">
                            <span class="text-[11px] sm:text-xs font-semibold text-blue-600 bg-blue-50 px-3 py-1 rounded-full inline-block w-fit mb-3 sm:mb-4">Kepala Sekolah</span>
                            <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-900 mb-1 sm:mb-2">{{ $principal->name }}</h2>
                            <p class="text-sm sm:text-base text-gray-600 mb-3 sm:mb-4">{{ $principal->position ?? 'Kepala Sekolah' }}</p>
                            <div class="space-y-1.5 sm:space-y-2 text-xs sm:text-sm text-gray-500">
                                @if($principal->subject)
                                    <p><i class="fas fa-book text-blue-500 mr-2 w-4 text-center"></i>Bidang: {{ $principal->subject }}</p>
                                @endif
                                @if($principal->nip)
                                    <p><i class="fas fa-id-card text-blue-500 mr-2 w-4 text-center"></i>NIP: {{ $principal->nip }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        {{-- Vice Principals --}}
        @if(isset($vicePrincipals) && $vicePrincipals->count() > 0)
            <div class="mb-12 sm:mb-16 reveal">
                <h2 class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-900 mb-6 sm:mb-8 text-center">Wakil Kepala Sekolah</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                    @foreach($vicePrincipals as $vp)
                        <div class="bg-white rounded-2xl shadow-sm hover:shadow-lg transition-all duration-300 overflow-hidden group border border-gray-100">
                            <div class="h-48 sm:h-52 lg:h-56 bg-gray-200 overflow-hidden">
                                @if($vp->photo)
                                    <img src="{{ asset('storage/' . $vp->photo) }}" alt="{{ $vp->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                                        <i class="fas fa-user-tie text-white text-5xl sm:text-6xl"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="p-4 sm:p-5 lg:p-6 text-center">
                                <h3 class="text-sm sm:text-base lg:text-lg font-bold text-gray-900 mb-1">{{ $vp->name }}</h3>
                                <p class="text-xs sm:text-sm text-blue-600 font-medium">{{ $vp->position }}</p>
                                @if($vp->subject)
                                    <p class="text-[11px] sm:text-xs text-gray-500 mt-1.5">{{ $vp->subject }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- Teachers Grid --}}
        @if(isset($teachers) && $teachers->count() > 0)
            <div class="reveal">
                <h2 class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-900 mb-6 sm:mb-8 text-center">Dewan Guru</h2>
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-3 sm:gap-4 lg:gap-6">
                    @foreach($teachers as $teacher)
                        <div class="bg-white rounded-xl sm:rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden group border border-gray-100">
                            <div class="aspect-square bg-gray-200 overflow-hidden">
                                @if($teacher->photo)
                                    <img src="{{ asset('storage/' . $teacher->photo) }}" alt="{{ $teacher->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-blue-300 to-blue-500 flex items-center justify-center">
                                        <i class="fas fa-user text-white text-3xl sm:text-4xl"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="p-2.5 sm:p-3 lg:p-4 text-center">
                                <h3 class="font-bold text-gray-900 text-[11px] sm:text-xs lg:text-sm line-clamp-1 mb-0.5">{{ $teacher->name }}</h3>
                                <p class="text-[10px] sm:text-[11px] lg:text-xs text-blue-600 font-medium">{{ $teacher->position ?? 'Guru' }}</p>
                                @if($teacher->subject)
                                    <p class="text-[10px] text-gray-500 mt-0.5 line-clamp-1">{{ $teacher->subject }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                @if(method_exists($teachers, 'links'))
                    <div class="mt-6 sm:mt-8 lg:mt-10">
                        {{ $teachers->links() }}
                    </div>
                @endif
            </div>
        @else
            <div class="text-center py-12 sm:py-16 reveal">
                <div class="w-16 h-16 sm:w-20 sm:h-20 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-chalkboard-teacher text-gray-400 text-2xl sm:text-3xl"></i>
                </div>
                <p class="text-sm sm:text-base text-gray-500">Belum ada data guru</p>
            </div>
        @endif
    </div>
</section>
@endsection
