@extends('layouts.app')

@section('content')
<!-- start page content-->
<div class="page-content">
    <!--start breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Profile</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0 align-items-center">
                    <li class="breadcrumb-item">
                        <a href="javascript:;">
                            <i class="lni lni-user"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        edit details
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="row">
        <div class="col-12 col-lg-8 col-xl-9 mx-auto">
            <div class="card overflow-hidden radius-10">
                <div class="profile-cover bg-dark position-relative mb-4">
                    <div class="user-profile-avatar shadow position-absolute top-50 start-0 translate-middle-x">
                        <img src="{{ asset('build/assets/images/user/avatar.png') }}" alt="user avatar">
                    </div>
                </div>
                <div class="card-body">
                    <div class="mt-5 d-flex align-items-start justify-content-between">
                        <!-- <div class="">
                            <h3 class="mb-2">{{ auth()->user()->name }}</h3>
                            <p class="mb-1">{{ auth()->user()->email }}</p>
                            <p>{{ auth()->user()->phone_number }}</p>
                        </div> -->
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">

                    <div class="bs-stepper-content">
                        <form id="profileForm" action="{{ route('updateProfile') }}" method="POST">
                            @csrf
                            <div id="test-l-1" role="tabpanel" class="bs-stepper-pane active dstepper-block" aria-labelledby="stepper1trigger1">
                                <div class="row g-3">
                                    <div class="col-12 col-lg-6">
                                        <label for="FirstName" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="FirstName" name="name" value="{{ $user->name }}">
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label for="Email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="Email" name="email" value="{{ $user->email }}">
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label for="PhoneNumber" class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" id="PhoneNumber" name="phone_number" value="{{ $user->phone_number }}">
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        &nbsp;
                                    </div>

                                    <div class="col-12 col-lg-6">
                                        <label for="InputCountry" class="form-label">Country</label>
                                        <select class="form-select" id="InputCountry" aria-label="Country select" name="country_id">
                                            <option selected disabled>Choose a country</option>
                                            @foreach($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label for="InputState" class="form-label">State</label>
                                        <select class="form-select" id="InputState" aria-label="State select" name="state_id">
                                            <option selected disabled>Choose a state</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label for="InputCity" class="form-label">City</label>
                                        <select class="form-select" id="InputCity" aria-label="City select" name="city_id">
                                            <option selected disabled>Choose a city</option>
                                        </select>
                                    </div>

                                    <div class="col-12 col-lg-6">
                                        &nbsp;
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label for="ZipCode" class="form-label">Zip Code</label>
                                        <input type="text" class="form-control" id="ZipCode" name="zip_code" value="{{ $userAddress->zip_code }}">
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label for="Address" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="Address" name="address" value="{{ $userAddress->address }}">
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <button type="submit" class="btn btn-primary px-4">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>

        </div>
    </div>

</div>
<!-- end page content-->

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get references to the dropdowns
        var countrySelect = document.getElementById("InputCountry");
        var stateSelect = document.getElementById("InputState");
        var citySelect = document.getElementById("InputCity");

        // Store the states and cities data
        var statesData = @json($states);
        var citiesData = @json($cities);

        // Function to populate states dropdown based on selected country
        countrySelect.addEventListener("change", function() {
            // Clear previous options
            stateSelect.innerHTML = "<option selected disabled>Choose a state</option>";
            citySelect.innerHTML = "<option selected disabled>Choose a city</option>";

            // Filter states based on selected country
            var selectedCountryId = this.value;
            var filteredStates = statesData.filter(function(state) {
                return state.country_id == selectedCountryId;
            });

            // Populate states dropdown
            filteredStates.forEach(function(state) {
                var option = document.createElement("option");
                option.text = state.state_name;
                option.value = state.id;
                stateSelect.add(option);
            });
        });

        // Function to populate cities dropdown based on selected state
        stateSelect.addEventListener("change", function() {
            // Clear previous options
            citySelect.innerHTML = "<option selected disabled>Choose a city</option>";

            // Filter cities based on selected state
            var selectedStateId = this.value;
            var filteredCities = citiesData.filter(function(city) {
                return city.state_id == selectedStateId;
            });

            // Populate cities dropdown
            filteredCities.forEach(function(city) {
                var option = document.createElement("option");
                option.text = city.city_name;
                option.value = city.id;
                citySelect.add(option);
            });
        });
    });
</script>



@endsection