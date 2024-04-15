<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\UserAddress;
use App\Models\Booking;
use App\Models\Package;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;


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

        // Fetch all senders (users with role_id 2) along with their user addresses
        $senders = User::where('role_id', 2)
            ->with('userAddresses')
            ->get();

        // Pass the variables to the view
        return view('submit-booking', compact('countries', 'userAddresses', 'recipients', 'senders'));
    }


    public function store(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'service_mode' => 'required',
            'courier_company' => 'required',
            'packaging_type' => 'required',
            'payment_method' => 'required',
            'amount' => 'required',
            'description' => 'required',
            'sender_customer_address' => 'required',
            'package_description' => 'required|array',
            'quantity' => 'required|array',
            'weight' => 'required|array',
            'length' => 'required|array',
            'width' => 'required|array',
            'height' => 'required|array',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Concatenate prefix and tracking number
        $bookingCode = $request->prefix . '-' . $request->tracking;
        // Parse and format the service_mode date
        $serviceModeDate = Carbon::createFromFormat('m/d/Y', $request->service_mode)->format('Y-m-d');

        // Create a new Booking instance
        $booking = new Booking();

        // Set the attributes
        $booking->user_id = auth()->id();
        $booking->tracking_id = $bookingCode;
        $booking->service_mode = $serviceModeDate;
        $booking->courier_company = $request->courier_company;
        $booking->packaging_type = $request->packaging_type;
        $booking->payment_method = $request->payment_method;
        $booking->amount = $request->amount;
        $booking->status = "Pending";
        $booking->description = $request->description;

        // Set package details
        $booking->sender_customer_address = $request->sender_customer_address;
        $booking->recipient_client = $request->recipient_client;
        $booking->recipient_client_address = $request->recipient_client_address;

        // Save the booking to the database
        $booking->save();

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


        return redirect()->route('bookings.index')->withSuccessMessage('Booking created successfully.');
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

    public function edit($id)
    {
        // Fetch the booking with the given ID from the database
        $booking = Booking::findOrFail($id);

        // Fetch the associated packages for the booking
        $packages = $booking->packages;

        // Fetch user addresses for the logged-in user
        $userAddresses = auth()->user()->userAddresses;

        // Fetch recipients (users with role_id 3) along with their user addresses
        $recipients = User::where('role_id', 3)
            ->with('userAddresses')
            ->get();

        // Pass the booking, packages, and user addresses data to the view
        return view('edit-booking', compact('booking', 'packages', 'recipients', 'userAddresses'));
    }

    public function update(Request $request, $id)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'service_mode' => 'required',
            'courier_company' => 'required',
            'packaging_type' => 'required',
            'payment_method' => 'required',
            'amount' => 'required',
            'status' => 'required',
            'sender_customer_address' => 'required',
            'recipient_client' => 'required',
            'recipient_client_address' => 'required',
            'package_description' => 'required|array',
            'quantity' => 'required|array',
            'weight' => 'required|array',
            'length' => 'required|array',
            'width' => 'required|array',
            'height' => 'required|array',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Find the booking by ID
        $booking = Booking::findOrFail($id);

        // Concatenate prefix and tracking number
        $bookingCode = $request->prefix_hidden . '-' . $request->tracking_hidden;

        // Update booking attributes
        $booking->service_mode = $request->service_mode;
        $booking->courier_company = $request->courier_company;
        $booking->packaging_type = $request->packaging_type;
        $booking->payment_method = $request->payment_method;
        $booking->amount = $request->amount;
        $booking->status = $request->status;

        // Set package details
        $booking->sender_customer_address = $request->sender_customer_address;
        $booking->recipient_client = $request->recipient_client;
        $booking->recipient_client_address = $request->recipient_client_address;

        // Save the updated booking to the database
        $booking->save();

        // Delete existing packages associated with the booking
        $booking->packages()->delete();

        // Save each updated package associated with the booking
        for ($i = 0; $i < count($request->package_description); $i++) {
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

        return redirect()->route('bookings.index')->withSuccessMessage('Booking updated successfully.');
    }

    public function generatePDF(Request $request)
    {
        try {
            $html = $request->input('htmlContent');
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();

            // Check if the directory exists, if not, create it
            $tempDir = storage_path('app/temp');
            if (!file_exists($tempDir)) {
                mkdir($tempDir, 0755, true);
            }

            $pdfPath = $tempDir . '/receipt.pdf';

            // Save the PDF to a file
            file_put_contents($pdfPath, $dompdf->output());

            // Check if the file was successfully saved
            if (file_exists($pdfPath)) {
                return $pdfPath; // Return the path to the generated PDF
            } else {
                Log::error('Failed to save PDF file');
                return null;
            }
        } catch (\Exception $e) {
            // Log the error for debugging purposes
            Log::error('PDF generation error: ' . $e->getMessage());
            return null; // Return null or handle the error accordingly
        }
    }

    public function sendEmailWithAttachment(Request $request)
    {
        try {
            $pdfPath = $this->generatePDF($request);

            if ($pdfPath) {
                Mail::send([], [], function ($message) use ($pdfPath) {
                    $message->to('miraclechinedum16@gmail.com')
                        ->subject('Receipt')
                        ->attach($pdfPath, ['as' => 'receipt.pdf']);
                });

                return 'Email sent successfully.';
            } else {
                // Handle the case when PDF generation fails
                return response()->json(['error' => 'PDF generation failed.'], 500);
            }
        } catch (\Exception $e) {
            // Log the error for debugging purposes
            Log::error('Email sending error: ' . $e->getMessage());
            return response()->json(['error' => 'Email sending failed.'], 500);
        }
    }
}
