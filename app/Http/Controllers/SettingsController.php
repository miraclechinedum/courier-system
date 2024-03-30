<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    /**
     *
     * @return \Illuminate\View\View
     */
    public function addCountryForm()
    {
        return view('add-country');
    }

    public function saveCountry(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'country_name' => 'required|string|max:255',
            'phone_code' => 'required|string|max:255',
            'currency' => 'required|string|max:255',
            'currency_symbol' => 'required|string|max:255',
        ]);

        // Create a new Country instance with the validated data
        $country = new Country();
        $country->country_name = $request->input('country_name');
        $country->phone_code = $request->input('phone_code');
        $country->currency = $request->input('currency');
        $country->currency_symbol = $request->input('currency_symbol');

        // Save the new country to the database
        $country->save();

        // Redirect back with a success message
        return redirect()->back()->withSuccessMessage('Country added successfully!');
    }

    public function index()
    {
        $countries = Country::all(); // Fetch all countries from the database
        return view('countries', ['countries' => $countries]); // Pass countries data to the view
    }

    public function addStateForm()
    {
        $countries = Country::all(); // Fetch all countries from the database
        return view('add-state', compact('countries'));
    }

    // public function storeState(Request $request)
    // {
    //     // Validate the request
    //     $request->validate([
    //         'country' => 'required', // Add any other validation rules as needed
    //         'state_name' => 'required',
    //     ]);

    //     // Create a new state instance
    //     $state = new State();
    //     $state->country_id = $request->country;
    //     $state->state_name = $request->state_name;

    //     // Save the state
    //     $state->save();
    // }

    // Method to handle the form submission for adding a state
    public function addState(Request $request)
    {
        // Validate the request data
        $request->validate([
            'country' => 'required',
            'state_name' => 'required',
        ]);

        // Create a new State instance
        $state = new State();
        $state->country_id = $request->input('country');
        $state->state_name = $request->input('state_name');
        $state->save();

        // Redirect back to the form or to a different page
        return redirect()->back()->with('success', 'State added successfully');
    }

    public function showStates()
    {
        $states = State::all(); // Fetch all states
        return view('states', ['states' => $states]); // Pass states to the view
    }
    public function getStates(Request $request)
    {
        // Fetch states based on the selected country
        $countryId = $request->input('country_id');
        $states = State::where('country_id', $countryId)->get();

        // Return states as JSON response
        return response()->json($states);
    }

    public function showAddCityForm()
    {
        $countries = Country::all();

        // Pass the countries to the view
        return view('add-city', compact('countries'));
    }

    public function saveCity(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'country' => 'required|exists:countries,id',
            'state' => 'required|exists:states,id',
            'city_name' => 'required|unique:cities|max:255',
        ]);

        // If validation fails, return the error messages
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // If validation passes, create a new city
        City::create([
            'country_id' => $request->input('country'),
            'state_id' => $request->input('state'),
            'city_name' => $request->input('city_name'),
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'City added successfully.');
    }

    public function showAllCities()
    {
        $cities = City::all();
        return view('cities', compact('cities'));
    }


    public function getCities(Request $request)
    {
        $stateId = $request->input('state_id');
        $cities = City::where('state_id', $stateId)->get();
        return response()->json($cities);
    }
}
