@extends('layouts.home')

@section('content')

<!-- Breadcrumb -->
<section class="theme-breadcrumb pad-50">
    <div class="theme-container container ">
        <div class="row">
            <div class="col-sm-8 pull-left">
                <div class="title-wrap">
                    <h2 class="section-title no-margin"> parcel tracking </h2>
                    <p class="fs-16 no-margin"> Track your parcel & see the current status </p>
                </div>
            </div>
            <div class="col-sm-4">
                <ol class="breadcrumb-menubar list-inline">
                    <li><a href="#" class="gray-clr">Home</a></li>
                    <li class="active">Track</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- /.Breadcrumb -->

<!-- Tracking -->
<section class="pt-50 pb-120 tracking-wrap">
    <div class="theme-container container ">
        <div class="row pad-10">
            <div class="col-md-8 col-md-offset-2 tracking-form wow fadeInUp" data-wow-offset="50" data-wow-delay=".30s">
                <h2 class="title-1"> track your parcel </h2> <span class="font2-light fs-12">Now you can track your parcel easily</span>
                <div class="row">
                    <form method="POST" action="{{ route('track.track') }}">
                        @csrf
                        <div class="col-md-7 col-sm-7">
                            <div class="form-group">
                                <input type="text" name="product_id" placeholder="Enter your product ID" required="" class="form-control box-shadow">
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-5">
                            <div class="form-group">
                                <button type="submit" class="btn-1">Track Your Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 pad-30 wow fadeInLeft" data-wow-offset="50" data-wow-delay=".30s">
                <div class="prod-info white-clr">
                    <ul>
                        <li> <span class="title-2">Tracking ID:</span> <span class="fs-16">{{ $booking->tracking_id }}</span> </li>
                        <li> <span class="title-2">parcel type:</span> <span class="fs-16">{{ $booking->packaging_type }}</span> </li>
                        <li> <span class="title-2">Delivery In:</span> <span class="fs-16">{{ $booking->service_mode }}</span> </li>
                        <li> <span class="title-2">parcel status:</span> <span class="fs-16 theme-clr">{{ $booking->status }}</span> </li>
                        <li> <span class="title-2">date registered:</span> <span class="fs-16">{{ $booking->created_at->format('jS M, Y') }}</span> </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-7 pad-30 wow fadeInRight" data-wow-offset="50" data-wow-delay=".30s">
                <div class="row" style="color: #000;">
                    <div class="col-md-12">
                        <h3 style="text-decoration: underline;">Package Information</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Package</th>
                                    <th>Quantity</th>
                                    <th>Weight</th>
                                    <th>Length</th>
                                    <th>Width</th>
                                    <th>Height</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($booking->packages as $index => $package)
                                <tr>
                                    <td>{{ $index + 1}}</td>
                                    <td>{{ $package->package_description }}</td>
                                    <td>{{ number_format($package->weight, 0) }} KG</td>
                                    <td>{{ number_format($package->length) }} CM</td>
                                    <td>{{ number_format($package->width) }} CM</td>
                                    <td>{{ number_format($package->height) }} CM</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="progress-wrap">
            <div class="progress-status">
                <span class="border-left"></span>
                <span class="border-right"></span>
                <span class="dot dot-left wow fadeIn" data-wow-offset="50" data-wow-delay=".40s"></span>
                <span class="themeclr-border wow fadeIn" data-wow-offset="50" data-wow-delay=".50s"> <span class="dot dot-center theme-clr-bg"></span> </span>
                <span class="dot dot-right wow fadeIn" data-wow-offset="50" data-wow-delay=".60s"></span>
            </div>
            <div class="row progress-content upper-text">
                <div class="col-md-3 col-xs-8 col-sm-2">
                    <p class="fs-12 no-margin"> FROM </p>
                    <h2 class="title-1 no-margin">London</h2>
                </div>
                <div class="col-md-2 col-xs-8 col-sm-3">
                    <p class="fs-12 no-margin"> [ <b class="black-clr">6 DAYS </b> ] </p>
                </div>
                <div class="col-md-4 col-xs-8 col-sm-4 text-center">
                    <p class="fs-12 no-margin"> currently in </p>
                    <h2 class="title-1 no-margin">singapore</h2>
                </div>
                <div class="col-md-1 col-xs-8 col-sm-1 no-pad">
                    <p class="fs-12 no-margin"> [ <b class="black-clr">2 DAYS </b> ] </p>
                </div>
                <div class="col-md-2 col-xs-8 col-sm-2 text-right">
                    <p class="fs-12 no-margin"> to </p>
                    <h2 class="title-1 no-margin">dhaka</h2>
                </div>
            </div>
        </div> -->

        <!-- <div class="row">
            <div class="col-md-12">
                <h3>Package Information</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Package Description</th>
                            <th>Quantity</th>
                            <th>Weight</th>
                            <th>Dimensions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($booking->packages as $package)
                        <tr>
                            <td>{{ $package->package_description }}</td>
                            <td>{{ $package->quantity }}</td>
                            <td>{{ $package->weight }} KG</td>
                            <td>{{ $package->length }} x {{ $package->width }} x {{ $package->height }} (L x W x H)</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> -->
    </div>
</section>
<!-- /.Tracking -->

@endsection