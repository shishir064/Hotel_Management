@extends('layouts.dashboard')

@section('content')
<div x-data="{ search: '' }">

    <div class="flex justify-between items-center mb-6">
        <div class="bg-black text-white rounded-full px-3 py-2 text-sm">
            All Rooms
        </div>

        <input
            type="text"
            x-model.debounce.300ms="search"
            placeholder="Search Room..."
            class="border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
        >
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 xl:grid-cols-5 gap-6">

        @foreach ($rooms as $room)
            <div
                x-show="
                    '{{ strtolower($room->room_no) }}'.includes(search.toLowerCase()) 
                "
                x-transition
                class="group relative overflow-hidden rounded-3xl bg-white border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300"
            >

                <!-- Top Accent -->
                <div class="h-2
                    @if ($room->room_status === 'available')
                        bg-emerald-500
                    @elseif($room->room_status === 'occupied')
                        bg-rose-500
                    @else
                        bg-amber-500
                    @endif">
                </div>

                <div class="p-6">

                    <!-- Header -->
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-400 uppercase tracking-wider">
                                Room
                            </p>

                            <h2 class="mt-2 text-3xl font-bold text-gray-900">
                                {{ $room->room_no }}
                            </h2>
                        </div>

                        <span class="inline-flex items-center gap-2 rounded-full px-3 py-1 text-sm font-medium
                            @if ($room->room_status === 'available')
                                bg-emerald-50 text-emerald-700
                            @elseif($room->room_status === 'occupied')
                                bg-rose-50 text-rose-700
                            @else
                                bg-amber-50 text-amber-700
                            @endif">

                            <span class="w-2 h-2 rounded-full
                                @if ($room->room_status === 'available')
                                    bg-emerald-500
                                @elseif($room->room_status === 'occupied')
                                    bg-rose-500
                                @else
                                    bg-amber-500
                                @endif">
                            </span>

                            {{ ucfirst($room->room_status) }}
                        </span>
                    </div>

                    <!-- Divider -->
                    <div class="my-6 border-t border-dashed border-gray-200"></div>

                    <!-- Details -->
                    <div class="space-y-5">

                        <div class="flex items-center justify-between">
                            <span class="text-gray-500">
                                Room Type
                            </span>

                            <span class="font-semibold text-gray-800">
                                {{ $room->roomCategory?->category_name }}
                            </span>
                        </div>

                        <div class="flex items-end justify-between">
                            <span class="text-gray-500">
                                Price
                            </span>

                            <div class="text-right">
                                <span class="text-2xl font-bold text-gray-900">
                                    Rs. {{ number_format($room->room_price) }}
                                </span>

                                <p class="text-sm text-gray-400">
                                    per night
                                </p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        @endforeach

    </div>

</div>
@endsection