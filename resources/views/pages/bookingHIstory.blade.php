@extends('layouts.dashboard')

@section('content')
    <div class="bg-gray-50 min-h-screen py-8">
        <div class="bg-white rounded-2xl shadow overflow-hidden">

            <div class="px-6 py-4 border-b flex justify-between">
                <h2 class="text-xl font-semibold text-gray-800">
                    Booking History
                </h2>

                {{-- <select id="statusFilter" name="room_status" class="border border-gray-300 rounded-lg px-4 py-2">
                    <option value="">All Status</option>
                    <option value="available">Available</option>
                    <option value="pending">Pending</option>
                    <option value="confirmed">Confirmed</option>
                </select> --}}
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">
                                Guest Name
                            </th>
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
                                Check In
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

                        @forelse($bookings as $book)
                            <tr class="hover:bg-gray-50 transition">

                                <td class="px-6 py-4 text-gray-700">
                                    {{ $book->user?->name ?? 'N/A' }}
                                </td>
                                <td class="px-6 py-4 text-gray-700">
                                    {{ $book->room?->room_no }}
                                </td>

                                <td class="px-6 py-4 text-gray-700">
                                    {{ $book->room?->roomCategory?->category_name ?? 'N/A' }}
                                </td>

                                <td class="px-6 py-4 text-gray-700">
                                    {{ $book->room?->capacity }}
                                </td>
                                
                                <td class="px-6 py-4">
                                    <span class="font-semibold text-blue-600">
                                        Rs. {{ number_format($book->total_price) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-gray-700">
                                    {{ $book->check_in }}
                                </td>

                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700">
                                        {{ $book->status }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 text-center">
                                    <a href="{{ route('show.invoice', $book->id) }}"
                                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                                        View
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
        document.getElementById('statusFilter').addEventListener('change', function() {

            let status = this.value;

            if (status) {
                window.location.href = '/available/bookings/' + status;
            } else {
                window.location.href = '/available/bookings';
            }

        });
    </script>
@endsection
