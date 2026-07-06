@extends('layouts.app')

@section('title', 'Prestasi')

@section('content')
<div class="bg-gradient-to-r from-blue-600 to-blue-800 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h1 class="text-3xl font-bold text-white">Prestasi</h1>
        <p class="text-blue-200 mt-2">Pencapaian siswa, guru, dan sekolah</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="flex flex-wrap gap-2 mb-8" id="filter-tabs">
        <button class="filter-btn px-6 py-2 rounded-full text-sm font-medium transition-all duration-200 bg-blue-600 text-white shadow-md" data-filter="all">
            Semua
        </button>
        <button class="filter-btn px-6 py-2 rounded-full text-sm font-medium transition-all duration-200 bg-gray-100 text-gray-600 hover:bg-gray-200" data-filter="siswa">
            <i class="fas fa-user-graduate mr-1"></i> Siswa
        </button>
        <button class="filter-btn px-6 py-2 rounded-full text-sm font-medium transition-all duration-200 bg-gray-100 text-gray-600 hover:bg-gray-200" data-filter="guru">
            <i class="fas fa-chalkboard-teacher mr-1"></i> Guru
        </button>
        <button class="filter-btn px-6 py-2 rounded-full text-sm font-medium transition-all duration-200 bg-gray-100 text-gray-600 hover:bg-gray-200" data-filter="sekolah">
            <i class="fas fa-school mr-1"></i> Sekolah
        </button>
    </div>

    @if($achievements->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="achievements-grid">
            @foreach($achievements as $item)
                <div class="achievement-card bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-all duration-300 hover:-translate-y-1"
                     data-type="{{ $item->achieved_by_type ?? $item->type }}">
                    <div class="h-48 bg-gradient-to-br from-blue-50 to-gray-50 flex items-center justify-center overflow-hidden">
                        @if($item->photo)
                            <img src="{{ Storage::url($item->photo) }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                        @else
                            <div class="text-center">
                                <i class="fas fa-trophy text-5xl text-yellow-400"></i>
                                <p class="text-gray-400 text-sm mt-2">{{ $item->title }}</p>
                            </div>
                        @endif
                    </div>
                    <div class="p-5">
                        <div class="flex items-center gap-2 mb-3">
                            @if($item->type)
                                <span class="px-3 py-1 bg-blue-100 text-blue-700 text-xs font-semibold rounded-full">
                                    {{ ucfirst($item->type) }}
                                </span>
                            @endif
                            @if($item->scope)
                                <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">
                                    {{ ucfirst($item->scope) }}
                                </span>
                            @endif
                        </div>
                        <h3 class="font-bold text-gray-800 text-lg">{{ $item->title }}</h3>
                        <p class="text-gray-500 text-sm mt-1">
                            <i class="fas fa-user mr-1"></i> {{ $item->achieved_by }}
                        </p>
                        <p class="text-gray-400 text-xs mt-1">
                            <i class="fas fa-calendar-alt mr-1"></i> {{ \Carbon\Carbon::parse($item->achievement_date)->format('d F Y') }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $achievements->links() }}
        </div>
    @else
        <div class="text-center py-16">
            <i class="fas fa-trophy text-6xl text-gray-300 mb-4"></i>
            <p class="text-gray-500 text-lg">Belum ada data prestasi</p>
        </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const filterBtns = document.querySelectorAll('.filter-btn');
        const cards = document.querySelectorAll('.achievement-card');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                filterBtns.forEach(b => {
                    b.classList.remove('bg-blue-600', 'text-white', 'shadow-md');
                    b.classList.add('bg-gray-100', 'text-gray-600');
                });
                this.classList.remove('bg-gray-100', 'text-gray-600');
                this.classList.add('bg-blue-600', 'text-white', 'shadow-md');

                const filter = this.getAttribute('data-filter');

                cards.forEach(card => {
                    const type = card.getAttribute('data-type');
                    if (filter === 'all' || type === filter) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    });
</script>
@endpush
