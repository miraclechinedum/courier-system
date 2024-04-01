<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\UserAddress;
use App\Models\Booking;
use App\Models\Package;
use Illuminate\Support\Facades\Validator;


class BookingController extends Controller
{

    public function getStates(Request $request)
    {
        // Fetch states based on the selected country
        $countryId = $request->input('country_id');
        $states = State::where('country_id', $countryId)->get();

        // Return states as JSON response
        return response()->json($states);
    }

    public function getCities(Request $request)
    {
        // Fetch cities based on the selected state
        $stateId = $request->input('state_id');
        $cities = City::where('state_id', $stateId)->get();

        // Return cities as JSON response
        return response()->json($cities);
    }


    public function create()
    {
        // Fetch all countries
        $countries = Country::all();

        // Fetch addresses of the logged-in user
        $userAddresses = UserAddress::with(['country', 'state', 'city'])
            ->where('user_id', auth()->id())
            ->get();

        // Fetch recipients (users with role_id 3) along with their user addresses
        $recipients = User::where('role_id', 3)
            ->with('userAddresses')
            ->get();

        // Pass the variables to the view
        return view('submit-booking', compact('countries', 'userAddresses', 'recipients'));
    }



    // public function store(Request $request)
    // {
    //     // Validate the request data
    //     $validatedData = $request->validate([
    //         'pickup_location' => 'required|string',
    //         'delivery_location' => 'required|string',
    //         'package_details' => 'required|string',
    //     ]);

    //     // Generate tracking ID
    //     $trackingId = strtoupper('LP-' . rand(10000, 99999) . '-' . rand(100, 999) . '-' . rand(100, 999));

    //     // Create a new booking record
    //     $booking = new Booking();
    //     $booking->user_id = auth()->id();
    //     $booking->pickup_location = $validatedData['pickup_location'];
    //     $booking->delivery_location = $validatedData['delivery_location'];
    //     $booking->package_details = $validatedData['package_details'];
    //     $booking->status = 'pending';
    //     $booking->tracking_id = $trackingId; // Assign generated tracking ID
    //     $booking->save();

    //     return redirect()->route('bookings.index')->with('success', 'Booking created successfully. Tracking ID: ' . $trackingId);
    // }

    // public function store(Request $request)
    // {
    //     // dd("booking submit", $request->all());
    //     // Validate the form data
    //     $validator = Validator::make($request->all(), [
    //         // 'prefix' => 'required',
    //         // 'tracking' => 'required',
    //         'service_mode' => 'required',
    //         'courier_company' => 'required',
    //         'packaging_type' => 'required',
    //         'payment_method' => 'required',
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }

    //     // Concatenate prefix and tracking number
    //     $bookingCode = $validator['prefix'] . '-' . $validator['tracking'];

    //     // Create a new Booking instance
    //     $booking = new Booking();

    //     // Set the attributes
    //     $booking->user_id = $validator['user_id'];
    //     $booking->tracking_id = $bookingCode;
    //     $booking->service_mode = $validator['service_mode'];
    //     $booking->courier_company = $validator['courier_company'];
    //     $booking->packaging_type = $validator['packaging_type'];
    //     $booking->payment_method = $validator['payment_method'];
    //     // $booking->sender_id = $request->input('sender_id');
    //     // $booking->recipient_address_id = $request->input('recipient_address_id');

    //     // Save the booking to the database
    //     $booking->save();

    //     // Redirect back or wherever you want after successful submission
    //     // return redirect()->back()->with('success', 'Booking submitted successfully!');
    //     return redirect()->route('bookings.index')->with('success', 'Booking created successfully.');
    // }

    public function store(Request $request)
    {
        // Validate the form data
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'service_mode' => 'required',
            'courier_company' => 'required',
            'packaging_type' => 'required',
            'payment_method' => 'required',
            'sender_customer_address' => 'required',
            'package_description' => 'required|array', // Update field name
            'quantity' => 'required|array', // Update field name
            'weight' => 'required|array', // Update field name
            'length' => 'required|array', // Update field name
            'width' => 'required|array', // Update field name
            'height' => 'required|array', // Update field name
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Concatenate prefix and tracking number
        $bookingCode = $request->prefix . '-' . $request->tracking;

        // Create a new Booking instance
        $booking = new Booking();

        // Set the attributes
        $booking->user_id = $request->user_id;
        $booking->tracking_id = $bookingCode;
        $booking->service_mode = $request->service_mode;
        $booking->courier_company = $request->courier_company;
        $booking->packaging_type = $request->packaging_type;
        $booking->payment_method = $request->payment_method;
        $booking->status = "pending";

        // Set package details
        $booking->sender_customer_address = $request->sender_customer_address;
        $booking->recipient_client = $request->recipient_client;
        $booking->recipient_client_address = $request->recipient_client_address;

        // Save the booking to the database
        $booking->save();

        // Save each package associated with the booking
        // Save each package associated with the booking
        for ($i = 0; $i < count($request->package_description); $i++) { // Update field name
            $package = new Package();
            $package->booking_id = $booking->id;
            $package->package_description = $request->package_description[$i];
            $package->quantity = $request->quantity[$i];
            $package->weight = $request->weight[$i];
            $package->length = $request->length[$i];
            $package->width = $request->width[$i];
            $package->height = $request->height[$i];
            $package->save();
        }


        return redirect()->route('bookings.index')->with('success', 'Booking created successfully.');
    }

    public function index()
    {
        // Check the user's role
        if (auth()->user()->role_id == 2) {
            // If the user's role is 2, filter bookings by user ID
            $bookings = Booking::where('user_id', auth()->id())->latest()->get();
        } else {
            // If the user's role is not 2, display all bookings
            $bookings = Booking::latest()->get();
        }

        // Return the view with the filtered bookings
        return view('bookings', compact('bookings'));
    }


    public function show($id)
    {
        // Fetch the booking details by ID
        $booking = Booking::findOrFail($id);

        // Pass the booking details to the invoice view
        return view('invoice', compact('booking'));
    }

    public function track($trackingId)
    {
        $booking = Booking::where('tracking_id', $trackingId)->first();

        if (!$booking) {
            return redirect()->route('bookings.index')->with('error', 'Tracking ID not found.');
        }

        return view('track', compact('booking'));
    }
}
