<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <link
        href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Text:wght@400;700&amp;family=Hanken+Grotesk:wght@400;500;600&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
    <aside class="fixed left-0 top-0 h-full w-64 shadow-sm  flex flex-col border-r  z-50">
        <div class="px-8 py-10">
            <h1 class="font-headline-md text-headline-md text-primary dark:text-on-surface tracking-tight">
                QuickStay </h1>
            <p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest mt-1">Dashoard
                Management</p>
        </div>
        <nav class="flex-1 px-4 space-y-1">
            <!-- Active Navigation -->
            <a class="flex items-center gap-4 px-4 py-3 text-primary font-bold border-b-2 hover:text-gray-600 transition-colors duration-200"
                href="{{ route('dashboard') }}">
                <span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
                <span class="">Overview</span>
            </a>
            <li x-data="{ open: false }">
                <button @click="open = !open" class="w-full flex justify-between items-center  gap-4 px-4 py-2">
                    <div class="flex items-center gap-4">
                        <span class="material-symbols-outlined test-black" data-icon="">add_box</span>
                        <span>Add</span>
                    </div>
                    <span>▼</span>
                </button>

                <ul x-show="open" class="pl-6">
                    <li>
                        <a href="{{ route('add_hotel') }}" class="block py-2">
                            Add Hotel
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('add_rooms') }}" class="block py-2">
                            Add Room
                        </a>
                    </li>

                    <li>
                        <a href="" class="block py-2">
                            Hotel Images
                        </a>
                    </li>
                </ul>
            </li>
            <a class="flex items-center gap-4 px-4 py-3 text-primary  hover:text-gray-600  transition-colors duration-200"
                href="#">
                <span class="material-symbols-outlined" data-icon="calendar_month">calendar_month</span>
                <span class="font-body-md text-body-md">Bookings</span>
            </a>
            <a class="flex items-center gap-4 px-4 py-3 text-primary  hover:text-gray-600 transition-colors duration-200"
                href="#">
                <span class="material-symbols-outlined text-black" data-icon="group">group</span>
                <span class="font-body-md text-black">Guests</span>
            </a>
            <a class="flex items-center gap-4 px-4 py-3 text-primary  hover:text-gray-600 transition-colors duration-200"
                href="{{ route('add_category') }}">
                <span class="material-symbols-outlined" data-icon="category">category</span>
                <span class="font-body-md text-body-md">Add Room Type</span>
            </a>
            <a class="flex items-center gap-4 px-4 py-3 text-primary  hover:text-gray-600 transition-colors duration-200"
                href="{{ route('add_room_amenities') }}">
                <span class="material-symbols-outlined" data-icon="category">category</span>
                <span class="font-body-md text-body-md">Add Room Amenities</span>
            </a>
            {{-- <a class="flex items-center gap-4 px-4 py-3 text-primary dark:text-secondary-fixed-dim hover:text-primary dark:hover:text-on-primary-fixed transition-colors duration-200"
                href="#">
                <span class="material-symbols-outlined" data-icon="assessment">assessment</span>
                <span class="font-body-md text-body-md">Reports</span>
            </a> --}}
        </nav>
        <div class="px-6 py-6 border-t border-outline-variant">
            <button
                class="w-full bg-primary text-on-primary py-3 px-4 flex items-center justify-center gap-2 font-label-md text-label-md active:scale-95 transition-transform rounded">
                <span class="material-symbols-outlined text-[18px]" data-icon="add">add</span>
                Add New Booking
            </button>
        </div>
        <div class="px-4 py-4 mb-4 space-y-1">
            <a class="flex items-center gap-4 px-4 py-2 text-primary hover:text-gray-600 transition-colors duration-200"
                href="#">
                <span class="material-symbols-outlined" data-icon="settings">settings</span>
                <span class="font-body-md text-body-md">Settings</span>
            </a>
        </div>
    </aside>
    <!-- Main Content Area -->
    <main class="ml-64 pt-14 px-8 pb-12 min-h-screen bg-gray-100 ">
        <!-- Bento Grid: Key Metrics -->
        @yield('content')
    </main>
</body>

</html>
