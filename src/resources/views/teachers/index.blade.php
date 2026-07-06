@extends('layouts.app')

@section('title', 'Guru')

@section('content')
    {{-- Hero Sub-header --}}
    <section class="relative pt-32 pb-16 bg-gradient-to-r from-blue-900 to-blue-800">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-4">Guru</h1>
                <nav class="flex justify-center text-sm text-blue-200" aria-label="Breadcrumb">
                    <ol class="flex items-center space-x-2">
                        <li><a href="{{ url('/') }}" class="hover:text-white transition">Beranda</a></li>
                        <li class="flex items-center">
                            <i class="fas fa-chevron-right mx-2 text-xs"></i>
                            <span class="text-white">Guru</span>
                        </li>
                    </ol>
                </nav>
                <p class="text-blue-100 mt-4 max-w-2xl mx-auto">Tenaga pendidik profesional yang berdedikasi tinggi dalam mendidik dan membimbing siswa</p>
            </div>
        </div>
    </section>

    {{-- Content --}}
    <section class="py-12 sm:py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Principal --}}
            @if(isset($principal))
                <div class="mb-16">
                    <div class="bg-white rounded-2xl shadow-xl overflow-hidden max-w-4xl mx-auto">
                        <div class="md:flex">
                            <div class="md:w-80 h-80 bg-gray-200 flex-shrink-0">
                                @if($principal->photo)
                                    <img src="{{ asset('storage/' . $principal->photo) }}" alt="{{ $principal->name }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center">
                                        <i class="fas fa-user-tie text-white text-7xl"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="p-8 md:p-10 flex flex-col justify-center">
                                <span class="text-sm font-semibold text-blue-600 bg-blue-50 px-3 py-1 rounded-full inline-block w-fit mb-4">Kepala Sekolah</span>
                                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">{{ $principal->name }}</h2>
                                <p class="text-gray-600 mb-4">{{ $principal->position ?? 'Kepala Sekolah' }}</p>
                                <div class="space-y-2 text-sm text-gray-500">
                                    @if($principal->subject)
                                        <p><i class="fas fa-book text-blue-500 mr-2"></i>Bidang: {{ $principal->subject }}</p>
                                    @endif
                                    @if($principal->nip)
                                        <p><i class="fas fa-id-card text-blue-500 mr-2"></i>NIP: {{ $principal->nip }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            {{-- Vice Principals --}}
            @if(isset($vicePrincipals) && $vicePrincipals->count() > 0)
                <div class="mb-16">
                    <h2 class="text-2xl font-bold text-gray-900 mb-8 text-center">Wakil Kepala Sekolah</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($vicePrincipals as $vp)
                            <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden group">
                                <div class="h-56 bg-gray-200 overflow-hidden">
                                    @if($vp->photo)
                                        <img src="{{ asset('storage/' . $vp->photo) }}" alt="{{ $vp->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    @else
                                        <div class="w-full h-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                                            <i class="fas fa-user-tie text-white text-6xl"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="p-6 text-center">
                                    <h3 class="text-lg font-bold text-gray-900 mb-1">{{ $vp->name }}</h3>
                                    <p class="text-sm text-blue-600 font-medium">{{ $vp->position }}</p>
                                    @if($vp->subject)
                                        <p class="text-xs text-gray-500 mt-2">{{ $vp->subject }}</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- Teachers Grid --}}
            @if(isset($teachers) && $teachers->count() > 0)
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-8 text-center">Dewan Guru</h2>
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach($teachers as $teacher)
                            <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden group">
                                <div class="h-48 bg-gray-200 overflow-hidden">
                                    @if($teacher->photo)
                                        <img src="{{ asset('storage/' . $teacher->photo) }}" alt="{{ $teacher->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    @else
                                        <div class="w-full h-full bg-gradient-to-br from-blue-300 to-blue-500 flex items-center justify-center">
                                            <i class="fas fa-user text-white text-5xl"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="p-4 text-center">
                                    <h3 class="font-bold text-gray-900 text-sm mb-1 line-clamp-1">{{ $teacher->name }}</h3>
                                    <p class="text-xs text-blue-600 font-medium">{{ $teacher->position ?? 'Guru' }}</p>
                                    @if($teacher->subject)
                                        <p class="text-xs text-gray-500 mt-1 line-clamp-1">{{ $teacher->subject }}</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if(method_exists($teachers, 'links'))
                        <div class="mt-10">
                            {{ $teachers->links() }}
                        </div>
                    @endif
                </div>
            @else
                <div class="text-center py-16">
                    <div class="w-20 h-20 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-chalkboard-teacher text-gray-400 text-3xl"></i>
                    </div>
                    <p class="text-gray-500 text-lg">Belum ada data guru</p>
                </div>
            @endif
        </div>
    </section>
@endsection
