@extends('layouts.app')

@section('content')

<!-- start page content-->
<div class="page-content">
    <!--start breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Countries</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0 align-items-center">
                    <li class="breadcrumb-item">
                        <a href="{{ route('countries.index') }}">
                            <ion-icon name="bookmarks-outline"></ion-icon>
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Edit country
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="container-fluid mb-4">
        <div class="row">
            <div class="col-lg-12 col-xl-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('countries.update', $country->id) }}" method="post" class="form-horizontal form-material" id="update_data">
                            @csrf
                            @method('PUT')
                            <header class="mb-4">
                                <span>Edit country</span>
                            </header>
                            <section>
                                <div class="row mb-4">
                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <label class="mb-2" for="country_name">Country name</label>
                                            <input type="text" class="form-control" name="country_name" id="country_name" placeholder="Country name" value="{{ $country->country_name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <label class="mb-2" for="phone_code">Phone code</label>
                                            <input type="text" class="form-control" name="phone_code" id="phone_code" placeholder="Phone code" value="{{ $country->phone_code }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="mb-2" for="currency">Currency</label>
                                            <input type="text" class="form-control" name="currency" id="currency" placeholder="Currency" value="{{ $country->currency }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="mb-2" for="currency_symbol">Currency symbol</label>
                                            <input type="text" class="form-control" name="currency_symbol" id="currency_symbol" placeholder="Currency symbol" value="{{ $country->currency_symbol }}">
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <br><br>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-outline-primary btn-confirmation" type="submit">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End page content -->

@endsection