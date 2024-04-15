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
                        my details
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
                        <div class="">
                            <h3 class="mb-2">{{ auth()->user()->name }}</h3>
                            <p class="mb-1">{{ auth()->user()->email }}</p>
                            <p>{{ auth()->user()->phone_number }}</p>
                        </div>
                        <div class="">
                            <a href="{{ route('edit-profile') }}" class="btn btn-primary"><i class="lni lni-pencil-alt"></i>Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">

                    <div class="bs-stepper-content">
                        <div id="test-l-1" role="tabpanel" class="bs-stepper-pane active dstepper-block" aria-labelledby="stepper1trigger1">
                            <h4 class="mb-4">Your Address</h4>
                            <div class="row g-3">
                                <div class="col-12 col-lg-6">
                                    <label for="FirstName" class="form-label fw-bold">Country</label>
                                    <input type="text" class="form-control border-0 border-bottom" id="FirstName" value="{{ $userAddress->country->country_name }}" readonly>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <label for="FirstName" class="form-label fw-bold">State</label>
                                    <input type="text" class="form-control border-0 border-bottom" id="FirstName" value="{{ $userAddress->state->state_name }}" readonly>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <label for="FirstName" class="form-label fw-bold">City</label>
                                    <input type="text" class="form-control border-0 border-bottom" id="FirstName" value="{{ $userAddress->city->city_name }}" readonly>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <label for="FirstName" class="form-label fw-bold">Zip Code</label>
                                    <input type="text" class="form-control border-0 border-bottom" id="FirstName" value="{{ $userAddress->zip_code }}" readonly>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <label for="FirstName" class="form-label fw-bold">Street</label>
                                    <input type="text" class="form-control border-0 border-bottom" id="FirstName" value="{{ $userAddress->address }}" readonly>
                                </div>

                            </div><!---end row-->

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
<!-- end page content-->
@endsection