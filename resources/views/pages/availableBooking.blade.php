@extends('layouts.dashboard')

@section('content')
    <div class="bg-gray-50 min-h-screen py-8">
        <div class="bg-white rounded-2xl shadow overflow-hidden">

            <div class="px-6 py-4 border-b flex justify-between">
                <h2 class="text-xl font-semibold text-gray-800">
                    Available Rooms
                </h2>

                {{-- <select id="statusFilter" name="room_status" class="border border-gray-300 rounded-lg px-4 py-2">
                    <option value="">All Status</option>
                    <option value="available">Available</option>
                    <option value="pending">Pending</option>
                    <option value="confirmed">Confirmed</option>
                </select> --}}
                <select id="statusFilter" class="border border-gray-300 rounded-lg px-4 py-2">
    <option value="" {{ empty($status) ? 'selected' : '' }}>All Status</option>

    <option value="available" {{ ($status ?? '') == 'available' ? 'selected' : '' }}>
        Available
    </option>

    <option value="pending" {{ ($status ?? '') == 'pending' ? 'selected' : '' }}>
        Pending
    </option>

    <option value="confirmed" {{ ($status ?? '') == 'confirmed' ? 'selected' : '' }}>
        Confirmed
    </option>
</select>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">
                                Room No
                            </th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">
                                Type
                            </th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">
                                Capacity
                            </th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">
                                Price
                            </th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">
                                Status
                            </th>
                            <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">
                                Action
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100" id="roomTableBody">

                        @forelse($rooms as $room)
                            <tr class="hover:bg-gray-50 transition">

                                <td class="px-6 py-4 text-gray-700">
                                    {{ $room->room_no }}
                                </td>

                                <td class="px-6 py-4 text-gray-700">
                                    {{ $room->room_type ?? 'N/A' }}
                                </td>

                                <td class="px-6 py-4 text-gray-700">
                                    {{ $room->capacity }}
                                </td>

                                <td class="px-6 py-4">
                                    <span class="font-semibold text-blue-600">
                                        Rs. {{ number_format($room->room_price) }}
                                    </span>
                                </td>

                                <td class="px-6 py-4">
                                        <span
                                            class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700">
                                             {{ ucfirst($room->room_status) }}
                                        </span>
                                </td>

                                <td class="px-6 py-4 text-center">
                                    <a href=""
                                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                                        Book Now
                                    </a>
                                </td>

                            </tr>
                        @empty

                            <tr>
                                <td colspan="7" class="text-center py-10 text-gray-500">
                                    No Bookings available.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>


<script>
document.getElementById('statusFilter').addEventListener('change', function () {

    let status = this.value;

    if (status) {
        window.location.href = '/available/bookings/' + status;
    } else {
        window.location.href = '/available/bookings';
    }

});
</script>
@endsection
