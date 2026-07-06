@extends('layouts.app')

@section('title', 'Tata Usaha')

@section('content')
    {{-- Hero Sub-header --}}
    <section class="relative pt-24 sm:pt-28 lg:pt-32 pb-10 sm:pb-12 lg:pb-16 bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 overflow-hidden">
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex mb-6 text-xs sm:text-sm text-blue-200" aria-label="Breadcrumb">
                <ol class="inline-flex items-center flex-wrap gap-y-1">
                    <li><a href="{{ url('/') }}" class="hover:text-white transition">Beranda</a></li>
                    <li><span class="mx-2">/</span></li>
                    <li class="text-white font-medium">Tata Usaha</li>
                </ol>
            </nav>
            <h1 class="text-2xl sm:text-3xl lg:text-4xl xl:text-5xl font-extrabold text-white leading-tight mb-3">Tata Usaha</h1>
            <p class="text-sm sm:text-base text-blue-100/80 max-w-2xl">Tenaga kependidikan yang profesional dalam mendukung kelancaran administrasi sekolah</p>
        </div>
    </section>

    {{-- Content --}}
    <section class="py-8 sm:py-10 lg:py-12 bg-gray-50 reveal">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if(isset($staff) && $staff->count() > 0)
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($staff as $member)
                        <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden group">
                            <div class="h-48 bg-gray-200 overflow-hidden">
                                @if($member->photo)
                                    <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                                        <i class="fas fa-user text-white text-5xl"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="p-5 text-center">
                                <h3 class="font-bold text-gray-900 mb-1">{{ $member->name }}</h3>
                                <p class="text-sm text-blue-600 font-medium">{{ $member->position ?? 'Staff' }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if(method_exists($staff, 'links'))
                    <div class="mt-10">
                        {{ $staff->links() }}
                    </div>
                @endif
            @else
                <div class="text-center py-16">
                    <div class="w-20 h-20 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-users text-gray-400 text-3xl"></i>
                    </div>
                    <p class="text-gray-500 text-lg">Belum ada data tata usaha</p>
                </div>
            @endif
        </div>
    </section>
@endsection
