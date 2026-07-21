@extends('layouts.app')

@section('content')
    <section class="py-24 max-w-7xl mx-auto px-6 lg:px-20">

        <h1 class="text-4xl font-bold mb-10">
            All Trending Destinations
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            @foreach ($trendingDestinations as $destination)
                <div class="relative overflow-hidden rounded-2xl h-105 group shadow-lg">
                    <!-- Image -->
                    <img src="{{ asset('storage/' . $destination->cover_image) }}" alt="{{ $destination->name }}"
                        class="w-full h-full object-cover transition duration-700 group-hover:scale-105">

                    <!-- Overlay -->
                    <div
                        class="absolute inset-0 bg-linear-to-t from-black/80 via-black/20 to-transparent p-8 flex items-end justify-between">

                        <!-- Left Content -->
                        <div class="max-w-[70%]">
                            <h3 class="text-3xl font-semibold text-white mb-2">
                                {{ $destination->name }}
                            </h3>

                            <p class="text-white/80">
                                {{ Str::limit($destination->description, 120) }}
                            </p>
                        </div>

                        <!-- Right Button -->
                        <a href="{{ route('trending.destinations.explore', $destination->id) }}"
                            class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-3 rounded-lg transition whitespace-nowrap">
                            Explore
                        </a>

                    </div>
                </div>
            @endforeach

        </div>

        <div class="mt-10">
            {{ $trendingDestinations->links() }}
        </div>

    </section>
@endsection
