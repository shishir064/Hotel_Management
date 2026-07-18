@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto py-10 px-4">
        <x-errorMessage></x-errorMessage>
        <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

            <!-- Header -->
            <form action="{{ route('user.bill.store') }}" method="POST">
                @csrf
                <div class="bg-gradient-to-r from-gray-800 to-gray-600 text-white p-8">

                    <div class="flex justify-between items-center">

                        <div>

                            <h1 class="text-3xl font-bold">
                                Booking Details
                            </h1>

                            <p class="mt-2 text-gray-200">
                                Booking #{{ $booking->id }}
                            </p>

                        </div>

                        <span
                            class="px-5 py-2 rounded-full font-semibold

                    @if ($booking->status == 'confirmed') bg-green-500
                    @elseif($booking->status == 'pending')
                        bg-yellow-500
                    @elseif($booking->status == 'cancelled')
                        bg-red-500
                    @else
                        bg-blue-500 @endif
                ">
                            {{ ucfirst($booking->payment_status) }}
                        </span>

                    </div>

                </div>

                <div class="p-8 space-y-10">

                    <!-- Hotel -->

                    <div>

                        <h2 class="text-xl font-bold mb-4">
                            Hotel Information
                        </h2>

                        <div class="grid md:grid-cols-2 gap-6">

                            <div>

                                <p class="text-gray-500">Hotel</p>

                                <p class="font-semibold text-lg">
                                    {{ $booking->room->hotel->hotel_name }}
                                </p>

                            </div>

                            <div>

                                <p class="text-gray-500">Room</p>

                                <p class="font-semibold">
                                    Room #{{ $booking->room->room_no }}
                                    ({{ $booking->room->roomCategory->category_name }})
                                </p>

                            </div>

                        </div>

                    </div>

                    <hr>

                    <!-- Guest -->

                    <div>

                        <h2 class="text-xl font-bold mb-4">
                            Guest Information
                        </h2>

                        <div class="grid md:grid-cols-2 gap-6">

                            <div>
                                <input type="text" name="status" hidden value="{{ $booking->status }}">
                                <input type="text" name="user_id" hidden value="{{ $booking->user_id }}">
                                <input type="text" name="bill_id" hidden value="{{ $booking->id }}">
                                <input type="text" name="room_id" hidden value="{{ $booking->room_id }}">
                                <p class="text-gray-500">Guest Name</p>

                                <p class="font-semibold">
                                    {{ $booking->user->name }}
                                </p>

                            </div>

                            <div>

                                <p class="text-gray-500">Email</p>

                                <p class="font-semibold">
                                    {{ $booking->user->email }}
                                </p>

                            </div>

                            <div>

                                <p class="text-gray-500">Phone</p>

                                <p class="font-semibold">
                                    {{ $booking->user->phone }}
                                </p>

                            </div>

                            <div>

                                <p class="text-gray-500">Citizen ID</p>

                                <p class="font-semibold">
                                    {{ $booking->user->citizen_id }}
                                </p>

                            </div>

                            <div class="md:col-span-2">

                                <p class="text-gray-500">Address</p>

                                <p class="font-semibold">
                                    {{ $booking->user->address }}
                                </p>

                            </div>

                        </div>

                    </div>

                    <hr>

                    <!-- Stay -->

                    <div>

                        <h2 class="text-xl font-bold mb-4">
                            Stay Information
                        </h2>

                        <div class="grid md:grid-cols-4 gap-6">

                            <div>

                                <p class="text-gray-500">Check In</p>

                                <p class="font-semibold">
                                    {{-- <input class="w-10 text-right border-none outline-none bg-transparent p-0 focus:ring-0" type="date" name="check_in" id="" value="{{ \Carbon\Carbon::parse($booking->check_in)->format('d M Y') }}"> --}}
                                    <input class=" text-right border-none outline-none bg-transparent p-0 focus:ring-0" type="date" name="check_in" id="" 
                                    value="{{ $booking->check_in }}">
                                </p>

                            </div>

                            <div>

                                <p class="text-gray-500">Check Out</p>

                                <p class="font-semibold">
                                    <input class="text-right border-none outline-none bg-transparent p-0 focus:ring-0" type="date" name="check_out" id="" value="{{ $booking->check_out }}">
                                </p>

                            </div>

                            <div>

                                <p class="text-gray-500">Adults</p>

                                <p class="font-semibold">
                                    {{ $booking->adults }}
                                </p>

                            </div>

                            <div>

                                <p class="text-gray-500">Children</p>

                                <p class="font-semibold">
                                    {{ $booking->children }}
                                </p>

                            </div>

                        </div>

                    </div>

                    <hr>

                    <!-- Payment -->

                    <div class="bg-gray-50 rounded-2xl p-6">

                        <h3 class="text-lg font-semibold mb-4">
                            Payment Summary
                        </h3>

                        <div class="space-y-3">

                            <div class="flex justify-between">
                                <span>Room Price / Night</span>
                                <span>Rs. {{ number_format($booking->room->room_price) }}</span>
                            </div>

                            <div class="flex justify-between">
                                <span>Discount</span>
                                <span><input type="text" name="discount" id="discount" value="{{ $booking->room->discount }}" class="w-10 text-right border-none outline-none bg-transparent p-0 focus:ring-0"> %</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span>VAT</span>

                                <div class="flex items-center">
                                    <input type="text" name="vat" id="vat" value="13"
                                        class="w-10 text-right border-none outline-none bg-transparent p-0 focus:ring-0">
                                    <span>%</span>
                                </div>
                            </div>

                            <div class="flex justify-between">
                                <span>Total Nights</span>
                                <span>
                                    {{ \Carbon\Carbon::parse($booking->check_in)->diffInDays($booking->check_out) }}
                                </span>
                            </div>

                            <div class="flex justify-between">
                                <span>Booked On</span>
                                <span>{{ $booking->created_at->format('d M Y h:i A') }}</span>
                            </div>

                            <hr>

                            <div class="flex justify-between text-xl font-bold text-green-600">
                                <span>Total Amount</span>
                                <span>Rs. <input class="border-none" type="text" name="total" id="total_amount"
                                        value="{{ $booking->total_price }}" readonly></span>
                            </div>

                        </div>
                        <div class="flex justify-between mt-3">

                            <span>Payment Method</span>

                            <span class="font-semibold">
                                <select name="payment_method" id="" class="p-2">
                                    <option>Select Payment Method</option>
                                    <option>Cash</option>
                                    <option>Card</option>
                                    <option>eSewa</option>
                                    <option>Khalti</option>
                                    <option>Bank Transfer</option>
                                </select>
                            </span>

                        </div>

                    </div>

                    <!-- Buttons -->

                    <div class="flex justify-end gap-4">

                        <a href="{{ route('booking.my') }}" class="px-6 py-3 rounded-xl bg-gray-200 hover:bg-gray-300">

                            Back

                        </a>
                        @if ($booking->payment_status != 'Paid')
                        @endif

                        {{-- @if ($booking->status == 'pending')
                            <form action="{{ route('booking.cancel', $booking->id) }}" method="POST">

                                @csrf
                                @method('DELETE')

                                <button onclick="return confirm('Cancel this booking?')"
                                    class="px-6 py-3 rounded-xl bg-red-600 text-white hover:bg-red-700">

                                    Cancel Booking

                                </button>

                            </form>
                        @endif --}}
                        <button type="submit"
                            class="px-6 py-3 rounded-xl bg-green-600 hover:bg-green-700 text-white font-semibold">

                            💳 Pay Now

                        </button>
                    </div>

                </div>

        </div>
        </form>
    </div>
@endsection
