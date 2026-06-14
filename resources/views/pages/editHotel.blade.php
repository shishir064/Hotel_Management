@extends('layouts.dashboard')

@section('title', 'List Hotels')

@section('content')
    <div class="w-full mx-auto bg-gray-50 shadow   p-6 rounded-lg ">

        <h2 class="text-xl font-semibold mb-6">Add New Hotel</h2>

        <form action="{{ route('update.hotel', $hotel->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <x-successMessage></x-successMessage>
            
            <!-- Hotel Name -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Hotel Name</label>
                <input type="text" name="hotel_name" value="{{ $hotel->hotel_name }}" class="w-full border rounded px-3 py-2"
                    placeholder="Enter hotel name">
                @error('hotel_name')
                    {{ $message }}
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Email</label>
                <input type="email" name="email" value="{{ $hotel->email }}" class="w-full border rounded px-3 py-2" placeholder="Enter email">
                @error('email')
                    {{ $message }}
                @enderror
            </div>

            <!-- Phone -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Phone</label>
                <input type="text" name="phone" class="w-full border rounded px-3 py-2"
                    placeholder="Enter phone number" value="{{ $hotel->phone }}">
                @error('phone')
                    {{ $message }}
                @enderror
            </div>

            <!-- Address -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Address</label>
                <input type="text" name="address" value="{{ $hotel->address }}" class="w-full border rounded px-3 py-2" placeholder="Enter address" >
                @error('address')
                    {{ $message }}
                @enderror
            </div>

            <!-- City & Country -->
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block mb-1 font-medium">City</label>
                    <input type="text" name="city" value="{{ $hotel->city }}" class="w-full border rounded px-3 py-2 " placeholder="Enter City">
                    @error('city')
                        {{ $message }}
                    @enderror
                </div>

                <div>
                    <label class="block mb-1 font-medium">Country</label>
                    <input type="text" name="country"  value="{{ $hotel->country }}" class="w-full border rounded px-3 py-2"
                        placeholder="Enter Country">
                </div>
                @error('country')
                    {{ $message }}
                @enderror
            </div>

            <!-- Star Rating -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Star Rating</label>
                <select name="star_rating"  class="w-full border rounded px-3 py-2">
                    <option value="1" {{ $hotel->star_rating == 1 ? 'selected' : '' }}>1 Star</option>
                    <option value="2" {{ $hotel->star_rating == 2 ? 'selected' : '' }}>2 Stars</option>
                    <option value="3" {{ $hotel->star_rating == 3 ? 'selected' : '' }}>3 Stars</option>
                    <option value="4" {{ $hotel->star_rating == 4 ? 'selected' : '' }}>4 Stars</option>
                    <option value="5" {{ $hotel->star_rating == 5 ? 'selected' : '' }}>5 Stars</option>
                </select>
                @error('star_rating')
                    {{ $message }}
                @enderror
            </div>

            <!-- Cover Image -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Cover Image</label>
                <img src="{{ asset('storage/' . $hotel->cover_image) }}" class="w-16 h-16" alt="">
                <input type="file" name="cover_image"  class="w-full border rounded px-3 py-2">
                @error('cover_image')
                    {{ $message }}
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Description</label>
                <textarea name="description" rows="4"  class="w-full border rounded px-3 py-2"
                    placeholder="Enter hotel description"> {{ $hotel->description }}</textarea>
                @error('description')
                    {{ $message }}
                @enderror
            </div>


            <!-- Submit -->
            <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">
                Save Hotel
            </button>

        </form>
    </div>
@endsection
