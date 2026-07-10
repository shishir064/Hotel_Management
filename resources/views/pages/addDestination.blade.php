@extends('layouts.dashboard')

@section('title', 'Add Featured Destination')

@section('content')
    <div class="w-full mx-auto bg-gray-50 shadow  p-6 rounded-lg ">
        <x-successMessage></x-successMessage>
        <x-errorMessage></x-errorMessage>
        <h2 class="text-xl font-semibold mb-6">Add Featured Destination</h2>
        <form action="{{ route('store_featured_destinations') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- featured destination Name -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Featured Destination Name</label>
                <input type="text" name="name" class="w-full border rounded px-3 py-2"
                    placeholder="Enter destination name" value="{{ old('name') }}">
                @error('name')
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
                <label class="block mb-1 font-medium">Destination Cover Image</label>
                <input type="file" name="cover_image" class="w-full border rounded px-3 py-2"
                    placeholder="Select Cover_image photo" value="{{ old('cover_image') }}">
                @error('cover_image')
                    {{ $message }}
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Description</label>
                <input type="text" name="description" class="w-full border rounded px-3 py-2" placeholder="Enter Description" value="{{ old('description') }}">
                @error('description')
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
