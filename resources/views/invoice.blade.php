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
        <div class="breadcrumb-title pe-3">Pages</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0 align-items-center">
                    <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Invoice</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-outline-primary">Settings</button>
                <button type="button" class="btn btn-outline-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item" href="javascript:;">Action</a>
                    <a class="dropdown-item" href="javascript:;">Another action</a>
                    <a class="dropdown-item" href="javascript:;">Something else here</a>
                    <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a>
                </div>
            </div>
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
                        <a href="javascript:;" class="btn btn-primary me-2"><ion-icon name="file-tray-full-sharp"></ion-icon>Export as PDF</a>
                        <a href="javascript:;" onclick="window.print()" class="btn btn-secondary"><ion-icon name="print-sharp"></ion-icon>Print</a>
                    </div>
                </div>
            </div>
            <div class="card-header py-2">
                <div class="row row-cols-1 row-cols-lg-3">
                    <div class="col">
                        <div class="">
                            <small>From</small>
                            <address class="m-t-5 m-b-5">
                                <strong class="text-inverse">{{ $booking->sender->name }}</strong><br>
                                @if($booking->senderAddress)
                                {{ $booking->senderAddress->address }}<br>
                                {{ $booking->senderAddress->city->city_name }}, {{ $booking->senderAddress->state->state_name }}<br>
                                {{ $booking->senderAddress->country->country_name }}, {{ $booking->senderAddress->zip_code }}<br>
                                Phone: ({{ $booking->sender->phone }})<br>
                                @endif
                            </address>
                        </div>
                    </div>

                    <div class="col">
                        <div class="">
                            <small>to</small>
                            <address class="m-t-5 m-b-5">
                                <strong class="text-inverse">{{ $booking->recipient->name }}</strong><br>
                                {{ $booking->recipientAddress->address }}<br>
                                {{ $booking->recipientAddress->city->city_name }}, {{ $booking->recipientAddress->state->state_name }}<br>
                                {{ $booking->recipientAddress->country->country_name }}, {{ $booking->recipientAddress->zip_code }}<br>
                                Phone: {{ $booking->recipientAddress->phone }}<br>
                            </address>
                        </div>
                    </div>

                    <div class="col">
                        <div class="">
                            <small>Invoice / July period</small>
                            <div class=""><b>{{ $booking->created_at->format('F j, Y') }}</b></div>
                            <div class="invoice-detail">
                                #{{ $booking->tracking_id }}<br>
                                Services Product
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
                                <th>TASK DESCRIPTION</th>
                                <th class="text-center" width="10%">QUANTITY</th>
                                <th class="text-center" width="10%">WEIGHT</th>
                                <th class="text-center" width="10%">LENGTH</th>
                                <th class="text-center" width="10%">WIDTH</th>
                                <th class="text-center" width="10%">HEIGHT</th>
                                <th class="text-right" width="20%">LINE TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <span class="text-inverse">{{ $booking->package_description }}</span><br>
                                    <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id sagittis arcu.</small>
                                </td>
                                <td class="text-center">{{ $booking->quantity }}</td>
                                <td class="text-center">{{ number_format($booking->weight, 0, '.', ',') }}</td>
                                <td class="text-center">{{ number_format($booking->length, 0, '.', ',') }}</td>
                                <td class="text-center">{{ number_format($booking->width, 0, '.', ',') }}</td>
                                <td class="text-center">{{ number_format($booking->height, 0, '.', ',') }}</td>
                                <td class="text-right">${{ $booking->quantity * $booking->weight }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row bg-light align-items-center m-0">
                    <div class="col col-auto p-4">
                        <p class="mb-0">SUBTOTAL</p>
                        <h4 class="mb-0">$4,500.00</h4>
                    </div>
                    <div class="col col-auto p-4">
                        <i class="bi bi-plus-lg text-muted"></i>
                    </div>
                    <div class="col col-auto me-auto p-4">
                        <p class="mb-0">PAYPAL FEE (5.4%)</p>
                        <h4 class="mb-0">$108.00</h4>
                    </div>
                    <div class="col bg-primary col-auto p-4">
                        <p class="mb-0 text-white">TOTAL</p>
                        <h4 class="mb-0 text-white">$4508.00</h4>
                    </div>
                </div><!--end row-->

                <hr>
                <!-- begin invoice-note -->
                <div class="my-3">
                    * Make all cheques payable to [Your Company Name]<br>
                    * Payment is due within 30 days<br>
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