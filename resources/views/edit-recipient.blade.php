@extends('layouts.app')

@section('content')

<!-- start page content-->
<div class="page-content">
    <!--start breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Recipients</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0 align-items-center">
                    <li class="breadcrumb-item">
                        <a href="javascript:;">
                            <ion-icon name="bookmarks-outline"></ion-icon>
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        edit recipient
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->


    <div class="container-fluid mb-4">

        <div class="row">
            <!-- Column -->

            <div class="col-lg-12 col-xl-12 col-md-12">

                <div class="card pt-2">
                    <div class="card-body">

                        <form class="form-horizontal form-material" id="save_data" name="save_data" method="post" action="{{ route('update-recipient', ['id' => $userAddress->user_id]) }}">
                            @csrf
                            <section>
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                <div class="row">
                                    <div class="col-md-4 mb-2">
                                        <div class="form-group">
                                            <label for="recipient_name">Name</label>
                                            <input type="text" class="form-control" name="recipient_name" id="recipient_name" placeholder="Name" value="{{ $userAddress->user->name }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-2">
                                        <div class="form-group">
                                            <label for="recipient_email">Email</label>
                                            <input type="text" class="form-control" name="recipient_email" id="recipient_email" placeholder="Email" value="{{ $userAddress->user->email }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-2">
                                        <div class="form-group">
                                            <label for="recipient_phone_number">Phone Number</label>
                                            <input type="text" class="form-control" name="recipient_phone_number" id="recipient_phone_number" placeholder="Phone Number" value="{{ $userAddress->user->phone_number }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-2">
                                        <div class="form-group">
                                            <label for="country_modal_recipient_address">Country</label>
                                            <select style="width: 100% !important; z-index: 9999;" class="select2 form-control select2-hidden-accessible" name="country_modal_recipient_address" id="country_modal_recipient_address">
                                                <option value="" selected disabled>Select Country</option>
                                                @foreach($countries as $country)
                                                <option value="{{ $country->id }}" {{ old('country_modal_recipient_address', $userAddress->country_id) == $country->id ? 'selected' : '' }}>{{ $country->country_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-2">
                                        <div class="form-group">
                                            <label class="">State</label>
                                            <select style="width: 100% !important;" class="select2 form-control select2-hidden-accessible" id="state_modal_recipient_address" name="state_modal_recipient_address" {{ $userAddress->state_id ? '' : 'disabled' }}>
                                                <option value="" selected disabled>Select State</option>
                                                @foreach($states as $state)
                                                <option value="{{ $state->id }}" {{ old('state_modal_recipient_address', $userAddress->state_id) == $state->id ? 'selected' : '' }}>{{ $state->state_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-2">
                                        <div class="form-group">
                                            <label class="">City</label>
                                            <select style="width: 100% !important;" class="select2 form-control select2-hidden-accessible" id="city_modal_recipient_address" name="city_modal_recipient_address" {{ $userAddress->city_id ? '' : 'disabled' }}>
                                                <option value="" selected disabled>Select City</option>
                                                @foreach($cities as $city)
                                                <option value="{{ $city->id }}" {{ old('city_modal_recipient_address', $userAddress->city_id) == $city->id ? 'selected' : '' }}>{{ $city->city_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-4 mt-2">
                                        <div class="form-group">
                                            <label for="postal_modal_recipient_address">Zip Code</label>
                                            <input type="text" class="form-control" name="postal_modal_recipient_address" id="postal_modal_recipient_address" placeholder="Zip Code" value="{{ $userAddress->zip_code }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-2">
                                        <div class="form-group">
                                            <label for="address_modal_recipient_address">Address</label>
                                            <input type="text" class="form-control" name="address_modal_recipient_address" id="address_modal_recipient_address" placeholder="Address" value="{{ $userAddress->address }}">
                                        </div>
                                    </div>
                                </div>

                            </section>
                            <br><br>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-outline-primary btn-confirmation" name="dosubmit" type="submit">Update Recipient</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
    </div>

</div>

<script>
    $(document).ready(function() {
        $('#country').change(function() {
            var selectedCountry = $(this).val();
            if (selectedCountry) {
                $('#state_name').prop('disabled', false);
            } else {
                $('#state_name').prop('disabled', true);
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#country_modal_recipient_address').change(function() {
            var countryId = $(this).val();
            if (countryId) {
                $('#state_modal_recipient_address').prop('disabled', false);
                $.ajax({
                    type: "GET",
                    url: "{{ route('getStates') }}",
                    data: {
                        'country_id': countryId
                    },
                    success: function(response) {
                        $('#state_modal_recipient_address').empty();
                        $('#state_modal_recipient_address').append('<option value="" selected disabled>Select State</option>');
                        $.each(response, function(key, value) {
                            $('#state_modal_recipient_address').append('<option value="' + value.id + '">' + value.state_name + '</option>');
                        });
                    }
                });
            } else {
                $('#state_modal_recipient_address').prop('disabled', true);
                $('#city_modal_recipient_address').prop('disabled', true);
                $('#state_modal_recipient_address').empty();
                $('#city_modal_recipient_address').empty();
            }
        });

        $('#state_modal_recipient_address').change(function() {
            var stateId = $(this).val();
            if (stateId) {
                $('#city_modal_recipient_address').prop('disabled', false);
                $.ajax({
                    type: "GET",
                    url: "{{ route('getCities') }}",
                    data: {
                        'state_id': stateId
                    },
                    success: function(response) {
                        $('#city_modal_recipient_address').empty();
                        $('#city_modal_recipient_address').append('<option value="" selected disabled>Select City</option>');
                        $.each(response, function(key, value) {
                            $('#city_modal_recipient_address').append('<option value="' + value.id + '">' + value.city_name + '</option>');
                        });
                    }
                });
            } else {
                $('#city_modal_recipient_address').prop('disabled', true);
                $('#city_modal_recipient_address').empty();
            }
        });
    });
</script>

<!-- End page content -->
@endsection