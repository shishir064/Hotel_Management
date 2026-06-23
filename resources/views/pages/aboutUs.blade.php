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

                <div class="bg-white border  rounded-3xl p-8 text-center hover:shadow-lg transition">
                    <div class="text-5xl mb-4 text-gray-700">
                        <span class="material-symbols-outlined" style="font-size:60px; ">
                            flash_on
                        </span>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Fast Booking</h3>
                    <p class="text-gray-600">
                        Reserve your room in just a few clicks.
                    </p>
                </div>

                <div class="bg-white border  rounded-3xl p-8 text-center hover:shadow-lg transition">
                    <div class="text-5xl mb-4 text-gray-700">
                        <span class="material-symbols-outlined" style="font-size:60px; ">
                            lock
                        </span>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Secure Payments</h3>
                    <p class="text-gray-600">
                        Safe and protected booking transactions.
                    </p>
                </div>

                <div class="bg-white border  rounded-3xl p-8 text-center hover:shadow-lg transition">
                    <div class="text-5xl mb-4 text-gray-700">
                        <span class="material-symbols-outlined" style="font-size:60px; ">
                            home
                        </span>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Quality Rooms</h3>
                    <p class="text-gray-600">
                        Comfortable accommodations for every traveler.
                    </p>
                </div>

                <div class="bg-white border  rounded-3xl p-8 text-center hover:shadow-lg transition">
                    <div class="text-5xl mb-4 text-gray-700">
                        <span class="material-symbols-outlined" style="font-size:60px; ">
                            mode_comment
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
                        <h3 class="text-5xl font-bold text-white">500+</h3>
                        <p class="text-indigo-100 mt-2">Rooms Available</p>
                    </div>

                    <div>
                        <h3 class="text-5xl font-bold text-white">1000+</h3>
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
