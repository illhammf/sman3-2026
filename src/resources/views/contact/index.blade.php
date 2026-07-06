@extends('layouts.app')

@section('title', 'Kontak')

@section('content')
<div class="relative bg-gradient-to-br from-blue-600 to-blue-800">
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute inset-0 bg-black/30"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32">
        <nav class="flex mb-4 text-sm text-blue-100" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-2">
                <li><a href="{{ url('/') }}" class="hover:text-white transition">Beranda</a></li>
                <li><span class="mx-2">/</span></li>
                <li class="text-white font-medium">Kontak</li>
            </ol>
        </nav>
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Kontak</h1>
        <p class="text-xl text-blue-100 max-w-2xl">Hubungi kami untuk informasi lebih lanjut</p>
    </div>
</div>

<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-md p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">Kirim Pesan</h2>
                    <p class="text-gray-500 mb-8">Isi form di bawah ini untuk mengirim pesan kepada kami</p>

                    @if(session('success'))
                        <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-lg flex items-center">
                            <i class="fas fa-check-circle mr-3 text-green-500"></i>
                            <span>{{ session('success') }}</span>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded-lg">
                            <ul class="list-disc list-inside">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition outline-none @error('name') border-red-500 @enderror">
                                @error('name') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email <span class="text-red-500">*</span></label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition outline-none @error('email') border-red-500 @enderror">
                                @error('email') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                                <input type="tel" name="phone" id="phone" value="{{ old('phone') }}"
                                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition outline-none @error('phone') border-red-500 @enderror">
                                @error('phone') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subjek <span class="text-red-500">*</span></label>
                                <input type="text" name="subject" id="subject" value="{{ old('subject') }}" required
                                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition outline-none @error('subject') border-red-500 @enderror">
                                @error('subject') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Pesan <span class="text-red-500">*</span></label>
                            <textarea name="message" id="message" rows="6" required
                                      class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition outline-none resize-none @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
                            @error('message') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                        </div>
                        <button type="submit"
                                class="w-full md:w-auto px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition shadow-lg hover:shadow-xl flex items-center justify-center">
                            <i class="fas fa-paper-plane mr-2"></i>
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-white rounded-2xl shadow-md p-6">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-map-marker-alt text-red-500 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800">Alamat</h3>
                            <p class="text-sm text-gray-500 mt-1">Jl. Raya Serang KM. 14, Kecamatan, Kabupaten Tangerang, Banten 15560</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-md p-6">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-phone text-blue-500 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800">Telepon</h3>
                            <p class="text-sm text-gray-500 mt-1">(021) 1234-5678</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-md p-6">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-envelope text-green-500 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800">Email</h3>
                            <p class="text-sm text-gray-500 mt-1">info@sman3kabtangerang.sch.id</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-md p-6">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-clock text-yellow-500 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800">Jam Kerja</h3>
                            <p class="text-sm text-gray-500 mt-1">Senin - Jumat: 07:30 - 15:30 WIB</p>
                            <p class="text-sm text-gray-500">Sabtu: 07:30 - 12:00 WIB</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-md p-6">
                    <h3 class="font-semibold text-gray-800 mb-4">Ikuti Kami</h3>
                    <div class="flex space-x-3">
                        <a href="#" class="w-10 h-10 bg-blue-600 hover:bg-blue-700 text-white rounded-full flex items-center justify-center transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-pink-600 hover:bg-pink-700 text-white rounded-full flex items-center justify-center transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-red-600 hover:bg-red-700 text-white rounded-full flex items-center justify-center transition">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-blue-400 hover:bg-blue-500 text-white rounded-full flex items-center justify-center transition">
                            <i class="fab fa-tiktok"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Lokasi Kami</h2>
        <div class="rounded-2xl overflow-hidden shadow-md">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.0!2d106.0!3d-6.0!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMDAnMDAuMCJTIDEwNsKwMDAnMDAuMCJF!5e0!3m2!1sid!2sid!4v1"
                width="100%"
                height="400"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>
@endsection
