@extends('layouts.dashboard')

@section('content')
    <div x-data="{ search: '' }">

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <div class="bg-black text-white rounded-full px-3 py-2 text-sm">
                All Rooms
            </div>

            <input type="text" x-model.debounce.300ms="search" placeholder="Search Room..."
                class="border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Table -->
        <div class="overflow-x-auto bg-white rounded-2xl shadow-sm border border-gray-200">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-50 border-b">
                    <tr>
                        <th class="px-6 py-4 font-semibold text-gray-700">Room No</th>
                        <th class="px-6 py-4 font-semibold text-gray-700">Room Type</th>
                        <th class="px-6 py-4 font-semibold text-gray-700">Price</th>
                        <th class="px-6 py-4 font-semibold text-gray-700">Status</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @foreach ($rooms as $room)
                        <tr x-show="
                            '{{ strtolower($room->room_no) }}'.includes(search.toLowerCase()) ||
                            '{{ strtolower($room->roomCategory?->category_name ?? '') }}'.includes(search.toLowerCase()) ||
                            '{{ strtolower($room->room_status) }}'.includes(search.toLowerCase())
                        "
                            class="hover:bg-gray-50 room-row">
                            <!-- Room Number -->
                            <td class="px-6 py-4 font-medium text-gray-900">
                                {{ $room->room_no }}
                            </td>

                            <!-- Room Type -->
                            <td class="px-6 py-4 text-gray-700">
                                {{ $room->roomCategory?->category_name ?? 'N/A' }}
                            </td>

                            <!-- Price -->
                            <td class="px-6 py-4 text-gray-700">
                                Rs. {{ number_format($room->room_price) }}
                                <span class="text-gray-400 text-xs block">
                                    per night
                                </span>
                            </td>

                            <!-- Status -->
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center gap-2 rounded-full px-3 py-1 text-sm font-medium
                                @if ($room->room_status === 'available') bg-emerald-50 text-emerald-700
                                @elseif($room->room_status === 'occupied')
                                    bg-rose-50 text-rose-700
                                @else
                                    bg-amber-50 text-amber-700 @endif">
                                    <span
                                        class="w-2 h-2 rounded-full
                                    @if ($room->room_status === 'available') bg-emerald-500
                                    @elseif($room->room_status === 'occupied')
                                        bg-rose-500
                                    @else
                                        bg-amber-500 @endif"></span>

                                    {{ ucfirst($room->room_status) }}
                                </span>
                            </td>
                        </tr>
                    @endforeach

                    <!-- No Results -->
                    <tr x-show="search || rooms.length === 0">
                        <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                            No rooms found matching "<span x-text="search"></span>"
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
@endsection
