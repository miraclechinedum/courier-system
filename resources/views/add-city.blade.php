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


    <div class="container-fluid mb-4" data-select2-id="12">

        <div class="row" data-select2-id="11">
            <!-- Column -->

            <div class="col-lg-12 col-xl-12 col-md-12" data-select2-id="10">

                <div class="card" data-select2-id="9">
                    <div class="card-body" data-select2-id="8">

                        <form class="form-horizontal form-material" id="save_data" name="save_data" method="post" action="{{ route('saveCity') }}">
                            @csrf
                            <header class="mb-4">
                                <span>Add City</span>
                            </header>

                            <div id="msgholder2">
                                <x-validation-errors class="mb-4" />
                            </div>

                            <section data-select2-id="7">
                                <div class="row" data-select2-id="6">
                                    <div class="col-md-12 " data-select2-id="5">
                                        <label class="control-label col-form-label">Country</label>
                                        <div class="input-group" data-select2-id="4">
                                            <select class="select2 form-control custom-select select2-hidden-accessible" id="country" name="country" data-select2-id="country" tabindex="-1" aria-hidden="true">
                                                <option value="" selected disabled>Select Country</option>
                                                @foreach($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mt-2">
                                        <label class="control-label col-form-label">State</label>
                                        <div class="input-group">
                                            <select class="select2 form-control custom-select select2-hidden-accessible" id="state" name="state" data-select2-id="state" tabindex="-1" aria-hidden="true" disabled>
                                                <option value="" selected disabled>Select State</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mt-2">
                                        <div class="form-group">
                                            <label class="control-label col-form-label" for="firstName1">City name</label>
                                            <input type="text" class="form-control" name="city_name" id="city_name" placeholder="City name">
                                        </div>
                                    </div>
                                </div>

                            </section>
                            <br><br>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-outline-primary btn-confirmation" name="dosubmit" type="submit">Save city</button>
                                    <a href="cities_list.php" class="btn btn-outline-secondary btn-confirmation"><span><i class="ti-share-alt"></i></span> Back to list</a>
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
            var country_id = $(this).val();
            if (country_id) {
                $.ajax({
                    url: '{{ route("getStates") }}',
                    type: 'GET',
                    data: {
                        country_id: country_id
                    },
                    success: function(response) {
                        $('#state').empty();
                        $('#state').append('<option value="" selected disabled>Select State</option>');
                        $.each(response, function(index, state) {
                            $('#state').append('<option value="' + state.id + '">' + state.state_name + '</option>');
                        });
                        $('#state').prop('disabled', false); // Enable state field
                    }
                });
            } else {
                $('#state').empty();
                $('#state').append('<option value="" selected disabled>Select State</option>');
                $('#state').prop('disabled', true); // Disable state field
            }
        });
    });
</script>

<!-- End page content -->
@endsection