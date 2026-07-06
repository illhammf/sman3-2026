@extends('layouts.app')

@section('title', 'Form Pendaftaran PPDB ' . date('Y'))

@push('styles')
<style>
    .form-input { @apply w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-3 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:bg-white transition-all; }
    .form-input.error { @apply border-red-300 bg-red-50 focus:border-red-500 focus:ring-red-200; }
    .form-label { @apply block text-sm font-semibold text-gray-700 mb-1.5; }
    .form-label .required { @apply text-red-500 ml-0.5; }
    .form-error { @apply text-red-500 text-xs mt-1.5 flex items-center gap-1; }
    .step-number { @apply w-8 h-8 sm:w-10 sm:h-10 rounded-full flex items-center justify-center text-sm font-bold transition-all duration-300 flex-shrink-0; }
    .step-line { @apply flex-1 h-0.5 mx-2 sm:mx-3 rounded transition-all duration-300; }
    @media (max-width: 480px) {
        .step-label { display: none; }
        .step-line { margin: 0 4px; }
    }
</style>
@endpush

@section('content')
<section class="relative pt-24 sm:pt-28 lg:pt-32 pb-10 sm:pb-12 lg:pb-16 bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 overflow-hidden">
    <div class="absolute inset-0">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-blue-400 rounded-full blur-3xl opacity-20"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-indigo-400 rounded-full blur-3xl opacity-20"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex mb-6 text-xs sm:text-sm text-blue-200" aria-label="Breadcrumb">
            <ol class="inline-flex items-center flex-wrap gap-y-1">
                <li><a href="{{ url('/') }}" class="hover:text-white transition">Beranda</a></li>
                <li><span class="mx-2">/</span></li>
                <li><a href="{{ route('ppdb.index') }}" class="hover:text-white transition">PPDB</a></li>
                <li><span class="mx-2">/</span></li>
                <li class="text-white font-medium">Pendaftaran</li>
            </ol>
        </nav>
        <div class="max-w-2xl">
            <span class="inline-flex items-center gap-2 px-3 py-1 bg-white/10 text-white/90 text-xs sm:text-sm font-medium rounded-full border border-white/10 mb-4">
                <i class="fas fa-edit"></i>
                Formulir Pendaftaran
            </span>
            <h1 class="text-2xl sm:text-3xl lg:text-4xl xl:text-5xl font-extrabold text-white leading-tight mb-3">Pendaftaran Peserta Didik Baru</h1>
            <p class="text-sm sm:text-base text-blue-100/80 leading-relaxed">Isi data diri dengan lengkap dan benar. Pastikan semua data sesuai dengan dokumen resmi.</p>
        </div>
    </div>
</section>

