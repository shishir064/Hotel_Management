@extends('layouts.app')
@section('title', 'Quick Stay')
@section('content')
    <!-- Hero -->
    <section class="relative h-screen flex items-center justify-center overflow-hidden">

        <div class="absolute inset-0">
            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCwMjjzfQVXXAGeDeXoaX49lygj3xgbRrB8DIx4qryQvqiRBcmpTFBeOcH87m-8XSAA4sRJJUXdlijtQDsObXKv7ITCRLf3h_qPAA6BsAhOfePAiLlhtdIBzTJrgcHONCOSlQzkevPDceCcpXHMQTEZPEi4UVI6aBMqOw2iKWE7B2A_SVT8m4_L659r-ImGgYLW8-zTHojezk5F7JkAEivm1ekTdFuUF7T3xqQZB-B6YNfxCqgqraMEB7DowjojTjqRMwICHP0Xdxsw"
                class="w-full h-full object-cover" alt="">
            <div class="absolute inset-0 hero-gradient"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-20 text-center text-white">

            <h1 class="text-5xl md:text-7xl leading-tight max-w-4xl mx-auto mb-12">
                Discover Your Perfect Gateway Destination
            </h1>

            <!-- Search Box -->
            <div class="bg-white/95 editorial-shadow max-w-5xl mx-auto flex items-center gap-2 p-2 text-left">

                <div class="flex-1 grid grid-cols-1 md:grid-cols-3 divide-x divide-gray-300">

                    <div class="px-6 py-4">
                        <label class="block text-sm uppercase text-gray-500 mb-1" for="location">Choose a Location:</label>

                        <select name="location" id="location"
                            class="border rounded border-gray-300 text-gray-500 px-4 py-2">
                            <option value="" selected disabled hidden class="text-gray-400">Type here</option>
                            <option value="Nepal">Pokhara</option>
                            <option value="New York">Kathmandu</option>
                            <option value="singapore">Chitwan</option>
                            <option value="london">Lumbini</option>
                        </select>
                    </div>

                    <div class="px-6 py-4">
                        <label class="block text-sm uppercase text-gray-500 mb-1">
                            Check-in
                        </label>

                        <input
                            class="w-full border-none outline-none bg-transparent  text-gray-400 placeholder:text-gray-400"
                            type="date" name="check-in" id="">
                    </div>

                    <div class="px-6 py-4">
                        <label class="block text-sm uppercase text-gray-500 mb-1">
                            Check-out
                        </label>

                        <input
                            class="w-full border-none outline-none bg-transparent  text-gray-400 placeholder:text-gray-400"
                            type="date" name="check-out" id="">
                    </div>
                </div>

                <button class="bg-black  text-white px-10 py-4 rounded flex items-center justify-center  hover:opacity-90">
                    <span class="material-symbols-outlined">
                        search
                    </span>
                    Search
                </button>
            </div>
        </div>
    </section>
    
    
    <x-hotelfeed></x-hotelfeed>



    <!-- Collections -->
    <section class="py-24 max-w-7xl mx-auto px-6 lg:px-20">

        <div class="flex items-end justify-between mb-14">
            <div>
                <span class="uppercase tracking-[4px] text-gray-500 text-sm block mb-4">
                    Curated Selections
                </span>

                <h2 class="text-4xl">
                    Collections by Design
                </h2>
            </div>

            <a href="#" class="border-b border-black text-black">
                Browse All Collections
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Large -->
            <div class="relative overflow-hidden group h-[650px]">

                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBSCS1aqB5MsTG-9SlgeTvtJ2xSxO1c8VjaMSVPIc2xb34HT3JsQ28qWUgc0fds9Unk9piqk3IKsLw_FkegsbLPPTvVXZ2rG5Xlc-OYKG0yAqNwu44eC6o_chmv2155fGfIOEPAo9DJoUwgDPN7gFSB_KaAoEjUNQFtDOPNt-qPtHJ8qxNwAJXh7_TURH_P7AaDQtVjFCXsdkSBx6IsfQnsXhPqY5r8nAl6hmcMUIW5o-DYps_6XHQucWfp865jps5ou5UNjm2ZzkFX"
                    class="w-full h-full object-cover transition duration-700 group-hover:scale-105" alt="">

                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex flex-col justify-end p-10">

                    <h3 class="text-3xl text-white mb-2">
                        Coastal Retreats
                    </h3>

                    <p class="text-white/80">
                        Sovereign solitude by the water's edge.
                    </p>
                </div>
            </div>

            <!-- Right -->
            <div class="grid gap-6">

                <div class="relative overflow-hidden group aspect-video">

                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCl0SBMaJwZfa9NT3Ls23o05183iPx0yUfFwxEHIn797tVMN1KK01Yugs8-03gl2WwGyiLkIwVVNNd9kYEplpjHjkhiGKopDVUOQ5qtaHuxmudtEuL5n9y6e5oUWpYzhblM3dQTzYz3OCZt4TxFfL6wjJrkw8u5rGDHKdRnkRacnOBCSQR832QAK-rtEsrqNaBPE3tLnWYeNDeBZFC9xJe5D_lqY7WtPtJLm3zShC_tXDRhHoqesVJ7_7XGS4LntheGpoizH62JdfPT"
                        class="w-full h-full object-cover transition duration-700 group-hover:scale-105" alt="">

                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex flex-col justify-end p-8">

                        <h3 class="text-2xl text-white mb-2">
                            Urban Sanctuaries
                        </h3>

                        <p class="text-white/80">
                            High-altitude calm in the heart of the city.
                        </p>
                    </div>
                </div>

                <div class="relative overflow-hidden group aspect-video">

                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBSq0B7Dukd7R4haGiysfYs9z26SnScQFNj90eguvbcHdUG0eOqp-X3xe5dzHzoONXOuNhtynjYt7DQa3UTRiH0qod5a1HKqpM4ft5jBCQuLFf-iFZ5Ed_5EdT0yreG16MAqmDylQ2gzfO7iC9a4FiB1g1skYGhxDfZrRqb-gE5TGaPA3F7lklvA2vSOis20qz-wNEhtIidMJE3Tv7OKeW_A73SKG4evGO8XWluMq7xX1a8laXpjLXe_w3do7b6YNG8uvS9o4LlpQZM"
                        class="w-full h-full object-cover transition duration-700 group-hover:scale-105" alt="">

                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex flex-col justify-end p-8">

                        <h3 class="text-2xl text-white mb-2">
                            Alpine Hideaways
                        </h3>

                        <p class="text-white/80">
                            Warm hearths amidst the frozen peaks.
                        </p>
                    </div>
                </div>

            </div>
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
