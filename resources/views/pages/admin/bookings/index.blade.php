@extends('layouts.dashboard')

@section('content')
    <div class="bg-gray-50 min-h-screen py-8">
        <x-successMessage> </x-successMessage>
        <div class="bg-white rounded-2xl shadow overflow-hidden">

            <div class="px-6 py-4 border-b flex justify-between">
                <h2 class="text-xl font-semibold text-gray-800">
                    {{ $pageTitle }}
                </h2>

                {{-- <select id="statusFilter" name="room_status" class="border border-gray-300 rounded-lg px-4 py-2">
                    <option value="">All Status</option>
                    <option value="available">Available</option>
                    <option value="pending">Pending</option>
                    <option value="confirmed">Confirmed</option>
                </select> --}}
                {{-- @if (request()->route('bookings.index') === 'bookings') --}}
                <select id="statusFilter" class="border rounded-lg px-4 py-2">

                    <option value="" {{ empty($status) ? 'selected' : '' }}>
                        All Bookings
                    </option>

                    <option value="pending" {{ $status == 'pending' ? 'selected' : '' }}>
                        Pending
                    </option>

                    <option value="confirmed" {{ $status == 'confirmed' ? 'selected' : '' }}>
                        Confirmed
                    </option>

                    <option value="checked_in" {{ $status == 'checked_in' ? 'selected' : '' }}>
                        Checked In
                    </option>

                    <option value="checked_out" {{ $status == 'checked_out' ? 'selected' : '' }}>
                        Checked Out
                    </option>

                    <option value="cancelled" {{ $status == 'cancelled' ? 'selected' : '' }}>
                        Cancelled
                    </option>

                    <option value="no_show" {{ $status == 'no_show' ? 'selected' : '' }}>
                        No Show
                    </option>

                </select>
                {{-- @endif --}}
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
                                Payment
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
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-700">
                                        {{ $book->payment_status }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 flex gap-2">

                                    @if ($book->status == 'checked_out' && $book->payment_status == 'Pending')
                                        <a href="{{ route('billing.show', $book->id) }}"
                                            class="bg-blue-600 text-white px-3 py-2 rounded">
                                            Generate Bill
                                        </a>
                                    @endif  
                                    @if ($book->payment_status == 'Paid')
                                        <a href="{{ route('billing.show', $book->id) }}"
                                            class="bg-blue-600 text-white px-3 py-2 rounded">
                                            View
                                        </a>
                                    @endif  

                                    @if ($book->status == 'pending')
                                        <a href="{{ route('bookings.confirm', $book->id) }}"
                                            class="bg-green-600 text-white px-3 py-2 rounded">
                                            Confirm
                                        </a>
                                    @endif

                                    @if ($book->status == 'confirmed')
                                        <form action="{{ route('bookingss.checkinn', $book->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')

                                            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg">
                                                Check In
                                            </button>
                                        </form>
                                    @endif

                                    @if ($book->status == 'checked_in')
                                        <form action="{{ route('bookings.checkout', $book->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')

                                            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg">
                                                Check Out
                                            </button>
                                        </form>
                                    @endif

                                    @if (in_array($book->status, ['pending', 'confirmed']))
                                        <form action="{{ route('bookings.cancel', $book->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button class="bg-red-600 text-white px-3 py-2 rounded">
                                                Cancel
                                            </button>
                                        </form>
                                    @endif

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
        document.getElementById('statusFilter').addEventListener('change', function() {

            const status = this.value;

            let url = "{{ route('bookings.index') }}";

            if (status) {
                url += '?status=' + status;
            }

            window.location.href = url;
        });
    </script>
@endsection
