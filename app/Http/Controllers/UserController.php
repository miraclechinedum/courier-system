<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\UserAddress;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    /**
     * Store the user address details.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeUserAddress(Request $request)
    {
        // dd("first modal", $request->all());
        // Validate the request data if needed
        $validatedData = $request->validate([
            'sender_name' => 'required|string|max:255',
            'sender_email' => 'required|email|unique:users,email',
            'sender_phone_number' => 'required|string|max:20|unique:users,phone_number',
            'country_modal_user_address' => 'required',
            'state_modal_user_address' => 'required',
            'city_modal_user_address' => 'required',
            'postal_modal_sender_address' => 'required',
            'address_modal_sender_address' => 'required',
        ]);

        // Create a new user
        $user = new User();
        $user->name = $validatedData['sender_name'];
        $user->email = $validatedData['sender_email'];
        $user->phone_number = $validatedData['sender_phone_number'];
        $user->role_id = 2; // sender
        $user->password = Hash::make('123456789');
        $user->save();

        // Create a new user address record
        $userAddress = new UserAddress();
        $userAddress->user_id = $user->id;
        $userAddress->added_by = auth()->user()->id;
        $userAddress->country_id = $request->input('country_modal_user_address');
        $userAddress->state_id = $request->input('state_modal_user_address');
        $userAddress->city_id = $request->input('city_modal_user_address');
        $userAddress->zip_code = $request->input('postal_modal_sender_address');
        $userAddress->address = $request->input('address_modal_sender_address');
        $userAddress->save();

        // Optionally, you can return a response or redirect the user
        return redirect()->back()->with('success', 'Sender added successfully!');
    }

    public function showAddRecipientForm()
    {
        $countries = Country::all();

        return view('add-recipient', compact('countries'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'recipient_name' => 'required|string|max:255',
            'recipient_email' => 'required|email|unique:users,email',
            'recipient_phone_number' => 'required|string|max:20|unique:users,phone_number',
            'country_modal_recipient_address' => 'required|exists:countries,id',
            'state_modal_recipient_address' => 'required|exists:states,id',
            'city_modal_recipient_address' => 'required|exists:cities,id',
            'postal_modal_recipient_address' => 'required|string|max:255',
            'address_modal_recipient_address' => 'required|string|max:255',
        ]);

        // Create a new user
        $user = new User();
        $user->name = $validatedData['recipient_name'];
        $user->email = $validatedData['recipient_email'];
        $user->phone_number = $validatedData['recipient_phone_number'];
        $user->role_id = 3; // recipient
        $user->password = Hash::make('123456789');
        $user->save();

        // Create a new user address
        $userAddress = new UserAddress();
        $userAddress->user_id = $user->id;
        $userAddress->added_by = auth()->user()->id;
        $userAddress->country_id = $validatedData['country_modal_recipient_address'];
        $userAddress->state_id = $validatedData['state_modal_recipient_address'];
        $userAddress->city_id = $validatedData['city_modal_recipient_address'];
        $userAddress->zip_code = $validatedData['postal_modal_recipient_address'];
        $userAddress->address = $validatedData['address_modal_recipient_address'];
        $userAddress->save();

        // Redirect back if no errors
        return redirect()->route('bookings.create')->withSuccessMessage('Receiver added successfully!');
    }


    public function showRecipients()
    {
        // Get the currently authenticated user's ID
        $userId = Auth::id();

        // Fetch recipients where added_by matches the current user's ID, along with their associated users
        $recipients = UserAddress::where('added_by', $userId)->with('user')->get();

        // Pass recipients data to the view
        return view('recipients', compact('recipients'));
    }

    public function editRecipient($id)
    {
        // Find the recipient's address by ID
        $userAddress = UserAddress::findOrFail($id);

        // Fetch countries, states, and cities data
        $countries = Country::all();
        $states = State::where('country_id', $userAddress->country_id)->get();
        $cities = City::where('state_id', $userAddress->state_id)->get();

        // Pass the recipient's address data and other necessary data to the edit recipient view
        return view('edit-recipient', compact('userAddress', 'countries', 'states', 'cities'));
    }

    public function updateRecipient(Request $request, $id)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'recipient_name' => 'required|string|max:255',
            'recipient_email' => 'required|email|unique:users,email,' . $id,
            'recipient_phone_number' => 'required|string|max:20|unique:users,phone_number,' . $id,
            'country_modal_recipient_address' => 'required|exists:countries,id',
            'state_modal_recipient_address' => 'required|exists:states,id',
            'city_modal_recipient_address' => 'required|exists:cities,id',
            'postal_modal_recipient_address' => 'required|string|max:255',
            'address_modal_recipient_address' => 'required|string|max:255',
        ]);

        // Update the user
        $user = User::findOrFail($id); // Find the user by ID
        $user->name = $validatedData['recipient_name'];
        $user->email = $validatedData['recipient_email'];
        $user->phone_number = $validatedData['recipient_phone_number'];
        $user->save();

        // Update the user address
        $userAddress = UserAddress::where('user_id', $id)->firstOrFail(); // Find the user address by user ID
        $userAddress->country_id = $validatedData['country_modal_recipient_address'];
        $userAddress->state_id = $validatedData['state_modal_recipient_address'];
        $userAddress->city_id = $validatedData['city_modal_recipient_address'];
        $userAddress->zip_code = $validatedData['postal_modal_recipient_address'];
        $userAddress->address = $validatedData['address_modal_recipient_address'];
        $userAddress->save();

        // Redirect back if no errors
        return redirect()->route('recipients')->withSuccessMessage('Recipient updated successfully!');
    }
}
