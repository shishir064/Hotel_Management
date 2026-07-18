@extends('layouts.dashboard')
@section('content')
    <!-- Hotels Table -->
    <div>


        <div class="mt-10">
            <x-successMessage></x-successMessage>
            <div class="flex justify-between items-center pb-6">
                <h2 class="text-xl font-semibold mb-4">Trending Destination List</h2>

                <a class="px-4 py-2 bg-blue-500 rounded text-white " href="{{route('trending-destinations.index')}}">Add Trending Destination</a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-4 py-2">ID</th>
                            <th class="border px-4 py-2">Destination Name</th>
                            <th class="border px-4 py-2">Image</th>
                            <th class="border px-4 py-2">City</th>
                            <th class="border px-4 py-2">Status</th>
                            <th class="border px-4 py-2">Description</th>
                            <th class="border px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($trendingDestinations as $trendingDestination)
                            <tr>
                                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="border px-4 py-2">{{ $trendingDestination->name }}</td>

                                <td class="border px-4 py-2">
                                    @if ($trendingDestination->cover_image)
                                        <img src="{{ asset('storage/' . $trendingDestination->cover_image) }}"
                                            alt="{{ $trendingDestination->name }}" class="w-16 h-12 object-cover rounded">
                                    @endif
                                </td>

                                <td class="border px-4 py-2">{{ $trendingDestination->city }}</td>
                                <td class="border px-4 py-2">{{ $trendingDestination->status }}</td>
                                <td class="border px-4 py-2">{{ $trendingDestination->description }}</td>

                                <td class="border px-4 py-2">
                                    <div class="flex gap-4 justify-center items-center">
                                        <a href="{{ route('edit_hotel', $trendingDestination->id) }}"
                                            class="bg-blue-500 text-white px-3 py-1 rounded">
                                            Edit
                                        </a>

                                        <form action="{{ route('trending-destinations.destroy', $trendingDestination->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button class="bg-red-500 text-white px-3 py-1 rounded"
                                                onclick="return confirm('Delete this Destination?')">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="border px-4 py-4 text-center">
                                    No Destinations Added.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
