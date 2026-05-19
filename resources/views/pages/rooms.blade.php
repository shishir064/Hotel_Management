@extends('layouts.app')

@section('title', 'Hotels')

@section('content')
    <main class="pt-28 pb-20 max-w-7xl mx-auto px-6 lg:px-20">

        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between border-b border-gray-300 pb-8 mb-12">

            <div>
                <span class="uppercase tracking-[4px] text-sm text-gray-500">
                    34 Curated Sanctuaries Found
                </span>

                <h1 class="text-5xl md:text-7xl mt-3 text-black">
                    Destinations
                </h1>
            </div>

            <div class="mt-6 md:mt-0 flex items-center gap-4">

                <label class="uppercase text-sm font-semibold text-gray-500">
                    Sort by
                </label>

                <div class="relative">

                    <select
                        class="appearance-none bg-transparent border-b border-black py-1 pr-8 text-sm font-semibold outline-none cursor-pointer">

                        <option>Recommended</option>
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                        <option>Rating: Highest first</option>
                    </select>

                    <span
                        class="material-symbols-outlined absolute right-0 top-1/2 -translate-y-1/2 text-sm pointer-events-none">
                        expand_more
                    </span>
                </div>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-10">

            <!-- Sidebar -->
            <aside class="w-full lg:w-64 flex-shrink-0">

                <div class="sticky top-28 space-y-10">

                    <!-- Price -->
                    <div>

                        <h3 class="uppercase text-sm font-semibold mb-6">
                            Price Range
                        </h3>

                        <div class="space-y-4">

                            <input type="range" min="200" max="5000"
                                class="w-full accent-black cursor-pointer">

                            <div class="flex justify-between text-sm text-gray-500">
                                <span>$200</span>
                                <span>$5,000+</span>
                            </div>
                        </div>
                    </div>

                    <!-- Property -->
                    <div>

                        <h3 class="uppercase text-sm font-semibold mb-6">
                            Property Type
                        </h3>

                        <div class="space-y-3">

                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" class="accent-black">
                                <span class="text-gray-600">Villas & Estates</span>
                            </label>

                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" class="accent-black">
                                <span class="text-gray-600">Boutique Hotels</span>
                            </label>

                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" class="accent-black">
                                <span class="text-gray-600">Wellness Retreats</span>
                            </label>

                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" class="accent-black">
                                <span class="text-gray-600">Eco-Lodges</span>
                            </label>
                        </div>
                    </div>

                    <!-- Amenities -->
                    <div>

                        <h3 class="uppercase text-sm font-semibold mb-6">
                            Amenities
                        </h3>

                        <div class="space-y-3">

                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" class="accent-black">
                                <span class="text-gray-600">Private Pool</span>
                            </label>

                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" class="accent-black">
                                <span class="text-gray-600">Spa Services</span>
                            </label>

                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" class="accent-black">
                                <span class="text-gray-600">Concierge</span>
                            </label>

                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" class="accent-black">
                                <span class="text-gray-600">Gym</span>
                            </label>
                        </div>
                    </div>

                    <!-- Ratings -->
                    <div>

                        <h3 class="uppercase text-sm font-semibold mb-6">
                            Guest Rating
                        </h3>

                        <div class="space-y-3">

                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="radio" name="rating" class="accent-black">
                                <span class="text-gray-600">Exceptional (4.8+)</span>
                            </label>

                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="radio" name="rating" class="accent-black">
                                <span class="text-gray-600">Excellent (4.5+)</span>
                            </label>

                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="radio" name="rating" class="accent-black">
                                <span class="text-gray-600">Very Good (4.0+)</span>
                            </label>
                        </div>
                    </div>

                </div>
            </aside>

            <!-- Cards -->
            <div class="flex-1">

                <div class="grid grid-cols-1 xl:grid-cols-2 gap-8">

                    <!-- Card -->
                    <div class="bg-white rounded-lg overflow-hidden card-shadow transition duration-300 group">

                        <div class="relative h-80 overflow-hidden">

                            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuB7a6kB82Ulaze-g2UagfR1NSyE4TY_fuvA2jx_PsfFGEtsPpx8RRPAyRUG3tIFYa2Qfz8Da6f9oltS344neX8clInQIftyBOFQ6fa8Cv6ResKX3jlg2tDktTxOcR4QhsiJsvEKNR0RBn_f7W8jsUj6EmljvJ94TnRfxKhvCnag434BNfySiVu-o8bVWkdm0N3dRAQvDaRWTSH_-IxJqkfMJzlEDS4T7RdkTOj-9SLDc6ZGywZioFeMLreHt79waDV-RO7xoSue8ten"
                                class="w-full h-full object-cover transition duration-700 group-hover:scale-110"
                                alt="">

                            <button
                                class="absolute top-4 right-4 bg-white/20 backdrop-blur-md p-2 rounded-full text-white hover:bg-white hover:text-black transition">

                                <span class="material-symbols-outlined">
                                    favorite
                                </span>
                            </button>

                            <div class="absolute bottom-4 left-4">
                                <span class="bg-black text-white px-3 py-1 text-xs uppercase rounded">
                                    Featured
                                </span>
                            </div>
                        </div>

                        <div class="p-8">

                            <div class="flex justify-between items-start">

                                <div>

                                    <h2 class="text-2xl mb-1">
                                        Aurelia Cliffside Villa
                                    </h2>

                                    <p class="flex items-center gap-1 text-gray-600">
                                        <span class="material-symbols-outlined text-[18px]">
                                            location_on
                                        </span>

                                        Amalfi Coast, Italy
                                    </p>
                                </div>

                                <div class="bg-gray-100 px-3 py-1 rounded flex items-center gap-1">

                                    <span class="material-symbols-outlined text-[16px]"
                                        style="font-variation-settings:'FILL' 1;">
                                        star
                                    </span>

                                    <span class="font-semibold">
                                        4.9
                                    </span>
                                </div>
                            </div>

                            <div class="mt-8 flex justify-between items-end">

                                <div>

                                    <p class="uppercase text-xs tracking-wide text-gray-500 mb-1">
                                        Starting from
                                    </p>

                                    <p class="text-2xl font-bold">
                                        $1,250
                                        <span class="text-base font-normal text-gray-500">
                                            / night
                                        </span>
                                    </p>
                                </div>

                                <button class="border-b-2 border-black pb-1 hover:opacity-70 transition">
                                    View Sanctuary
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-white rounded-lg overflow-hidden card-shadow transition duration-300 group">

                        <div class="relative h-80 overflow-hidden">

                            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuALV0qrBUa-Z4SuwVZQEobTawIGeKfGttvfLgacMP3EjtjGhyRtJotIXQ-uRLMPMt4qi2eu97r1gJIEeIL0b_BrTlfCsKV4mxPa4Dgejqj5cylxD0bkuHJy4zkZP3L9iwbIDRiKEO7ExfTmdVPmbr5T2QxJ8MnUklqMqYpiuZttnw6eXt6LpsAuzI1JHxKuviSOk1wTtqixF2UjN1QlLgYc6tNupfoCDmAphTz7AyNfEaNjF8D-5RQF93JoswfMYrnGQ3hLPOZb16_U"
                                class="w-full h-full object-cover transition duration-700 group-hover:scale-110"
                                alt="">

                            <button
                                class="absolute top-4 right-4 bg-white/20 backdrop-blur-md p-2 rounded-full text-white hover:bg-white hover:text-black transition">

                                <span class="material-symbols-outlined">
                                    favorite
                                </span>
                            </button>
                        </div>

                        <div class="p-8">

                            <div class="flex justify-between items-start">

                                <div>

                                    <h2 class="text-2xl mb-1">
                                        The Obsidian Retreat
                                    </h2>

                                    <p class="flex items-center gap-1 text-gray-600">
                                        <span class="material-symbols-outlined text-[18px]">
                                            location_on
                                        </span>

                                        Santorini, Greece
                                    </p>
                                </div>

                                <div class="bg-gray-100 px-3 py-1 rounded flex items-center gap-1">

                                    <span class="material-symbols-outlined text-[16px]"
                                        style="font-variation-settings:'FILL' 1;">
                                        star
                                    </span>

                                    <span class="font-semibold">
                                        4.8
                                    </span>
                                </div>
                            </div>

                            <div class="mt-8 flex justify-between items-end">

                                <div>

                                    <p class="uppercase text-xs tracking-wide text-gray-500 mb-1">
                                        Starting from
                                    </p>

                                    <p class="text-2xl font-bold">
                                        $890
                                        <span class="text-base font-normal text-gray-500">
                                            / night
                                        </span>
                                    </p>
                                </div>

                                <button class="border-b-2 border-black pb-1 hover:opacity-70 transition">
                                    View Sanctuary
                                </button>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Pagination -->
                <div class="mt-20 flex justify-center items-center gap-6">

                    <button
                        class="w-10 h-10 border border-gray-300 rounded flex items-center justify-center hover:border-black hover:text-black transition">

                        <span class="material-symbols-outlined">
                            chevron_left
                        </span>
                    </button>

                    <div class="flex items-center gap-4 text-sm font-semibold">

                        <span class="text-black">01</span>
                        <span class="text-gray-500">02</span>
                        <span class="text-gray-500">03</span>
                        <span class="text-gray-500">...</span>
                        <span class="text-gray-500">08</span>
                    </div>

                    <button
                        class="w-10 h-10 border border-gray-300 rounded flex items-center justify-center hover:border-black hover:text-black transition">

                        <span class="material-symbols-outlined">
                            chevron_right
                        </span>
                    </button>
                </div>

            </div>
        </div>
    </main>

@endsection