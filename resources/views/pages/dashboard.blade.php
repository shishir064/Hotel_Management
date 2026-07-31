@extends('layouts.dashboard')
@section('title', 'dashborad')
@section('content')

    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-gutter mb-10">
        <x-successMessage></x-successMessage>
        <!-- Occupancy -->
        <div class="glass-card p-6 shadow-sm flex flex-col justify-between">
            <div class="flex flex-col h-full">

                <div class="flex justify-between items-start">
                    <span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest">
                        Total Guest
                    </span>

                    <span class="material-symbols-outlined text-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>

                    </span>
                </div>

                <p class="font-headline-lg text-headline-lg mt-auto">
                    {{-- {{ $guests->count() }} --}}
                    {{ $totalGuests }}
                </p>

            </div>
        </div>
        <!-- Rooms -->
        <div class="glass-card p-6 shadow-sm flex flex-col justify-between">
            <div>
                <div class="flex justify-between items-start">
                    <span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest">Total
                        Rooms</span>
                    <span class="material-symbols-outlined text-secondary" data-icon="person">bed</span>
                </div>
            </div>
            {{-- <p class="font-headline-lg text-headline-lg mt-4">{{ $rooms  }}</p> --}}
            <p class="font-headline-lg text-headline-lg mt-4">{{ $rooms }}</p>

        </div>
        <!-- Arrivals -->
        <div class="glass-card p-6 shadow-sm flex flex-col justify-between">
            <div>
                <div class="flex justify-between items-start">
                    <span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest">Total
                        Booking</span>
                    <span class="material-symbols-outlined text-secondary" data-icon="person">bed</span>
                </div>
            </div>
            {{-- <p class="font-headline-lg text-headline-lg mt-4">{{ $roomBookings->count() }}</p> --}}
            <p class="font-headline-lg text-headline-lg mt-4">{{ $totalBookings }}</p>

        </div>
        <!-- Departures -->
        <div class="glass-card p-6 shadow-sm flex flex-col justify-between">
            <div>
                <div class="flex justify-between items-start">
                    <span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest">Total
                        Revenue</span>
                    <span class="material-symbols-outlined text-secondary" data-icon="currency_rupee"><svg
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 8.25H9m6 3H9m3 6-3-3h1.5a3 3 0 1 0 0-6M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </span>
                </div>
            </div>
            {{-- <p class="font-label-sm text-label-sm text-on-surface-variant mt-4">Rs. {{ number_format($totalRevenue, 2) }} --}}
            <p class="font-label-sm text-label-sm text-on-surface-variant mt-4">Rs. {{ number_format($totalRevenue, 2) }}
            </p>
        </div>
    </section>

    <section class="glass-card shadow-sm overflow-hidden">
        <div class="px-8 py-6 border-b border-outline-variant flex justify-between items-center">
            <h3 class="font-headline-md text-headline-md">Recent Bookings</h3>
            <div class="flex gap-2">
                <span
                    class="px-3 py-1 bg-secondary-container text-on-secondary-container font-label-sm text-label-sm rounded-full">All
                    Bookings</span>
                {{-- <span
                        class="px-3 py-1 text-on-surface-variant font-label-sm text-label-sm rounded-full hover:bg-surface-container-low cursor-pointer">Pending</span> --}}
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-surface-container-low">
                    <tr>
                        <th class="px-8 py-4 font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest">
                            Guest Name</th>
                        <th class="px-8 py-4 font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest">
                            Room Type</th>
                        <th class="px-8 py-4 font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest">
                            Check In</th>
                        <th class="px-8 py-4 font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest">
                            Check Out</th>
                        <th class="px-8 py-4 font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest">
                            Status</th>
                        <th class="px-8 py-4"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant">
                    @foreach ($roomBookings as $roomBooking)
                        <tr class="hover:bg-surface-container-lowest transition-colors">
                            <td class="px-8 py-5">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-secondary-fixed flex items-center justify-center font-label-md">
                                        {{ $roomBooking->guest?->initials ?? 'N' }}</div>
                                    <span class="font-body-md font-semibold">
                                        {{ $roomBooking->user?->name ?? 'No User' }}</span>
                                </div>
                            </td>
                            <td class="px-8 py-5 font-body-md text-on-surface-variant">
                                {{ $roomBooking->room?->roomCategory?->category_name }}</td>
                            <td class="px-8 py-5 font-body-md">{{ $roomBooking->check_in }}</td>
                            <td class="px-8 py-5 font-body-md">{{ $roomBooking->check_out }}</td>
                            <td class="px-8 py-5">
                                <span
                                    class="px-3 py-1 bg-tertiary-fixed text-on-tertiary-fixed font-label-sm text-label-sm rounded-full">{{ $roomBooking->status }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </section>
@endsection
