@extends('layouts.dashboard')

@section('title', 'Add Room')

@section('content')
    <form action="">
        <div>
            <h1 class="text-4xl md:text-[40px] outfit">Add Room</h1>
            <p class="text-sm md:text-base text-gray-500/90 mt-2 max-w-174">Fill in the details carefully and accurate room
                details, pricing, and amenities, to enhance the user booking experience.</p>
        </div>


        <div class="">
            <h2 class="text-gray-800 mt-10">Images</h2>
            <div class="grid grid-cols-2 sm:flex gap-4 flex-wrap my-2 ">
                <label for="roomImg1">
                    <img class="max-h-13 cursor-pointer opacity-80" src="{{ asset('images/imgUpload.svg') }}" alt="">
                    <input type="file" hidden id="roomImg1">
                </label>
                <label for="roomImg2">
                    <img class="max-h-13 cursor-pointer opacity-80" src="{{ asset('images/imgUpload.svg') }}"
                        alt="">
                    <input type="file" id="roomImg2" hidden>
                </label>
                <label for="roomImg3">
                    <img class="max-h-13 cursor-pointer opencity-80" src="{{ asset('images/imgUpload.svg') }}"
                        alt="">
                    <input type="file" id="roomImg3" hidden>
                </label>
                <label for="roomImg4">
                    <img class="max-h-13 cursor-pointer opacity-80" src="{{ asset('images/imgUpload.svg') }}"
                        alt="">
                    <input type="file" id="roomImg4" hidden>
                </label>
            </div>

            <div class="flex mt-4 gap-x-2">
                <div>
                    <h2 class="mb-2">Room Type</h2>
                    {{-- <select class="border border-gray-300 text-gray-500 py-2 px-2 rounded" name="" id="">
                        <option value="Single Bed">Select Room Type</option>
                        <option value="Single Bed">Single Bed</option>
                        <option value="Double Bed">Double Bed</option>
                        <option value="Luxury Bed">Luxury Room</option>
                    </select> --}}
                    <select name="category_id" class="border border-gray-300 text-gray-500 py-2 px-2 rounded">
                        <option value="">Select Room Type</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <h2 class="mb-2">Price</h2>
                    <input type="number" placeholder="0"
                        class="py-2 px-2 rounded border border-gray-300 text-gray-500 max-w-22">
                </div>
            </div>
            <div class="text-gray-400">
                <h2 class="mt-4 text-black">Amenities</h2>
                <div class="">
                    <input class="" type="checkbox" name="" id="Wifi" value="Wifi">
                    <label for="Wifi">Wifi</label>
                </div>
                <div>
                    <input type="checkbox" name="" id="Breakfast" value="Breakfast">
                    <label for="Breakfast">Breakfast</label>
                </div>
                <div>
                    <input type="checkbox" name="" id="SwimmingPool" value="SwimmingPool">
                    <label for="SwimmingPool">Swimming Pool</label>
                </div>
                <div >
                    <input type="checkbox" class="">
                    <label for="Gym">Gym</label>
                </div>

            </div>

            <button class="bg-primary text-white px-8 py-2 rounded mt-8 cursor-pointer">Add Room</button>
        </div>
    </form>
@endsection
