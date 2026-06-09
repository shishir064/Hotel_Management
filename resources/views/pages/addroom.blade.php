@extends('layouts.dashboard')

@section('title', 'Add Room')

@section('content')
    <div class="w-full mx-auto">

        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-gray-800">
                Add Room
            </h1>
            

            <p class="text-gray-500 mt-2">
                Create a new room by providing room type, pricing, and available amenities.
            </p>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8">

            <form action="" method="POST">
                @csrf

                <!-- Room Type & Price -->
                <div class="grid md:grid-cols-2 gap-6">

                    <!-- Room Type -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Room Type
                        </label>

                        <select name="category_id"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">

                            <option value="">Select Room Type</option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->category_name }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <!-- Price -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Price Per Night
                        </label>

                        <input type="number" name="price" placeholder="Enter room price"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                    </div>

                </div>

                <!-- Room Main Facilities -->
                <div class="mt-8">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">
                        Room Main Facilities
                    </h2>

                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 peer-checked:ring-2 peer-checked:bg-blue-500 peer-checked:ring-blue-500">

                        @foreach ($main_facilities as $facility)
                            {{-- <label class="flex items-center gap-3 p-3 border rounded-xl hover:bg-gray-50 cursor-pointer peer-checked:bg-primary/20">
                                <input  type="checkbox" class="hidden" name="amenities[]" value="{{ $amenity->id }}">
                                <span>{{ $amenity->amenity_name }}</span>
                            </label> --}}
                            <label for="facility{{ $facility->id }}" class="group cursor-pointer">
                            <input type="checkbox" name="amenities[]" value="{{ $facility->id }}"
                                id="facility{{ $facility->id }}" class="peer hidden">

                            <div
                                class="border-2 border-gray-200 rounded-xl p-4 transition-all duration-200
                                   hover:border-primary hover:shadow-md
                                   peer-checked:border-primary
                                   peer-checked:bg-primary/10
                                   peer-checked:shadow-lg">
                                <div class="flex items-center justify-between">

                                    <div class="flex items-center gap-3">

                                        <div>
                                            <h3 class="font-semibold text-gray-800">
                                                {{ $facility->name }}
                                            </h3>
                                            <p class="text-sm text-gray-500">
                                                Room Main Facilities
                                            </p>
                                        </div>
                                    </div>

                                </div>  
                            </div>
                        </label>
                        @endforeach

                    </div>
                </div>
                <!-- Amenities -->
                <div class="mt-8">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">
                        Room Amenities
                    </h2>

                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 peer-checked:ring-2 peer-checked:bg-blue-500 peer-checked:ring-blue-500">

                        @foreach ($amenities as $amenity)
                            {{-- <label class="flex items-center gap-3 p-3 border rounded-xl hover:bg-gray-50 cursor-pointer peer-checked:bg-primary/20">
                                <input  type="checkbox" class="hidden" name="amenities[]" value="{{ $amenity->id }}">
                                <span>{{ $amenity->amenity_name }}</span>
                            </label> --}}
                            <label for="facility{{ $amenity->id }}" class="group cursor-pointer">
                            <input type="checkbox" name="amenities[]" value="{{ $amenity->id }}"
                                id="facility{{ $amenity->id }}" class="peer hidden">

                            <div
                                class="border-2 border-gray-200 rounded-xl p-4 transition-all duration-200
                                   hover:border-primary hover:shadow-md
                                   peer-checked:border-primary
                                   peer-checked:bg-primary/10
                                   peer-checked:shadow-lg">
                                <div class="flex items-center justify-between">

                                    <div class="flex items-center gap-3">

                                        <div>
                                            <h3 class="font-semibold text-gray-800">
                                                {{ $amenity->amenity_name }}
                                            </h3>
                                            <p class="text-sm text-gray-500">
                                                Room Facility
                                            </p>
                                        </div>
                                    </div>

                                </div>  
                            </div>
                        </label>
                        @endforeach

                    </div>
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
