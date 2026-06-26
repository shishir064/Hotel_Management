@extends('layouts.dashboard')

@section('content')
    <div class="bg-gray-50 min-h-screen py-8">
        <div class="bg-white rounded-2xl shadow overflow-hidden">

            <div class="px-6 py-4 border-b flex justify-between">
                <h2 class="text-xl font-semibold text-gray-800">
                    Available Rooms
                </h2>

                <select id="statusFilter" name="room_status" class="border border-gray-300 rounded-lg px-4 py-2">
                    <option value="">All Status</option>
                    <option value="available">Available</option>
                    <option value="pending">Pending</option>
                    <option value="confirmed">Confirmed</option>
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
                                    {{ $room->roomCategory?->category_name ?? 'N/A' }}
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
                                    @if ($room->room_status == 'available')
                                        <span
                                            class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700">
                                            Available
                                        </span>
                                    @elseif($room->room_status == 'pending')
                                        <span
                                            class="px-3 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-700">
                                            Pending
                                        </span>
                                    @elseif($room->room_status == 'confirmed')
                                        <span class="px-3 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-700">
                                            Confirmed
                                        </span>
                                    @endif
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
                                    No rooms available.
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

    if (status === '') {
        window.location.href = '/available/bookings';
    } else {
        window.location.href = '/available/bookings/' + status;
    }

    fetch('/api/store')
        .then(response => response.json())
        .then(rooms => {

            let tbody = document.getElementById('roomTableBody');
            tbody.innerHTML = '';

            // Filter rooms based on selected status
            if (status !== '') {
                rooms = rooms.filter(room => room.room_status === status);
            }

            if (rooms.length === 0) {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="6" class="text-center py-10 text-gray-500">
                            No rooms found.
                        </td>
                    </tr>
                `;
                return;
            }

            rooms.forEach(room => {

                let badge = '';

                if (room.room_status === 'available') {
                    badge = `<span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700">Available</span>`;
                } else if (room.room_status === 'pending') {
                    badge = `<span class="px-3 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-700">Pending</span>`;
                } else {
                    badge = `<span class="px-3 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-700">Confirmed</span>`;
                }

                tbody.innerHTML += `
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">${room.room_no}</td>
                        <td class="px-6 py-4">${room.room_category ? room.room_category.category_name : 'N/A'}</td>
                        <td class="px-6 py-4">${room.capacity}</td>
                        <td class="px-6 py-4">
                            <span class="font-semibold text-blue-600">
                                Rs. ${Number(room.room_price).toLocaleString()}
                            </span>
                        </td>
                        <td class="px-6 py-4">${badge}</td>
                        <td class="px-6 py-4 text-center">
                            <a href="#" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                                Book Now
                            </a>
                        </td>
                    </tr>
                `;
            });

        })
        .catch(error => console.error(error));
});
</script>
@endsection
