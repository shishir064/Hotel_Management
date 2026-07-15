<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Hotel;
use App\Models\RoomBooking;
use App\Models\Rooms;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SuperAdminDashboardController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | Dashboard Cards
        |--------------------------------------------------------------------------
        */

        $totalHotels = Hotel::count();

        $totalHotelOwners = User::role('admin')->count();

        $totalRooms = Rooms::count();

        $totalBookings = RoomBooking::count();

        $totalRevenue = Bill::where('status', 'Paid')->sum('total');


        /*
        |--------------------------------------------------------------------------
        | Monthly Hotel Registration
        |--------------------------------------------------------------------------
        */

        $hotelRegistration = Hotel::selectRaw("
                MONTH(created_at) as month,
                COUNT(*) as total
            ")
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Monthly Bookings
        |--------------------------------------------------------------------------
        */

        $monthlyBookings = RoomBooking::selectRaw("
                MONTH(created_at) as month,
                COUNT(*) as total
            ")
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Monthly Revenue
        |--------------------------------------------------------------------------
        */

        $monthlyRevenue = Bill::selectRaw("
                MONTH(created_at) as month,
                SUM(total) as total
            ")
            ->where('status', 'Paid')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Room Status
        |--------------------------------------------------------------------------
        */

        $roomStatus = Rooms::select(
                'room_status',
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('room_status')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Payment Status
        |--------------------------------------------------------------------------
        */

        $paymentStatus = Bill::select(
                'status',
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('status')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Latest Hotels
        |--------------------------------------------------------------------------
        */

        $latestHotels = Hotel::latest()
            ->take(5)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Latest Bookings
        |--------------------------------------------------------------------------
        */

        $latestBookings = RoomBooking::with('room')
            ->latest()
            ->take(5)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Top Hotels by Revenue
        |--------------------------------------------------------------------------
        */

        $topHotels = Hotel::select(
                'hotels.hotel_name',
                DB::raw('SUM(bill.total) as revenue')
            )
            ->join('rooms', 'hotels.id', '=', 'rooms.hotel_id')
            ->join('bill', 'rooms.id', '=', 'bill.room_id')
            ->where('bill.status', 'Paid')
            ->groupBy('hotels.id', 'hotels.hotel_name')
            ->orderByDesc('revenue')
            ->take(5)
            ->get();


        return view('pages.superadmin.dashboard', compact(

            'totalHotels',
            'totalHotelOwners',
            'totalRooms',
            'totalBookings',
            'totalRevenue',

            'hotelRegistration',
            'monthlyBookings',
            'monthlyRevenue',

            'roomStatus',
            'paymentStatus',

            'latestHotels',
            'latestBookings',

            'topHotels'
        ));
    }
}