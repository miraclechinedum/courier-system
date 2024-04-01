<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        // Retrieve the count of users with role_id = 2
        $totalCustomers = User::where('role_id', 2)->count();

        return view('dashboard', compact('totalOrders', 'totalCustomers', 'bookings', 'totalRecipients'));
    }
}
