<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class TrackController extends Controller
{
    public function index()
    {
        return view('track');
    }

    public function track(Request $request)
    {
        // Retrieve the product ID from the request
        $productId = $request->input('product_id');

        // Perform the tracking logic here (e.g., fetch data from the database based on the product ID)
        $booking = Booking::where('tracking_id', $productId)->first();

        // Check if booking exists
        if ($booking) {
            // If the booking exists, return the tracking information view with the booking data
            return view('track', ['booking' => $booking]);
        } else {
            // If the booking does not exist, redirect the user back to the home page
            return redirect()->route('home')->withErrorMessage('Invalid Tracking ID!!');
        }
    }

    public function showErrorPage(Request $request)
    {
        // You can customize the error page as per your requirements
        return view('error');
    }
}
