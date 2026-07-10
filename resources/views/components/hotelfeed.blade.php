<section class="py-16 bg-[#f8fafc]">

    <div class="max-w-7xl mx-auto px-6 text-center mb-12">
        <h2 class="text-4xl font-bold text-gray-800 mb-4">
            Featured Destinations
        </h2>

        <p class="text-gray-500 text-lg max-w-2xl mx-auto">
            Discover the most popular travel destinations and luxury stays across Nepal.
        </p>
    </div>

    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

        @foreach ($featuredDestinations as $destination)

            <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition duration-300 group flex flex-col">

                <div class="overflow-hidden relative">
                    <img
                        src="{{ asset('storage/' . $destination->cover_image) }}"
                        alt="{{ $destination->city }}"
                        class="w-full h-64 object-cover group-hover:scale-110 transition duration-500">

                    <div class="absolute top-4 left-4 bg-white px-4 py-1 rounded-full text-sm font-semibold text-indigo-600 shadow">
                        {{ $destination->city }}
                    </div>
                </div>

                <div class="p-5 flex flex-col flex-1">

                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-xl font-bold text-gray-800">
                            {{ $destination->name }}
                        </h3>

                        <span class="text-indigo-600 font-semibold">
                            {{ $destination->hotels_count }} Hotels
                        </span>
                    </div>

                    <p class="text-gray-500 text-sm leading-relaxed mb-5">
                        {{ $destination->description }}
                    </p>

                    <a href="{{ route('destination.explore', $destination->id) }}"
                        class="mt-auto inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg transition w-fit">
                        Explore
                    </a>

                </div>

            </div>

        @endforeach

    </div>

</section>