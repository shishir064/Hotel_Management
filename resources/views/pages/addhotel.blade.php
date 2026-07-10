@extends('layouts.dashboard')

@section('title', 'List Hotels')

@section('content')
    <div class="w-full mx-auto bg-gray-50 shadow  p-6 rounded-lg ">
        <h2 class="text-xl font-semibold mb-6">Add New Hotel</h2>
        <x-errorMessage></x-errorMessage>
        <form action="{{ route('store_hotel') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <x-successMessage></x-successMessage>


            <!-- Hotel Name -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Hotel Name</label>
                <input type="text" name="hotel_name" class="w-full border rounded px-3 py-2" placeholder="Enter hotel name"
                    value="{{ old('hotel_name') }}">
                @error('hotel_name')
                    {{ $message }}
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Email</label>
                <input type="email" name="email" class="w-full border rounded px-3 py-2" placeholder="Enter email"
                    value="{{ old('email') }}">
                @error('email')
                    {{ $message }}
                @enderror
            </div>

            <!-- Phone -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Phone</label>
                <input type="text" name="phone" class="w-full border rounded px-3 py-2"
                    placeholder="Enter phone number" value="{{ old('phone') }}">
                @error('phone')
                    {{ $message }}
                @enderror
            </div>

            <!-- Address -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Address</label>
                <input type="text" name="address" class="w-full border rounded px-3 py-2" placeholder="Enter address"
                    value="{{ old('address') }}">
                @error('address')
                    {{ $message }}
                @enderror
            </div>

            <!-- City & Country -->
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block mb-1 font-medium">City</label>
                    <input type="text" name="city" class="w-full border rounded px-3 py-2 " placeholder="Enter City"
                        value="{{ old('city') }}">
                    @error('city')
                        {{ $message }}
                    @enderror
                </div>

                <div>
                    <label class="block mb-1 font-medium">Country</label>
                    <input type="text" name="country" class="w-full border rounded px-3 py-2" placeholder="Enter Country"
                        value="{{ old('country') }}">
                </div>
                @error('country')
                    {{ $message }}
                @enderror
            </div>

            <!-- Star Rating -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Star Rating</label>
                <select name="star_rating" class="w-full border rounded px-3 py-2">
                    <option value="1">1 Star</option>
                    <option value="2">2 Stars</option>
                    <option value="3">3 Stars</option>
                    <option value="4">4 Stars</option>
                    <option value="5">5 Stars</option>
                </select>
                @error('star_rating')
                    {{ $message }}
                @enderror
            </div>
            <!-- Destination -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Destination</label>
                <select name="destination_id" class="border rounded w-full px-3 py-2">
                    @foreach ($destinations as $destination)
                        <option value="{{ $destination->id }}">
                            {{ $destination->city }}
                        </option>
                    @endforeach
                </select>
                @error('destination_id')
                    {{ $message }}
                @enderror
            </div>

            <!-- Cover Image -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Cover Image</label>
                <input type="file" name="cover_image" class="w-full border rounded px-3 py-2">
                @error('cover_image')
                    {{ $message }}
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Description</label>
                <textarea name="description" rows="4" class="w-full border rounded px-3 py-2"
                    placeholder="Enter hotel description" value="{{ old('description') }}"></textarea>
                @error('description')
                    {{ $message }}
                @enderror
            </div>



            <!-- Submit -->
            <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">
                Add Hotel
            </button>

        </form>

    </div>
@endsection
