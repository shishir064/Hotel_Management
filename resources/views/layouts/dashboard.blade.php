<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Elysian Stays | Hotel Management Dashboard</title>
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
                href="#">
                <span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
                <span class="">Overview</span>
            </a>
            <a class="flex items-center gap-4 px-4 py-3 text-primary  hover:text-gray-600  transition-colors duration-200"
                href="#">
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
                class="w-full bg-primary text-on-primary py-3 px-4 flex items-center justify-center gap-2 font-label-md text-label-md active:scale-95 transition-transform">
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
            <div class="relative hidden lg:block">
                <input
                    class="bg-surface-container-low border-none focus:ring-1 focus:ring-primary text-body-md font-body-md px-10 py-2 w-64 rounded-full"
                    placeholder="Search guests, rooms..." type="text" />
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline"
                    data-icon="search">search</span>
            </div>
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
        <!-- Header Section -->
        <section class="mb-10 flex justify-between items-end">
            <div>
                <h2 class="font-headline-lg text-headline-lg text-primary">Overview</h2>
                <p class="font-body-md text-body-md text-on-surface-variant mt-2">Welcome back. Here is what is
                    happening at <span class="font-bold">Quick Stay</span> today.</p>
            </div>
            <div class="flex gap-4">
                <button
                    class="bg-primary text-on-primary px-6 py-2 font-label-md text-label-md active:scale-95 transition-transform">
                    Check In
                </button>
            </div>
        </section>
        <!-- Bento Grid: Key Metrics -->
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
        <!-- Middle Content Cluster -->
        {{-- <section class="grid grid-cols-1 lg:grid-cols-3 gap-gutter mb-10">
            <!-- Revenue Analytics Chart -->
            <div class="lg:col-span-2 glass-card p-8 shadow-sm">
                <div class="flex justify-between items-center mb-8">
                    <h3 class="font-headline-md text-headline-md">Revenue Analytics</h3>
                    <select
                        class="bg-transparent border-none font-label-sm text-label-sm text-on-surface-variant cursor-pointer focus:ring-0">
                        <option>Monthly View</option>
                        <option>Weekly View</option>
                    </select>
                </div>
                <div class="h-64 flex items-end justify-between gap-4">
                    <!-- Placeholder Bars for a premium chart look -->
                    <div class="flex-1 bg-surface-container-highest relative group">
                        <div
                            class="absolute bottom-0 w-full bg-secondary-fixed h-[40%] transition-all group-hover:bg-primary">
                        </div>
                        <span
                            class="absolute -bottom-6 left-1/2 -translate-x-1/2 font-label-sm text-label-sm">Jan</span>
                    </div>
                    <div class="flex-1 bg-surface-container-highest relative group">
                        <div
                            class="absolute bottom-0 w-full bg-secondary-fixed h-[55%] transition-all group-hover:bg-primary">
                        </div>
                        <span
                            class="absolute -bottom-6 left-1/2 -translate-x-1/2 font-label-sm text-label-sm">Feb</span>
                    </div>
                    <div class="flex-1 bg-surface-container-highest relative group">
                        <div
                            class="absolute bottom-0 w-full bg-secondary-fixed h-[45%] transition-all group-hover:bg-primary">
                        </div>
                        <span
                            class="absolute -bottom-6 left-1/2 -translate-x-1/2 font-label-sm text-label-sm">Mar</span>
                    </div>
                    <div class="flex-1 bg-surface-container-highest relative group">
                        <div
                            class="absolute bottom-0 w-full bg-secondary-fixed h-[70%] transition-all group-hover:bg-primary">
                        </div>
                        <span
                            class="absolute -bottom-6 left-1/2 -translate-x-1/2 font-label-sm text-label-sm">Apr</span>
                    </div>
                    <div class="flex-1 bg-surface-container-highest relative group">
                        <div
                            class="absolute bottom-0 w-full bg-secondary-fixed h-[85%] transition-all group-hover:bg-primary">
                        </div>
                        <span
                            class="absolute -bottom-6 left-1/2 -translate-x-1/2 font-label-sm text-label-sm">May</span>
                    </div>
                    <div class="flex-1 bg-surface-container-highest relative group">
                        <div class="absolute bottom-0 w-full bg-primary h-[90%]"></div>
                        <span
                            class="absolute -bottom-6 left-1/2 -translate-x-1/2 font-label-sm text-label-sm font-bold">Jun</span>
                    </div>
                    <div class="flex-1 bg-surface-container-highest relative group">
                        <div
                            class="absolute bottom-0 w-full bg-secondary-fixed h-[75%] transition-all group-hover:bg-primary">
                        </div>
                        <span
                            class="absolute -bottom-6 left-1/2 -translate-x-1/2 font-label-sm text-label-sm">Jul</span>
                    </div>
                </div>
            </div>
            <!-- Guest Satisfaction Widget -->
            <div class="glass-card p-8 shadow-sm flex flex-col">
                <h3 class="font-headline-md text-headline-md mb-6">Guest Satisfaction</h3>
                <div class="flex-1 space-y-6">
                    <div class="flex items-center gap-4">
                        <div class="w-16 h-16 rounded-full bg-tertiary-fixed flex items-center justify-center">
                            <span class="font-headline-md text-on-tertiary-fixed">4.9</span>
                        </div>
                        <div>
                            <p class="font-label-md text-label-md">Average Rating</p>
                            <div class="flex text-tertiary-fixed-dim">
                                <span class="material-symbols-outlined text-[16px]"
                                    style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="material-symbols-outlined text-[16px]"
                                    style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="material-symbols-outlined text-[16px]"
                                    style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="material-symbols-outlined text-[16px]"
                                    style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="material-symbols-outlined text-[16px]"
                                    style="font-variation-settings: 'FILL' 1;">star_half</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 bg-surface-container-low rounded-lg">
                        <p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest mb-2">
                            Sentiment Analysis</p>
                        <p class="font-body-md text-body-md italic text-on-surface">"Guests frequently mention the
                            'serene atmosphere' and 'exceptional concierge service' in recent 5-star reviews."</p>
                    </div>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center text-label-sm">
                            <span>Service</span>
                            <span class="font-bold">98%</span>
                        </div>
                        <div class="h-1 bg-surface-container-highest w-full">
                            <div class="h-full bg-primary w-[98%]"></div>
                        </div>
                        <div class="flex justify-between items-center text-label-sm">
                            <span>Cleanliness</span>
                            <span class="font-bold">94%</span>
                        </div>
                        <div class="h-1 bg-surface-container-highest w-full">
                            <div class="h-full bg-primary w-[94%]"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- Upcoming Bookings Table Section -->
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
    </main>
</body>

</html>
