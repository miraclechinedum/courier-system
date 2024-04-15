<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __invoke(Request $request)
    {
        $user = Auth::user();
        if ($user && $user->role_id == 2) {
            // If the logged-in user's id is 2, retrieve the count of bookings where user_id matches theirs
            $totalOrders = Booking::where('user_id', $user->id)->count();
            // If the logged-in user's role_id is 2, retrieve the last 5 bookings where user_id matches theirs
            $bookings = Booking::where('user_id', $user->id)->latest()->take(5)->get();

            // Retrieve the count of recipients added by the logged-in user
            $totalRecipients = UserAddress::where('added_by', $user->id)->count();
        } else {
            // Otherwise, get the total number of bookings from the bookings table
            $totalOrders = Booking::count();

            // Otherwise, get the last 5 bookings from the bookings table
            $bookings = Booking::latest()->take(5)->get();

            // If the user's role is not 2, set the totalRecipients to 0
            $totalRecipients = 0;
        }

        // Retrieve the count of users with role_id = 2 (RECIPIENT)
        $totalCustomers = User::where('role_id', 2)->count();

        $totalReceivers = User::where('role_id', 2)->count();

        // Retrieve the count of bookings with different statuses
        $totalPendingBookings = Booking::where('status', 'Pending')->count();
        $totalProcessingBookings = Booking::where('status', 'Processing')->count();
        $totalInTransitBookings = Booking::where('status', 'In Transit')->count();
        $totalArrivedBookings = Booking::where('status', 'Arrived')->count();
        $totalCancelledBookings = Booking::where('status', 'Cancelled')->count();

        $totalRevenue = Booking::sum('amount');

        // Total users on the system
        $totalUsers = User::where('id', '!=', 1)->count();

        // Total number of senders (role_id 2) and receivers (role_id 3) for each week
        $weeklySenders = User::where('role_id', 2)
            ->groupBy(DB::raw('YEAR(created_at)'), DB::raw('WEEK(created_at)'))
            ->selectRaw('YEAR(created_at) as year, WEEK(created_at) as week, COUNT(*) as count')
            ->get();

        $weeklyReceivers = User::where('role_id', 3)
            ->groupBy(DB::raw('YEAR(created_at)'), DB::raw('WEEK(created_at)'))
            ->selectRaw('YEAR(created_at) as year, WEEK(created_at) as week, COUNT(*) as count')
            ->get();

        return view('dashboard', compact('totalUsers', 'weeklySenders', 'weeklyReceivers', 'totalOrders', 'totalCustomers',  'totalRevenue', 'totalReceivers', 'bookings', 'totalRecipients', 'totalPendingBookings', 'totalProcessingBookings', 'totalInTransitBookings', 'totalArrivedBookings', 'totalCancelledBookings'));
    }
}
