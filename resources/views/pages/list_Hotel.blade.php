@extends('layouts.dashboard')
@section('content')
    <!-- Hotels Table -->
    <div>


        <div class="mt-10">
            <x-successMessage></x-successMessage>
            <div class="flex justify-between items-center pb-6">
                <h2 class="text-xl font-semibold mb-4">Hotel List</h2>

                <x-hotel-list-form></x-hotel-list-form>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-4 py-2">ID</th>
                            <th class="border px-4 py-2">Hotel Name</th>
                            <th class="border px-4 py-2">Image</th>
                            <th class="border px-4 py-2">Email</th>
                            <th class="border px-4 py-2">Phone</th>
                            <th class="border px-4 py-2">City</th>
                            <th class="border px-4 py-2">Country</th>
                            <th class="border px-4 py-2">Stars</th>
                            <th class="border px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($hotels as $hotel)
                            <tr>
                                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="border px-4 py-2">{{ $hotel->hotel_name }}</td>

                                <td class="border px-4 py-2">
                                    @if ($hotel->cover_image)
                                        <img src="{{ asset('storage/' . $hotel->cover_image) }}"
                                            alt="{{ $hotel->hotel_name }}" class="w-16 h-12 object-cover rounded">
                                    @endif
                                </td>

                                <td class="border px-4 py-2">{{ $hotel->email }}</td>
                                <td class="border px-4 py-2">{{ $hotel->phone }}</td>
                                <td class="border px-4 py-2">{{ $hotel->city }}</td>
                                <td class="border px-4 py-2">{{ $hotel->country }}</td>
                                <td class="border px-4 py-2">{{ $hotel->star_rating }} ★</td>

                                <td class="border px-4 py-2">
                                    <div class="flex gap-4 justify-center items-center">
                                        <a href="{{ route('edit_hotel', $hotel->id) }}"
                                            class="bg-blue-500 text-white px-3 py-1 rounded">
                                            Edit
                                        </a>

                                        <form action="{{ route('hotel.delete', $hotel->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button class="bg-red-500 text-white px-3 py-1 rounded"
                                                onclick="return confirm('Delete this Hotel?')">
                                                Delete
                                            </button>
                                        </form>

                                        <a href="{{route('hotel.view', $hotel->id)}}"
                                            class="bg-green-500 text-white px-3 py-1 rounded shrink-0">
                                            View
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="border px-4 py-4 text-center">
                                    No hotels found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
