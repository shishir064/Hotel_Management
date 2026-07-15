@extends('layouts.dashboard')

@section('content')


    <!-- Header -->

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">
            Super Admin Dashboard
        </h1>

        <p class="text-gray-500">
            Welcome back! Here's an overview of your hotel management platform.
        </p>
    </div>

    <!-- Statistics -->

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-5 gap-6 mb-8">

        <div class="bg-white rounded-xl shadow p-6">
            <p class="text-gray-500 text-sm">Total Hotels</p>

            <h2 class="text-3xl font-bold mt-2">
                {{ $totalHotels }}
            </h2>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <p class="text-gray-500 text-sm">Hotel Owners</p>

            <h2 class="text-3xl font-bold mt-2">
                {{ $totalHotelOwners }}
            </h2>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <p class="text-gray-500 text-sm">Total Rooms</p>

            <h2 class="text-3xl font-bold mt-2">
                {{ $totalRooms }}
            </h2>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <p class="text-gray-500 text-sm">Bookings</p>

            <h2 class="text-3xl font-bold mt-2">
                {{ $totalBookings }}
            </h2>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <p class="text-gray-500 text-sm">Revenue</p>

            <h2 class="text-3xl font-bold mt-2">
                Rs. {{ number_format($totalRevenue,2) }}
            </h2>
        </div>

    </div>

    <!-- Charts -->

    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6 mb-8">

        <div class="bg-white rounded-xl shadow p-6">

            <h2 class="font-semibold mb-4">
                Monthly Hotel Registration
            </h2>

            <canvas id="hotelChart"></canvas>

        </div>

        <div class="bg-white rounded-xl shadow p-6">

            <h2 class="font-semibold mb-4">
                Monthly Bookings
            </h2>

            <canvas id="bookingChart"></canvas>

        </div>

        <div class="bg-white rounded-xl shadow p-6">

            <h2 class="font-semibold mb-4">
                Monthly Revenue
            </h2>

            <canvas id="revenueChart"></canvas>

        </div>

        <div class="bg-white rounded-xl shadow p-6">

            <h2 class="font-semibold mb-4">
                Room Status
            </h2>

            <canvas id="roomStatusChart"></canvas>

        </div>

    </div>

    <!-- Tables -->

  

        <!-- Latest Hotels -->

        <div class="bg-white rounded-xl shadow ">

            <div class="p-5 border-b">

                <h2 class="font-semibold">
                    Latest Hotels
                </h2>

            </div>

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead class="bg-gray-100">

                    <tr>

                        <th class="p-3 text-left">Hotel</th>

                        <th class="p-3 text-left">City</th>

                        <th class="p-3 text-left">Rating</th>

                    </tr>

                    </thead>

                    <tbody>

                    @foreach($latestHotels as $hotel)

                        <tr class="border-b">

                            <td class="p-3">
                                {{ $hotel->hotel_name }}
                            </td>

                            <td class="p-3">
                                {{ $hotel->city }}
                            </td>

                            <td class="p-3">
                                ⭐ {{ $hotel->star_rating }}
                            </td>

                        </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>

        </div>


    

    <!-- Top Hotels -->

    <div class="bg-white rounded-xl shadow mt-8 overflow-hidden">

    <div class="flex items-center justify-between p-5 border-b">
        <div>
            <h2 class="text-lg font-semibold text-gray-800">
                Top Hotels by Revenue
            </h2>
            <p class="text-sm text-gray-500">
                Highest earning hotels on the platform
            </p>
        </div>
    </div>

    <div class="overflow-x-auto">

        <table class="min-w-full">

            <thead class="bg-gray-50 border-b">

                <tr>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">
                        Rank
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">
                        Hotel
                    </th>

                    <th class="px-6 py-4 text-right text-sm font-semibold text-gray-600">
                        Revenue
                    </th>

                </tr>

            </thead>

            <tbody class="divide-y divide-gray-100">

                @foreach($topHotels as $index => $hotel)

                <tr class="hover:bg-gray-50 transition">

                    <td class="px-6 py-4">

                        <div class="w-9 h-9 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold">
                            {{ $index + 1 }}
                        </div>

                    </td>

                    <td class="px-6 py-4">

                        <div class="flex items-center gap-3">

                            <div>

                                <h3 class="font-semibold text-gray-800">
                                    {{ $hotel->hotel_name }}
                                </h3>

                                <p class="text-sm text-gray-500">
                                    Top performing hotel
                                </p>

                            </div>

                        </div>

                    </td>

                    <td class="px-6 py-4 text-right">

                        <span class="text-lg font-bold text-green-600">
                            Rs. {{ number_format($hotel->revenue,2) }}
                        </span>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

</div>

@endsection
@push('scripts')

<script>

const months = [
    'Jan','Feb','Mar','Apr','May','Jun',
    'Jul','Aug','Sep','Oct','Nov','Dec'
];


// ======================
// Hotel Registration
// ======================

let hotelData = new Array(12).fill(0);

@foreach($hotelRegistration as $item)
hotelData[{{ $item->month - 1 }}] = {{ $item->total }};
@endforeach

new Chart(document.getElementById('hotelChart'), {

    type: 'line',

    data:{

        labels:months,

        datasets:[{

            label:'Hotels',

            data:hotelData,

            borderWidth:3,

            tension:.4,

            fill:false

        }]
    }

});


// ======================
// Monthly Bookings
// ======================

let bookingData = new Array(12).fill(0);

@foreach($monthlyBookings as $item)
bookingData[{{ $item->month - 1 }}] = {{ $item->total }};
@endforeach

new Chart(document.getElementById('bookingChart'),{

    type:'bar',

    data:{

        labels:months,

        datasets:[{

            label:'Bookings',

            data:bookingData,

            borderWidth:1

        }]

    }

});



// ======================
// Revenue
// ======================

let revenueData = new Array(12).fill(0);

@foreach($monthlyRevenue as $item)
revenueData[{{ $item->month - 1 }}]={{ $item->total }};
@endforeach

new Chart(document.getElementById('revenueChart'),{

    type:'bar',

    data:{

        labels:months,

        datasets:[{

            label:'Revenue',

            data:revenueData

        }]

    }

});



// ======================
// Room Status
// ======================

new Chart(document.getElementById('roomStatusChart'),{

    type:'doughnut',

    data:{

        labels:@json($roomStatus->pluck('room_status')),

        datasets:[{

            data:@json($roomStatus->pluck('total'))

        }]

    }

});

</script>

@endpush