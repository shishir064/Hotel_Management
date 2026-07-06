@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50">

        <div class="max-w-6xl mx-auto px-4 py-10">

            <!-- Hero Header -->
            <div class="mb-10">
                <div class="bg-linear-to-r from-gray-800 to-gray-600 rounded-3xl p-8 text-white shadow-lg">
                    <h1 class="text-4xl font-bold">
                        Reserve Your Stay
                    </h1>
                    <p class="mt-2 text-blue-100">
                        Complete your booking details and enjoy a comfortable experience.
                    </p>
                </div>
            </div>

            <x-successMessage />

            @if (session('error'))
                <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-4 text-red-600">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('reserve.store') }}" method="POST">
                @csrf

                <div class="grid lg:grid-cols-3 gap-8">
                    
                    <!-- Room Summary -->
                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-3xl border border-gray-100 shadow-lg overflow-hidden sticky top-20">

                            <div class="bg-linear-to-r from-gray-800 to-gray-600 p-5 text-white">
                                <h2 class="text-xl font-semibold">
                                    Room Details
                                </h2>
                            </div>

                            <div class="p-6">

                                <div class="space-y-6">

                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-500">Room Number</span>
                                        <span class="font-semibold">
                                            #{{ $room->room_no }}
                                        </span>
                                    </div>

                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-500">Category</span>
                                        <span class="font-semibold">
                                            {{ $room->roomCategory?->category_name }}
                                        </span>
                                    </div>

                                    @php
                                        $discountPercent = $room->discount; // Example 15% discount
                                        $originalPrice = $room->room_price;
                                        $discountAmount = ($originalPrice * $discountPercent) / 100;
                                        $finalPrice = $originalPrice - $discountAmount;
                                    @endphp

                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-500">Total Night</span>
                                        <span id="totalNights" class="font-bold  text-green-600 text-lg">
                                           0
                                        </span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-500">Price</span>
                                        <span
                                            id="totalPrice"
                                            data-price="{{ $finalPrice }}"
                                            class="font-bold text-green-600 text-lg">
                                            Rs. {{ number_format($finalPrice) }}
                                        </span>
                                    </div>

                                </div>

                                <input type="hidden" name="room_id" value="{{ $room->id }}">

                            </div>

                        </div>

                    </div>

                    <!-- Booking Form -->
                    <div class="lg:col-span-2">

                        <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-8">

                            <!-- Guest Info -->
                            <h2 class="text-2xl font-bold text-gray-800 mb-6">
                                Guest Information
                            </h2>

                            <div class="grid md:grid-cols-2 gap-5">

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Full Name
                                    </label>
                                    <input type="text" name="guest_name" value="{{ $userName ?? ''}}"
                                        placeholder="Enter your full name"
                                        class="w-full px-4 py-3 rounded-2xl border border-gray-200 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition">

                                    @error('guest_name')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Email Address
                                    </label>
                                    <input type="email" name="email" value="{{ $userEmail }}"
                                        placeholder="example@gmail.com"
                                        class="w-full px-4 py-3 rounded-2xl border border-gray-200 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition"
                                        readonly>

                                    @error('email')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Phone Number
                                    </label>
                                    <input type="text" name="phone" value="{{ $userPhone ?? ''}}"
                                        placeholder="+977 98XXXXXXXX"
                                        class="w-full px-4 py-3 rounded-2xl border border-gray-200 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition">

                                    @error('phone')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Citizen ID
                                    </label>
                                    <input type="text" name="citizen_id" value="{{ $userCitizenId ?? ''}}"
                                        placeholder="Citizen Number"
                                        class="w-full px-4 py-3 rounded-2xl border border-gray-200 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition">

                                    @error('citizen_id')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Address
                                    </label>
                                    <input type="text" name="address" value="{{ $userAddress ?? ''}}"
                                        placeholder="Your address"
                                        class="w-full px-4 py-3 rounded-2xl border border-gray-200 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition">

                                    @error('address')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>

                            <div class="border-t border-gray-200 my-8"></div>

                            <!-- Stay Information -->
                            <h2 class="text-2xl font-bold text-gray-800 mb-6">
                                Stay Information
                            </h2>
                            <div class="mt-6 p-4 bg-gray-100 rounded-xl">
                            <div class="grid md:grid-cols-2 gap-5">

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Check In
                                    </label>
                                    <input type="date" name="check_in" value="{{ old('check_in') }}"
                                        class="w-full px-4 py-3 rounded-2xl border border-gray-200 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition">

                                    @error('check_in')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Check Out
                                    </label>
                                    <input type="date" name="check_out" value="{{ old('check_out') }}"
                                        class="w-full px-4 py-3 rounded-2xl border border-gray-200 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition">

                                    @error('check_out')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Adults
                                    </label>
                                    <input type="number" min="1" name="adults" value="{{ old('adults', 1) }}"
                                        class="w-full px-4 py-3 rounded-2xl border border-gray-200 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Children
                                    </label>
                                    <input type="number" min="0" name="children" value="{{ old('children', 0) }}"
                                        class="w-full px-4 py-3 rounded-2xl border border-gray-200 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition">
                                </div>

                            </div>

                            <!-- Buttons -->
                            <div class="flex flex-col md:flex-row gap-4 mt-10">

                                <button type="submit"
                                    class="flex-1 bg-linear-to-r from-gray-800 to-gray-600 text-white py-4 rounded-2xl font-semibold shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition-all duration-200">
                                    Confirm Booking
                                </button>

                                <a href="{{ url()->previous() }}"
                                    class="px-8 py-4 rounded-2xl bg-gray-100 hover:bg-gray-200 text-center font-semibold transition">
                                    Cancel
                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </form>

        </div>

    </div>
    <script>
const checkIn = document.querySelector('input[name="check_in"]');
const checkOut = document.querySelector('input[name="check_out"]');

const totalPrice = document.getElementById('totalPrice');
const totalNights = document.getElementById('totalNights');

const roomPrice = Number(totalPrice.dataset.price);

function calculateTotal() {

    if (!checkIn.value || !checkOut.value) return;

    const inDate = new Date(checkIn.value);
    const outDate = new Date(checkOut.value);

    const diff = Math.ceil((outDate - inDate) / (1000 * 60 * 60 * 24));

    if (diff > 0) {
        totalNights.textContent = diff;

        const finalPrice = diff * roomPrice;

        totalPrice.textContent = "Rs. " + finalPrice.toLocaleString();
    } else {
        totalNights.textContent = 0;
        totalPrice.textContent = "Rs. 0";
    }
}

checkIn.addEventListener('change', calculateTotal);
checkOut.addEventListener('change', calculateTotal);
</script>
@endsection
