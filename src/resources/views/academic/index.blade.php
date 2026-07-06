@extends('layouts.app')

@section('title', 'Kalender Akademik')

@section('content')
<section class="relative pt-24 sm:pt-28 lg:pt-32 pb-10 sm:pb-12 lg:pb-16 bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 overflow-hidden">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex mb-6 text-xs sm:text-sm text-blue-200" aria-label="Breadcrumb">
            <ol class="inline-flex items-center flex-wrap gap-y-1">
                <li><a href="{{ url('/') }}" class="hover:text-white transition">Beranda</a></li>
                <li><span class="mx-2">/</span></li>
                <li class="text-white font-medium">Kalender Akademik</li>
            </ol>
        </nav>
        <h1 class="text-2xl sm:text-3xl lg:text-4xl xl:text-5xl font-extrabold text-white leading-tight mb-3">Kalender Akademik</h1>
        <p class="text-sm sm:text-base text-blue-100/80 max-w-2xl">Tahun Pelajaran {{ date('Y') }}/{{ date('Y') + 1 }}</p>
    </div>
</section>

<section class="py-8 sm:py-10 lg:py-12 bg-gray-50 reveal">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    @if($events->count() > 0)
        <div class="space-y-10">
            @foreach($groupedEvents as $month => $monthEvents)
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-calendar-alt text-blue-500 mr-3"></i>
                        {{ $month }}
                    </h2>
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 divide-y divide-gray-100 overflow-hidden">
                        @foreach($monthEvents as $event)
                            <div class="p-5 hover:bg-gray-50 transition-colors duration-200">
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 mt-1">
                                        @php
                                            $typeColors = [
                                                'academic' => 'bg-blue-100 text-blue-700',
                                                'holiday' => 'bg-red-100 text-red-700',
                                                'exam' => 'bg-yellow-100 text-yellow-700',
                                                'activity' => 'bg-green-100 text-green-700',
                                            ];
                                            $typeIcons = [
                                                'academic' => 'fa-book',
                                                'holiday' => 'fa-umbrella-beach',
                                                'exam' => 'fa-file-alt',
                                                'activity' => 'fa-running',
                                            ];
                                            $typeColor = $typeColors[$event->type] ?? 'bg-gray-100 text-gray-700';
                                            $typeIcon = $typeIcons[$event->type] ?? 'fa-calendar';
                                        @endphp
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold {{ $typeColor }}">
                                            <i class="fas {{ $typeIcon }} mr-1"></i>
                                            {{ ucfirst($event->type) }}
                                        </span>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h3 class="font-bold text-gray-800">{{ $event->title }}</h3>
                                        @if($event->description)
                                            <p class="text-gray-500 text-sm mt-1">{{ $event->description }}</p>
                                        @endif
                                    </div>
                                    <div class="flex-shrink-0 text-right text-sm text-gray-500 whitespace-nowrap">
                                        <div>{{ \Carbon\Carbon::parse($event->start_date)->format('d M') }}</div>
                                        @if($event->end_date && $event->end_date !== $event->start_date)
                                            <div class="text-gray-400">- {{ \Carbon\Carbon::parse($event->end_date)->format('d M Y') }}</div>
                                        @else
                                            <div class="text-gray-400">{{ \Carbon\Carbon::parse($event->start_date)->format('Y') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-16">
            <i class="fas fa-calendar-alt text-6xl text-gray-300 mb-4"></i>
            <p class="text-gray-500 text-lg">Belum ada data kalender akademik</p>
        </div>
    @endif
</div>
</section>
@endsection
