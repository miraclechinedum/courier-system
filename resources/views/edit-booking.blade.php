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
                        edit parcel information
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

            <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row justify-content-between col-12 p-0">
                    <div class="col-md-6 pe-2">
                        <div class="card mt-4" style="padding: 20px;">

                            <div class="d-flex justify-content-between" style="padding-bottom: 20px;">
                                <div class="col-md-6">
                                    <h5>Shipping Prefix</h5>
                                    <input class="form-control" name="prefix" type="text" value="{{ explode('-', $booking->tracking_id)[0] }}" disabled />
                                    <!-- Hidden input field with a unique name -->
                                    <input type="hidden" name="prefix_hidden" value="{{ explode('-', $booking->tracking_id)[0] }}">
                                </div>
                                <div>
                                    <h5>Number (tracking)</h5>
                                    <input class="form-control" type="text" name="tracking" value="{{ explode('-', $booking->tracking_id)[1] }}" disabled />
                                    <!-- Hidden input field with a unique name -->
                                    <input type="hidden" name="tracking_hidden" value="{{ explode('-', $booking->tracking_id)[1] }}">
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
                                                <option value="" disabled>Select Option</option>
                                                <option value="same day" {{ $booking->service_mode == 'same day' ? 'selected' : '' }}>Same Day</option>
                                                <option value="2 days" {{ $booking->service_mode == '2 days' ? 'selected' : '' }}>2 Days</option>
                                                <option value="3 days" {{ $booking->service_mode == '3 days' ? 'selected' : '' }}>3 Days</option>
                                                <option value="4 days" {{ $booking->service_mode == '4 days' ? 'selected' : '' }}>4 Days</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Courier Company</label>
                                            <select style="width: 100% !important;" class="select2 form-control" name="courier_company">
                                                <option value="" disabled>Select Option</option>
                                                <option value="GIG" {{ $booking->courier_company == 'GIG' ? 'selected' : '' }}>GIG</option>
                                                <option value="DHL" {{ $booking->courier_company == 'DHL' ? 'selected' : '' }}>DHL</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Type of packaging</label>
                                            <select style="width: 100% !important;" class="select2 form-control" name="packaging_type">
                                                <option value="" disabled>Select Option</option>
                                                <option value="small" {{ $booking->packaging_type == 'small' ? 'selected' : '' }}>Small</option>
                                                <option value="medium" {{ $booking->packaging_type == 'medium' ? 'selected' : '' }}>Medium</option>
                                                <option value="large" {{ $booking->packaging_type == 'large' ? 'selected' : '' }}>Large</option>
                                                <option value="extra_large" {{ $booking->packaging_type == 'extra_large' ? 'selected' : '' }}>Extra Large</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-4">
                                        <div class="form-group">
                                            <label>Payment Method</label>
                                            <select style="width: 100% !important;" class="select2 form-control" name="payment_method">
                                                <option value="" disabled>Select Option</option>
                                                <option value="online_payment" {{ $booking->payment_method == 'online_payment' ? 'selected' : '' }}>Online Payment</option>
                                                <option value="bank_transfer" {{ $booking->payment_method == 'bank_transfer' ? 'selected' : '' }}>Bank Transfer</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-4">
                                        <label>Amount to be paid</label>
                                        <div class="input-group mb-3"> <span class="input-group-text">$</span>
                                            <input type="text" name="amount" class="form-control" aria-label="Amount (to the nearest dollar)" value="{{ $booking->amount }}"> <span class="input-group-text">.00</span>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-4">
                                        <div class="form-group">
                                            <label>Update Status</label>
                                            <select style="width: 100% !important;" class="select2 form-control" name="status">
                                                <option value="" disabled>Select Option</option>
                                                <option value="Pending" {{ $booking->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="Processing" {{ $booking->status == 'Processing' ? 'selected' : '' }}>Processing</option>
                                                <option value="In Transit" {{ $booking->status == 'In Transit' ? 'selected' : '' }}>In Transit</option>
                                                <option value="Arrived" {{ $booking->status == 'Arrived' ? 'selected' : '' }}>Arrived</option>
                                                <option value="Cancelled" {{ $booking->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
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
                                    @foreach($packages as $index => $package)
                                    <div class="card-hover" id="row_id_{{ $index }}">
                                        <hr>
                                        <div class="row justify-between justify-content-between">
                                            <div class="col-sm-12 col-md-6 col-lg-3">
                                                <div class="form-group">
                                                    <label for="package_description_{{ $index }}" class="mb-1">Package Name</label>
                                                    <div class="input-group">
                                                        <input type="text" name="package_description[]" id="package_description_{{ $index }}" class="form-control input-sm" data-toggle="tooltip" data-placement="bottom" placeholder="Package Description" value="{{ $package->package_description }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-1">
                                                <div class="form-group">
                                                    <label for="quantity_{{ $index }}" class="mb-1">Quantity</label>
                                                    <div class="input-group">
                                                        <input type="text" name="quantity[]" id="quantity_{{ $index }}" class="form-control input-sm" data-toggle="tooltip" data-placement="bottom" title="Quantity" value="{{ number_format($package->quantity, 0, '.', '') }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-1">
                                                <div class="form-group">
                                                    <label for="weight_{{ $index }}" class="mb-1">Weight</label>
                                                    <div class="input-group">
                                                        <input type="text" name="weight[]" id="weight_{{ $index }}" class="form-control input-sm" data-toggle="tooltip" data-placement="bottom" title="Weight" value="{{ number_format($package->weight, 0, '.', '') }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-1">
                                                <div class="form-group">
                                                    <label for="length_{{ $index }}" class="mb-1">Length</label>
                                                    <div class="input-group">
                                                        <input type="text" name="length[]" id="length_{{ $index }}" class="form-control input-sm text_only" data-toggle="tooltip" data-placement="bottom" title="Length" value="{{ number_format($package->length, 0, '.', '') }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-1">
                                                <div class="form-group">
                                                    <label for="width_{{ $index }}" class="mb-1">Width</label>
                                                    <div class="input-group">
                                                        <input type="text" name="width[]" id="width_{{ $index }}" class="form-control input-sm text_only" data-toggle="tooltip" data-placement="bottom" title="Width" value="{{ number_format($package->width, 0, '.', '') }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-1">
                                                <div class="form-group">
                                                    <label for="height_{{ $index }}" class="mb-1">Height</label>
                                                    <div class="input-group">
                                                        <input type="text" name="height[]" id="height_{{ $index }}" class="form-control input-sm number_only" data-toggle="tooltip" data-placement="bottom" title="Height" value="{{ number_format($package->height, 0, '.', '') }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            @if($index > 0)
                                            <div class="col-sm-12 col-md-6 col-lg-1">
                                                <!-- Delete icon will be dynamically added -->
                                                <button class="btn btn-danger delete-row"><i class="lni lni-trash"></i></button>
                                            </div>
                                            @endif
                                        </div>
                                        <hr>
                                    </div>
                                    @endforeach
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
                '<label for="package_description_' + rowCount + '" class="mb-1">Package Description</label>' +
                '<div class="input-group">' +
                '<input type="text" name="package_description[]" id="package_description_' + rowCount + '" class="form-control input-sm package-description" data-toggle="tooltip" data-placement="bottom" placeholder="Package Description" required>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="col-sm-12 col-md-6 col-lg-1">' +
                '<div class="form-group">' +
                '<label for="quantity_' + rowCount + '" class="mb-1">Quantity</label>' +
                '<div class="input-group">' +
                '<input type="text" name="quantity[]" id="quantity_' + rowCount + '" class="form-control input-sm quantity" data-toggle="tooltip" data-placement="bottom" title="Quantity" required>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="col-sm-12 col-md-6 col-lg-1">' +
                '<div class="form-group">' +
                '<label for="weight_' + rowCount + '" class="mb-1">Weight</label>' +
                '<div class="input-group">' +
                '<input type="text" name="weight[]" id="weight_' + rowCount + '" class="form-control input-sm weight" data-toggle="tooltip" data-placement="bottom" title="Weight" required>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="col-sm-12 col-md-6 col-lg-1">' +
                '<div class="form-group">' +
                '<label for="length_' + rowCount + '" class="mb-1">Length</label>' +
                '<div class="input-group">' +
                '<input type="text" name="length[]" id="length_' + rowCount + '" class="form-control input-sm text_only length" data-toggle="tooltip" data-placement="bottom" title="Length" required>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="col-sm-12 col-md-6 col-lg-1">' +
                '<div class="form-group">' +
                '<label for="width_' + rowCount + '" class="mb-1">Width</label>' +
                '<div class="input-group">' +
                '<input type="text" name="width[]" id="width_' + rowCount + '" class="form-control input-sm text_only width" data-toggle="tooltip" data-placement="bottom" title="Width" required>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="col-sm-12 col-md-6 col-lg-1">' +
                '<div class="form-group">' +
                '<label for="height_' + rowCount + '" class="mb-1">Height</label>' +
                '<div class="input-group">' +
                '<input type="text" name="height[]" id="height_' + rowCount + '" class="form-control input-sm number_only height" data-toggle="tooltip" data-placement="bottom" title="Height" required>' +
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