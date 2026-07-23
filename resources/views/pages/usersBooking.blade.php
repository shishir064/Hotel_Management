@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-10 px-4">

        <h1 class="text-3xl font-bold mb-8">
            My Bookings
        </h1>

        @forelse($bookings as $booking)
            <div class="bg-white rounded-2xl shadow border mb-6">

                <div class="p-6">

                    <div class="flex justify-between">

                        <div>

                            <h2 class="text-xl font-bold">
                                {{ $booking->room->hotel->hotel_name }}
                            </h2>

                            <p class="text-gray-500">
                                Room #{{ $booking->room->room_no }}
                                •
                                {{ $booking->room->roomCategory->category_name }}
                            </p>

                        </div>

                        <span @class([
                            'px-4 py-1 rounded-full text-sm font-semibold flex items-center',
                            'bg-green-100 text-green-700' => $booking->status === 'confirmed',
                            'bg-yellow-100 text-yellow-700' => $booking->status === 'pending',
                            'bg-red-100 text-red-700' => $booking->status === 'cancelled',
                            'bg-blue-100 text-blue-700' => !in_array($booking->status, [
                                'confirmed',
                                'pending',
                                'cancelled',
                            ]),
                        ])>
                            {{ ucfirst($booking->status) }}
                        </span>

                    </div>

                    <div class="grid md:grid-cols-4 gap-6 mt-6">

                        <div>
                            <p class="text-gray-500 text-sm">Check In</p>
                            <p class="font-semibold">
                                {{ \Carbon\Carbon::parse($booking->check_in)->format('d M Y') }}
                            </p>
                        </div>

                        <div>
                            <p class="text-gray-500 text-sm">Check Out</p>
                            <p class="font-semibold">
                                {{ \Carbon\Carbon::parse($booking->check_out)->format('d M Y') }}
                            </p>
                        </div>

                        <div>
                            <p class="text-gray-500 text-sm">Guests</p>
                            <p class="font-semibold">
                                {{ $booking->adults }} Adult(s),
                                {{ $booking->children }} Child(ren)
                            </p>
                        </div>

                        <div>
                            <p class="text-gray-500 text-sm">Total Price</p>
                            <p class="font-bold text-green-600">
                                Rs. {{ number_format($booking->total_price) }}
                            </p>
                        </div>

                    </div>

                    <div class="mt-6 flex justify-end gap-3">
                        

                       @if($booking->payment_status == 'Paid')
                            <a href="{{ route('booking.show', $booking->id) }}"
                                class="px-5 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700">
                                Invoice
                            </a>
                       @endif

                        @if ($booking->status == 'pending')
                            <form action="{{ route('user.bill.cancle', $booking->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button onclick="return confirm('Cancel this booking?')"
                                    class="px-5 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700">
                                    Cancel
                                </button>

                            </form>
                        @endif

                    </div>

                </div>

            </div>

        @empty

            <div class="bg-white rounded-2xl shadow p-10 text-center">

                <img src="/images/empty-booking.svg" class="w-56 mx-auto mb-5">

                <h2 class="text-2xl font-bold">
                    No Bookings Yet
                </h2>

                <p class="text-gray-500 mt-2">
                    Looks like you haven't booked any rooms.
                </p>

                <a href="{{ route('search.hotel') }}" class="inline-block mt-6 bg-blue-600 text-white px-6 py-3 rounded-xl">
                    Book a Room
                </a>

            </div>
        @endforelse

        <div class="mt-8">
            {{ $bookings->links() }}
        </div>

    </div>
@endsection
