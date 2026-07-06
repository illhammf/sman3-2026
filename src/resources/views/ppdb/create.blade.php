@extends('layouts.app')

@section('title', 'Form Pendaftaran PPDB ' . date('Y'))

@push('styles')
<style>
    .form-input { @apply w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-3 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:bg-white transition; }
    .form-label { @apply block text-sm font-semibold text-gray-700 mb-1.5; }
    .form-label .required { @apply text-red-500 ml-0.5; }
    .form-error { @apply text-red-500 text-xs mt-1; }
    .step-indicator { @apply flex items-center; }
    .step-dot { @apply w-10 h-10 rounded-full flex items-center justify-center text-sm font-bold transition-all duration-300; }
    .step-line { @apply flex-1 h-1 mx-2 rounded transition-all duration-300; }
</style>
@endpush

@section('content')
<section class="relative pt-32 pb-16 bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 overflow-hidden">
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-blue-400 rounded-full blur-3xl opacity-20"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-indigo-400 rounded-full blur-3xl opacity-20"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex mb-6 text-sm text-blue-200" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-2">
                <li><a href="{{ url('/') }}" class="hover:text-white transition">Beranda</a></li>
                <li><span class="mx-2">/</span></li>
                <li><a href="{{ route('ppdb.index') }}" class="hover:text-white transition">PPDB</a></li>
                <li><span class="mx-2">/</span></li>
                <li class="text-white font-medium">Pendaftaran</li>
            </ol>
        </nav>
        <div>
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-white leading-tight mb-4">Formulir Pendaftaran</h1>
            <p class="text-lg text-blue-100 max-w-2xl">Isi data diri dengan lengkap dan benar. Pastikan semua data sesuai dengan dokumen resmi.</p>
        </div>
    </div>
</section>

