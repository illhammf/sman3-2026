@extends('layouts.app')

@section('title', $extracurricular->name)

@section('content')
<section class="relative pt-24 sm:pt-28 lg:pt-32 pb-10 sm:pb-12 lg:pb-16 bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 overflow-hidden">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex mb-6 text-xs sm:text-sm text-blue-200" aria-label="Breadcrumb">
            <ol class="inline-flex items-center flex-wrap gap-y-1">
                <li><a href="{{ url('/') }}" class="hover:text-white transition">Beranda</a></li>
                <li><span class="mx-2">/</span></li>
                <li><a href="{{ route('extracurriculars.index') }}" class="hover:text-white transition">Ekstrakurikuler</a></li>
                <li><span class="mx-2">/</span></li>
                <li class="text-white font-medium">{{ $extracurricular->name }}</li>
            </ol>
        </nav>
        <h1 class="text-2xl sm:text-3xl lg:text-4xl xl:text-5xl font-extrabold text-white leading-tight mb-3">{{ $extracurricular->name }}</h1>
    </div>
</section>

<section class="py-8 sm:py-10 lg:py-12 bg-gray-50 reveal">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="lg:flex">
            <div class="lg:w-1/3 bg-gradient-to-br from-blue-100 to-blue-50 flex items-center justify-center p-12">
                @if($extracurricular->photo)
                    <img src="{{ Storage::url($extracurricular->photo) }}" alt="{{ $extracurricular->name }}" class="w-full rounded-lg shadow-md">
                @else
                    <i class="fas fa-futbol text-8xl text-blue-400"></i>
                @endif
            </div>
            <div class="lg:w-2/3 p-8">
                <div class="prose max-w-none text-gray-600 leading-relaxed">
                    {!! nl2br(e($extracurricular->description)) !!}
                </div>
                <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="bg-blue-50 rounded-lg p-4">
                        <div class="flex items-center text-blue-600 mb-2">
                            <i class="fas fa-user-tie mr-2"></i>
                            <span class="font-semibold">Pembina</span>
                        </div>
                        <p class="text-gray-700">{{ $extracurricular->coach }}</p>
                    </div>
                    <div class="bg-blue-50 rounded-lg p-4">
                        <div class="flex items-center text-blue-600 mb-2">
                            <i class="fas fa-clock mr-2"></i>
                            <span class="font-semibold">Jadwal</span>
                        </div>
                        <p class="text-gray-700">{{ $extracurricular->schedule }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
