@extends('layouts.dashboard')
@section('content')
    <!-- Hotels Table -->
    <div>


        <div class="mt-10">
            <div class="flex justify-between items-center pb-6">
                @if (session('success'))
                    <div class="bg-green-100 rounded p-2 flex pl-4 items-center">
                        <h1 class="text-green-800 text-lg">{{ session('success') }}</h1>
                    </div>
                @endif
                <h2 class="text-xl font-semibold mb-4">Rooms List</h2>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-4 py-2">ID</th>
                            <th class="border px-4 py-2">Room No</th>
                            <th class="border px-4 py-2">Room Type</th>
                            <th class="border px-4 py-2">Room Status</th>
                            <th class="border px-4 py-2">Room Price</th>
                            <th class="border px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rooms as $room)
                            <tr>
                                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="border px-4 py-2">{{ $room->room_no ?? '' }}</td>
                                <td class="border px-4 py-2">{{ $room->roomCategory?->category_name }}</td>
                                <td class="border px-4 py-2">{{ $room->room_status }}</td>
                                <td class="border px-4 py-2">{{ $room->room_price }}</td>

                                <td class="border px-4 py-2">
                                    <div class="flex gap-4 justify-center items-center">
                                       

                                        <form action="" method="POST">
                                            {{-- {{ route('delete_rooms', $room->id) }} --}}
                                            @csrf
                                            @method('DELETE')

                                            <button class="bg-red-500 text-white px-3 py-1 rounded"
                                                onclick="return confirm('Delete this Hotel?')">
                                                Delete
                                            </button>
                                            
                                        </form>

                                        <a href="" {{-- {{route('show.hotel.profile',$hotel->id)}} --}}
                                            class="bg-green-500 text-white px-3 py-1 rounded shrink-0">
                                            View
                                        </a>
                                         <a href="" {{-- {{ route('edit_hotel', $hotel->id) }} --}}
                                            class="bg-blue-500 text-white px-3 py-1 rounded">
                                            Book Room
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="border px-4 py-4 text-center">
                                    No Rooms found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
