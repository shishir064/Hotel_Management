@extends('layouts.dashboard')

@section('title', 'Manage Hotel Images')

@section('content')

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

                    <form action="{{ route('hotel.images.store', $hotel->id) }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf

                        <label
                            for="images"
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

                            <input
                                type="file"
                                id="images"
                                name="images[]"
                                multiple
                                class="hidden"
                                onchange="previewImages(event)">
                        </label>

                        <!-- Preview Section -->
                        <div id="preview-container"
                             class="grid grid-cols-2 gap-3 mt-6">
                        </div>

                        <button
                            type="submit"
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

                    @if($hotel->images->count())

                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">

                            @foreach($hotel->images as $image)

                                <div class="relative group">

                                    <img
                                        src="{{ asset('storage/' . $image->image) }}"
                                        alt="Hotel Image"
                                        class="w-full h-52 object-cover rounded-xl">

                                    <div
                                        class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition rounded-xl flex items-center justify-center">

                                        <form action=""
                                              method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                class="bg-red-600 text-white px-4 py-2 rounded-lg">
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

@endsection