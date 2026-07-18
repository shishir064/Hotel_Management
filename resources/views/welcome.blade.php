@extends('layouts.app')
@section('title', 'Quick Stay')
@section('content')
    <!-- Hero -->

    <section class="relative h-screen flex items-center justify-center overflow-hidden">
        <x-successMessage></x-successMessage>
        <div class="absolute inset-0">
            <img src="{{ asset('images/kathmandu.jpg') }}" class="w-full h-full object-cover" alt="">

            <div class="absolute inset-0 bg-gradient-to-b from-black/80 via-black/10 to-black/20"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-20 text-center text-white">
            <h1 class="text-5xl md:text-7xl leading-tight max-w-4xl mx-auto mb-12 ">
                Discover Your Perfect Gateway Destination
            </h1>
        </div>
    </section>

    <x-hotelfeed :featuredDestinations="$destinations"></x-hotelfeed>

    <!-- Collections -->
    <section class="py-24 max-w-7xl mx-auto px-6 lg:px-20">

        <div class="flex items-end justify-between mb-14">
            <div>

                <h2 class="text-4xl pb-3">
                    Trending destinations
                </h2>
                <span class=" text-gray-500 text-md block mb-4">
                    Most popular choices for travelers from Nepal
                </span>
            </div>

            <a href="#" class="border-b border-black text-black">
                Browse All Destinations
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            @foreach ($trendingDestinations as $trendingDestination)
                <div class="relative overflow-hidden group aspect-video">
                    <img src="{{ asset('storage/' . $trendingDestination->cover_image)}}"
                    alt="{{$trendingDestination->name}}"
                        class="w-full h-full object-cover transition duration-700 group-hover:scale-105" alt="Pokhara">

                    <div
                        class="absolute inset-0 bg-linear-to-t from-black/70 to-transparent flex flex-col justify-end p-8">

                        <h3 class="text-3xl text-white mb-2 flex items-center gap-2">
                            {{ $trendingDestination->name }}
                            <img class="w-6 h-6 rounded-full" src="{{ asset('images/Npflag.jpg') }}" alt="Nepal Flag">
                        </h3>

                        <p class="text-white/80">
                           {{ $trendingDestination->description }}
                        </p>
                    </div>

                </div>
            @endforeach

        </div>
    </section>

    <!-- Newsletter -->
    <section class="py-32 bg-white text-center">

        <div class="max-w-2xl mx-auto px-6">

            <h2 class="text-4xl mb-6">
                The Weekly Journal
            </h2>

            <p class="text-gray-600 text-lg mb-10">
                Curated travel insights, architectural deep-dives,
                and exclusive early access to the collection.
            </p>

            <div class="flex flex-col sm:flex-row gap-4">

                <input type="email" class="flex-1 border-b border-gray-300 py-4 outline-none text-lg"
                    placeholder="Email Address">

                <button class="bg-black text-white px-12 py-4 hover:opacity-90">
                    Subscribe
                </button>
            </div>
        </div>
    </section>
@endsection
