@extends('layouts.dashboard')

@section('title', $hotel->hotel_name)

@section('content')

    <div class="bg-gray-100 min-h-screen py-10">

        <div class="max-w-7xl mx-auto px-4">
            <x-successMessage></x-successMessage>

            <!-- Hero Section -->
            <div class="bg-white rounded-3xl overflow-hidden shadow-lg">

                <div class="relative w-full h-64 bg-cover bg-center rounded-lg shadow-lg"
                    style="background-image: url('{{ asset('storage/' . $hotel->cover_image) }}');">

                    {{-- <img
                    src="{{ asset('storage/' . $hotel->cover_image) }}"
                    alt="{{ $hotel->hotel_name }}"
                    class="w-full h-125 object-cover"> --}}

                    <div class="absolute inset-0 bg-linear-to-t from-black/70 via-black/20 to-transparent"></div>

                    <div class="absolute bottom-0 left-0 p-8 text-white">

                        <h1 class="text-5xl font-bold mb-3">
                            {{ $hotel->hotel_name }}
                        </h1>

                        <div class="flex flex-wrap items-center gap-4 text-lg">

                            <span>
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
                            About <span class="font-bold underline">{{ $hotel->hotel_name }}</span>
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
                            <img {{-- src="{{ asset('storage/' . $hotel->cover_image) }}"
                            alt="{{ $hotel->hotel_name }}"
                            class="w-full h-52 object-cover rounded-xl hover:scale-105 transition duration-300"> --}} {{-- Additional Images --}} {{-- Uncomment after creating HotelImage relationship --}}
                                @foreach ($hotel->images as $image)
                            <img
                                src="{{ asset('storage/' . $image->image) }}"
                                alt="Hotel Image"
                                class="w-full h-52 object-cover rounded-xl hover:scale-105 transition duration-300"> @endforeach
                                </div>

                        </div>

                        <!-- Facilities -->
                        <div class="bg-white rounded-2xl shadow p-6">
                            <div class="flex justify-between mb-4 items-center">

                                <h2 class="text-2xl font-bold mb-6">
                                    Facilities
                                </h2>

                                <a href="{{ route('show.hotel.facilities.select', $hotel->id) }}"
                                    class="block w-fit text-center bg-blue-600 text-white px-4 py-2  rounded-xl font-semibold hover:bg-blue-700 transition">
                                    Add Hotel Facilities
                                </a>
                            </div>

                            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 text-gray-700">
                                @forelse($hotel->facilities as $facility)
                                    <div>{{ $facility->name }}</div>
                                @empty
                                    <div>No facilities found</div>
                                @endforelse

                            </div>

                        </div>
                        <!-- Rooms Section -->
                        <div class="bg-white rounded-2xl shadow p-6 mt-8">

                            <div class="flex justify-between items-center mb-6">
                                <h2 class="text-2xl font-bold">
                                    Rooms
                                </h2>

                                <a href="{{ route('show_rooms_form', $hotel->id) }}"
                                    class="bg-green-600 text-white px-4 py-2 rounded-xl font-semibold hover:bg-green-700 transition">
                                    Add Room
                                </a>
                            </div>

                            <!-- Room Stats -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">

                                <div class="bg-blue-50 p-4 rounded-xl">
                                    <h3 class="text-sm text-gray-500">Total Rooms</h3>
                                    <p class="text-3xl font-bold">
                                        {{ $hotel->rooms->count() }}
                                    </p>
                                </div>

                                <div class="bg-green-50 p-4 rounded-xl">
                                    <h3 class="text-sm text-gray-500">Available Rooms</h3>
                                    <p class="text-3xl font-bold">
                                        {{ $hotel->rooms->where('room_status', 'available')->count() }}
                                    </p>
                                </div>

                                <div class="bg-red-50 p-4 rounded-xl">
                                    <h3 class="text-sm text-gray-500">Occupied Rooms</h3>
                                    <p class="text-3xl font-bold">
                                        {{ $hotel->rooms->where('room_status', 'occupied')->count() }}
                                    </p>
                                </div>

                            </div>

                            <!-- Room List -->
                            <div class="overflow-x-auto">
                                <table class="w-full border-collapse">
                                    <thead>
                                        <tr class="bg-gray-100">
                                            <th class="text-left p-3">Room No</th>
                                            <th class="text-left p-3">Type</th>
                                            <th class="text-left p-3">Price</th>
                                            <th class="text-left p-3">Status</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse($hotel->rooms as $room)
                                            <tr class="border-b">
                                                <td class="p-3">{{ $room->room_no }}</td>
                                                <td class="p-3">{{ $room->roomCategory?->category_name }}</td>
                                                <td class="p-3">Rs. {{ number_format($room->room_price) }}</td>
                                                <td class="p-3">
                                                    @if ($room->room_status == 'available')
                                                        <span class="text-green-600 font-semibold">
                                                            Available
                                                        </span>
                                                    @else
                                                        <span class="text-red-600 font-semibold">
                                                            Occupied
                                                        </span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="p-4 text-center text-gray-500">
                                                    No rooms added yet.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>

                    <!-- Right Side Booking Card -->
                    <div>

                        <div class="bg-white rounded-2xl shadow-xl p-6 sticky top-24">

                            <h3 class="text-xl font-bold mb-4">
                                Hotel Management
                            </h3>

                            <a href="{{ route('hotel.images.create', $hotel->id) }}"
                                class="block w-full text-center bg-blue-600 text-white py-3 rounded-xl font-semibold mb-4 hover:bg-blue-700 transition">
                                Add Hotel Images
                            </a>

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