<section class="py-8 sm:py-10 lg:py-12 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <form method="POST" action="{{ route('ppdb.store') }}" class="space-y-6 sm:space-y-8" id="ppdbForm" novalidate>
            @csrf

            {{-- Step 1: Data Pribadi --}}
            <div class="bg-white rounded-xl sm:rounded-2xl shadow-sm border border-gray-100 p-5 sm:p-6 lg:p-8" data-step="1">
                <div class="flex items-center gap-3 mb-5 sm:mb-6 pb-4 sm:pb-5 border-b border-gray-100">
                    <div class="w-9 h-9 sm:w-10 sm:h-10 bg-blue-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-user text-blue-600 text-sm sm:text-base"></i>
                    </div>
                    <div>
                        <h2 class="text-base sm:text-xl font-bold text-gray-900">Data Pribadi</h2>
                        <p class="text-xs sm:text-sm text-gray-500">Data diri calon peserta didik</p>
                    </div>
                    <span class="ml-auto text-[11px] sm:text-xs text-blue-600 font-medium bg-blue-50 px-2.5 py-1 rounded-full">Langkah 1</span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-5">
                    <div class="md:col-span-2">
                        <label class="form-label">Nama Lengkap<span class="required">*</span></label>
                        <input type="text" name="full_name" value="{{ old('full_name') }}" class="form-input @error('full_name') error @enderror" placeholder="Nama lengkap sesuai akta/KK" required>
                        @error('full_name') <p class="form-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="form-label">Nama Panggilan</label>
                        <input type="text" name="nickname" value="{{ old('nickname') }}" class="form-input" placeholder="Nama panggilan">
                        @error('nickname') <p class="form-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="form-label">Jenis Kelamin<span class="required">*</span></label>
                        <select name="gender" class="form-input @error('gender') error @enderror" required>
                            <option value="">Pilih jenis kelamin</option>
                            <option value="L" {{ old('gender') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('gender') == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('gender') <p class="form-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="form-label">Tempat Lahir<span class="required">*</span></label>
                        <input type="text" name="place_of_birth" value="{{ old('place_of_birth') }}" class="form-input @error('place_of_birth') error @enderror" placeholder="Contoh: Tangerang" required>
                        @error('place_of_birth') <p class="form-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="form-label">Tanggal Lahir<span class="required">*</span></label>
                        <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" class="form-input @error('date_of_birth') error @enderror" required>
                        @error('date_of_birth') <p class="form-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p> @enderror
                    </div>
                    <div class="md:col-span-2">
                        <label class="form-label">Alamat<span class="required">*</span></label>
                        <textarea name="address" class="form-input @error('address') error @enderror" rows="3" placeholder="Alamat lengkap" required>{{ old('address') }}</textarea>
                        @error('address') <p class="form-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="form-label">RT/RW</label>
                        <input type="text" name="rt_rw" value="{{ old('rt_rw') }}" class="form-input" placeholder="Contoh: 001/002">
                        @error('rt_rw') <p class="form-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="form-label">Kelurahan/Desa<span class="required">*</span></label>
                        <input type="text" name="village" value="{{ old('village') }}" class="form-input @error('village') error @enderror" placeholder="Nama kelurahan/desa" required>
                        @error('village') <p class="form-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="form-label">Kecamatan<span class="required">*</span></label>
                        <input type="text" name="district" value="{{ old('district') }}" class="form-input @error('district') error @enderror" placeholder="Nama kecamatan" required>
                        @error('district') <p class="form-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="form-label">Kota/Kabupaten<span class="required">*</span></label>
                        <input type="text" name="city" value="{{ old('city') }}" class="form-input @error('city') error @enderror" placeholder="Nama kota/kabupaten" required>
                        @error('city') <p class="form-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="form-label">Kode Pos</label>
                        <input type="text" name="postal_code" value="{{ old('postal_code') }}" class="form-input" placeholder="Kode pos">
                        @error('postal_code') <p class="form-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="form-label">Nomor Telepon/HP<span class="required">*</span></label>
                        <input type="tel" name="phone" value="{{ old('phone') }}" class="form-input @error('phone') error @enderror" placeholder="Contoh: 0812xxxx" required>
                        @error('phone') <p class="form-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="form-label">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-input" placeholder="contoh@email.com">
                        @error('email') <p class="form-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            {{-- Step 2: Asal Sekolah --}}
            <div class="bg-white rounded-xl sm:rounded-2xl shadow-sm border border-gray-100 p-5 sm:p-6 lg:p-8" data-step="2">
                <div class="flex items-center gap-3 mb-5 sm:mb-6 pb-4 sm:pb-5 border-b border-gray-100">
                    <div class="w-9 h-9 sm:w-10 sm:h-10 bg-green-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-school text-green-600 text-sm sm:text-base"></i>
                    </div>
                    <div>
                        <h2 class="text-base sm:text-xl font-bold text-gray-900">Asal Sekolah</h2>
                        <p class="text-xs sm:text-sm text-gray-500">Data sekolah asal calon peserta didik</p>
                    </div>
                    <span class="ml-auto text-[11px] sm:text-xs text-green-600 font-medium bg-green-50 px-2.5 py-1 rounded-full">Langkah 2</span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-5">
                    <div class="md:col-span-2">
                        <label class="form-label">Nama Sekolah Asal<span class="required">*</span></label>
                        <input type="text" name="previous_school" value="{{ old('previous_school') }}" class="form-input @error('previous_school') error @enderror" placeholder="Nama lengkap SMP/MTs asal" required>
                        @error('previous_school') <p class="form-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p> @enderror
                    </div>
                    <div class="md:col-span-2">
                        <label class="form-label">Alamat Sekolah Asal</label>
                        <textarea name="previous_school_address" class="form-input" rows="2" placeholder="Alamat lengkap sekolah asal (jika diingat)">{{ old('previous_school_address') }}</textarea>
                        @error('previous_school_address') <p class="form-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="form-label">NISN</label>
                        <input type="text" name="nisn" value="{{ old('nisn') }}" class="form-input" placeholder="Nomor Induk Siswa Nasional" maxlength="20">
                        @error('nisn') <p class="form-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            {{-- Step 3: Data Orang Tua --}}
            <div class="bg-white rounded-xl sm:rounded-2xl shadow-sm border border-gray-100 p-5 sm:p-6 lg:p-8" data-step="3">
                <div class="flex items-center gap-3 mb-5 sm:mb-6 pb-4 sm:pb-5 border-b border-gray-100">
                    <div class="w-9 h-9 sm:w-10 sm:h-10 bg-indigo-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-users text-indigo-600 text-sm sm:text-base"></i>
                    </div>
                    <div>
                        <h2 class="text-base sm:text-xl font-bold text-gray-900">Data Orang Tua</h2>
                        <p class="text-xs sm:text-sm text-gray-500">Informasi orang tua calon peserta didik</p>
                    </div>
                    <span class="ml-auto text-[11px] sm:text-xs text-indigo-600 font-medium bg-indigo-50 px-2.5 py-1 rounded-full">Langkah 3</span>
                </div>

                <div class="mb-6 sm:mb-8">
                    <h3 class="font-bold text-gray-800 mb-4 flex items-center gap-2 text-sm sm:text-base">
                        <div class="w-6 h-6 bg-blue-100 rounded-md flex items-center justify-center">
                            <i class="fas fa-user-tie text-blue-600 text-xs"></i>
                        </div>
                        Data Ayah
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-5">
                        <div class="md:col-span-2">
                            <label class="form-label">Nama Ayah<span class="required">*</span></label>
                            <input type="text" name="father_name" value="{{ old('father_name') }}" class="form-input @error('father_name') error @enderror" placeholder="Nama lengkap ayah" required>
                            @error('father_name') <p class="form-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="form-label">Pendidikan Ayah</label>
                            <select name="father_education" class="form-input">
                                <option value="">Pilih pendidikan</option>
                                @foreach(['SD'=>'SD/Sederajat','SMP'=>'SMP/Sederajat','SMA'=>'SMA/Sederajat','D1'=>'D1','D2'=>'D2','D3'=>'D3','D4'=>'D4','S1'=>'S1','S2'=>'S2','S3'=>'S3'] as $val => $label)
                                    <option value="{{ $val }}" {{ old('father_education') == $val ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('father_education') <p class="form-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="form-label">Pekerjaan Ayah</label>
                            <input type="text" name="father_occupation" value="{{ old('father_occupation') }}" class="form-input" placeholder="Pekerjaan ayah">
                            @error('father_occupation') <p class="form-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="form-label">Nomor Telepon Ayah</label>
                            <input type="tel" name="father_phone" value="{{ old('father_phone') }}" class="form-input" placeholder="Nomor HP ayah">
                            @error('father_phone') <p class="form-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-6 sm:mb-8">
                    <h3 class="font-bold text-gray-800 mb-4 flex items-center gap-2 text-sm sm:text-base">
                        <div class="w-6 h-6 bg-pink-100 rounded-md flex items-center justify-center">
                            <i class="fas fa-user-tie text-pink-600 text-xs"></i>
                        </div>
                        Data Ibu
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-5">
                        <div class="md:col-span-2">
                            <label class="form-label">Nama Ibu<span class="required">*</span></label>
                            <input type="text" name="mother_name" value="{{ old('mother_name') }}" class="form-input @error('mother_name') error @enderror" placeholder="Nama lengkap ibu" required>
                            @error('mother_name') <p class="form-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="form-label">Pendidikan Ibu</label>
                            <select name="mother_education" class="form-input">
                                <option value="">Pilih pendidikan</option>
                                @foreach(['SD'=>'SD/Sederajat','SMP'=>'SMP/Sederajat','SMA'=>'SMA/Sederajat','D1'=>'D1','D2'=>'D2','D3'=>'D3','D4'=>'D4','S1'=>'S1','S2'=>'S2','S3'=>'S3'] as $val => $label)
                                    <option value="{{ $val }}" {{ old('mother_education') == $val ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('mother_education') <p class="form-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="form-label">Pekerjaan Ibu</label>
                            <input type="text" name="mother_occupation" value="{{ old('mother_occupation') }}" class="form-input" placeholder="Pekerjaan ibu">
                            @error('mother_occupation') <p class="form-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="form-label">Nomor Telepon Ibu</label>
                            <input type="tel" name="mother_phone" value="{{ old('mother_phone') }}" class="form-input" placeholder="Nomor HP ibu">
                            @error('mother_phone') <p class="form-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="font-bold text-gray-800 mb-4 flex items-center gap-2 text-sm sm:text-base">
                        <div class="w-6 h-6 bg-gray-100 rounded-md flex items-center justify-center">
                            <i class="fas fa-user-friends text-gray-600 text-xs"></i>
                        </div>
                        Data Wali <span class="text-xs font-normal text-gray-400">(opsional, isi jika tinggal bersama wali)</span>
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-5">
                        <div class="md:col-span-2">
                            <label class="form-label">Nama Wali</label>
                            <input type="text" name="guardian_name" value="{{ old('guardian_name') }}" class="form-input" placeholder="Nama lengkap wali">
                            @error('guardian_name') <p class="form-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="form-label">Pendidikan Wali</label>
                            <select name="guardian_education" class="form-input">
                                <option value="">Pilih pendidikan</option>
                                @foreach(['SD'=>'SD/Sederajat','SMP'=>'SMP/Sederajat','SMA'=>'SMA/Sederajat','D1'=>'D1','D2'=>'D2','D3'=>'D3','D4'=>'D4','S1'=>'S1','S2'=>'S2','S3'=>'S3'] as $val => $label)
                                    <option value="{{ $val }}" {{ old('guardian_education') == $val ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('guardian_education') <p class="form-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="form-label">Pekerjaan Wali</label>
                            <input type="text" name="guardian_occupation" value="{{ old('guardian_occupation') }}" class="form-input" placeholder="Pekerjaan wali">
                            @error('guardian_occupation') <p class="form-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="form-label">Nomor Telepon Wali</label>
                            <input type="tel" name="guardian_phone" value="{{ old('guardian_phone') }}" class="form-input" placeholder="Nomor HP wali">
                            @error('guardian_phone') <p class="form-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- Submit --}}
            <div class="bg-white rounded-xl sm:rounded-2xl shadow-sm border border-gray-100 p-5 sm:p-6 lg:p-8 reveal">
                <div class="flex flex-col sm:flex-row gap-4 items-center justify-between">
                    <div class="flex items-start gap-2 text-xs sm:text-sm text-gray-500">
                        <i class="fas fa-info-circle text-blue-500 mt-0.5"></i>
                        <span>Pastikan semua data yang diisi sudah benar. Data yang tidak sesuai dapat menghambat proses verifikasi.</span>
                    </div>
                    <button type="submit" class="w-full sm:w-auto inline-flex items-center justify-center px-6 sm:px-8 py-3 sm:py-4 bg-blue-600 text-white font-bold text-sm sm:text-base rounded-xl hover:bg-blue-700 transition-all shadow-lg hover:shadow-xl hover:scale-[1.02] active:scale-[0.98] disabled:opacity-50 disabled:cursor-not-allowed" id="submitBtn">
                        <i class="fas fa-paper-plane mr-2"></i>
                        Daftar Sekarang
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('ppdbForm');
        const submitBtn = document.getElementById('submitBtn');

        form.addEventListener('submit', function () {
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Mendaftarkan...';
        });
    });
</script>
@endpush
@endsection
