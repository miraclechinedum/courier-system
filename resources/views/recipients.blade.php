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
                    <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">My Recipients</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a type="button" href="{{ route('add-recipient-form') }}" class="btn btn-outline-primary">Add Recipient</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->


    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">Recipient Management</h5>
                <form class="ms-auto position-relative">
                    <div class="position-absolute top-50 translate-middle-y search-icon px-3"><ion-icon name="search-sharp"></ion-icon></div>
                    <input class="form-control ps-5" type="text" placeholder="search">
                </form>
            </div>
            <div class="table-responsive mt-3">
                <table class="table align-middle">
                    <thead class="table-secondary">
                        <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Country</th>
                            <th>State</th>
                            <th>City</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recipients as $index => $recipient)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $recipient->user->name }}</td>
                            <td>{{ $recipient->user->email }}</td>
                            <td>{{ $recipient->user->phone_number }}</td>
                            <td>{{ $recipient->country->country_name }}</td>
                            <td>{{ $recipient->state->state_name }}</td>
                            <td>{{ $recipient->city->city_name }}</td>
                            <td>{{ $recipient->address }}</td>
                            <td>
                                <a>
                                    <i class="lni lni-pencil"></i>
                                </a>
                                <a>
                                    <i class="lni lni-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- End page content -->
    @endsection