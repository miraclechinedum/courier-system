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
        <!-- @if(auth()->id() == 1)
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
        @endif -->

        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-start gap-2">
                        <div>
                            @if(Auth::user() && Auth::user()->id == 1)
                            <p class="mb-0 fs-6">Number of Senders</p>
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
                            <p class="mb-0 fs-6">Number of Receivers</p>
                        </div>
                        <div class="ms-auto widget-icon-small text-white bg-gradient-purple">
                        </div>
                    </div>
                    <div class="d-flex align-items-center mt-3">
                        <div>
                            <h4 class="mb-0">{{ $totalReceivers }}</h4>
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
                            <p class="mb-0 fs-6">Total Registered Parcels</p>
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

        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-start gap-2">
                        <div>
                            <p class="mb-0 fs-6">Total Revenue</p>
                        </div>
                        <div class="ms-auto widget-icon-small text-white bg-gradient-success">
                        </div>
                    </div>
                    <div class="d-flex align-items-center mt-3">
                        <div>
                            <h4 class="mb-0">${{ number_format($totalRevenue, 0) }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->

    <div class="row">
        <div class="col-12 col-lg-12 col-xl-6 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <h6 class="mb-0">Users Weekly Update</h6>
                    </div>
                    <div class="row row-cols-1 row-cols-md-2 g-3 align-items-center">
                        <div class="col-lg-7 col-xl-7 col-xxl-7 order-2" style="position: relative;">
                            <!-- <div id="chart6" style="min-height: 253.7px;">
                                <div id="apexchartshjm90r4w" class="apexcharts-canvas apexchartshjm90r4w apexcharts-theme-light" style="width: 246px; height: 253.7px;"><svg id="SvgjsSvg3853" width="246" height="253.70000000000002" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                                        <g id="SvgjsG3855" class="apexcharts-inner apexcharts-graphical" transform="translate(-1.5, 0)">
                                            <defs id="SvgjsDefs3854">
                                                <clipPath id="gridRectMaskhjm90r4w">
                                                    <rect id="SvgjsRect3857" width="257" height="275" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                </clipPath>
                                                <clipPath id="gridRectMarkerMaskhjm90r4w">
                                                    <rect id="SvgjsRect3858" width="255" height="277" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                </clipPath>
                                                <linearGradient id="SvgjsLinearGradient3864" x1="0" y1="1" x2="1" y2="1">
                                                    <stop id="SvgjsStop3865" stop-opacity="1" stop-color="rgba(255,255,255,1)" offset="0"></stop>
                                                    <stop id="SvgjsStop3866" stop-opacity="1" stop-color="rgba(0,219,222,1)" offset="1"></stop>
                                                    <stop id="SvgjsStop3867" stop-opacity="1" stop-color="rgba(0,219,222,1)" offset="1"></stop>
                                                </linearGradient>
                                                <filter id="SvgjsFilter3869" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%">
                                                    <feFlood id="SvgjsFeFlood3870" flood-color="#000000" flood-opacity="0.12" result="SvgjsFeFlood3870Out" in="SourceGraphic"></feFlood>
                                                    <feComposite id="SvgjsFeComposite3871" in="SvgjsFeFlood3870Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite3871Out"></feComposite>
                                                    <feOffset id="SvgjsFeOffset3872" dx="0" dy="-3" result="SvgjsFeOffset3872Out" in="SvgjsFeComposite3871Out"></feOffset>
                                                    <feGaussianBlur id="SvgjsFeGaussianBlur3873" stdDeviation="4 " result="SvgjsFeGaussianBlur3873Out" in="SvgjsFeOffset3872Out"></feGaussianBlur>
                                                    <feMerge id="SvgjsFeMerge3874" result="SvgjsFeMerge3874Out" in="SourceGraphic">
                                                        <feMergeNode id="SvgjsFeMergeNode3875" in="SvgjsFeGaussianBlur3873Out"></feMergeNode>
                                                        <feMergeNode id="SvgjsFeMergeNode3876" in="[object Arguments]"></feMergeNode>
                                                    </feMerge>
                                                    <feBlend id="SvgjsFeBlend3877" in="SourceGraphic" in2="SvgjsFeMerge3874Out" mode="normal" result="SvgjsFeBlend3877Out"></feBlend>
                                                </filter>
                                                <filter id="SvgjsFilter3880" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%">
                                                    <feFlood id="SvgjsFeFlood3881" flood-color="#000000" flood-opacity="0.12" result="SvgjsFeFlood3881Out" in="SourceGraphic"></feFlood>
                                                    <feComposite id="SvgjsFeComposite3882" in="SvgjsFeFlood3881Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite3882Out"></feComposite>
                                                    <feOffset id="SvgjsFeOffset3883" dx="0" dy="3" result="SvgjsFeOffset3883Out" in="SvgjsFeComposite3882Out"></feOffset>
                                                    <feGaussianBlur id="SvgjsFeGaussianBlur3884" stdDeviation="4 " result="SvgjsFeGaussianBlur3884Out" in="SvgjsFeOffset3883Out"></feGaussianBlur>
                                                    <feMerge id="SvgjsFeMerge3885" result="SvgjsFeMerge3885Out" in="SourceGraphic">
                                                        <feMergeNode id="SvgjsFeMergeNode3886" in="SvgjsFeGaussianBlur3884Out"></feMergeNode>
                                                        <feMergeNode id="SvgjsFeMergeNode3887" in="[object Arguments]"></feMergeNode>
                                                    </feMerge>
                                                    <feBlend id="SvgjsFeBlend3888" in="SourceGraphic" in2="SvgjsFeMerge3885Out" mode="normal" result="SvgjsFeBlend3888Out"></feBlend>
                                                </filter>
                                                <linearGradient id="SvgjsLinearGradient3893" x1="0" y1="1" x2="1" y2="1">
                                                    <stop id="SvgjsStop3894" stop-opacity="1" stop-color="rgba(252,0,255,1)" offset="0"></stop>
                                                    <stop id="SvgjsStop3895" stop-opacity="1" stop-color="rgba(0,219,222,1)" offset="1"></stop>
                                                    <stop id="SvgjsStop3896" stop-opacity="1" stop-color="rgba(0,219,222,1)" offset="1"></stop>
                                                </linearGradient>
                                            </defs>
                                            <g id="SvgjsG3860" class="apexcharts-radialbar">
                                                <g id="SvgjsG3861">
                                                    <g id="SvgjsG3862" class="apexcharts-tracks">
                                                        <g id="SvgjsG3863" class="apexcharts-radialbar-track apexcharts-track" rel="1">
                                                            <path id="apexcharts-radialbarTrack-0" d="M 125.5 22.16036585365852 A 103.33963414634148 103.33963414634148 0 1 1 125.48196383145495 22.16036742761115" fill="none" fill-opacity="1" stroke="rgba(255,255,255,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="2.619878048780488" stroke-dasharray="0" class="apexcharts-radialbar-area" filter="url(#SvgjsFilter3869)" data:pathOrig="M 125.5 22.16036585365852 A 103.33963414634148 103.33963414634148 0 1 1 125.48196383145495 22.16036742761115"></path>
                                                        </g>
                                                    </g>
                                                    <g id="SvgjsG3878">
                                                        <g id="SvgjsG3892" class="apexcharts-series apexcharts-radial-series" seriesName="WeeklyxStatus" rel="1" data:realIndex="0">
                                                            <path id="SvgjsPath3897" d="M 125.5 22.16036585365852 A 103.33963414634148 103.33963414634148 0 1 1 31.84248486365223 169.17321655184668" fill="none" fill-opacity="0.85" stroke="url(#SvgjsLinearGradient3893)" stroke-opacity="1" stroke-linecap="butt" stroke-width="8.732926829268294" stroke-dasharray="4" class="apexcharts-radialbar-area apexcharts-radialbar-slice-0" data:angle="245" data:value="68" index="0" j="0" data:pathOrig="M 125.5 22.16036585365852 A 103.33963414634148 103.33963414634148 0 1 1 31.84248486365223 169.17321655184668"></path>
                                                        </g>
                                                        <circle id="SvgjsCircle3879" r="102.02969512195124" cx="125.5" cy="125.5" class="apexcharts-radialbar-hollow" fill="transparent" filter="url(#SvgjsFilter3880)"></circle>
                                                        <g id="SvgjsG3889" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)" style="opacity: 1;">
                                                            <text id="SvgjsText3890" font-family="Helvetica, Arial, sans-serif" x="125.5" y="105.5" text-anchor="middle" dominant-baseline="auto" font-size="15px" font-weight="400" fill="#000000" class="apexcharts-text apexcharts-datalabel-label" style="font-family: Helvetica, Arial, sans-serif;">WEEK</text>
                                                            <text id="SvgjsText3891" font-family="Helvetica, Arial, sans-serif" x="125.5" y="151.5" text-anchor="middle" dominant-baseline="auto" font-size="40px" font-weight="400" fill="#000000" class="apexcharts-text apexcharts-datalabel-value" style="font-family: Helvetica, Arial, sans-serif;">
                                                                @foreach($weeklySenders as $sender)
                                                                {{ $sender->week }}
                                                                @endforeach
                                                            </text>
                                                        </g>

                                                    </g>
                                                </g>
                                            </g>
                                            <line id="SvgjsLine3898" x1="0" y1="0" x2="251" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line>
                                            <line id="SvgjsLine3899" x1="0" y1="0" x2="251" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line>
                                        </g>
                                        <g id="SvgjsG3856" class="apexcharts-annotations"></g>
                                    </svg>
                                    <div class="apexcharts-legend"></div>
                                </div>
                            </div> -->
                            <div class="resize-triggers">
                                <div class="expand-trigger">
                                    <div style="width: 263px; height: 255px;"></div>
                                </div>
                                <div class="contract-trigger"></div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-xl-5 col-xxl-5">
                            <div class="">
                                <div class="mb-4">
                                    <h2 class="mb-0">{{ $totalUsers }}</h2>
                                    <p class="mb-0">Total Users</p>
                                </div>
                                @foreach($weeklySenders as $sender)
                                <div class="d-flex align-items-start gap-3 mb-3">
                                    <div class="widget-icon-small rounded bg-light-purple text-purple">

                                    </div>
                                    <div>
                                        <p class="mb-1">Senders</p>
                                        <p class="mb-0 h5">{{ $sender->count }}</p>
                                    </div>
                                </div>
                                @endforeach

                                @foreach($weeklyReceivers as $receiver)
                                <div class="d-flex align-items-start gap-3 mb-3">
                                    <div class="widget-icon-small rounded bg-light-purple text-info">
                                    </div>
                                    <div>
                                        <p class="mb-1">Receivers</p>
                                        <p class="mb-0 h5">{{ $receiver->count }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-12 col-xl-6 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <h6 class="mb-0">PARCELS STATUS OVERVIEW</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-borderless align-middle mb-0">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="country-icon">
                                            <img src="assets/images/icons/india.png" alt="" width="32">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="country-name h6 mb-0">Pending</div>
                                    </td>
                                    <td class="w-100">
                                        <div class="progress flex-grow-1" style="height: 5px">
                                            <div class="progress-bar bg-gradient-info" role="progressbar" style="width: 82%"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="percent-data">{{ $totalPendingBookings }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="country-icon">
                                            <img src="assets/images/icons/usa.png" alt="" width="32">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="country-name h6 mb-0">Processing</div>
                                    </td>
                                    <td class="w-100">
                                        <div class="progress flex-grow-1" style="height: 5px">
                                            <div class="progress-bar bg-gradient-purple" role="progressbar" style="width: 70%"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="percent-data">{{ $totalProcessingBookings }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="country-icon">
                                            <img src="assets/images/icons/china.png" alt="" width="32">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="country-name h6 mb-0">In Transit</div>
                                    </td>
                                    <td class="w-100">
                                        <div class="progress flex-grow-1" style="height: 5px">
                                            <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 60%"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="percent-data">{{ $totalInTransitBookings }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="country-icon">
                                            <img src="assets/images/icons/russia.png" alt="" width="32">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="country-name h6 mb-0">Arrived</div>
                                    </td>
                                    <td class="w-100">
                                        <div class="progress flex-grow-1" style="height: 5px">
                                            <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 45%"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="percent-data">{{ $totalArrivedBookings }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="country-icon">
                                            <img src="assets/images/icons/russia.png" alt="" width="32">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="country-name h6 mb-0">Cancelled</div>
                                    </td>
                                    <td class="w-100">
                                        <div class="progress flex-grow-1" style="height: 5px">
                                            <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 30%"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="percent-data">{{ $totalCancelledBookings }}</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="card radius-10 w-100">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h6 class="mb-0">Recent Registred Parcels</h6>
            </div>
            <div class="table-responsive mt-2">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Tracking ID</th>
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
                            <td>
                                @if($booking->status === "Pending")
                                <span class="badge bg-danger">{{ ucfirst($booking->status) }}</span>
                                @else
                                <span class="badge bg-success">{{ ucfirst($booking->status) }}</span>
                                @endif
                            </td>
                            <td>{{ $booking->created_at->format('M d, Y') }}</td>

                            <td>
                                <div class="d-flex align-items-center gap-3 fs-6">
                                    <a href="{{ route('invoice.show', $booking->id) }}" target="_blank" class="text-primary" style="font-size: 20px;" data-bs-toggle="tooltip" data-bs-placement="bottom" title="View Invoice" aria-label="Views">
                                        <ion-icon name="eye-outline"></ion-icon>
                                    </a>

                                    <!-- <a href="{{ route('bookings.edit', ['id' => $booking->id]) }}" style="font-size: 18px;">
                                        <i class="lni lni-pencil text-danger"></i>
                                    </a> -->

                                    <a href="{{ route('bookings.edit', ['id' => $booking->id]) }}" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit" aria-label="Edit">
                                        <ion-icon name="pencil-outline" role="img" class="md hydrated" aria-label="pencil outline"></ion-icon>
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