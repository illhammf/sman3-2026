@extends('layouts.app')

@section('title', $extracurricular->name)

@section('content')
<div class="bg-gradient-to-r from-blue-600 to-blue-800 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <a href="{{ route('extracurriculars.index') }}" class="inline-flex items-center text-blue-200 hover:text-white transition-colors mb-4">
            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Ekstrakurikuler
        </a>
        <h1 class="text-3xl font-bold text-white">{{ $extracurricular->name }}</h1>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 py-12">
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
@endsection
