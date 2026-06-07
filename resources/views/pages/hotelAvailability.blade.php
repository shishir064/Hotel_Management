@extends('layouts.app')

@section('title', $hotel->hotel_name)

@section('content')

    <div class="bg-gray-100 min-h-screen py-10">

        <div class="max-w-7xl mx-auto px-4">

            <!-- Hero Section -->
            <div class="bg-white rounded-3xl overflow-hidden shadow-lg">
    <div class="relative">

        <img src="{{ asset('storage/' . $hotel->cover_image) }}"
             alt="{{ $hotel->hotel_name }}"
             class="w-full h-125 object-cover">

        <!-- Dark gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent"></div>

        <!-- Hotel Info -->
        <div class="absolute bottom-0 left-0 z-10 p-8 text-white">

            <h1 class="text-5xl font-bold mb-3 drop-shadow-lg">
                {{ $hotel->hotel_name }}
            </h1>

            <div class="flex flex-wrap items-center gap-4 text-lg drop-shadow-md">

                <span class="flex items-center gap-1">
                    📍 {{ $hotel->city }}, {{ $hotel->country }}
                </span>

                <span class="text-yellow-400">
                    @for ($i = 0; $i < $hotel->star_rating; $i++)
                        ⭐
                    @endfor
                </span>

            </div>

        </div>

    </div>
</div>

            <!-- Main Content -->
            <div class="grid lg:grid-cols-3 gap-8 mt-8">

                <!-- Left Side -->
                <div class="lg:col-span-2 space-y-8">

                    <!-- Description -->
                    <div class="bg-white rounded-2xl shadow p-6">

                        <h2 class="text-2xl font-bold mb-4">
                            About This Hotel
                        </h2>

                        <p class="text-gray-600 leading-8">
                            {{ $hotel->description }}
                        </p>

                    </div>

                    <!-- Gallery -->
                    <div class="bg-white rounded-2xl shadow p-6">

                        <h2 class="text-2xl font-bold mb-6">
                            Hotel Gallery
                        </h2>

                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">

                            {{-- Main Cover Image --}}
                            <img src="{{ asset('storage/' . $hotel->cover_image) }}" alt="{{ $hotel->hotel_name }}"
                                class="w-full h-52 object-cover rounded-xl hover:scale-105 transition duration-300">

                            {{-- Additional Images --}}
                            {{-- Uncomment after creating HotelImage relationship --}}
                            @foreach ($hotel->images as $image)
                                <img src="{{ asset('storage/' . $image->image) }}" alt="Hotel Image"
                                    class="w-full h-52 object-cover rounded-xl hover:scale-105 transition duration-300">
                            @endforeach


                        </div>

                    </div>

                    <!-- Amenities -->
                    <div class="bg-white rounded-2xl shadow p-6">

                        <h2 class="text-2xl font-bold mb-6">
                            Amenities
                        </h2>

                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 text-gray-700">
                            @forelse($hotel->facilities as $facility)
                                <div>{{ $facility->name }}</div>
                            @empty
                                <div>No facilities found</div>
                            @endforelse

                        </div>

                    </div>

                </div>

                <!-- Right Side Booking Card -->
                <div>

                    <div class="bg-white rounded-2xl shadow-xl p-6 sticky top-24">

                        <p class="text-gray-500">
                            Starting from
                        </p>

                        <h2 class="text-4xl font-bold text-green-600">
                            Rs. 4000
                        </h2>

                        <p class="text-sm text-gray-500 mb-6">
                            per night
                        </p>

                        <button
                            class="w-full bg-blue-600 text-white py-3 rounded-xl font-semibold hover:bg-blue-700 transition">
                            Check Availability
                        </button>

                        <hr class="my-6">

                        <div class="space-y-4 text-sm text-gray-700">

                            <div>
                                📍 {{ $hotel->address }}
                            </div>

                            <div>
                                🏙 {{ $hotel->city }}, {{ $hotel->country }}
                            </div>

                            <div>
                                ⭐ {{ $hotel->star_rating }} Star Hotel
                            </div>

                            @if ($hotel->phone)
                                <div>
                                    📞 {{ $hotel->phone }}
                                </div>
                            @endif

                            @if ($hotel->email)
                                <div>
                                    ✉️ {{ $hotel->email }}
                                </div>
                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
