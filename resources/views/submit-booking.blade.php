@extends('layouts.app')

@section('content')

<!-- start page content-->
<div class="page-content">
    <!--start breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Bookings</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0 align-items-center">
                    <li class="breadcrumb-item">
                        <a href="javascript:;">
                            <ion-icon name="bookmarks-outline"></ion-icon>
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        submit booking
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="container">
        <div class="row justify-content-center">
            <div id="msgholder2">
                <x-validation-errors class="mb-4" />
            </div>

            <form method="post" action="{{ route('bookings.store') }}">
                @csrf
                <div class="row justify-content-between col-12 p-0">
                    <div class="col-md-6 pe-2">
                        <div class="card mt-4" style="padding: 20px;">

                            @php
                            function generateTrackingNumber() {
                            // Generate a random 10-digit number
                            return mt_rand(1000000000, 9999999999);
                            }
                            @endphp

                            <div class="d-flex justify-content-between" style="padding-bottom: 20px;">
                                <div class="col-md-6">
                                    <h5>Shipping Prefix</h5>
                                    <input class="form-control" name="prefix" type="text" value="SLS" disabled />
                                    <!-- Add a hidden input field for prefix -->
                                    <input type="hidden" name="prefix" value="SLS">
                                </div>
                                <div>
                                    <h5>Number (tracking)</h5>
                                    <!-- Assuming generateTrackingNumber() generates the tracking number -->
                                    <input class="form-control" type="text" name="tracking" value="{{ generateTrackingNumber() }}" disabled />
                                    <!-- Add a hidden input field for tracking -->
                                    <input type="hidden" name="tracking" value="{{ generateTrackingNumber() }}">
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-6 ps-2">
                        <div class="card mt-4" style="padding: 20px;">
                            <div class="d-flex justify-content-between" style="padding-bottom: 20px;">
                                <div class="col-md-6">
                                    <h5>List of Agencies</h5>
                                    <input class="form-control" name="list_of_agencies" type="text" disabled />
                                </div>

                                <div>
                                    <h5>Office of origin</h5>
                                    <input class="form-control" name="office_of_origin" type="text" disabled />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sender & Recipient -->
                <div class="row justify-content-between col-12 p-0">
                    <div class="col-md-6 pe-2">
                        <div class="card mt-4">
                            <div class="card-head-con p-2">
                                <h4>Sender Information</h4>
                            </div>
                            <div class="p-4">
                                <div class="mb-3">
                                    <h5>Sender/Customer</h5>
                                    <select class="form-select" aria-label="Disabled select example" name="sender" disabled>
                                        <option selected>{{ old('sender', auth()->user()->name) }}</option>
                                    </select>
                                    <!-- Add a hidden input field to send user_id to the store method -->
                                    <input type="hidden" name="user_id" value="{{ old('user_id', auth()->id()) }}">
                                </div>

                                @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif

                                <div class="d-flex justify-content-between align-items-center">
                                    <div style="width: 77%;">
                                        <div class="form-group">
                                            <label>Sender/Customer Address</label>
                                            <select style="width: 100% !important; z-index: 9999;" id="single-select-field" data-placeholder="Search Sender Address" class="select2 form-control select2-hidden-accessible" name="sender_customer_address">
                                                <option value="" selected></option>
                                                @foreach($userAddresses as $address)
                                                <option value="{{ $address->id }}" {{ old('sender_customer_address') == $address->id ? 'selected' : '' }}> {{ $address->address }} - {{ $address->city->city_name }},
                                                    {{ $address->state->state_name }},
                                                    {{ $address->country->country_name }}
                                                    ({{ $address->zip_code }})
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- First Modal -->
                                    <button type="button" class="btn btn-primary rounded-percent p-2 mt-4" data-bs-toggle="modal" data-bs-target="#exampleLargeModal">
                                        <i class="fadeIn animated bx bx-plus text-white"></i>
                                    </button>


                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6 pe-2">
                        <div class="card mt-4">
                            <div class="card-head-con p-2">
                                <h4> Recipient Information</h4>
                            </div>
                            <div class="p-4">
                                <div class="mb-3">
                                    <h5>Recipient/Client</h5>
                                    <select class="form-select" aria-label="Recipient select" id="recipient" name="recipient_client">
                                        <option value="" selected disabled>Select Recipient</option>
                                        @foreach($recipients as $recipient)
                                        @if($recipient->userAddresses)
                                        @foreach($recipient->userAddresses as $address)
                                        <option value="{{ $address->id }}" data-address="{{ $address->address }} - {{ $address->city->city_name }}, {{ $address->state->state_name }}, {{ $address->country->country_name }} ({{ $address->zip_code }})" {{ old('recipient_client') == $address->id ? 'selected' : '' }}>
                                            {{ $recipient->name }}
                                        </option>
                                        @endforeach
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                @if(session('recipientsuccess'))
                                <div class="alert alert-success">
                                    {{ session('recipientsuccess') }}
                                </div>
                                @endif

                                <div class="d-flex justify-content-between align-items-center">
                                    <div style="width: 77%;">
                                        <div class="form-group">
                                            <label>Recipient/Client Address</label>
                                            <select style="width: 100% !important; z-index: 9999;" id="recipientAddress" data-placeholder="Search Sender Address" class="select2 form-control select2-hidden-accessible" name="recipient_client_address">
                                                <option value="" selected disabled></option>
                                                <!-- Recipient address options will be dynamically populated here -->
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Second modal -->
                                    <a href="{{ route('add-recipient-form') }}" class="btn btn-primary rounded-percent p-2 mt-4">
                                        <i class="fadeIn animated bx bx-plus text-white"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            var recipientSelect = document.getElementById('recipient');
                            var recipientAddressSelect = document.getElementById('recipientAddress');

                            // Listen for changes in the recipient select input
                            recipientSelect.addEventListener('change', function() {
                                var selectedRecipient = recipientSelect.options[recipientSelect.selectedIndex];
                                var recipientAddress = selectedRecipient.getAttribute('data-address');

                                // Clear existing options and add the selected recipient's address as an option
                                recipientAddressSelect.innerHTML = '';
                                if (recipientAddress) {
                                    var option = new Option(recipientAddress, recipientSelect.value);
                                    recipientAddressSelect.appendChild(option);
                                }
                            });
                        });
                    </script>

                </div>

                <!-- Shipping Information -->
                <div class="row">
                    <div class="pe-2">
                        <div class="card mt-4">
                            <div class="card-head-con p-2">
                                <h4>Shipping Information</h4>
                            </div>
                            <div class="p-4">
                                <div class="resultados_ajax_mail text-center"></div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Service Mode</label>
                                            <select style="width: 100% !important;" class="select2 form-control" name="service_mode">
                                                <option value="" selected disabled>Select Option</option>
                                                <option value="same day">Same Day</option>
                                                <option value="2 days">2 Days</option>
                                                <option value="3 days">3 Days</option>
                                                <option value="4 days">4 Days</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Courier Company</label>
                                            <select style="width: 100% !important;" class="select2 form-control" name="courier_company">
                                                <option value="" selected disabled>Select Option</option>
                                                <option value="GIG">GIG</option>
                                                <option value="DHL">DHL</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Type of packaging</label>
                                            <select style="width: 100% !important;" class="select2 form-control" name="packaging_type">
                                                <option value="" selected disabled>Select Option</option>
                                                <option value="small">Small</option>
                                                <option value="medium">Medium</option>
                                                <option value="large">Large</option>
                                                <option value="extra_large">Extra Large</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-4">
                                        <div class="form-group">
                                            <label>Payment Method</label>
                                            <select style="width: 100% !important;" class="select2 form-control" name="payment_method">
                                                <option value="" selected disabled>Select Option</option>
                                                <option value="cash">Cash Payment</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Package Information -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-10">
                                        <h4 class="card-title">
                                            <i class="fas fas fa-boxes" style="color:#36bea6"></i>
                                            Package Information
                                        </h4>
                                    </div>
                                    <div class="col-md-2">
                                        <div>
                                            <button type="button" name="add_rows" id="add_rows" class="btn btn-success mb-2"><span class="fa fa-plus"></span> Add Package</button>
                                        </div>
                                    </div>
                                </div>

                                <div id="data_items">
                                    <div class="card-hover" id="row_id_0">
                                        <hr>
                                        <div class="row justify-between justify-content-between">
                                            <div class="col-sm-12 col-md-6 col-lg-3">
                                                <div class="form-group">
                                                    <label for="package_description_0" class="mb-1">Package Description</label>
                                                    <div class="input-group">
                                                        <input type="text" name="package_description[]" id="package_description_0" class="form-control input-sm" data-toggle="tooltip" data-placement="bottom" placeholder="Package Description" value="{{ old('package_description.0') }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-1">
                                                <div class="form-group">
                                                    <label for="quantity_0" class="mb-1">Quantity</label>
                                                    <div class="input-group">
                                                        <input type="number" name="quantity[]" id="quantity_0" class="form-control input-sm" data-toggle="tooltip" data-placement="bottom" title="Quantity" value="{{ old('quantity.0') }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-1">
                                                <div class="form-group">
                                                    <label for="weight_0" class="mb-1">Weight</label>
                                                    <div class="input-group">
                                                        <input type="number" name="weight[]" id="weight_0" class="form-control input-sm" data-toggle="tooltip" data-placement="bottom" title="Weight" value="{{ old('weight.0') }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-1">
                                                <div class="form-group">
                                                    <label for="length_0" class="mb-1">Length</label>
                                                    <div class="input-group">
                                                        <input type="number" name="length[]" id="length_0" class="form-control input-sm text_only" data-toggle="tooltip" data-placement="bottom" title="Length" value="{{ old('length.0') }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-1">
                                                <div class="form-group">
                                                    <label for="width_0" class="mb-1">Width</label>
                                                    <div class="input-group">
                                                        <input type="number" name="width[]" id="width_0" class="form-control input-sm text_only" data-toggle="tooltip" data-placement="bottom" title="Width" value="{{ old('width.0') }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-1">
                                                <div class="form-group">
                                                    <label for="height_0" class="mb-1">Height</label>
                                                    <div class="input-group">
                                                        <input type="number" name="height[]" id="height_0" class="form-control input-sm number_only" data-toggle="tooltip" data-placement="bottom" title="Height" value="{{ old('height.0') }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-1">
                                                <!-- Delete icon will be dynamically added -->
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="text-right mb-4">
                    <button type="submit" id="calculate_invoice" class="btn btn-primary">
                        <i class="fas fa-calculator"></i>
                        <span class="ml-1">Submit</span>
                    </button>
                </div>
            </form>

            <!-- Modal -->
            <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add sender address</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" method="post" action="{{ route('user.address.store') }}" id="add_sender_address_form" name="add_sender_address_form">
                                @csrf
                                <div class="resultados_ajax_mail text-center"></div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <select style="width: 100% !important; z-index: 9999;" class="select2 form-control select2-hidden-accessible" name="country_modal_user_address" id="country_modal_user_address">
                                                <option value="" selected disabled>Select Country</option>
                                                @foreach($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="">State</label>
                                            <select style="width: 100% !important;" class="select2 form-control select2-hidden-accessible" id="state_modal_user_address" name="state_modal_user_address" disabled>
                                                <option value="" selected disabled>Select State</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="">City</label>
                                            <select style="width: 100% !important;" class="select2 form-control select2-hidden-accessible" id="city_modal_user_address" name="city_modal_user_address" disabled>
                                                <option value="" selected disabled>Select City</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-2">
                                        <div class="form-group">
                                            <label for="postal_modal_sender_address">Zip Code</label>
                                            <input type="text" class="form-control" name="postal_modal_sender_address" id="postal_modal_sender_address" placeholder="Zip Code">
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-2">
                                        <div class="form-group">
                                            <label for="address_modal_sender_address">Address</label>
                                            <input type="text" class="form-control" name="address_modal_sender_address" id="address_modal_sender_address" placeholder="Address">
                                        </div>
                                    </div>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Recipient Modal -->
            <!-- <div class="modal fade" id="recipientLargeModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <form class="form-horizontal" method="post" action="{{ route('store-recipient') }}" id="add_recipient_address_form" name="add_recipient_address_form">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add Recipient</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="resultados_ajax_mail text-center"></div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="recipient_name">Name</label>
                                            <input type="text" class="form-control" name="recipient_name" id="recipient_name" placeholder="Name">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="recipient_email">Email</label>
                                            <input type="text" class="form-control" name="recipient_email" id="recipient_email" placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="recipient_phone_number">Phone Number</label>
                                            <input type="text" class="form-control" name="recipient_phone_number" id="recipient_phone_number" placeholder="Phone Number">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <select style="width: 100% !important; z-index: 9999;" class="select2 form-control select2-hidden-accessible" name="country_modal_recipient_address" id="country_modal_recipient_address">
                                                <option value="" selected disabled>Select Country</option>
                                                @foreach($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="">State</label>
                                            <select style="width: 100% !important;" class="select2 form-control select2-hidden-accessible" id="state_modal_recipient_address" name="state_modal_recipient_address" disabled>
                                                <option value="" selected disabled>Select State</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="">City</label>
                                            <select style="width: 100% !important;" class="select2 form-control select2-hidden-accessible" id="city_modal_recipient_address" name="city_modal_recipient_address" disabled>
                                                <option value="" selected disabled>Select City</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-2">
                                        <div class="form-group">
                                            <label for="postal_modal_recipient_address">Zip Code</label>
                                            <input type="text" class="form-control" name="postal_modal_recipient_address" id="postal_modal_recipient_address" placeholder="Zip Code">
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-2">
                                        <div class="form-group">
                                            <label for="address_modal_recipient_address">Address</label>
                                            <input type="text" class="form-control" name="address_modal_recipient_address" id="address_modal_recipient_address" placeholder="Address">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> -->

        </div>
    </div>

</div>

<script>
    $(document).ready(function() {
        // Initialize Select2 for each select element
        $('.select2').select2();
    });
</script>





<script>
    $(document).ready(function() {
        // Fetch states based on selected country
        $('#country_modal_user_address').change(function() {
            var countryId = $(this).val();
            if (countryId) {
                $.ajax({
                    url: '{{ route("getStates") }}',
                    type: 'GET',
                    data: {
                        country_id: countryId
                    },
                    success: function(response) {
                        $('#state_modal_user_address').empty().removeAttr('disabled');
                        $('#state_modal_user_address').append('<option value="" selected disabled>Select State</option>');
                        $.each(response, function(index, state) {
                            $('#state_modal_user_address').append('<option value="' + state.id + '">' + state.state_name + '</option>');
                        });
                    }
                });
            } else {
                $('#state_modal_user_address').empty().attr('disabled', true);
                $('#city_modal_user_address').empty().attr('disabled', true);
            }
        });

        // Fetch cities based on selected state
        $('#state_modal_user_address').change(function() {
            var stateId = $(this).val();
            if (stateId) {
                $.ajax({
                    url: '{{ route("getCities") }}',
                    type: 'GET',
                    data: {
                        state_id: stateId
                    },
                    success: function(response) {
                        $('#city_modal_user_address').empty().removeAttr('disabled');
                        $('#city_modal_user_address').append('<option value="" selected disabled>Select City</option>');
                        $.each(response, function(index, city) {
                            $('#city_modal_user_address').append('<option value="' + city.id + '">' + city.city_name + '</option>');
                        });
                    }
                });
            } else {
                $('#city_modal_user_address').empty().attr('disabled', true);
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Fetch states based on selected country
        $('#country_modal_recipient_address').change(function() {
            var countryId = $(this).val();
            if (countryId) {
                $.ajax({
                    url: '{{ route("getStates") }}',
                    type: 'GET',
                    data: {
                        country_id: countryId
                    },
                    success: function(response) {
                        $('#state_modal_recipient_address').empty().removeAttr('disabled');
                        $('#state_modal_recipient_address').append('<option value="" selected disabled>Select State</option>');
                        $.each(response, function(index, state) {
                            $('#state_modal_recipient_address').append('<option value="' + state.id + '">' + state.state_name + '</option>');
                        });
                    }
                });
            } else {
                $('#state_modal_recipient_address').empty().attr('disabled', true);
                $('#city_modal_recipient_address').empty().attr('disabled', true);
            }
        });

        // Fetch cities based on selected state
        $('#state_modal_recipient_address').change(function() {
            var stateId = $(this).val();
            if (stateId) {
                $.ajax({
                    url: '{{ route("getCities") }}',
                    type: 'GET',
                    data: {
                        state_id: stateId
                    },
                    success: function(response) {
                        $('#city_modal_recipient_address').empty().removeAttr('disabled');
                        $('#city_modal_recipient_address').append('<option value="" selected disabled>Select City</option>');
                        $.each(response, function(index, city) {
                            $('#city_modal_recipient_address').append('<option value="' + city.id + '">' + city.city_name + '</option>');
                        });
                    }
                });
            } else {
                $('#city_modal_recipient_address').empty().attr('disabled', true);
            }
        });
    });
</script>

<!-- Add jQuery library if not already included -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Counter for row IDs
        var rowCount = 1;

        // Add Package button click event
        $('#add_rows').click(function() {
            // Create a new row
            var newRow = $('<div class="card-hover"><hr><div class="row justify-between justify-content-between">' +
                '<div class="col-sm-12 col-md-6 col-lg-3"><div class="form-group">' +
                '<label for="package_description_' + rowCount + '" class="mb-1">Package Description</label>' +
                '<input type="text" name="package_description[]" id="package_description_' + rowCount + '" class="form-control input-sm package-description" data-toggle="tooltip" data-placement="bottom" placeholder="Package Description" required></div></div></div>' +
                '<div class="col-sm-12 col-md-6 col-lg-1"><div class="form-group"><label for="quantity_' + rowCount + '" class="mb-1">Quantity</label>' +
                '<input type="number" name="quantity[]" id="quantity_' + rowCount + '" class="form-control input-sm quantity" data-toggle="tooltip" data-placement="bottom" title="Quantity" required></div></div></div>' +
                '<div class="col-sm-12 col-md-6 col-lg-1"><div class="form-group"><label for="weight_' + rowCount + '" class="mb-1">Weight</label>' +
                '<input type="number" name="weight[]" id="weight_' + rowCount + '" class="form-control input-sm weight" data-toggle="tooltip" data-placement="bottom" title="Weight" required></div></div></div>' +
                '<div class="col-sm-12 col-md-6 col-lg-1"><div class="form-group"><label for="length_' + rowCount + '" class="mb-1">Length</label>' +
                '<input type="number" name="length[]" id="length_' + rowCount + '" class="form-control input-sm text_only length" data-toggle="tooltip" data-placement="bottom" title="Length" required></div></div></div>' +
                '<div class="col-sm-12 col-md-6 col-lg-1"><div class="form-group"><label for="width_' + rowCount + '" class="mb-1">Width</label>' +
                '<input type="number" name="width[]" id="width_' + rowCount + '" class="form-control input-sm text_only width" data-toggle="tooltip" data-placement="bottom" title="Width" required></div></div></div>' +
                '<div class="col-sm-12 col-md-6 col-lg-1"><div class="form-group"><label for="height_' + rowCount + '" class="mb-1">Height</label>' +
                '<input type="number" name="height[]" id="height_' + rowCount + '" class="form-control input-sm number_only height" data-toggle="tooltip" data-placement="bottom" title="Height" required></div></div></div>' +
                '<div class="col-sm-12 col-md-6 col-lg-1"><button class="btn btn-danger delete-row"><i class="fas fa-trash"></i></button></div></div><hr></div>');

            // Append the new row to the data_items container
            $('#data_items').append(newRow);

            // Increment row count
            rowCount++;
        });

        // Delete row button click event
        $(document).on('click', '.delete-row', function() {
            // Remove the row
            $(this).closest('.card-hover').remove();
        });

        // Validation for dynamically added rows
        $(document).on('blur', '.package-description, .quantity, .weight, .length, .width, .height', function() {
            var isValid = true;
            $(this).closest('.card-hover').find('.package-description, .quantity, .weight, .length, .width, .height').each(function() {
                if ($(this).val() === '') {
                    isValid = false;
                }
            });
            if (isValid) {
                $(this).closest('.card-hover').find('.package-description, .quantity, .weight, .length, .width, .height').removeClass('is-invalid');
            } else {
                $(this).closest('.card-hover').find('.package-description, .quantity, .weight, .length, .width, .height').addClass('is-invalid');
            }
        });
    });
</script>

<!-- End page content -->
@endsection