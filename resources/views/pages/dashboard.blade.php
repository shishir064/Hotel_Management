@extends('layouts.dashboard')
@section('title', 'dashborad')
@section('content')

    
        @if(session('success'))
            <div>{{ session('success') }}</div>
        @endif
    
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
                        100
                    </p>

                </div>
            </div>
            <!-- Arrivals -->
            <div class="glass-card p-6 shadow-sm flex flex-col justify-between">
                <div>
                    <div class="flex justify-between items-start">
                        <span
                            class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest">Total Booking</span>
                        <span class="material-symbols-outlined text-secondary" data-icon="person">bed</span>
                    </div>
                </div>
                <p class="font-headline-lg text-headline-lg mt-4">12</p>
               
            </div>
            <!-- Departures -->
            <div class="glass-card p-6 shadow-sm flex flex-col justify-between">
                <div>
                    <div class="flex justify-between items-start">
                        <span
                            class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest">Total Revenue</span>
                        <span class="material-symbols-outlined text-secondary" data-icon="attach_money">attach_money</span>
                    </div>
                </div>
                <p class="font-label-sm text-label-sm text-on-surface-variant mt-4">0$
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
                            <th
                                class="px-8 py-4 font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest">
                                Guest Name</th>
                            <th
                                class="px-8 py-4 font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest">
                                Room Type</th>
                            <th
                                class="px-8 py-4 font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest">
                                Check In</th>
                            <th
                                class="px-8 py-4 font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest">
                                Check Out</th>
                            <th
                                class="px-8 py-4 font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest">
                                Status</th>
                            <th class="px-8 py-4"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant">
                        <tr class="hover:bg-surface-container-lowest transition-colors">
                            <td class="px-8 py-5">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-secondary-fixed flex items-center justify-center font-label-md">
                                        EC</div>
                                    <span class="font-body-md font-semibold">Eleanor Campbell</span>
                                </div>
                            </td>
                            <td class="px-8 py-5 font-body-md text-on-surface-variant">Royal Penthouse</td>
                            <td class="px-8 py-5 font-body-md">Oct 12, 2023</td>
                            <td class="px-8 py-5 font-body-md">Oct 18, 2023</td>
                            <td class="px-8 py-5">
                                <span
                                    class="px-3 py-1 bg-tertiary-fixed text-on-tertiary-fixed font-label-sm text-label-sm rounded-full">Confirmed</span>
                            </td>
                            <td class="px-8 py-5 text-right">
                                <button class="text-on-surface-variant hover:text-primary"><span
                                        class="material-symbols-outlined"
                                        data-icon="more_vert">more_vert</span></button>
                            </td>
                        </tr>
                        <tr class="hover:bg-surface-container-lowest transition-colors">
                            <td class="px-8 py-5">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-primary-fixed flex items-center justify-center font-label-md">
                                        MR</div>
                                    <span class="font-body-md font-semibold">Marcus Reid</span>
                                </div>
                            </td>
                            <td class="px-8 py-5 font-body-md text-on-surface-variant">Ocean Terrace Suite</td>
                            <td class="px-8 py-5 font-body-md">Oct 12, 2023</td>
                            <td class="px-8 py-5 font-body-md">Oct 15, 2023</td>
                            <td class="px-8 py-5">
                                <span
                                    class="px-3 py-1 bg-surface-container-highest text-on-surface-variant font-label-sm text-label-sm rounded-full">Arriving
                                    Today</span>
                            </td>
                            <td class="px-8 py-5 text-right">
                                <button class="text-on-surface-variant hover:text-primary"><span
                                        class="material-symbols-outlined"
                                        data-icon="more_vert">more_vert</span></button>
                            </td>
                        </tr>
                        <tr class="hover:bg-surface-container-lowest transition-colors">
                            <td class="px-8 py-5">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-secondary-fixed-dim flex items-center justify-center font-label-md">
                                        LW</div>
                                    <span class="font-body-md font-semibold">Lydia Watson</span>
                                </div>
                            </td>
                            <td class="px-8 py-5 font-body-md text-on-surface-variant">Garden Pavilion</td>
                            <td class="px-8 py-5 font-body-md">Oct 13, 2023</td>
                            <td class="px-8 py-5 font-body-md">Oct 20, 2023</td>
                            <td class="px-8 py-5">
                                <span
                                    class="px-3 py-1 bg-tertiary-fixed text-on-tertiary-fixed font-label-sm text-label-sm rounded-full">Confirmed</span>
                            </td>
                            <td class="px-8 py-5 text-right">
                                <button class="text-on-surface-variant hover:text-primary"><span
                                        class="material-symbols-outlined"
                                        data-icon="more_vert">more_vert</span></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
        </section>
@endsection