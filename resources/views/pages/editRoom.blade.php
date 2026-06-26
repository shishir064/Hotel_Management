@extends('layouts.dashboard')

@section('title', 'Add Room')

@section('content')
    <div class="w-full mx-auto">

        <x-errorMessage />
        <x-successMessage />

        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-gray-800">
                Add Room
            </h1>

            <p class="text-gray-500 mt-2">
                Enter room details including room type, price, and discount.
            </p>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-8">

            <form action="{{ route('update_rooms', $room->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid md:grid-cols-2 gap-6">

                    <!-- Room Number -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Room Number
                        </label>

                        <input type="number" name="room_no" value="{{ $room->room_no ?? old('room_no') }}" placeholder="Enter room number"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">

                        @error('room_no')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Room Type -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Room Type
                        </label>

                        <select name="room_type"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">

                            {{-- <option value="">Select Room Type</option> --}}
                            @foreach ($categories as $category)

                                <option value="{{ $category->id }}" {{ $category->id == $category->category_id ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach

                        </select>

                        @error('room_type')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Price -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Price Per Night (Rs.)
                        </label>

                        <input type="number" step="0.01" name="room_price" value="{{ $room->room_price ?? old('room_price') }}"
                            placeholder="Enter room price"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">

                        @error('room_price')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Discount -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Discount (%)
                        </label>

                        <input type="number" min="0" max="100" name="discount" value="{{ old('discount') ?? $room->discount }}"
                            placeholder="Enter discount percentage"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">

                        @error('discount')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                             Capacity
                        </label>

                        <input type="number" min="0" max="100" name="capacity" value="{{ old('capacity') ?? $room->capacity }}"
                            placeholder="Enter room capacity"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">

                        @error('capacity')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <!-- Submit Button -->
                <div class="mt-8 flex justify-end">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl font-medium transition duration-200">
                        Save Room
                    </button>
                </div>

            </form>

        </div>
    </div>
@endsection
