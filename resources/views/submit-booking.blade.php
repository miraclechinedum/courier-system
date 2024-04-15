@extends('layouts.app')

@section('content')

<!-- start page content-->
<div class="page-content">
    <!--start breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Parcels</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0 align-items-center">
                    <li class="breadcrumb-item">
                        <a href="javascript:;">
                            <ion-icon name="bookmarks-outline"></ion-icon>
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        register new parcel
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
                                    <input class="form-control" style="border-color: #9c9c9c;" name="prefix" type="text" value="SLS" disabled />
                                    <!-- Add a hidden input field for prefix -->
                                    <input type="hidden" name="prefix" value="SLS">
                                </div>
                                <div>
                                    <h5>Number (tracking)</h5>
                                    <!-- Assuming generateTrackingNumber() generates the tracking number -->
                                    <input class="form-control" style="border-color: #9c9c9c;" type="text" name="tracking" value="{{ generateTrackingNumber() }}" disabled />
                                    <!-- Add a hidden input field for tracking -->
                                    <input type="hidden" name="tracking" value="{{ generateTrackingNumber() }}">
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- <div class="col-md-6 ps-2">
                        <div class="card mt-4" style="padding: 20px;">
                            <div class="d-flex justify-content-between" style="padding-bottom: 20px;">
                                <div class="col-md-6">
                                    <h5>List of Agencies</h5>
                                    <input class="form-control" style="border-color: #9c9c9c;" name="list_of_agencies" type="text" disabled />
                                </div>

                                <div>
                                    <h5>Office of origin</h5>
                                    <input class="form-control" style="border-color: #9c9c9c;" name="office_of_origin" type="text" disabled />
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>

                <!-- Sender & Recipient -->
                <div class="row justify-content-between col-12 p-0">
                    <div class="col-md-6 pe-2">
                        <div class="card mt-4">
                            <div class="card-head-con p-2">
                                <h4> Sender's Information</h4>
                            </div>
                            <div class="p-4">
                                <div class="mb-3">
                                    <h5> Sender</h5>
                                    <select class="form-select" aria-label="Sender select" id="sender" name="sender">
                                        <option value="" selected disabled>Select Sender</option>
                                        @foreach($senders as $sender)
                                        @if($sender->userAddresses)
                                        @foreach($sender->userAddresses as $address)
                                        <option value="{{ $address->id }}" data-address="{{ $address->address }} - {{ $address->city->city_name }}, {{ $address->state->state_name }}, {{ $address->country->country_name }} ({{ $address->zip_code }})" {{ old('sender') == $address->id ? 'selected' : '' }}>
                                            {{ $sender->name }}
                                        </option>
                                        @endforeach
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                @if(session('sendersuccess'))
                                <div class="alert alert-success">
                                    {{ session('sendersuccess') }}
                                </div>
                                @endif

                                <div class="d-flex justify-content-between align-items-center">
                                    <div style="width: 77%;">
                                        <div class="form-group">
                                            <label>Sender Address</label>
                                            <select style="width: 100% !important; z-index: 9999;" class="select2 form-control select2-hidden-accessible" data-placeholder="Search Sender Address" aria-label="Sender/Customer Address" id="senderAddress" name="sender_customer_address">
                                                <option value="" selected disabled></option>
                                                <!-- Sender address options will be dynamically populated here -->
                                            </select>
                                        </div>
                                    </div>

                                    <!-- First modal -->
                                    <button type="button" class="btn btn-primary rounded-percent p-2 mt-4" data-bs-toggle="modal" data-bs-target="#exampleLargeModal">
                                        <i class="fadeIn animated bx bx-plus text-white"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                var senderSelect = document.getElementById('sender');
                                var senderAddressSelect = document.getElementById('senderAddress');

                                // Listen for changes in the sender select input
                                senderSelect.addEventListener('change', function() {
                                    var selectedSender = senderSelect.options[senderSelect.selectedIndex];
                                    var senderAddress = selectedSender.getAttribute('data-address');

                                    // Clear existing options and add the selected sender's address as an option
                                    senderAddressSelect.innerHTML = '';
                                    if (senderAddress) {
                                        var option = new Option(senderAddress, senderSelect.value);
                                        senderAddressSelect.appendChild(option);
                                    }
                                });
                            });
                        </script>

                    </div>



                    <div class="col-md-6 pe-2">
                        <div class="card mt-4">
                            <div class="card-head-con p-2">
                                <h4> Receiver's Information</h4>
                            </div>
                            <div class="p-4">
                                <div class="mb-3">
                                    <h5>Receiver</h5>
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
                                            <label>Receiver's Address</label>
                                            <select style="width: 100% !important; z-index: 9999;" id="recipientAddress" data-placeholder="Search Receiver Address" class="select2 form-control select2-hidden-accessible" name="recipient_client_address">
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
                                            <label>To be delivered on</label>
                                            <div class="input-group date" data-provide="datepicker">
                                                <input type="text" class="form-control" name="service_mode">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-th"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Include jQuery -->
                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                                    <!-- Include Bootstrap Datepicker -->
                                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

                                    <script>
                                        $(document).ready(function() {
                                            // Initialize date picker
                                            $('[data-provide="datepicker"]').datepicker({
                                                format: 'yyyy-mm-dd',
                                                autoclose: true
                                            });
                                        });
                                    </script>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Courier Company</label>
                                            <select style="width: 100% !important;" class="select2 form-control" name="courier_company">
                                                <option value="" selected disabled>Select Option</option>
                                                <option value="Rapidroute">Rapidroute</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Type of packaging</label>
                                            <select style="width: 100% !important;" class="select2 form-control" name="packaging_type">
                                                <option value="" selected disabled>Select Option</option>
                                                <option value="Small">Small</option>
                                                <option value="Medium">Medium</option>
                                                <option value="Large">Large</option>
                                                <option value="Extra Large">Extra Large</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-4">
                                        <div class="form-group">
                                            <label>Payment Method</label>
                                            <select style="width: 100% !important;" class="select2 form-control" name="payment_method">
                                                <option value="" selected disabled>Select Option</option>
                                                <option value="Online Payment">Online Payment</option>
                                                <option value="Bank Transfer">Bank Transfer</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-4">
                                        <label>Amount to be paid</label>
                                        <div class="input-group mb-3"> <span class="input-group-text">$</span>
                                            <input type="text" name="amount" class="form-control" aria-label="Amount (to the nearest dollar)"> <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" style="border-color: #9c9c9c;" style="border-color: #9c9c9c;" id="description" name="description" rows="3"></textarea>
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
                                                    <label for="package_description_0" class="mb-1">Package Name</label>
                                                    <div class="input-group">
                                                        <input type="text" name="package_description[]" id="package_description_0" class="form-control input-sm" style="border-color: #9c9c9c;" data-toggle="tooltip" data-placement="bottom" placeholder="Package Description" value="{{ old('package_description.0') }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-1">
                                                <div class="form-group">
                                                    <label for="quantity_0" class="mb-1">Quantity</label>
                                                    <div class="input-group">
                                                        <input type="text" name="quantity[]" id="quantity_0" class="form-control input-sm" style="border-color: #9c9c9c;" data-toggle="tooltip" data-placement="bottom" title="Quantity" value="{{ old('quantity.0') }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-1">
                                                <div class="form-group">
                                                    <label for="weight_0" class="mb-1">Weight</label>
                                                    <div class="input-group">
                                                        <input type="text" name="weight[]" id="weight_0" class="form-control input-sm" style="border-color: #9c9c9c;" data-toggle="tooltip" data-placement="bottom" title="Weight" value="{{ old('weight.0') }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-1">
                                                <div class="form-group">
                                                    <label for="length_0" class="mb-1">Length</label>
                                                    <div class="input-group">
                                                        <input type="text" name="length[]" id="length_0" class="form-control input-sm text_only" style="border-color: #9c9c9c;" data-toggle="tooltip" data-placement="bottom" title="Length" value="{{ old('length.0') }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-1">
                                                <div class="form-group">
                                                    <label for="width_0" class="mb-1">Width</label>
                                                    <div class="input-group">
                                                        <input type="text" name="width[]" id="width_0" class="form-control input-sm text_only" style="border-color: #9c9c9c;" data-toggle="tooltip" data-placement="bottom" title="Width" value="{{ old('width.0') }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-1">
                                                <div class="form-group">
                                                    <label for="height_0" class="mb-1">Height</label>
                                                    <div class="input-group">
                                                        <input type="text" name="height[]" id="height_0" class="form-control input-sm number_only" style="border-color: #9c9c9c;" data-toggle="tooltip" data-placement="bottom" title="Height" value="{{ old('height.0') }}" required>
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
                                    <div class="col-md-4 mb-2">
                                        <div class="form-group">
                                            <label for="sender_name">Name</label>
                                            <input type="text" class="form-control" name="sender_name" id="sender_name" placeholder="Name" value="{{ old('sender_name') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-2">
                                        <div class="form-group">
                                            <label for="sender_email">Email</label>
                                            <input type="text" class="form-control" name="sender_email" id="sender_email" placeholder="Email" value="{{ old('sender_email') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-2">
                                        <div class="form-group">
                                            <label for="sender_phone_number">Phone Number</label>
                                            <input type="text" class="form-control" name="sender_phone_number" id="sender_phone_number" placeholder="Phone Number" value="{{ old('sender_phone_number') }}">
                                        </div>
                                    </div>

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

