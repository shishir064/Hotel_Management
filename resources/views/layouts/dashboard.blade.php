<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <style>
        body {
            font-family: 'Hanken Grotesk', sans-serif;
            background: #f7f9fb;
            color: #191c1e;
            overflow-x: hidden;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
        }

        ::-webkit-scrollbar {
            width: 4px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #d8dadc;
            border-radius: 10px;
        }
    </style>
</head>

<body class="bg-surface font-body-md text-on-surface selection:bg-tertiary-fixed selection:text-on-tertiary-fixed">
    <!-- SideNavBar -->
    <aside
        class="fixed left-0 top-0 h-screen w-72  border-r text-white border-gray-200 shadow-lg flex flex-col z-50 bg-gray-800 backdrop-blur-md">

        {{-- @php
            $hotelName = auth()->user()?->hotel?->hotel_name ?? 'No Hotel';
        @endphp --}}
        @php
            $id = auth()->user()->id;
            $settings = \App\Models\Setting::find($id);
        @endphp
        <!-- Logo -->
        <div class="px-8 py-8 border-b flex justify-center items-center flex-col">
            <div class="w-18 h-18 rounded-full bg-blue-300 flex items-center justify-center font-label-md">
                <span class="text-2xl">{{ strtoupper(substr($settings->hotel_name ?? 'N', 0, 2)) }}</span>

            </div>

            <p class="text-sm text-white mt-1">
                Dashboard Management
            </p>
        </div>


        <!-- Navigation -->
        <nav class="flex-1 overflow-y-auto px-4 py-6 space-y-2">

            <!-- Dashboard -->
            @if (auth()->user()->hasRole('super-admin'))
                <a href="{{ route('superadmin.dashboard') }}"
                    class="flex items-center gap-4 px-4 py-3 rounded-xl  font-semibold hover:bg-gray-700 hover:text-white transition">
                    <span class="material-symbols-outlined">dashboard</span>
                    <span>Overview</span>
                </a>
            @else
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-4 px-4 py-3 rounded-xl  font-semibold hover:bg-gray-700 hover:text-white transition">
                    <span class="material-symbols-outlined">dashboard</span>
                    <span>Overview</span>
                </a>
            @endif
            <!-- Hotel Dropdown -->
            <div x-data="{ open: false }">
                @hasanyrole('super-admin')
                    <button @click="open=!open"
                        class="w-full flex items-center justify-between px-4 py-3 rounded-xl hover:bg-gray-700 transition">

                        <div class="flex items-center gap-4">
                            <span class="material-symbols-outlined">hotel</span>
                            <span>Hotels</span>
                        </div>

                        <span class="material-symbols-outlined text-sm" :class="open ? 'rotate-180' : ''">
                            expand_more
                        </span>
                    </button>
                    <div x-show="open" x-transition class="ml-12 mt-2 space-y-1">
                        <a href="{{ route('add_hotel') }}" class="block px-3 py-2 rounded-lg hover:bg-gray-700">
                            Add Hotel
                        </a>
                        <a href="{{ route('show.hotel.list') }}" class="block px-3 py-2 rounded-lg hover:bg-gray-700">
                            Hotel List
                        </a>
                        <a href="{{ route('show.hotel.facilities') }}" class="block px-3 py-2 rounded-lg hover:bg-gray-700">
                            Add Hotel Facilities
                        </a>
                    @endrole
                </div>

            </div>

            <!-- Room Dropdown -->
            <div x-data="{ open: false }">
                <button @click="open=!open"
                    class="w-full flex items-center justify-between px-4 py-3 rounded-xl hover:bg-gray-700 transition">

                    <div class="flex items-center gap-4">
                        <span class="material-symbols-outlined">hotel</span>
                        <span>Rooms</span>
                    </div>

                    <span class="material-symbols-outlined text-sm" :class="open ? 'rotate-180' : ''">
                        expand_more
                    </span>
                </button>

                <div x-show="open" x-transition class="ml-12 mt-2 space-y-1">
                    @hasanyrole('admin')
                        <a href="{{ route('show_rooms_form') }}" class="block px-3 py-2 rounded-lg hover:bg-gray-700">
                            Add Room
                        </a>
                        <a href="{{ route('show_rooms') }}" class="block px-3 py-2 rounded-lg hover:bg-gray-700">
                            Room List </a>

                        <a href="{{ route('room.available') }}"
                            class="flex items-center gap-4 px-3 py-2 rounded-xl hover:bg-gray-700 transition">
                            <span>Available Rooms</span>
                        </a>
                    @endhasanyrole

                    @role('super-admin')
                        <a href="{{ route('add_category') }}" class="block px-3 py-2 rounded-lg hover:bg-gray-700">
                            Room Types
                        </a>
                        <a href="{{ route('add_room_services') }}" class="block px-3 py-2 rounded-lg hover:bg-gray-700">
                            Room Room Services
                        </a>


                        <a href="{{ route('add_room_main_facilities') }}"
                            class="block px-3 py-2 rounded-lg hover:bg-gray-700">
                            Room Main Facilities
                        </a>
                        <a href="{{ route('add_room_amenities') }}" class="block px-3 py-2 rounded-lg hover:bg-gray-700">
                            Room Facilities
                        </a>
                    @endrole

                </div>
            </div>
            <div x-data="{ open: false }">
                @role('admin')
                    <button @click="open=!open"
                        class="w-full flex items-center justify-between px-4 py-3 rounded-xl hover:bg-gray-700 transition">

                        <div class="flex items-center gap-4">
                            <span class="material-symbols-outlined"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                                </svg>
                            </span>
                            <span>Bookings</span>
                        </div>

                        <span class="material-symbols-outlined text-sm" :class="open ? 'rotate-180' : ''">
                            expand_more
                        </span>
                    </button>
                    <div x-show="open" x-transition class="ml-12 mt-2 space-y-1">
                        <!-- Bookings -->
                        <a href="{{ route('bookings.index') }}"
                            class="flex items-center gap-4 px-4 py-3 rounded-xl hover:bg-gray-700 transition">
                            <span>All Booking </span>
                        </a>
                        <a href="{{ route('booking.index') }}"
                            class="flex items-center gap-4 px-4 py-3 rounded-xl hover:bg-gray-700 transition">
                            <span>New Booking </span>
                        </a>

                        <a href="{{ route('bookings.index', ['status' => 'confirmed']) }}"
                            class="flex items-center gap-4 px-4 py-3 rounded-xl hover:bg-gray-700 transition">
                            <span>Confirmed Booking</span>
                        </a>
                        <a href="{{ route('bookings.index', ['status' => 'checked_in']) }}"
                            class="flex items-center gap-4 px-4 py-3 rounded-xl hover:bg-gray-700 transition">
                            <span>Checked In</span>
                        </a>
                        <a href="{{ route('bookings.index', [
                            'status' => 'checked_out',
                            'payment_status' => 'unpaid',
                        ]) }}"
                            class="flex items-center gap-4 px-4 py-3 rounded-xl hover:bg-gray-700 transition">
                            <span>Checked Out</span>
                        </a>
                        <a href="{{ route('bookings.index', ['status' => 'cancelled']) }}"
                            class="flex items-center gap-4 px-4 py-3 rounded-xl hover:bg-gray-700 transition">
                            <span>Cancelled Booking</span>
                        </a>
                        <a href="{{ route('booking.history') }}"
                            class="flex items-center gap-4 px-4 py-3 rounded-xl hover:bg-gray-700 transition">
                            <span>Booking History</span>
                        </a>
                    @endrole
                </div>
            </div>

            @hasanyrole('admin')
                <div class="flex items-center gap-4 px-4 py-3">
                    <span class="material-symbols-outlined"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                        </svg>
                    </span>
                    <span>Bills</span>
                </div>
            @endhasanyrole

            <div x-data="{ open: false }">
                @hasanyrole('super-admin')
                    <button @click="open=!open"
                        class="w-full flex items-center justify-between px-4 py-3 rounded-xl hover:bg-gray-700 transition">

                        <div class="flex items-center gap-4">
                            <span class="material-symbols-outlined">hotel</span>
                            <span>Feeds</span>
                        </div>

                        <span class="material-symbols-outlined text-sm" :class="open ? 'rotate-180' : ''">
                            expand_more
                        </span>
                    </button>
                    <div x-show="open" x-transition class="ml-12 mt-2 space-y-1">
                        <a href="{{ route('add_featured_destinations') }}"
                            class="flex items-center gap-4 px-3 py-2 rounded-lg hover:bg-gray-700 transition">
                            <span>Add Destinations</span>
                        </a>
                        <a href="{{ route('trending-destinations.create') }}"
                            class="flex items-center gap-4 px-3 py-2 rounded-lg hover:bg-gray-700 transition">
                            <span>Add Trending Destinations</span>
                        </a>
                        <a href="{{ route('show.featured.destinations') }}"
                            class="block px-3 py-2 rounded-lg hover:bg-gray-700">
                            Destination List
                        </a>
                        <a href="{{ route('trending-destinations.index') }}"
                            class="block px-3 py-2 rounded-lg hover:bg-gray-700">
                            Trending Destination List
                        </a>
                    </div>
                @endrole

            </div>


            <!-- Users -->
            @role('super-admin')
                <a href="{{ route('user.list') }}"
                    class="flex items-center gap-4 px-4 py-3 rounded-xl hover:bg-gray-700 transition">
                    <span class="material-symbols-outlined">group</span>
                    <span>Users</span>
                </a>


                <!-- Roles -->
                <a href="{{ route('add_role') }}"
                    class="flex items-center gap-4 px-4 py-3 rounded-xl hover:bg-gray-700 transition">
                    <span class="material-symbols-outlined">group</span>
                    <span>Roles</span>
                </a>
            @endrole
            @role('admin')
                <a href="{{ route('show.hotel.profile') }}"
                    class="flex items-center gap-4 px-4 py-3 rounded-xl hover:bg-gray-700 transition">
                    <span class="material-symbols-outlined"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </span>
                    <span>Profile</span>
                </a>
            @endrole

            <!-- Settings -->
            <a href="{{ route('edit.settings') }}"
                class="flex items-center gap-4 px-4 py-3 rounded-xl hover:bg-gray-700 transition">
                <span class="material-symbols-outlined"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                </span>
                <span>Settings</span>
            </a>

            {{-- //configration --}}

            <a href="{{ route('web.settings') }}"
                class="flex items-center gap-4 px-4 py-3 rounded-xl hover:bg-gray-700 transition">
                <span class="material-symbols-outlined"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                </span>
                <span>Configration</span>
            </a>

        </nav>


    </aside>
    <!-- Main Content Area -->
    <main class="ml-72 pt-10 px-8 pb-12 min-h-screen bg-gray-100 ">
        <!-- Bento Grid: Key Metrics -->
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @stack('scripts')
</body>

</html>
