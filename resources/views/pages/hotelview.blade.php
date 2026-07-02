@extends('layouts.app')

@section('title', 'Hotels')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-8  pb-20">
        <div class="bg-white p-4 rounded-lg  shadow mb-8">
            <form action="{{ route('search.hotel') }}" method="POST">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

                    <!-- City -->
                    <input type="text" name="city" value="{{ request('city') }}" placeholder="City..."
                        class="border rounded-lg px-4 py-2 w-full">

                    <!-- Star Rating -->
                    <select name="star" class="border rounded-lg px-4 py-2 w-full">

                        <option value="">All Stars</option>

                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}" {{ request('star') == $i ? 'selected' : '' }}>
                                {{ $i }} Star
                            </option>
                        @endfor

                    </select>

                    <!-- Search Button -->
                    <button type="submit" class="bg-blue-600 text-white rounded-lg px-4 py-2 hover:bg-blue-700">
                        Search Hotels
                    </button>

                </div>
            </form>
        </div>

        <h1 class="text-3xl font-bold mb-8">
            Available Hotels
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">

            @forelse ($hotels as $hotel)
                <div
                    class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 flex flex-col h-full">

                    <!-- Hotel Image -->
                    <div class="relative">
                        <img src="{{ asset('storage/' . $hotel->cover_image) }}" alt="{{ $hotel->hotel_name }}"
                            class="w-full h-56 object-cover">

                        <span
                            class="absolute top-3 right-3 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-sm font-semibold text-yellow-600 shadow">
                            ⭐ {{ $hotel->star_rating }}
                        </span>
                    </div>

                    <!-- Content -->
                    <div class="p-5 flex flex-col flex-1">

                        <!-- Name -->
                        <h2 class="text-xl font-bold text-gray-800">
                            {{ $hotel->hotel_name }}
                        </h2>

                        <!-- Location -->
                        <div class="flex items-center text-gray-500 mt-2">
                            <span class="material-symbols-outlined text-base mr-1">
                                location_on
                            </span>
                            <span>
                                {{ $hotel->city }}, {{ $hotel->country }}
                            </span>
                        </div>

                        <!-- Address -->
                        <p class="text-sm text-gray-400 mt-1">
                            {{ $hotel->address }}
                        </p>

                        <!-- Description -->
                        <p class="text-gray-600 text-sm mt-4 line-clamp-3 flex-grow">
                            {{ $hotel->description }}
                        </p>

                        <!-- Price & Button -->
                        <div class="border-t mt-6 pt-4 flex justify-between items-end">

                            <div>
                                <p class="text-xs text-gray-500">
                                    Starting from
                                </p>

                                <h3 class="text-2xl font-bold text-green-600">
                                    {{ number_format($hotel->rooms->min('room_price')) }}
                                </h3>

                                <p class="text-xs text-gray-500">
                                    per night
                                </p>
                            </div>

                            <a href="{{ route('hotel.availability', $hotel->id) }}"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition">
                                See Availability
                            </a>

                        </div>

                    </div>

                </div>
            @empty
                <div class="col-span-full bg-yellow-100 text-yellow-800 p-4 rounded">
                    No hotels found in "{{ request('city') }}"
                    @if (request('star'))
                        with {{ request('star') }} star rating.
                    @endif
                </div>
            @endforelse
        </div>
        <div class="mt-4 ">
            {{ $hotels->links() }}
        </div>

    </div>
@endsection