<script>
    $(document).ready(function() {
        $('#sender').change(function() {
            var senderId = $(this).val();
            // AJAX call to fetch sender addresses based on sender ID
            $.ajax({
                url: '/get-sender-addresses/' + senderId,
                type: 'GET',
                success: function(data) {
                    $('#sender_customer_address').empty();
                    $('#sender_customer_address').append('<option value="" selected disabled>Select Sender Address</option>');
                    $.each(data, function(index, address) {
                        $('#sender_customer_address').append('<option value="' + address.id + '">' + address.address + ' - ' + address.city.city_name + ', ' + address.state.state_name + ', ' + address.country.country_name + ' (' + address.zip_code + ')' + '</option>');
                    });
                }
            });
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
            var newRow = $('<div class="card-hover" id="row_id_' + rowCount + '"><hr><div class="row justify-between justify-content-between">' +
                '<div class="col-sm-12 col-md-6 col-lg-3">' +
                '<div class="form-group">' +
                '<label for="package_description_' + rowCount + '" class="mb-1">Package Name</label>' +
                '<div class="input-group">' +
                '<input type="text" name="package_description[]" id="package_description_' + rowCount + '" class="form-control input-sm package-description" style="border-color: #9c9c9c;" data-toggle="tooltip" data-placement="bottom" placeholder="Package Description" required>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="col-sm-12 col-md-6 col-lg-1">' +
                '<div class="form-group">' +
                '<label for="quantity_' + rowCount + '" class="mb-1">Quantity</label>' +
                '<div class="input-group">' +
                '<input type="text" name="quantity[]" id="quantity_' + rowCount + '" class="form-control input-sm quantity" style="border-color: #9c9c9c;" data-toggle="tooltip" data-placement="bottom" title="Quantity" required>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="col-sm-12 col-md-6 col-lg-1">' +
                '<div class="form-group">' +
                '<label for="weight_' + rowCount + '" class="mb-1">Weight</label>' +
                '<div class="input-group">' +
                '<input type="text" name="weight[]" id="weight_' + rowCount + '" class="form-control input-sm weight" style="border-color: #9c9c9c;" data-toggle="tooltip" data-placement="bottom" title="Weight" required>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="col-sm-12 col-md-6 col-lg-1">' +
                '<div class="form-group">' +
                '<label for="length_' + rowCount + '" class="mb-1">Length</label>' +
                '<div class="input-group">' +
                '<input type="text" name="length[]" id="length_' + rowCount + '" class="form-control input-sm text_only length" style="border-color: #9c9c9c;" data-toggle="tooltip" data-placement="bottom" title="Length" required>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="col-sm-12 col-md-6 col-lg-1">' +
                '<div class="form-group">' +
                '<label for="width_' + rowCount + '" class="mb-1">Width</label>' +
                '<div class="input-group">' +
                '<input type="text" name="width[]" id="width_' + rowCount + '" class="form-control input-sm text_only width" style="border-color: #9c9c9c;" data-toggle="tooltip" data-placement="bottom" title="Width" required>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="col-sm-12 col-md-6 col-lg-1">' +
                '<div class="form-group">' +
                '<label for="height_' + rowCount + '" class="mb-1">Height</label>' +
                '<div class="input-group">' +
                '<input type="text" name="height[]" id="height_' + rowCount + '" class="form-control input-sm number_only height" style="border-color: #9c9c9c;" data-toggle="tooltip" data-placement="bottom" title="Height" required>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="col-sm-12 col-md-6 col-lg-1">' +
                '<button class="btn btn-danger delete-row"><i class="lni lni-trash"></i></button>' +
                '</div>' +
                '</div>' +
                '<hr>' +
                '</div>');

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
    });
</script>


<!-- End page content -->
@endsection