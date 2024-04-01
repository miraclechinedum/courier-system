@extends('layouts.app')

@section('content')
<!-- start page content-->
<div class="page-content">
    <!--start breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Dashboard</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0 align-items-center">
                    <li class="breadcrumb-item">
                        <a href="javascript:;">
                            <ion-icon name="home-outline"></ion-icon>
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        overview
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="row row-cols-1 row-cols-lg-2 row-cols-xxl-4">
        @if(auth()->id() == 1)
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-start gap-2">
                        <div>
                            <p class="mb-0 fs-6">Total Revenue</p>
                        </div>
                        <div class="ms-auto widget-icon-small text-white bg-gradient-purple">
                            <ion-icon name="wallet-outline"></ion-icon>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mt-3">
                        <div>
                            <h4 class="mb-0">$92,854</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-start gap-2">
                        <div>
                            @if(Auth::user() && Auth::user()->id == 1)
                            <p class="mb-0 fs-6">Total Customers</p>
                            @elseif(Auth::user() && Auth::user()->role_id == 2)
                            <p class="mb-0 fs-6">Total Recipients</p>
                            @endif
                        </div>
                        <div class="ms-auto widget-icon-small text-white bg-gradient-info">
                        </div>
                    </div>
                    <div class="d-flex align-items-center mt-3">
                        <div>
                            @if(Auth::user() && Auth::user()->id == 1)
                            <h4 class="mb-0">{{ $totalCustomers }}</h4>
                            @elseif(Auth::user() && Auth::user()->role_id == 2)
                            <h4 class="mb-0">{{ $totalRecipients }}</h4>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-start gap-2">
                        <div>
                            <p class="mb-0 fs-6">Total Bookings</p>
                        </div>
                        <div class="ms-auto widget-icon-small text-white bg-gradient-danger">
                        </div>
                    </div>
                    <div class="d-flex align-items-center mt-3">
                        <div>
                            <h4 class="mb-0">{{ $totalOrders }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-start gap-2">
                        <div>
                            <p class="mb-0 fs-6">Conversion Rate</p>
                        </div>
                        <div class="ms-auto widget-icon-small text-white bg-gradient-success">
                        </div>
                    </div>
                    <div class="d-flex align-items-center mt-3">
                        <div>
                            <h4 class="mb-0">48.76%</h4>
                        </div>
                        <div class="ms-auto">+8.52%</div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <!--end row-->

    <div class="card radius-10 w-100">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h6 class="mb-0">Recent Orders</h6>
                <div class="fs-5 ms-auto dropdown">
                    <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown">
                        <i class="bi bi-three-dots"></i>
                    </div>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li>
                            <a class="dropdown-item" href="#">Another action</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="table-responsive mt-2">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#ID</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                        <tr>
                            <td>
                                <a href="{{ route('invoice.show', $booking->id) }}" class="text-primary">
                                    {{ $booking->tracking_id }}
                                </a>
                            </td>
                            <td> {{ $booking->senderAddress->address }}<br>
                                {{ $booking->senderAddress->city->city_name }}, {{ $booking->senderAddress->state->state_name }}<br>
                                {{ $booking->senderAddress->country->country_name }}, {{ $booking->senderAddress->zip_code }}<br>
                            </td>
                            <td>{{ $booking->recipientAddress->address }}<br>
                                {{ $booking->recipientAddress->city->city_name }}, {{ $booking->recipientAddress->state->state_name }}<br>
                                {{ $booking->recipientAddress->country->country_name }}, {{ $booking->recipientAddress->zip_code }}<br>
                            </td>
                            <td>{{ ucfirst($booking->status) }}</td>
                            <td>{{ $booking->created_at->format('M d, Y') }}</td>

                            <td>
                                <div class="d-flex align-items-center gap-3 fs-6">
                                    <a href="{{ route('invoice.show', $booking->id) }}" class="text-primary" style="font-size: 20px;" data-bs-toggle="tooltip" data-bs-placement="bottom" title="View Invoice" aria-label="Views">
                                        <ion-icon name="eye-outline"></ion-icon>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- end page content-->
@endsection