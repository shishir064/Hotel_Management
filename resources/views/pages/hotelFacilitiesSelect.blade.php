@extends('layouts.dashboard')

@section('title', 'Select Hotel Facilities')

@section('content')
    <div class="max-w-5xl mx-auto p-6">

        @if (session('success'))
            <h1 class="text-green-800 p-6">{{ session('success') }}</h1>
        @endif

        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">
                Hotel Facilities
            </h1>
            <p class="text-gray-500 mt-2">
                Choose the facilities available in your hotel.
            </p>
        </div>

        <form action="{{ route('store.hotel.facilities') }}" method="POST">
            @csrf
            <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">

                <h2 class="text-lg font-semibold mb-5 text-gray-700">
                    Available Facilities
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($facilities as $facility)
                        <label for="facility{{ $facility->id }}" class="group cursor-pointer">
                            <input type="checkbox" name="facilities[]" value="{{ $facility->id }}"
                                id="facility{{ $facility->id }}" class="peer hidden">

                            <div
                                class="border-2 border-gray-200 rounded-xl p-4 transition-all duration-300
                                   hover:border-primary hover:shadow-md
                                   peer-checked:border-primary
                                   peer-checked:bg-primary/10
                                   peer-checked:shadow-lg">
                                <div class="flex items-center justify-between">

                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-12 h-12 rounded-full bg-gray-100
                                               flex items-center justify-center
                                               peer-checked:bg-primary/20">
                                            🏨
                                        </div>

                                        <div>
                                            <h3 class="font-semibold text-gray-800">
                                                {{ $facility->name }}
                                            </h3>
                                            <p class="text-sm text-gray-500">
                                                Hotel Facility
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </label>
                    @endforeach

                </div>

                <div class="mt-8 flex justify-end">
                    <button type="submit"
                        class="px-8 py-3 bg-primary text-white rounded-xl
                           shadow-lg hover:scale-105 transition-all duration-300">
                        Save Facilities
                    </button>
                </div>

            </div>
        </form>
    </div>
@endsection
