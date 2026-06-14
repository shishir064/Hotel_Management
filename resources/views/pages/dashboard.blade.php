@extends('layouts.dashboard')
@section('title', 'dashborad')
@section('content')

    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-gutter mb-10">
        <!-- Occupancy -->
        <div class="glass-card p-6 shadow-sm flex flex-col justify-between">
            <div class="flex flex-col h-full">

                <div class="flex justify-between items-start">
                    <span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest">
                        Total Guest
                    </span>

                    <span class="material-symbols-outlined text-secondary">
                        person
                    </span>
                </div>

                <p class="font-headline-lg text-headline-lg mt-auto">
                    {{ $guests->count() }}
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
            <p class="font-headline-lg text-headline-lg mt-4">{{ $rooms  }}</p>

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
            <p class="font-headline-lg text-headline-lg mt-4">{{ $roomBookings->count() }}</p>

        </div>
        <!-- Departures -->
        <div class="glass-card p-6 shadow-sm flex flex-col justify-between">
            <div>
                <div class="flex justify-between items-start">
                    <span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest">Total
                        Revenue</span>
                    <span class="material-symbols-outlined text-secondary" data-icon="currency_rupee">currency_rupee</span>
                </div>
            </div>
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
                                    <span class="font-body-md font-semibold">{{ $roomBooking->guest->name }}</span>
                                </div>
                            </td>
                            <td class="px-8 py-5 font-body-md text-on-surface-variant">{{ $roomBooking->room?->roomCategory?->category_name }}</td>
                            <td class="px-8 py-5 font-body-md">{{ $roomBooking->check_in  }}</td>
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
