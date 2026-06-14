@extends('layouts.dashboard')

@section('content')

<div class="p-6  bg-white shadow rounded-lg ">

    <h2 class="text-2xl font-bold mb-6">
        Book Room #{{ $room->room_no }}
    </h2>

    <x-successMessage></x-successMessage>

    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <div class="mb-6 p-4 bg-gray-100 rounded">
        <p><strong>Room:</strong> {{ $room->room_no }}</p>
        <p><strong>Category:</strong> {{ $room->roomCategory?->category_name }}</p>
        <p><strong>Price per Night:</strong> Rs. {{ $room->room_price }}</p>
    </div>

    <form action="{{ route('bookings.store', $room->id) }}" method="POST">
        
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <div>
                <label class="block mb-2">Guest Name</label>
                <input type="text"
                       name="guest_name"
                       value="{{ old('guest_name') }}"
                       class="w-full border rounded px-3 py-2"
                       required>

                @error('guest_name')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <div>
                <label class="block mb-2">Email</label>
                <input type="email"
                       name="email"
                       value="{{ old('email') }}"
                       class="w-full border rounded px-3 py-2"
                       required>

                @error('email')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <div>
                <label class="block mb-2">Phone Number</label>
                <input type="text"
                       name="phone"
                       value="{{ old('phone') }}"
                       class="w-full border rounded px-3 py-2"
                       required>

                @error('phone')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <div>
                <label class="block mb-2">Adults</label>
                <input type="number"
                       name="adults"
                       value="{{ old('adults', 1) }}"
                       min="1"
                       class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block mb-2">Children</label>
                <input type="number"
                       name="children"
                       value="{{ old('children', 0) }}"
                       min="0"
                       class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block mb-2">Check In</label>
                <input type="date"
                       name="check_in"
                       value="{{ old('check_in') }}"
                       class="w-full border rounded px-3 py-2"
                       required>

                @error('check_in')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <div>
                <label class="block mb-2">Check Out</label>
                <input type="date"
                       name="check_out"
                       value="{{ old('check_out') }}"
                       class="w-full border rounded px-3 py-2"
                       required>

                @error('check_out')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

        </div>

        <div class="mt-6 flex gap-3">
            <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                Confirm Booking
            </button>

            <a href="{{ url()->previous() }}"
               class="bg-gray-500 text-white px-6 py-2 rounded">
                Cancel
            </a>
        </div>

    </form>

</div>

@endsection