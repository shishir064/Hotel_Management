<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link
        href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Text:wght@400;700&amp;family=Hanken+Grotesk:wght@400;500;600&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <style>
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
        class="fixed left-0 top-0 h-screen w-72  border-r border-gray-200 shadow-lg flex flex-col z-50 bg-white/90 backdrop-blur-md">

        <!-- Logo -->
        <div class="px-8 py-8 border-b">
            <h1 class="text-3xl font-bold text-gray-900">
                QuickStay
            </h1>
            <p class="text-sm text-gray-500 mt-1">
                Dashboard Management
            </p>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 overflow-y-auto px-4 py-6 space-y-2">

            <!-- Dashboard -->
            <a href="{{ route('dashboard') }}"
                class="flex items-center gap-4 px-4 py-3 rounded-xl  font-semibold hover:bg-blue-100 transition">
                <span class="material-symbols-outlined">dashboard</span>
                <span>Overview</span>
            </a>

            <!-- Hotel Dropdown -->
            <div x-data="{ open: false }">
                <button @click="open=!open"
                    class="w-full flex items-center justify-between px-4 py-3 rounded-xl hover:bg-gray-100 transition">
                    <div class="flex items-center gap-4">
                        <span class="material-symbols-outlined">apartment</span>
                        <span>Hotels</span>
                    </div>

                    <span class="material-symbols-outlined text-sm" :class="open ? 'rotate-180' : ''">
                        expand_more
                    </span>
                </button>

                <div x-show="open" x-transition class="ml-12 mt-2 space-y-1">
                    <a href="{{ route('add_hotel') }}" class="block px-3 py-2 rounded-lg hover:bg-gray-100">
                        Add Hotel
                    </a>

                    <a href="{{ route('show.hotel.list') }}" class="block px-3 py-2 rounded-lg hover:bg-gray-100">
                        Hotel List
                    </a>
                </div>
            </div>

            <!-- Room Dropdown -->
            <div x-data="{ open: false }">
                <button @click="open=!open"
                    class="w-full flex items-center justify-between px-4 py-3 rounded-xl hover:bg-gray-100 transition">

                    <div class="flex items-center gap-4">
                        <span class="material-symbols-outlined">hotel</span>
                        <span>Rooms</span>
                    </div>

                    <span class="material-symbols-outlined text-sm" :class="open ? 'rotate-180' : ''">
                        expand_more
                    </span>
                </button>

                <div x-show="open" x-transition class="ml-12 mt-2 space-y-1">

                    {{-- <a href="{{ route('show_rooms_form') }}" class="block px-3 py-2 rounded-lg hover:bg-gray-100">
                        Add Room
                    </a> --}}
                    <a href="{{ route('show_rooms') }}" class="block px-3 py-2 rounded-lg hover:bg-gray-100">
                        Room List </a>

                    <a href="{{ route('add_category') }}" class="block px-3 py-2 rounded-lg hover:bg-gray-100">
                        Room Types
                    </a>

                    <a href="{{ route('add_room_main_facilities') }}"
                        class="block px-3 py-2 rounded-lg hover:bg-gray-100">
                        Room Main Facilities
                    </a>
                    <a href="{{ route('add_room_amenities') }}" class="block px-3 py-2 rounded-lg hover:bg-gray-100">
                        Room Facilities
                    </a>

                </div>
            </div>

            <!-- Bookings -->
            <a href="" class="flex items-center gap-4 px-4 py-3 rounded-xl hover:bg-gray-100 transition">
                <span class="material-symbols-outlined">calendar_month</span>
                <span>Bookings</span>
            </a>

            <!-- Users -->
            <a href="{{ route('user.list') }}"
                class="flex items-center gap-4 px-4 py-3 rounded-xl hover:bg-gray-100 transition">
                <span class="material-symbols-outlined">group</span>
                <span>Users</span>
            </a>

            <!-- Roles -->
            <a href="{{ route('add_role') }}"
                class="flex items-center gap-4 px-4 py-3 rounded-xl hover:bg-gray-100 transition">
                <span class="material-symbols-outlined">group</span>
                <span>Roles</span>
            </a>

            <!-- Settings -->
            <a href="#" class="flex items-center gap-4 px-4 py-3 rounded-xl hover:bg-gray-100 transition">
                <span class="material-symbols-outlined">settings</span>
                <span>Settings</span>
            </a>

        </nav>


    </aside>
    <!-- Main Content Area -->
    <main class="ml-72 pt-10 px-8 pb-12 min-h-screen bg-gray-100 ">
        <!-- Bento Grid: Key Metrics -->
        @yield('content')
    </main>
</body>

</html>
