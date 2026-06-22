@extends('layouts.dashboard')

@section('title', 'Add Room')

@section('content')
    <div class="w-full mx-auto">
        
    <x-errorMessage></x-errorMessage>

        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-gray-800">
                Add Room
            </h1>


            <p class="text-gray-500 mt-2">
                Create a new room by providing room type, pricing, and available amenities.
            </p>
        </div>
        <x-successMessage></x-successMessage>

        <!-- Form Card -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8">

            <form action="{{ route('store_rooms') }}" method="POST">
                @csrf

                <!-- Room Type & Price -->
                <div class="grid md:grid-cols-2 gap-6">

                    <!-- Room No -->
                    {{-- <input type="text" name="hotel_id" value="{{ $hotel->id }}" hidden> --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Room No
                        </label>

                        <input type="number" name="room_no" placeholder="Enter room no" value="{{ old('room_no') }}"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                        @error('room_no')
                            <h1 class="text-red-400">{{ $message }}</h1>
                        @enderror
                    </div>

                    <!-- Room Type -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Room Type
                        </label>

                        <select name="room_type" value="{{ old('room_type') }}"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">

                            <option value="">Select Room Type</option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->category_name }}
                                </option>
                            @endforeach

                        </select>
                        @error('room_type')
                            <h1 class="text-red-400">{{ $message }}</h1>
                        @enderror
                    </div>

                    <!-- Price -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Price Per Night
                        </label>

                        <input type="number" name="room_price" placeholder="Enter room price"
                            value="{{ old('room_price') }}"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                        @error('room_price')
                            <h1 class="text-red-400">{{ $message }}</h1>
                        @enderror
                    </div>

                </div>

                <!-- Room Main Facilities -->
                <div class="mt-8">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">
                        Room Main Facilities
                    </h2>

                    <div
                        class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 peer-checked:ring-2 peer-checked:bg-blue-500 peer-checked:ring-blue-500">

                        @foreach ($main_facilities as $facility)
                            <label for="main-facility-{{ $facility->id }}" class="group cursor-pointer">
                                <input type="checkbox" name="room_main_facility[]" value="{{ $facility->id }}"
                                    id="main-facility-{{ $facility->id }}" class="peer hidden"
                                    {{ in_array($facility->id, old('room_main_facility', [])) ? 'checked' : '' }}>
                                <div
                                    class="border-2 border-gray-200 rounded-xl p-4 transition-all duration-200 hover:border-primary hover:shadow-md
                                        peer-checked:border-primary   peer-checked:bg-primary/10  peer-checked:shadow-lg">

                                    <h3 class="font-semibold text-gray-800">
                                        {{ $facility->name }}
                                    </h3>

                                    <p class="text-sm text-gray-500">
                                        Room Main Facility
                                    </p>
                                </div>
                            </label>
                        @endforeach


                    </div>
                    @error('room_main_facility')
                        <h1 class="text-red-400">{{ $message }}</h1>
                    @enderror
                </div>
                <!-- Amenities -->
                <div class="mt-8">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">
                        Room Amenities,
                    </h2>

                    <div
                        class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 peer-checked:ring-2 peer-checked:bg-blue-500 peer-checked:ring-blue-500">

                        @foreach ($amenities as $amenity)
                            <label for="amenity-{{ $amenity->id }}" class="group cursor-pointer">
                                <input type="checkbox" name="room_Amenity[]" value="{{ $amenity->id }}"
                                    id="amenity-{{ $amenity->id }}" class="peer hidden"
                                    {{ in_array($amenity->id, old('room_Amenity', [])) ? 'checked' : '' }}>

                                <div
                                    class="border-2 border-gray-200 rounded-xl p-4 transition-all duration-200
                                     hover:border-primary hover:shadow-md
                                     peer-checked:border-primary
                                     peer-checked:bg-primary/10
                                    peer-checked:shadow-lg">

                                    <h3 class="font-semibold text-gray-800">
                                        {{ $amenity->amenity_name }}
                                    </h3>

                                    <p class="text-sm text-gray-500">
                                        Room Amenity
                                    </p>
                                </div>
                            </label>
                        @endforeach

                    </div>
                    @error('room_Amenity')
                        <h1 class="text-red-400">{{ $message }}</h1>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="mt-8 flex justify-end">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl font-medium transition">
                        Add Room
                    </button>
                </div>

            </form>

        </div>

    </div>
@endsection
