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
    <aside class="fixed left-0 top-0 h-full w-64 shadow-sm  flex flex-col border-r border-outline-variant z-50">
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
            <a class="flex items-center gap-4 px-4 py-3 text-primary  hover:text-gray-600  transition-colors duration-200"
                href="{{ route('add_rooms') }}">
                <span class="material-symbols-outlined" data-icon="">add_box</span>
                <span class="font-body-md text-body-md">Add Room</span>
            </a>
            <a class="flex items-center gap-4 px-4 py-3 text-primary  hover:text-gray-600  transition-colors duration-200"
                href="#">
                <span class="material-symbols-outlined" data-icon="calendar_month">calendar_month</span>
                <span class="font-body-md text-body-md">Bookings</span>
            </a>
            <a class="flex items-center gap-4 px-4 py-3 text-primary  hover:text-gray-600 transition-colors duration-200"
                href="#">
                <span class="material-symbols-outlined" data-icon="group">group</span>
                <span class="font-body-md text-body-md">Guests</span>
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
    <!-- TopNavBar -->
    <header
        class="fixed top-0 right-0 w-[calc(100%-256px)] h-16   backdrop-blur-md flex justify-between items-center px-8 z-40 shadow-sm transition-all">
        <div class="flex items-center gap-8">
            <nav class="flex gap-6 items-center">
                <a class="text-primary dark:text-on-surface font-bold border-b-2 border-tertiary-fixed-dim pb-1 font-label-md text-label-md"
                    href="#">Dashboard</a>
                <a class="text-on-surface-variant dark:text-on-secondary-fixed-variant hover:text-primary transition-all font-label-md text-label-md"
                    href="#">Staff</a>
            </nav>
        </div>
        <div class="flex items-center gap-6">
            <div class="flex items-center gap-4 border-l border-outline-variant pl-6">
                {{-- <button class="relative text-on-surface-variant hover:text-primary transition-colors">
                    <span class="material-symbols-outlined" data-icon="notifications">notifications</span>
                    <span class="absolute top-0 right-0 w-2 h-2 bg-error rounded-full"></span>
                </button>
                <button class="text-on-surface-variant hover:text-primary transition-colors">
                    <span class="material-symbols-outlined" data-icon="mail">mail</span>
                </button> --}}
                <div class="flex items-center gap-3 ml-2">
                    <div class="text-right">
                        <p class="font-label-md text-label-md leading-none">Shishir</p>
                        <p class="font-label-sm text-label-sm text-on-surface-variant">General Manager</p>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- Main Content Area -->
    <main class="ml-64 pt-24 px-8 pb-12 min-h-screen">
        <!-- Bento Grid: Key Metrics -->
        @yield('content')
    </main>
</body>

</html>