<section class="py-12 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <form method="POST" action="{{ route('ppdb.store') }}" class="space-y-8" id="ppdbForm">
            @csrf

            {{-- Data Pribadi --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-user text-blue-600"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">Data Pribadi</h2>
                        <p class="text-sm text-gray-500">Data diri calon peserta didik</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="md:col-span-2">
                        <label class="form-label">Nama Lengkap<span class="required">*</span></label>
                        <input type="text" name="full_name" value="{{ old('full_name') }}" class="form-input" placeholder="Nama lengkap sesuai akta/KK" required>
                        @error('full_name') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="form-label">Nama Panggilan</label>
                        <input type="text" name="nickname" value="{{ old('nickname') }}" class="form-input" placeholder="Nama panggilan sehari-hari">
                        @error('nickname') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="form-label">Jenis Kelamin<span class="required">*</span></label>
                        <select name="gender" class="form-input" required>
                            <option value="">Pilih jenis kelamin</option>
                            <option value="L" {{ old('gender') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('gender') == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('gender') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="form-label">Tempat Lahir<span class="required">*</span></label>
                        <input type="text" name="place_of_birth" value="{{ old('place_of_birth') }}" class="form-input" placeholder="Contoh: Tangerang" required>
                        @error('place_of_birth') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="form-label">Tanggal Lahir<span class="required">*</span></label>
                        <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" class="form-input" required>
                        @error('date_of_birth') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                    <div class="md:col-span-2">
                        <label class="form-label">Alamat<span class="required">*</span></label>
                        <textarea name="address" class="form-input" rows="3" placeholder="Alamat lengkap" required>{{ old('address') }}</textarea>
                        @error('address') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="form-label">RT/RW</label>
                        <input type="text" name="rt_rw" value="{{ old('rt_rw') }}" class="form-input" placeholder="Contoh: 001/002">
                        @error('rt_rw') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="form-label">Kelurahan/Desa<span class="required">*</span></label>
                        <input type="text" name="village" value="{{ old('village') }}" class="form-input" placeholder="Nama kelurahan/desa" required>
                        @error('village') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="form-label">Kecamatan<span class="required">*</span></label>
                        <input type="text" name="district" value="{{ old('district') }}" class="form-input" placeholder="Nama kecamatan" required>
                        @error('district') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="form-label">Kota/Kabupaten<span class="required">*</span></label>
                        <input type="text" name="city" value="{{ old('city') }}" class="form-input" placeholder="Nama kota/kabupaten" required>
                        @error('city') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="form-label">Kode Pos</label>
                        <input type="text" name="postal_code" value="{{ old('postal_code') }}" class="form-input" placeholder="Kode pos">
                        @error('postal_code') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="form-label">Nomor Telepon/HP<span class="required">*</span></label>
                        <input type="text" name="phone" value="{{ old('phone') }}" class="form-input" placeholder="Contoh: 0812xxxx" required>
                        @error('phone') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="form-label">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-input" placeholder="contoh@email.com">
                        @error('email') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            {{-- Data Asal Sekolah --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-school text-green-600"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">Asal Sekolah</h2>
                        <p class="text-sm text-gray-500">Data sekolah asal calon peserta didik</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="md:col-span-2">
                        <label class="form-label">Nama Sekolah Asal<span class="required">*</span></label>
                        <input type="text" name="previous_school" value="{{ old('previous_school') }}" class="form-input" placeholder="Nama lengkap SMP/MTs asal" required>
                        @error('previous_school') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                    <div class="md:col-span-2">
                        <label class="form-label">Alamat Sekolah Asal</label>
                        <textarea name="previous_school_address" class="form-input" rows="2" placeholder="Alamat lengkap sekolah asal">{{ old('previous_school_address') }}</textarea>
                        @error('previous_school_address') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="form-label">NISN</label>
                        <input type="text" name="nisn" value="{{ old('nisn') }}" class="form-input" placeholder="Nomor Induk Siswa Nasional" maxlength="20">
                        @error('nisn') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            {{-- Data Ayah --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-indigo-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-user-tie text-indigo-600"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">Data Ayah</h2>
                        <p class="text-sm text-gray-500">Informasi mengenai ayah calon peserta didik</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="md:col-span-2">
                        <label class="form-label">Nama Ayah<span class="required">*</span></label>
                        <input type="text" name="father_name" value="{{ old('father_name') }}" class="form-input" placeholder="Nama lengkap ayah" required>
                        @error('father_name') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="form-label">Pendidikan Ayah</label>
                        <select name="father_education" class="form-input">
                            <option value="">Pilih pendidikan</option>
                            <option value="SD" {{ old('father_education') == 'SD' ? 'selected' : '' }}>SD/Sederajat</option>
                            <option value="SMP" {{ old('father_education') == 'SMP' ? 'selected' : '' }}>SMP/Sederajat</option>
                            <option value="SMA" {{ old('father_education') == 'SMA' ? 'selected' : '' }}>SMA/Sederajat</option>
                            <option value="D1" {{ old('father_education') == 'D1' ? 'selected' : '' }}>D1</option>
                            <option value="D2" {{ old('father_education') == 'D2' ? 'selected' : '' }}>D2</option>
                            <option value="D3" {{ old('father_education') == 'D3' ? 'selected' : '' }}>D3</option>
                            <option value="D4" {{ old('father_education') == 'D4' ? 'selected' : '' }}>D4</option>
                            <option value="S1" {{ old('father_education') == 'S1' ? 'selected' : '' }}>S1</option>
                            <option value="S2" {{ old('father_education') == 'S2' ? 'selected' : '' }}>S2</option>
                            <option value="S3" {{ old('father_education') == 'S3' ? 'selected' : '' }}>S3</option>
                        </select>
                        @error('father_education') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="form-label">Pekerjaan Ayah</label>
                        <input type="text" name="father_occupation" value="{{ old('father_occupation') }}" class="form-input" placeholder="Pekerjaan ayah">
                        @error('father_occupation') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="form-label">Nomor Telepon Ayah</label>
                        <input type="text" name="father_phone" value="{{ old('father_phone') }}" class="form-input" placeholder="Nomor HP ayah">
                        @error('father_phone') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            {{-- Data Ibu --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-pink-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-user-tie text-pink-600"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">Data Ibu</h2>
                        <p class="text-sm text-gray-500">Informasi mengenai ibu calon peserta didik</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="md:col-span-2">
                        <label class="form-label">Nama Ibu<span class="required">*</span></label>
                        <input type="text" name="mother_name" value="{{ old('mother_name') }}" class="form-input" placeholder="Nama lengkap ibu" required>
                        @error('mother_name') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="form-label">Pendidikan Ibu</label>
                        <select name="mother_education" class="form-input">
                            <option value="">Pilih pendidikan</option>
                            <option value="SD" {{ old('mother_education') == 'SD' ? 'selected' : '' }}>SD/Sederajat</option>
                            <option value="SMP" {{ old('mother_education') == 'SMP' ? 'selected' : '' }}>SMP/Sederajat</option>
                            <option value="SMA" {{ old('mother_education') == 'SMA' ? 'selected' : '' }}>SMA/Sederajat</option>
                            <option value="D1" {{ old('mother_education') == 'D1' ? 'selected' : '' }}>D1</option>
                            <option value="D2" {{ old('mother_education') == 'D2' ? 'selected' : '' }}>D2</option>
                            <option value="D3" {{ old('mother_education') == 'D3' ? 'selected' : '' }}>D3</option>
                            <option value="D4" {{ old('mother_education') == 'D4' ? 'selected' : '' }}>D4</option>
                            <option value="S1" {{ old('mother_education') == 'S1' ? 'selected' : '' }}>S1</option>
                            <option value="S2" {{ old('mother_education') == 'S2' ? 'selected' : '' }}>S2</option>
                            <option value="S3" {{ old('mother_education') == 'S3' ? 'selected' : '' }}>S3</option>
                        </select>
                        @error('mother_education') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="form-label">Pekerjaan Ibu</label>
                        <input type="text" name="mother_occupation" value="{{ old('mother_occupation') }}" class="form-input" placeholder="Pekerjaan ibu">
                        @error('mother_occupation') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="form-label">Nomor Telepon Ibu</label>
                        <input type="text" name="mother_phone" value="{{ old('mother_phone') }}" class="form-input" placeholder="Nomor HP ibu">
                        @error('mother_phone') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            {{-- Data Wali (Opsional) --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-10 h-10 bg-gray-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-user-friends text-gray-600"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">Data Wali <span class="text-sm font-normal text-gray-400">(opsional)</span></h2>
                        <p class="text-sm text-gray-500">Diisi jika calon peserta didik tinggal bersama wali</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-6">
                    <div class="md:col-span-2">
                        <label class="form-label">Nama Wali</label>
                        <input type="text" name="guardian_name" value="{{ old('guardian_name') }}" class="form-input" placeholder="Nama lengkap wali">
                        @error('guardian_name') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="form-label">Pendidikan Wali</label>
                        <select name="guardian_education" class="form-input">
                            <option value="">Pilih pendidikan</option>
                            <option value="SD" {{ old('guardian_education') == 'SD' ? 'selected' : '' }}>SD/Sederajat</option>
                            <option value="SMP" {{ old('guardian_education') == 'SMP' ? 'selected' : '' }}>SMP/Sederajat</option>
                            <option value="SMA" {{ old('guardian_education') == 'SMA' ? 'selected' : '' }}>SMA/Sederajat</option>
                            <option value="D1" {{ old('guardian_education') == 'D1' ? 'selected' : '' }}>D1</option>
                            <option value="D2" {{ old('guardian_education') == 'D2' ? 'selected' : '' }}>D2</option>
                            <option value="D3" {{ old('guardian_education') == 'D3' ? 'selected' : '' }}>D3</option>
                            <option value="D4" {{ old('guardian_education') == 'D4' ? 'selected' : '' }}>D4</option>
                            <option value="S1" {{ old('guardian_education') == 'S1' ? 'selected' : '' }}>S1</option>
                            <option value="S2" {{ old('guardian_education') == 'S2' ? 'selected' : '' }}>S2</option>
                            <option value="S3" {{ old('guardian_education') == 'S3' ? 'selected' : '' }}>S3</option>
                        </select>
                        @error('guardian_education') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="form-label">Pekerjaan Wali</label>
                        <input type="text" name="guardian_occupation" value="{{ old('guardian_occupation') }}" class="form-input" placeholder="Pekerjaan wali">
                        @error('guardian_occupation') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="form-label">Nomor Telepon Wali</label>
                        <input type="text" name="guardian_phone" value="{{ old('guardian_phone') }}" class="form-input" placeholder="Nomor HP wali">
                        @error('guardian_phone') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            {{-- Submit --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8">
                <div class="flex flex-col sm:flex-row gap-4 items-center justify-between">
                    <p class="text-sm text-gray-500">
                        <i class="fas fa-info-circle text-blue-500 mr-1"></i>
                        Pastikan semua data yang diisi sudah benar. Data yang salah dapat menghambat proses verifikasi.
                    </p>
                    <button type="submit" class="inline-flex items-center px-8 py-4 bg-blue-600 text-white font-bold text-lg rounded-xl hover:bg-blue-700 transition shadow-lg disabled:opacity-50 disabled:cursor-not-allowed" id="submitBtn">
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
