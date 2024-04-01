<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
            'country_name' => ['required', 'string', 'max:255', Rule::unique('countries')],
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
        return redirect()->route('countries.index')->withSuccessMessage('Country added successfully!');
    }

    public function editCountry($id)
    {
        // Find the country by ID
        $country = Country::findOrFail($id);

        // Return the edit view with the country data
        return view('edit-country', compact('country'));
    }

    public function updateCountry(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'country_name' => ['required', 'string', 'max:255', Rule::unique('countries')->ignore($id)],
            'phone_code' => 'required|string|max:255',
            'currency' => 'required|string|max:255',
            'currency_symbol' => 'required|string|max:255',
        ]);

        // Find the country by ID
        $country = Country::findOrFail($id);

        // Update the country with the validated data
        $country->update([
            'country_name' => $request->input('country_name'),
            'phone_code' => $request->input('phone_code'),
            'currency' => $request->input('currency'),
            'currency_symbol' => $request->input('currency_symbol'),
        ]);

        // Redirect back with a success message
        return redirect()->route('countries.index')->withSuccessMessage('Country updated successfully!');
    }


    public function deleteCountry($id)
    {
        // Find the country by ID and delete it
        $country = Country::findOrFail($id);
        $country->delete();

        // Redirect back with a success message
        return redirect()->back()->withSuccessMessage('Country deleted successfully!');
    }

    public function index()
    {
        $countries = Country::latest()->get();
        return view('countries', ['countries' => $countries]);
    }

    public function addStateForm()
    {
        $countries = Country::all(); // Fetch all countries from the database
        return view('add-state', compact('countries'));
    }

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
        return redirect()->back()->withSuccessMessage('State added successfully!');
    }

    public function edit($id)
    {
        $state = State::findOrFail($id);
        $countries = Country::all(); // Fetch countries for dropdown
        return view('edit-state', compact('state', 'countries'));
    }

    public function updatestate(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'state_name' => 'required|string|max:255',
        ]);

        // Find the state by ID
        $state = State::findOrFail($id);

        // Update the state name
        $state->state_name = $request->input('state_name');

        // Save the updated state to the database
        $state->save();

        // Redirect back to the previous page or to a different page
        return redirect()->back()->with('success', 'State updated successfully');
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
        return redirect()->back()->withSuccessMessage('City added successfully!');
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
