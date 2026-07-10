@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-10">

    <h1 class="text-4xl font-bold mb-8">
        {{ $destination->name }}
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        @foreach($hotels as $hotel)

            <div class="bg-white rounded-xl shadow overflow-hidden">

                <img src="{{ asset('storage/'.$hotel->cover_image) }}"
                    class="w-full h-56 object-cover">

                <div class="p-5">

                    <h3 class="text-xl font-semibold">
                        {{ $hotel->hotel_name }}
                    </h3>

                    <p class="text-gray-500 mt-2">
                        {{ $hotel->address }}
                    </p>

                    <a href="{{ route('hotel.availability', $hotel->id) }}"
                        class="inline-block mt-4 bg-indigo-600 text-white px-4 py-2 rounded-lg">
                        View Availability
                    </a>

                </div>

            </div>

        @endforeach

    </div>

    <div class="mt-8">
        {{ $hotels->links() }}
    </div>

</div>

@endsection