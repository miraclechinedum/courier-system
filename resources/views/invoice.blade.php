@extends('layouts.app')

@section('content')

<style>
    @media print {
        body * {
            visibility: hidden;
        }

        .printable-content,
        .printable-content * {
            visibility: visible;
        }

        .printable-content {
            position: absolute;
            left: 0;
            top: 0;
        }
    }
</style>


<!-- start page content-->
<div class="page-content">

    <!--start breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Invoice</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0 align-items-center">
                    <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">for <b>#{{ $booking->tracking_id }}</b></li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="printable-content">
        <div class="card radius-10">
            <div class="card-header py-3">
                <div class="row align-items-center g-3">
                    <div class="col-12 col-lg-6">
                        <h5 class="mb-0">Company Name, Inc</h5>
                    </div>
                    <div class="col-12 col-lg-6 text-md-end">
                        <a href="javascript:;" onclick="window.print()" class="btn btn-primary"><ion-icon name="print-sharp"></ion-icon>Print</a>
                    </div>
                </div>
            </div>
            <div class="card-header py-2">
                <div class="row row-cols-1 row-cols-lg-3">
                    <div class="col">
                        <div class="">
                            <small>From</small>
                            <address class="m-t-5 m-b-5">
                                @if($booking->sender)
                                <strong class="text-inverse">{{ $booking->sender->name }}</strong><br>
                                @if($booking->senderAddress)
                                {{ $booking->senderAddress->address }}<br>
                                {{ $booking->senderAddress->city->city_name }}, {{ $booking->senderAddress->state->state_name }}<br>
                                {{ $booking->senderAddress->country->country_name }}, {{ $booking->senderAddress->zip_code }}<br>
                                Phone: ({{ $booking->sender->phone_number }})<br>
                                @endif
                                @endif
                            </address>
                        </div>
                    </div>

                    <div class="col">
                        <div class="">
                            <small>to</small>
                            <address class="m-t-5 m-b-5">
                                @if($booking->recipientClientAddress)
                                @php
                                $recipientAddress = App\Models\UserAddress::find($booking->recipientClientAddress)->first();
                                @endphp
                                @if($recipientAddress)
                                <strong class="text-inverse">{{ $recipientAddress->user->name }}</strong><br>
                                {{ $recipientAddress->address }}<br>
                                {{ $recipientAddress->city->city_name }}, {{ $recipientAddress->state->state_name }}<br>
                                {{ $recipientAddress->country->country_name }}, {{ $recipientAddress->zip_code }}<br>
                                Phone: {{ $recipientAddress->user->phone_number }}<br>
                                @endif
                                @endif
                            </address>
                        </div>
                    </div>

                    <div class="col">
                        <div class="">
                            <small>Invoice for</small>
                            <div class="invoice-detail">
                                <b>#{{ $booking->tracking_id }}</b><br>
                            </div>
                            <div class="">
                                <b>Date:</b>
                                {{ $booking->created_at->format('M d, Y') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-invoice">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>PACKAGE</th>
                                <th class="text-center" width="10%">QUANTITY</th>
                                <th class="text-center" width="10%">WEIGHT</th>
                                <th class="text-center" width="10%">LENGTH</th>
                                <th class="text-center" width="10%">WIDTH</th>
                                <th class="text-center" width="10%">HEIGHT</th>
                                <!-- <th class="text-right" width="20%">LINE TOTAL</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($booking->packages as $index=> $package)
                            <tr>
                                <td>{{ $index + 1}}</td>
                                <td>
                                    <span class="text-inverse">{{ $package->package_description }}</span><br>
                                </td>
                                <td class="text-center">{{ $package->quantity }} pieces</td>
                                <td class="text-center">{{ number_format($package->weight, 0, '.', ',') }} kg</td>
                                <td class="text-center">{{ number_format($package->length, 0, '.', ',') }} cm</td>
                                <td class="text-center">{{ number_format($package->width, 0, '.', ',') }} cm</td>
                                <td class="text-center">{{ number_format($package->height, 0, '.', ',') }} cm</td>
                                <!-- <td class="text-right">${{ $package->quantity * $package->weight }}</td> -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <hr>

                <!-- Invoice note -->
                <div class="my-3">
                    <!-- * Make all cheques payable to [Your Company Name]<br>
                    * Payment is due within 30 days<br> -->
                    * If you have any questions concerning this invoice, contact [Name, Phone Number, Email]
                </div>
                <!-- end invoice-note -->
            </div>

            <div class="card-footer py-3 bg-transparent">
                <p class="text-center mb-2">
                    THANK YOU FOR YOUR BUSINESS
                </p>
                <p class="text-center d-flex align-items-center gap-3 justify-content-center mb-0">
                    <span class=""><i class="bi bi-globe"></i> www.domain.com</span>
                    <span class=""><i class="bi bi-telephone-fill"></i> T:+11-0462879</span>
                    <span class=""><i class="bi bi-envelope-fill"></i> info@example.com</span>
                </p>
            </div>
        </div>
    </div>

</div>
<!-- End page content -->
@endsection