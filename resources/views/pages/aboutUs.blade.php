@extends('layouts.app')

@section('content')
    <section class="bg-white">

        <!-- Hero Section -->
        <div class="bg-gradient-to-r from-gray-700 to-gray-600 py-20">
            <div class="max-w-7xl mx-auto px-6 text-center">

                <h1 class="text-5xl font-bold text-white mb-6">
                    About QuickStay
                </h1>

                <p class="text-xl text-indigo-100 max-w-3xl mx-auto">
                    QuickStay is your trusted hotel booking platform, designed to make finding and reserving the perfect
                    stay simple, fast, and secure.
                </p>

            </div>
        </div>

        <!-- About Section -->
        <div class="max-w-7xl mx-auto px-6 py-20">

            <div class="grid lg:grid-cols-2 gap-12 items-center">

                <div>
                    <h2 class="text-4xl font-bold text-gray-800 mb-6">
                        Who We Are
                    </h2>

                    <p class="text-gray-600 leading-relaxed mb-4">
                        QuickStay is a modern hotel booking platform created to connect travelers with comfortable
                        accommodations. Whether you're planning a business trip, family vacation, or weekend getaway, we
                        make booking rooms quick and hassle-free.
                    </p>

                    <p class="text-gray-600 leading-relaxed">
                        Our mission is to provide a seamless booking experience by offering an easy-to-use platform,
                        transparent pricing, secure reservations, and reliable customer support.
                    </p>
                </div>

                <div>
                    <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945" alt="Hotel"
                        class="rounded-3xl shadow-xl w-full h-[400px] object-cover">
                </div>

            </div>

        </div>

        <!-- Mission & Vision -->
        <div class="bg-gray-50 py-20">

            <div class="max-w-7xl mx-auto px-6">

                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-800">
                        Our Mission & Vision
                    </h2>
                </div>

                <div class="grid md:grid-cols-2 gap-8">

                    <div class="bg-white p-8 rounded-3xl shadow-md">
                        <div class="text-indigo-600  mb-4">
                            <span class="material-symbols-outlined" style="font-size:80px; ">
                                target
                            </span>
                        </div>

                        <h3 class="text-2xl font-bold text-gray-800 mb-4">
                            Our Mission
                        </h3>

                        <p class="text-gray-600">
                            To simplify hotel reservations through innovative technology, helping travelers find quality
                            accommodations at the best value.
                        </p>
                    </div>

                    <div class="bg-white p-8 rounded-3xl shadow-md">
                        <div class="text-purple-600 text-4xl mb-4">
                            <span class="material-symbols-outlined" style="font-size:80px; ">
                                rocket_launch
                            </span>
                        </div>

                        <h3 class="text-2xl font-bold text-gray-800 mb-4">
                            Our Vision
                        </h3>

                        <p class="text-gray-600">
                            To become the most trusted and user-friendly hotel booking platform, providing exceptional
                            travel experiences worldwide.
                        </p>
                    </div>

                </div>

            </div>

        </div>

        <!-- Why Choose Us -->
        <div class="max-w-7xl mx-auto px-6 py-20">

            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800">
                    Why Choose QuickStay?
                </h2>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">

                <div
                    class="bg-white border flex flex-col justify-center items-center rounded-3xl p-8 text-center hover:shadow-lg transition">
                    <div class="text-5xl mb-4 text-gray-700">
                        <span style="font-size:60px; ">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-15">
                                <path fill-rule="evenodd"
                                    d="M14.615 1.595a.75.75 0 0 1 .359.852L12.982 9.75h7.268a.75.75 0 0 1 .548 1.262l-10.5 11.25a.75.75 0 0 1-1.272-.71l1.992-7.302H3.75a.75.75 0 0 1-.548-1.262l10.5-11.25a.75.75 0 0 1 .913-.143Z"
                                    clip-rule="evenodd" />
                            </svg>

                        </span>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Fast Booking</h3>
                    <p class="text-gray-600">
                        Reserve your room in just a few clicks.
                    </p>
                </div>

                <div
                    class="bg-white border flex flex-col justify-center items-center rounded-3xl p-8 text-center hover:shadow-lg transition">
                    <div class="text-5xl mb-4 text-gray-700">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-15">
                                <path fill-rule="evenodd"
                                    d="M12 1.5a5.25 5.25 0 0 0-5.25 5.25v3a3 3 0 0 0-3 3v6.75a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3v-6.75a3 3 0 0 0-3-3v-3c0-2.9-2.35-5.25-5.25-5.25Zm3.75 8.25v-3a3.75 3.75 0 1 0-7.5 0v3h7.5Z"
                                    clip-rule="evenodd" />
                            </svg>

                        </span>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Secure Payments</h3>
                    <p class="text-gray-600">
                        Safe and protected booking transactions.
                    </p>
                </div>

                <div
                    class="bg-white border flex flex-col justify-between items-center rounded-3xl p-8 text-center hover:shadow-lg transition">
                    <div class="text-5xl mb-4 text-gray-700">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-15">
                                <path
                                    d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                                <path
                                    d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                            </svg>

                        </span>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Quality Rooms</h3>
                    <p class="text-gray-600">
                        Comfortable accommodations for every traveler.
                    </p>
                </div>

                <div
                    class="bg-white border flex flex-col justify-between items-center rounded-3xl p-8 text-center hover:shadow-lg transition">
                    <div class="text-5xl mb-4 text-gray-700">
                        <span class="material-symbols-outlined" style="font-size:60px; ">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-15">
                                <path
                                    d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                                <path
                                    d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                            </svg>

                        </span>
                    </div>
                    <h3 class="text-xl font-bold mb-3">24/7 Support</h3>
                    <p class="text-gray-600">
                        Dedicated customer support whenever you need help.
                    </p>
                </div>

            </div>

        </div>

        <!-- Statistics -->
        <div class="bg-gray-600 py-20">

            <div class="max-w-7xl mx-auto px-6">

                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">

                    <div>
                        <h3 class="text-5xl font-bold text-white">{{ $totalRoom }}</h3>
                        <p class="text-indigo-100 mt-2">Rooms Available</p>
                    </div>

                    <div>
                        <h3 class="text-5xl font-bold text-white">{{ $totalUser }}</h3>
                        <p class="text-indigo-100 mt-2">Happy Guests</p>
                    </div>

                    <div>
                        <h3 class="text-5xl font-bold text-white">24/7</h3>
                        <p class="text-indigo-100 mt-2">Support</p>
                    </div>

                    <div>
                        <h3 class="text-5xl font-bold text-white">99%</h3>
                        <p class="text-indigo-100 mt-2">Customer Satisfaction</p>
                    </div>

                </div>

            </div>

        </div>

        <!-- CTA -->
        <div class="py-20">

            <div class="max-w-4xl mx-auto px-6 text-center">

                <h2 class="text-4xl font-bold text-gray-800 mb-6">
                    Ready to Book Your Next Stay?
                </h2>

                <p class="text-gray-600 text-lg mb-8">
                    Explore our available rooms and enjoy a comfortable, convenient, and memorable stay with QuickStay.
                </p>

                <a href="{{ route('show.hotel') }}"
                    class="inline-block px-8 py-4 bg-indigo-700 text-white font-semibold rounded-xl hover:bg-indigo-600 transition">
                    Browse Rooms
                </a>

            </div>

        </div>

    </section>
@endsection
