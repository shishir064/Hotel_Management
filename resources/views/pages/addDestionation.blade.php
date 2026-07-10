@extends('layouts.dashboard')

@section('title', 'Add Featured Destination')

@section('content')
    <div class="w-full mx-auto bg-gray-50 shadow  p-6 rounded-lg ">
        <x-successMessage></x-successMessage>
        <x-errorMessage></x-errorMessage>
        <h2 class="text-xl font-semibold mb-6">Add Featured Destination</h2>
        <form action="{{ route('store_hotel') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- featured destination Name -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Featured Destination Name</label>
                <input type="text" name="destination_name" class="w-full border rounded px-3 py-2"
                    placeholder="Enter hotel name" value="{{ old('destination_name') }}">
                @error('destination_name')
                    {{ $message }}
                @enderror
            </div>

            <!-- City -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">City</label>
                <input type="text" name="city" class="w-full border rounded px-3 py-2" placeholder="Enter city" value="{{ old('city') }}">
                @error('city')
                    {{ $message }}
                @enderror
            </div>

            <!-- Cover_image -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Cover_image</label>
                <input type="file" name="Cover_image" class="w-full border rounded px-3 py-2"
                    placeholder="Select Cover_image photo" value="{{ old('Cover_image') }}">
                @error('Cover_image')
                    {{ $message }}
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Description</label>
                <input type="text" name="Description" class="w-full border rounded px-3 py-2" placeholder="Enter Description" value="{{ old('Description') }}">
                @error('Description')
                    {{ $message }}
                @enderror
            </div>

            <!-- Submit -->
            <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">
                Add Featured Destination
            </button>

        </form>

    </div>
@endsection
