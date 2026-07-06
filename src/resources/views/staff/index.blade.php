@extends('layouts.app')

@section('title', 'Tata Usaha')

@section('content')
    {{-- Hero Sub-header --}}
    <section class="relative pt-32 pb-16 bg-gradient-to-r from-blue-900 to-blue-800">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-4">Tata Usaha</h1>
                <nav class="flex justify-center text-sm text-blue-200" aria-label="Breadcrumb">
                    <ol class="flex items-center space-x-2">
                        <li><a href="{{ url('/') }}" class="hover:text-white transition">Beranda</a></li>
                        <li class="flex items-center">
                            <i class="fas fa-chevron-right mx-2 text-xs"></i>
                            <span class="text-white">Tata Usaha</span>
                        </li>
                    </ol>
                </nav>
                <p class="text-blue-100 mt-4 max-w-2xl mx-auto">Tenaga kependidikan yang profesional dalam mendukung kelancaran administrasi sekolah</p>
            </div>
        </div>
    </section>

    {{-- Content --}}
    <section class="py-12 sm:py-16 bg-gray-50">
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
