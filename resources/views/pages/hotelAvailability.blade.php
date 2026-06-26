@extends('layouts.app')

@section('content')
    <div class="bg-gray-100 min-h-screen">

        

        <!-- Hotel Info -->
        <div class="max-w-7xl mx-auto px-4 py-8">

            <div class="bg-white rounded-xl shadow-sm p-6 mb-6">

                <div class="flex flex-col lg:flex-row gap-6">

                    <!-- Hotel Image -->
                    <div class="lg:w-1/3">
                        <img src="{{ asset('storage/' . $hotel->cover_image) }}"
                            class="w-full h-64 object-cover rounded-lg" alt="{{ $hotel->hotel_name }}">
                    </div>

                    <!-- Hotel Details -->
                    <div class="flex-1">

                        <div class="flex justify-between items-start">
                            <div>
                                <h1 class="text-3xl font-bold">
                                    {{ $hotel->hotel_name }}
                                </h1>

                                <p class="text-gray-600 mt-2">
                                    📍 {{ $hotel->address }}
                                </p>

                                <div class="mt-2 flex items-center gap-2">
                                    <span class="bg-blue-700 text-white px-2 py-1 rounded text-sm">
                                        {{ $hotel->rating }}/10
                                    </span>

                                    <span class="font-medium">
                                        Excellent
                                    </span>
                                </div>
                            </div>

                            <div class="text-right">
                                <p class="text-sm text-gray-500">
                                    Price from
                                </p>

                                <p class="text-3xl font-bold text-green-600">
                                    NPR {{ number_format($hotel->rooms->min('price')) }}
                                </p>

                                <p class="text-sm text-gray-500">
                                    per night
                                </p>
                            </div>
                        </div>

                        <p class="mt-4 text-gray-700">
                            {{ $hotel->description }}
                        </p>

                    </div>

                </div>

            </div>
            <!-- Hotel Gallery -->
            <div class="max-w-7xl mx-auto px-4 pt-8">



                @if ($hotel->images->count())
                    <div x-data="{ open: false }">

                        <!-- Gallery Grid -->
                        <div class="grid grid-cols-1 lg:grid-cols-4 gap-2 rounded-xl overflow-hidden">

                            <!-- Main Image -->
                            <div class="lg:col-span-2 lg:row-span-2">
                                <img src="{{ asset('storage/' . $hotel->cover_image) }}" alt="{{ $hotel->hotel_name }}"
                                    class="w-full h-[450px] object-cover cursor-pointer hover:brightness-90 transition"
                                    @click="open = true">
                            </div>

                            <!-- Small Images -->
                            @foreach ($hotel->images->skip(1)->take(4) as $image)
                                <div>
                                    <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $hotel->hotel_name }}"
                                        class="w-full h-[220px] object-cover cursor-pointer hover:brightness-90 transition"
                                        @click="open = true">
                                </div>
                            @endforeach

                        </div>

                        <!-- Show All Photos Button -->
                        @if ($hotel->images->count() > 5)
                            <div class="mt-4 text-right">
                                <button @click="open = true"
                                    class="bg-white border border-gray-300 hover:bg-gray-100 px-4 py-2 rounded-lg font-medium shadow-sm">
                                    Show all {{ $hotel->images->count() }} photos
                                </button>
                            </div>
                        @endif

                        <!-- Fullscreen Gallery Modal -->
                        <div x-show="open" x-cloak class="fixed inset-0 bg-black bg-opacity-90 z-50 overflow-y-auto"
                            style="display: none;">

                            <div class="max-w-7xl mx-auto px-4 py-8">

                                <div class="flex justify-between items-center mb-6">
                                    <h2 class="text-white text-2xl font-bold">
                                        {{ $hotel->hotel_name }} Photos
                                    </h2>

                                    <button @click="open = false" class="text-white text-3xl hover:text-gray-300">
                                        &times;
                                    </button>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

                                    @foreach ($hotel->images as $image)
                                        <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $hotel->hotel_name }}"
                                            class="w-full h-72 object-cover rounded-lg">
                                    @endforeach

                                </div>

                            </div>

                        </div>

                    </div>
                @else
                    <div class="bg-gray-200 rounded-xl h-[450px] flex items-center justify-center">
                        <p class="text-gray-500">No photos available</p>
                    </div>
                @endif

            </div>

            <!-- Search Section -->
        <div class="bg-blue-800 py-6 mt-4">
            <div class="max-w-7xl mx-auto px-4">
                <form action="{{ route('search.rooms') }}" method="GET" {{-- {{ route('availability.search') }} --}}
                    class="bg-white rounded-lg shadow-lg p-4 grid grid-cols-1 md:grid-cols-5 gap-4">

                    <input type="date" name="check_in" value="{{ request('check_in') }}"
                        class="border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500" required>

                    <input type="date" name="check_out" value="{{ request('check_out') }}"
                        class="border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500" required>

                    <select name="guests" class="border rounded-lg px-4 py-3">
                        @for ($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}" {{ request('guests') == $i ? 'selected' : '' }}>
                                {{ $i }} Guest{{ $i > 1 ? 's' : '' }}
                            </option>
                        @endfor
                    </select>

                    <select name="rooms" class="border rounded-lg px-4 py-3">
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}" {{ request('rooms') == $i ? 'selected' : '' }}>
                                {{ $i }} Room{{ $i > 1 ? 's' : '' }}
                            </option>
                        @endfor
                    </select>

                    <button class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold rounded-lg">
                        Check Availability
                    </button>

                </form>
            </div>
        </div>

            <!-- Availability Table -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">

                <div class=" text-black   p-4">
                    <h2 class="text-4xl font-semibold">
                        Availability
                    </h2>
                </div>

                <div class="overflow-x-auto">

                    {{-- <table class="w-full">

                        <thead class="bg-gray-100">
                            <tr class="text-left">
                                <th class="p-4">Room Type</th>
                                <th class="p-4">Guests</th>
                                <th class="p-4">Benefits</th>
                                <th class="p-4">Price</th>
                                <th class="p-4">Availability</th>
                                <th class="p-4"></th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($rooms as $room)

                                <tr class="border-t hover:bg-gray-50">

                                    <td class="p-4">
                                        <div>
                                            <h3 class="font-semibold">
                                                {{ $room->room_type }}
                                            </h3>

                                            <p class="text-sm text-gray-500">
                                                Room {{ $room->room_number }}
                                            </p>
                                        </div>
                                    </td>

                                    <td class="p-4">
                                        {{ $room->capacity }} Adults
                                    </td>

                                    <td class="p-4">
                                        <ul class="text-sm text-green-600 space-y-1">
                                            <li>✓ Free WiFi</li>
                                            <li>✓ Free Cancellation</li>
                                            <li>✓ Breakfast Included</li>
                                        </ul>
                                    </td>

                                    <td class="p-4">
                                        <div>
                                            <p class="text-2xl font-bold">
                                                NPR {{ number_format($room->price) }}
                                            </p>

                                            <p class="text-sm text-gray-500">
                                                Includes taxes and charges
                                            </p>
                                        </div>
                                    </td>

                                    <td class="p-4">
                                        @if ($room->status === 'available')
                                            <span class="text-green-600 font-medium">
                                                Available
                                            </span>
                                        @else
                                            <span class="text-red-600 font-medium">
                                                Sold Out
                                            </span>
                                        @endif
                                    </td>

                                    <td class="p-4">

                                        @if ($room->status === 'available')

                                            <a href="{{ route('booking.create', [
                                                    'room' => $room->id,
                                                    'check_in' => request('check_in'),
                                                    'check_out' => request('check_out')
                                                ]) }}"
                                                class="bg-blue-700 hover:bg-blue-800 text-white px-5 py-2 rounded-lg inline-block">

                                                Reserve

                                            </a>

                                        @endif

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="6" class="text-center py-10 text-gray-500">
                                        No rooms available for selected dates.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table> --}}

                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">

                        <!-- Header -->
                        <div class="bg-blue-700 text-white grid grid-cols-12 font-semibold text-sm">
                            <div class="col-span-4 p-4">Room type</div>
                            <div class="col-span-2 p-4">Number of guests</div>
                            <div class="col-span-3 p-4">Today's price</div>
                            <div class="col-span-3 p-4">Your choices</div>
                        </div>

                        @forelse($rooms as $room)
                            <div class="grid grid-cols-1 lg:grid-cols-12 border-b hover:bg-gray-50 transition">

                                <!-- Room Type -->
                                <div class="col-span-4 p-6">

                                    <h3 class="text-blue-700 font-bold text-lg hover:underline cursor-pointer">
                                        {{ $room->roomCategory?->category_name ?? 'N/A' }}
                                    </h3>

                                    <p class="text-gray-600 text-sm mt-1">
                                        Room {{ $room->room_no }}
                                    </p>

                                    <div class="mt-4 space-y-2 text-sm">



                                        <div class="flex items-center gap-2 text-green-700">
                                            <span>✓</span>
                                            <span>Free WiFi</span>
                                        </div>

                                        <div class="flex items-center gap-2 text-green-700">
                                            <span>✓</span>
                                            <span>Breakfast included</span>
                                        </div>

                                        <div class="flex items-center gap-2 text-green-700">
                                            <span>✓</span>
                                            <span>Free cancellation</span>
                                        </div>

                                    </div>
                                </div>

                                <!-- Guests -->
                                <div class="col-span-2 p-6 flex items-center">
                                    <div>

                                        <p class="text-sm text-gray-600 mt-2">
                                            {{ $room->capacity }}
                                        </p>
                                    </div>
                                </div>

                                <!-- Price -->
                                <div class="col-span-3 p-6 flex flex-col justify-center">

                                    @php
                                        $discountPercent = $room->discount; // Example 15% discount
                                        $originalPrice = $room->room_price;
                                        $discountAmount = ($originalPrice * $discountPercent) / 100;
                                        $finalPrice = $originalPrice - $discountAmount;
                                    @endphp
                                    <p class="text-sm text-gray-500">
                                        Includes taxes and charges
                                    </p>
                                    @if ($discountPercent > 0)


                                    <!-- Discount Badge -->
                                    <div
                                        class="inline-flex items-center bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold mb-2">
                                        {{ $discountPercent }}% OFF
                                    </div>
                                    
                                    <!-- Original Price -->
                                    <p class="text-gray-400 line-through text-lg">
                                        NPR {{ number_format($originalPrice) }}
                                    </p>
                                    @endif

                                    <!-- Final Price -->
                                    <p class="text-3xl font-bold text-green-600">
                                        NPR {{ number_format($finalPrice) }}
                                    </p>

                                    @if($discountPercent > 0)
                                    <p class="text-sm text-green-700 font-medium mt-1">
                                        You save NPR {{ number_format($discountAmount) }}
                                    </p>
                                    @endif

                                    <p class="text-sm text-gray-500">
                                        per night
                                    </p>

                                    @if ($room->available_rooms <= 2)
                                        <span
                                            class="mt-3 inline-block bg-red-100 text-red-700 text-xs px-3 py-1 rounded-full">
                                            Only {{ $room->available_rooms }}
                                            room{{ $room->available_rooms > 1 ? 's' : '' }} left
                                        </span>
                                    @endif

                                </div>

                                <!-- Booking Action -->
                                <div class="col-span-3 p-6 flex flex-col justify-center">

                                    @if ($room->room_status === 'available')
                                        <div class="mb-3">
                                            <label class="text-sm text-gray-600 block mb-1">
                                                Number of rooms
                                            </label>

                                            <select class="border rounded-md px-3 py-2 w-full">
                                                @for ($i = 1; $i <= min(5, $room->available_rooms ?? 5); $i++)
                                                    <option>{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>

                                        <span class="text-green-700 font-semibold text-sm mb-3">
                                            ✔ Available
                                        </span>

                                        <a href="{{ route('rooms.reserve', $room->id) }}" {{-- {{ route('booking.create', [
                                            'room' => $room->id,
                                            'check_in' => request('check_in'),
                                            'check_out' => request('check_out'),
                                        ]) }} --}}
                                            class="bg-blue-700 hover:bg-blue-800 text-white text-center py-3 rounded-lg font-semibold transition">
                                            I'll reserve
                                        </a>

                                        <p class="text-xs text-gray-500 mt-2">
                                            You won't be charged yet
                                        </p>
                                    @else
                                        <span class="bg-red-100 text-red-700 px-4 py-2 rounded-lg text-center font-medium">
                                            Sold Out
                                        </span>
                                    @endif

                                </div>

                            </div>

                        @empty

                            <div class="p-12 text-center">
                                <div class="text-5xl mb-4">🏨</div>

                                <h3 class="text-xl font-semibold mb-2">
                                    No rooms available
                                </h3>

                                <p class="text-gray-500">
                                    No rooms are available for your selected dates.
                                </p>
                            </div>
                        @endforelse

                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
