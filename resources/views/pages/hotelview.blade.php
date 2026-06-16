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

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            @forelse ($hotels as $hotel)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition h-full">

                    <div class="md:flex h-full">

                        <!-- Hotel Image -->
                        <div class="md:w-1/2">
                            <img src="{{ asset('storage/' . $hotel->cover_image) }}" alt="{{ $hotel->hotel_name }}"
                                class="w-full h-full md:h-full object-cover">
                            {{-- <img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTc9APxkj0xClmrU3PpMZglHQkx446nQPG6lA&s"
                            alt=""
                            class="w-full h-64 md:h-full object-cover"> --}}
                        </div>

                        <!-- Hotel Details -->
                        <div class="p-5 flex flex-col flex-1">

                            <div class="flex justify-between items-start gap-3">
                                <div class="flex-1">
                                    <h2 class="text-2xl font-bold leading-tight">
                                        {{ $hotel->hotel_name }}
                                    </h2>

                                    <p class="text-gray-600 mt-1 flex items-center">
                                        <span class="material-symbols-outlined">
                                            location_on
                                        </span>  
                                        <span>
                                            {{ $hotel->city }}, {{ $hotel->country }}
                                        </span>
                                    </p>
                                </div>

                                <span class="shrink-0 bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-medium">
                                    ⭐ {{ $hotel->star_rating }}
                                </span>
                            </div>

                            <p class="text-gray-500 mt-2">
                                {{ $hotel->address }}
                                {{-- Kathmandu, nepal --}}
                            </p>

                            <p class="mt-4 text-gray-700 line-clamp-3 min-h-18">
                                {{ $hotel->description }}
                                {{-- Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perferendis reprehenderit, veniam ipsam esse architecto magnam? --}}
                            </p>

                            <div class="mt-auto pt-5 flex justify-between items-end">

                                <div>
                                    <p class="text-sm text-gray-500">
                                        Starting from
                                    </p>

                                    <h3 class="text-2xl font-bold text-green-600">
                                        {{-- Rs. {{ number_format($hotel->price_per_night) }} --}}
                                        Rs. 4000
                                    </h3>

                                    <p class="text-sm text-gray-500">
                                        per night
                                    </p>
                                </div>

                                <a href="{{ route('hotel.availability', $hotel->id) }}"
                                    class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700">
                                    See Availability
                                    {{-- {{ route('hotel.show', $hotel->slug) }} --}}
                                </a>

                            </div>

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
