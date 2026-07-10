@extends('layouts.dashboard')

@section('title', $hotel->hotel_name)

@section('content')


    <!-- Main Content -->
    <div class=" mt-8">

        <x-successMessage></x-successMessage>
        <x-errorMessage></x-errorMessage>
        <div class="relative w-full h-40 md:h-76 rounded-2xl overflow-hidden shadow-xl">

            <!-- Cover Image -->
            <img src="{{ asset('storage/' . $hotel->cover_image) }}" alt="{{ $hotel->hotel_name }}"
                class="w-full h-full object-cover">

            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>

            <!-- Hotel Information -->
            <div class="absolute bottom-0 left-0 w-full p-8">
                <h1 class="text-4xl md:text-5xl font-bold text-white">
                    {{ $hotel->hotel_name }}
                </h1>

                <p class="mt-2 text-gray-200 text-lg">
                    {{ $hotel->city }}, {{ $hotel->country }}
                </p>
            </div>

        </div>
        <!-- Left Side -->
        <div class=" ">
            <div x-data="{ tab: 'about' }" class="bg-white rounded-2xl shadow">

                <!-- Tabs Navigation -->
                <div class="border-b">
                    <nav class="flex overflow-x-auto">
                        <button @click="tab = 'about'"
                            :class="tab === 'about'
                                ?
                                'border-blue-600 text-blue-600' :
                                'border-transparent text-gray-500 hover:text-gray-700'"
                            class="px-6 py-4 font-medium border-b-2 transition">
                            About
                        </button>
                        <button @click="tab = 'rooms'"
                            :class="tab === 'rooms'
                                ?
                                'border-blue-600 text-blue-600' :
                                'border-transparent text-gray-500 hover:text-gray-700'"
                            class="px-6 py-4 font-medium border-b-2 transition">
                            Rooms
                        </button>

                        <button @click="tab = 'gallery'"
                            :class="tab === 'gallery'
                                ?
                                'border-blue-600 text-blue-600' :
                                'border-transparent text-gray-500 hover:text-gray-700'"
                            class="px-6 py-4 font-medium border-b-2 transition">
                            Gallery
                        </button>

                        <button @click="tab = 'facilities'"
                            :class="tab === 'facilities'
                                ?
                                'border-blue-600 text-blue-600' :
                                'border-transparent text-gray-500 hover:text-gray-700'"
                            class="px-6 py-4 font-medium border-b-2 transition">
                            Facilities
                        </button>


                    </nav>
                </div>

                <!-- About Tab -->
                <div x-show="tab === 'about'" class="p-6">
                    <div>

                        <h2 class="text-2xl font-bold mb-4">
                            About <span class="underline">{{ $hotel->hotel_name }}</span>
                        </h2>

                        <p class="text-gray-600 leading-8">
                            {{ $hotel->description }}
                        </p>
                    </div>

                    <div class="flex justify-between items-center mt-6 mb-6">
                        <h2 class="text-2xl font-bold">
                            Facilities
                        </h2>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        @forelse($hotel->facilities as $facility)
                            <div class="bg-gray-100 px-4 py-3 rounded-lg">
                                {{ $facility->name }}
                            </div>
                        @empty
                            <p class="text-gray-500">
                                No facilities found.
                            </p>
                        @endforelse
                    </div>

                    <div class="mt-10">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-2xl font-bold">
                                Hotel Gallery
                            </h2>

                            <a href="{{ route('hotel.images.create', $hotel->id) }}"
                                class="bg-blue-600 text-white px-4 py-2 rounded-xl font-semibold hover:bg-blue-700 transition">
                                Add Images
                            </a>
                        </div>

                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            @forelse ($hotel->images as $image)
                                <img src="{{ asset('storage/' . $image->image) }}" alt="Hotel Image"
                                    class="w-full h-52 object-cover rounded-xl hover:scale-105 transition duration-300">
                            @empty
                                <p class="col-span-full text-gray-500">
                                    No images available.
                                </p>
                            @endforelse
                        </div>
                    </div>


                </div>

                <!-- Gallery Tab -->
                <div x-show="tab === 'gallery'" class="p-6" x-cloak>
                    {{-- <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold">
                            Hotel Gallery
                        </h2>

                        <a href="{{ route('hotel.images.create', $hotel->id) }}"
                            class="bg-blue-600 text-white px-4 py-2 rounded-xl font-semibold hover:bg-blue-700 transition">
                            Add Images
                        </a>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        @forelse ($hotel->images as $image)
                            <img src="{{ asset('storage/' . $image->image) }}" alt="Hotel Image"
                                class="w-full h-52 object-cover rounded-xl hover:scale-105 transition duration-300">
                        @empty
                            <p class="col-span-full text-gray-500">
                                No images available.
                            </p>
                        @endforelse
                    </div> --}}
                    <div class="bg-gray-100 min-h-screen py-10">

                        <div class="max-w-7xl mx-auto px-4">

                            <!-- Header -->
                            <div class="mb-8">
                                <h1 class="text-3xl font-bold">
                                    Manage Hotel Images
                                </h1>
                                <p class="text-gray-500 mt-2">
                                    Upload and manage images for {{ $hotel->hotel_name }}
                                </p>
                            </div>

                            <div class="grid lg:grid-cols-3 gap-8">

                                <!-- Upload Section -->
                                <div class="lg:col-span-1">

                                    <div class="bg-white rounded-2xl shadow p-6">

                                        <h2 class="text-xl font-semibold mb-4">
                                            Upload Images
                                        </h2>

                                        <form action="{{ route('hotel.images.store', $hotel->id) }}" method="POST"
                                            enctype="multipart/form-data">

                                            @csrf

                                            <label for="images"
                                                class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center block cursor-pointer hover:border-blue-500 transition">

                                                <div class="text-5xl mb-3">
                                                    📷
                                                </div>

                                                <h3 class="font-semibold text-lg">
                                                    Click to Upload
                                                </h3>

                                                <p class="text-gray-500 text-sm mt-2">
                                                    Upload multiple hotel images
                                                </p>

                                                <input type="file" id="images" name="images[]" multiple class="hidden"
                                                    onchange="previewImages(event)">
                                            </label>

                                            <!-- Preview Section -->
                                            <div id="preview-container" class="grid grid-cols-2 gap-3 mt-6">
                                            </div>

                                            <button type="submit"
                                                class="w-full mt-6 bg-blue-600 text-white py-3 rounded-xl font-semibold hover:bg-blue-700">
                                                Upload Images
                                            </button>

                                        </form>

                                    </div>

                                </div>

                                <!-- Gallery Section -->
                                <div class="lg:col-span-2">

                                    <div class="bg-white rounded-2xl shadow p-6">

                                        <div class="flex justify-between items-center mb-6">

                                            <h2 class="text-xl font-semibold">
                                                Uploaded Images
                                            </h2>

                                            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">
                                                {{ $hotel->images->count() }} Images
                                            </span>

                                        </div>

                                        @if ($hotel->images->count())

                                            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">

                                                @foreach ($hotel->images as $image)
                                                    <div class="relative group">

                                                        <img src="{{ asset('storage/' . $image->image) }}"
                                                            alt="Hotel Image" class="w-full h-52 object-cover rounded-xl">

                                                        <div
                                                            class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition rounded-xl flex items-center justify-center">

                                                            <form action="" method="POST">

                                                                @csrf
                                                                @method('DELETE')

                                                                <button class="bg-red-600 text-white px-4 py-2 rounded-lg">
                                                                    Delete
                                                                </button>

                                                            </form>

                                                        </div>

                                                    </div>
                                                @endforeach

                                            </div>
                                        @else
                                            <div class="text-center py-16">

                                                <div class="text-6xl mb-4">
                                                    🏨
                                                </div>

                                                <h3 class="text-xl font-semibold">
                                                    No Images Uploaded
                                                </h3>

                                                <p class="text-gray-500 mt-2">
                                                    Upload your first hotel image.
                                                </p>

                                            </div>

                                        @endif

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <script>
                        function previewImages(event) {

                            const container = document.getElementById('preview-container');
                            container.innerHTML = '';

                            Array.from(event.target.files).forEach(file => {

                                const reader = new FileReader();

                                reader.onload = function(e) {

                                    const wrapper = document.createElement('div');

                                    wrapper.innerHTML = `
                <img
                    src="${e.target.result}"
                    class="w-full h-32 object-cover rounded-lg border">
            `;

                                    container.appendChild(wrapper);
                                }

                                reader.readAsDataURL(file);
                            });
                        }
                    </script>
                </div>

                <!-- Facilities Tab -->
                <div x-show="tab === 'facilities'" class="p-6" x-cloak>



                    <!-- Header -->
                    <div class="mb-8">
                        <h1 class="text-3xl font-bold text-gray-800">
                            Hotel Facilities
                        </h1>
                        <p class="text-gray-500 mt-2">
                            Choose the facilities available in your hotel.
                        </p>


                    </div>

                    <form action="{{ route('select.hotel.facilities') }}" method="POST">
                        @csrf
                        <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">
                        <div class="bg-white rounded-2xl  p-6 ">
                            <div class="flex justify-between items-center mb-4">

                                <h2 class="text-lg font-semibold mb-5 text-gray-700">
                                    Available Facilities
                                </h2>
                                {{-- <button class=" px-4 py-2 bg-black text-white rounded"> Add Facilities</button> --}}
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                @foreach ($facilities as $facility)
                                    <label for="facility{{ $facility->id }}" class="group cursor-pointer">
                                        <input type="checkbox" name="facilities[]" value="{{ $facility->id }}"
                                            id="facility{{ $facility->id }}" class="peer hidden"
                                            {{ $hotel->facilities->contains('id', $facility->id) ? 'checked' : '' }}>

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

                <!-- Rooms Tab -->
                <div x-show="tab === 'rooms'" class="p-6" x-cloak>

                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold">
                            Rooms
                        </h2>

                        <a href="{{ route('show_rooms_form', $hotel->id) }}"
                            class="bg-green-600 text-white px-4 py-2 rounded-xl font-semibold hover:bg-green-700 transition">
                            Add Room
                        </a>
                    </div>

                    <!-- Room Statistics -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">

                        <div class="bg-blue-50 p-4 rounded-xl">
                            <h3 class="text-sm text-gray-500">Total Rooms</h3>
                            <p class="text-3xl font-bold">
                                {{ $hotel->rooms->count() }}
                            </p>
                        </div>

                        <div class="bg-green-50 p-4 rounded-xl">
                            <h3 class="text-sm text-gray-500">Available Rooms</h3>
                            <p class="text-3xl font-bold">
                                {{ $hotel->rooms->where('room_status', 'available')->count() }}
                            </p>
                        </div>

                        <div class="bg-red-50 p-4 rounded-xl">
                            <h3 class="text-sm text-gray-500">Pending Rooms</h3>
                            <p class="text-3xl font-bold">
                                {{ $hotel->rooms->where('room_status', 'pending')->count() }}
                            </p>
                        </div>

                    </div>

                    <!-- Room List -->
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="text-left p-3">Room No</th>
                                    <th class="text-left p-3">Type</th>
                                    <th class="text-left p-3">Price</th>
                                    <th class="text-left p-3">Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($hotel->rooms as $room)
                                    <tr class="border-b">
                                        <td class="p-3">{{ $room->room_no }}</td>

                                        <td class="p-3">
                                            {{ $room->roomCategory?->category_name }}
                                        </td>

                                        <td class="p-3">
                                            Rs. {{ number_format($room->room_price) }}
                                        </td>

                                        <td class="p-3">
                                            @if ($room->room_status == 'available')
                                                <span class="text-green-600 font-semibold">
                                                    Available
                                                </span>
                                            @else
                                                <span class="text-red-600 font-semibold">
                                                    Occupied
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center p-4 text-gray-500">
                                            No rooms added yet.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>

                </div>

            </div>
        </div>


    @endsection
