<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Support\Facades\Hash;

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
            'country_modal_user_address' => 'required',
            'state_modal_user_address' => 'required',
            'city_modal_user_address' => 'required',
            'postal_modal_sender_address' => 'required',
            'address_modal_sender_address' => 'required',
        ]);

        // Create a new user address record
        $userAddress = new UserAddress();
        $userAddress->user_id = auth()->user()->id;
        $userAddress->country_id = $request->input('country_modal_user_address');
        $userAddress->state_id = $request->input('state_modal_user_address');
        $userAddress->city_id = $request->input('city_modal_user_address');
        $userAddress->zip_code = $request->input('postal_modal_sender_address');
        $userAddress->address = $request->input('address_modal_sender_address');
        $userAddress->save();

        // Optionally, you can return a response or redirect the user
        return redirect()->back()->with('success', 'User address added successfully!');
    }

    public function store(Request $request)
    {
        // dd("second modal", $request->all());
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|string|max:20',
            'country_modal_user_address' => 'required|exists:countries,id',
            'state_modal_user_address' => 'required|exists:states,id',
            'city_modal_user_address' => 'required|exists:cities,id',
            'postal_modal_user_address' => 'required|string|max:255',
            'address_modal_user_address' => 'required|string|max:255',
        ]);

        // Create a new user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->role_id = 3; // receiptant
        $user->password = Hash::make('123456789');
        $user->save();
        // dd($user);

        // Create a new user address
        $userAddress = new UserAddress();
        $userAddress->user_id = $user->id;
        $userAddress->country_id = $request->country_modal_user_address;
        $userAddress->state_id = $request->state_modal_user_address;
        $userAddress->city_id = $request->city_modal_user_address;
        $userAddress->zip_code = $request->postal_modal_user_address;
        $userAddress->address = $request->address_modal_user_address;
        $userAddress->save();
        // dd($userAddress);

        // Redirect the user after successful insertion
        return redirect()->route('add-state')->with('success', 'User and Address added successfully!');
    }
}
