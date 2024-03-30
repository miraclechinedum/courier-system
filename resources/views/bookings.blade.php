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
                        my bookings
                    </li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('bookings.create') }}" class="btn btn-outline-primary">
                    New Booking
                </a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card mt-4">
        <div class="card-body">
            @if($bookings->isEmpty())
            <p>No bookings found.</p>
            @else
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tracking ID</th>
                            <th>Pickup Location</th>
                            <th>Delivery Location</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>
                                <a href="{{ route('bookings.track', $booking->tracking_id) }}">{{ $booking->tracking_id }}</a>
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
                            <td class="text-center">
                                <a href="{{ route('invoice.show', $booking->id) }}" style="font-size: 20px;">
                                    <i class="lni lni-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Tracking ID</th>
                            <th>Pickup Location</th>
                            <th>Delivery Location</th>
                            <th>Status</th>
                            <th>Created At</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            @endif
        </div>
    </div>
</div>
<!-- End page content -->
@endsection