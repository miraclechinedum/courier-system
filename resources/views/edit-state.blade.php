@extends('layouts.app')

@section('content')

<!-- start page content-->
<div class="page-content">
    <!--start breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">States</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0 align-items-center">
                    <li class="breadcrumb-item">
                        <a href="javascript:;">
                            <ion-icon name="bookmarks-outline"></ion-icon>
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Edit State
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

                <div class="card">
                    <div class="card-body">

                        <form class="form-horizontal form-material" id="save_data" name="save_data" method="post" action="{{ route('states.update', $state->id) }}">
                            @csrf
                            @method('PUT')
                            <header class="mb-4">
                                <span>Edit State</span>
                            </header>
                            <section>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label col-form-label">Country</label>
                                        <div class="form-group">
                                            <select class="select2 form-select form-control custom-select select2-hidden-accessible" id="country" name="country" tabindex="-1" aria-hidden="true">
                                                <option value="" selected disabled>Select Country</option>
                                                @foreach($countries as $country)
                                                <option value="{{ $country->id }}" {{ $state->country_id == $country->id ? 'selected' : '' }}>{{ $country->country_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="control-label col-form-label" for="firstName1">State Name</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" style="width: 100%;" name="state_name" id="state_name" placeholder="State Name" value="{{ $state->state_name }}">
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <br><br>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-outline-primary btn-confirmation" name="dosubmit" type="submit">Update State</button>
                                    <a href="{{ route('states.index') }}" class="btn btn-outline-secondary btn-confirmation"><span><i class="ti-share-alt"></i></span> Back to list</a>
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

<!-- End page content -->
@endsection