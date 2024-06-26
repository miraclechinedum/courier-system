@extends('layouts.home') @section('content')

<!-- Banner -->
<section class="banner mask-overlay pad-120 white-clr">
    <div class="container theme-container rel-div">
        <img class="pt-10 effect animated fadeInLeft" alt="" src="build/assets/images/icons/icon-1.png" />
        <ul class="list-items fw-600 effect animated wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
            <li><a href="#">fast</a></li>
            <li><a href="#">secured</a></li>
            <li><a href="#">worldwide</a></li>
        </ul>
        <h2 class="section-title fs-48 effect animated wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
            Rapidroute <br />
            <span class="theme-clr"> courier </span> &
            <span class="theme-clr"> delivery </span> services
        </h2>
    </div>
    <div class="pad-50 visible-lg"></div>
</section>
<!-- /.Banner -->

<!-- Track Product -->
<section>
    <div class="theme-container container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 track-prod clrbg-before wow slideInUp" data-wow-offset="50" data-wow-delay=".20s">
                <h2 class="title-1">track your parcel</h2>
                <span class="font2-light fs-12">Now you can track your parcel easily</span>
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
    </div>
</section>
<!-- /.Track Product -->

<!-- About Us -->
<section id="about-wrap" class="pad-80 about-wrap clrbg-before">
    <span class="bg-text wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
        About
    </span>
    <div class="theme-container container">
        <div class="row">
            <div class="col-md-6">
                <div class="about-us">
                    <h2 class="section-title pb-10 wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                        About Us
                    </h2>
                    <p class="fs-16 wow fadeInUp" data-wow-offset="50" data-wow-delay=".25s">
                        At Rapidroute, we're dedicated to seamlessly connecting businesses and individuals with reliable courier and delivery services.
                        With our efficient logistics solutions and commitment to punctuality, we ensure your packages reach their destination swiftly and securely every time.
                    </p>
                    <ul class="feature">
                        <li>
                            <img alt="" src="build/assets/images/icons/icon-2.png" class="wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s" />
                            <div class="feature-content wow rotateInDownRight" data-wow-offset="50" data-wow-delay=".30s">
                                <h2 class="title-1">Fast delivery</h2>
                                <p>At Rapidroute, we guarantee swift delivery services tailored to meet your urgent needs, ensuring your packages
                                    reach their destination promptly and reliably.</p>
                            </div>
                        </li>
                        <li>
                            <img alt="" src="build/assets/images/icons/icon-3.png" class="wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s" />
                            <div class="feature-content wow rotateInDownRight" data-wow-offset="50" data-wow-delay=".30s">
                                <h2 class="title-1">secured service</h2>
                                <p>
                                    With Rapidroute, rest assured your shipments are handled with utmost care and security,
                                    providing peace of mind throughout the delivery process.
                                </p>
                            </div>
                        </li>
                        <li>
                            <img alt="" src="build/assets/images/icons/icon-4.png" class="wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s" />
                            <div class="feature-content wow rotateInDownRight" data-wow-offset="50" data-wow-delay=".30s">
                                <h2 class="title-1">worldwide shipping</h2>
                                <p>Rapidroute offers seamless worldwide shipping solutions,
                                    connecting businesses and individuals across the globe with efficient and reliable delivery services.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <div class="pb-80 visible-lg"></div>
                <img alt="" src="build/assets/images/block/about-img.png" class="wow slideInRight" data-wow-offset="50" data-wow-delay=".20s" />
            </div>
        </div>
    </div>
</section>
<!-- /.About Us -->

<!-- Calculate Your Cost -->
<!-- <section class="calculate pt-100">
    <div class="theme-container container">
        <span class="bg-text right wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
            calculate
        </span>
        <div class="row">
            <div class="col-md-6 text-center">
                <img src="build/assets/images/block/Courier-Man.png" alt="" class="wow slideInLeft" data-wow-offset="50" data-wow-delay=".20s" />
            </div>
            <div class="col-md-6">
                <div class="pad-10"></div>
                <h2 class="section-title pb-10 wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                    calculate your cost
                </h2>
                <p class="fs-16 wow fadeInUp" data-wow-offset="50" data-wow-delay=".25s">

                    To calculate your shipping costs, please provide details such as the origin and destination addresses, package dimensions, weight, and any special requirements.
                    Our system will then generate a precise quote tailored to your specific needs.
                </p>
                <div class="calculate-form">
                    <form class="row">
                        <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                            <div class="col-sm-3">
                                <label class="title-2"> height (cm): </label>
                            </div>
                            <div class="col-sm-9">
                                <input data-bind="in:value, f: float" data-name="height" type="text" placeholder="" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                            <div class="col-sm-3">
                                <label class="title-2"> width (cm): </label>
                            </div>
                            <div class="col-sm-9">
                                <input data-bind="in:value, f: float" data-name="width" type="text" placeholder="" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                            <div class="col-sm-3">
                                <label class="title-2"> depth (cm): </label>
                            </div>
                            <div class="col-sm-9">
                                <input data-bind="in:value, f: float" data-name="depth" type="text" placeholder="" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                            <div class="col-sm-3">
                                <label class="title-2"> weight (kg): </label>
                            </div>
                            <div class="col-sm-9">
                                <input data-bind="in:value, f: float" data-name="weight" type="text" placeholder="" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                            <div class="col-sm-3">
                                <label class="title-2"> location: </label>
                            </div>
                            <div class="col-sm-9">
                                <div class="col-sm-6 no-pad">
                                    <input type="text" data-bind="in:value" data-name="locations[from]" placeholder="From" class="form-control from fw-600" />
                                </div>
                                <div class="col-sm-6 no-pad">
                                    <input type="text" data-bind="in:value" data-name="locations[to]" placeholder="To" class="form-control to fw-600" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                            <div class="col-sm-3">
                                <label class="title-2"> Package: </label>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <select data-bind="in:value" data-name="package" class="selectpicker form-control" data-live-search="true" data-width="100%" data-toggle="tooltip" title="select your package">
                                        <option value="cost">
                                            Usual Delivery
                                        </option>
                                        <option value="cost + 25">
                                            Fastest Delivery: + $25
                                        </option>
                                        <option value="cost*0.9">
                                            Discount Delivery: -10%
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                            <div class="col-sm-9 col-xs-12 pull-right">
                                <div class="btn-1">
                                    <span> Total Cost: </span>
                                    <span data-bind="out:price, f:currency" data-name="cost" class="btn-1 dark">
                                        <span class="pr-sign">-&nbsp;</span>
                                        $<span class="pr-wrap" style="display: none"><span class="pr">0</span></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="pt-80 hidden-lg"></div>
            </div>
        </div>
    </div>
</section> -->
<!-- /.Calculate Your Cost -->

<!-- Steps -->
<section class="steps-wrap mask-overlay pad-80">
    <div class="theme-container container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="font-2 fs-50 wow fadeInLeft" data-wow-offset="50" data-wow-delay=".20s">
                    1.
                </div>
                <div class="steps-content wow fadeInLeft" data-wow-offset="50" data-wow-delay=".25s">
                    <h2 class="title-3">Order</h2>
                    <p class="gray-clr">
                        Submit your request effortlessly.
                    </p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="font-2 fs-50 wow fadeInLeft" data-wow-offset="50" data-wow-delay=".20s">
                    2.
                </div>
                <div class="steps-content wow fadeInLeft" data-wow-offset="50" data-wow-delay=".25s">
                    <h2 class="title-3">Wait</h2>
                    <p class="gray-clr">
                        Stay tuned for updates.
                    </p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="font-2 fs-50 wow fadeInLeft" data-wow-offset="50" data-wow-delay=".20s">
                    3.
                </div>
                <div class="steps-content wow fadeInLeft" data-wow-offset="50" data-wow-delay=".25s">
                    <h2 class="title-3">Deliver</h2>
                    <p class="gray-clr">
                        Receive your package promptly.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="step-img wow slideInRight" data-wow-offset="50" data-wow-delay=".20s">
        <img src="build/assets/images/block/step-img.png" alt="" />
    </div>
</section>
<!-- /.Steps -->


<!-- Product Delivery -->
<section class="prod-delivery pad-120">
    <div class="theme-container container">
        <div class="row">
            <div class="col-md-11 col-md-offset-1">
                <div class="pt-120 rel-div">
                    <div class="pb-50 hidden-xs"></div>
                    <h2 class="section-title wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                        Get the
                        <span class="theme-clr"> fastest </span>
                        product delivery
                    </h2>
                    <p class="fs-16 wow fadeInUp" data-wow-offset="50" data-wow-delay=".25s">
                        For the quickest product delivery, trust Rapidroute's efficient logistics solutions. <br />
                        Our commitment to punctuality ensures your items reach you <br /> swiftly,
                        providing a seamless shopping experience from order <br /> to doorstep.
                    </p>
                    <div class="pb-120 hidden-xs"></div>
                </div>
                <div class="delivery-img pt-10">
                    <img alt="" src="build/assets/images/block/delivery.png" class="wow slideInLeft" data-wow-offset="50" data-wow-delay=".20s" />
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.Product Delivery -->

<!-- Testimonial -->
<section class="testimonial mask-overlay">
    <div class="theme-container container">
        <div class="testimonial-slider no-pagination pad-120">
            <div class="item">
                <div class="testimonial-img darkclr-border theme-clr font-2 wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                    <img alt="" src="build/assets/images/block/testimonial-1.png" />
                    <span>,,</span>
                </div>
                <div class="testimonial-content">
                    <p class="wow fadeInUp" data-wow-offset="50" data-wow-delay=".25s">
                        <i class="gray-clr fs-16">
                            Duis autem vel eum iriure dolor in hendrerit in
                            vulputate velit esse molestie consequat, vel illum
                            dolore eu feugiat nulla
                            <br />
                            facilisis at vero eros et accumsan et iusto odio
                            dignissim qui blandit praesent luptatum zzril
                            delenit
                            <br />
                            augue duis dolore te feugait nulla facilisi.
                        </i>
                    </p>
                    <h2 class="title-2 pt-10 wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                        <a href="#" class="white-clr fw-900"> Bushra Ahsani </a>
                    </h2>
                </div>
            </div>
            <div class="item">
                <div class="testimonial-img darkclr-border theme-clr font-2">
                    <img alt="" src="build/assets/images/block/testimonial-1.png" />
                    <span>,,</span>
                </div>
                <div class="testimonial-content">
                    <p>
                        <i class="gray-clr fs-16">
                            Duis autem vel eum iriure dolor in hendrerit in
                            vulputate velit esse molestie consequat, vel illum
                            dolore eu feugiat nulla
                            <br />
                            facilisis at vero eros et accumsan et iusto odio
                            dignissim qui blandit praesent luptatum zzril
                            delenit
                            <br />
                            augue duis dolore te feugait nulla facilisi.
                        </i>
                    </p>
                    <h2 class="title-2 pt-10">
                        <a href="#" class="white-clr fw-900"> Bushra Ahsani </a>
                    </h2>
                </div>
            </div>
            <div class="item">
                <div class="testimonial-img darkclr-border theme-clr font-2">
                    <img alt="" src="build/assets/images/block/testimonial-1.png" />
                    <span>,,</span>
                </div>
                <div class="testimonial-content">
                    <p>
                        <i class="gray-clr fs-16">
                            Duis autem vel eum iriure dolor in hendrerit in
                            vulputate velit esse molestie consequat, vel illum
                            dolore eu feugiat nulla
                            <br />
                            facilisis at vero eros et accumsan et iusto odio
                            dignissim qui blandit praesent luptatum zzril
                            delenit
                            <br />
                            augue duis dolore te feugait nulla facilisi.
                        </i>
                    </p>
                    <h2 class="title-2 pt-10">
                        <a href="#" class="white-clr fw-900"> Bushra Ahsani </a>
                    </h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.Testimonial -->

<!-- Pricing & Plans -->
<!-- <section class="pricing-wrap pt-120">
    <div class="theme-container container">
        <span class="bg-text center wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
            Pricing
        </span>
        <div class="title-wrap text-center pb-50">
            <h2 class="section-title wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                Pricing & plans
            </h2>
            <p class="wow fadeInLeft" data-wow-offset="50" data-wow-delay=".25s">
                See our pricing & plans to get best service
            </p>
        </div>
        <div class="row">
            <div class="col-md-4 wow slideInUp" data-wow-offset="50" data-wow-delay=".20s">
                <div class="pricing-box clrbg-before clrbg-after transition">
                    <div class="title-wrap text-center">
                        <h2 class="section-title fs-36">$50</h2>
                        <p>for single product</p>
                        <div class="btn-1">basic</div>
                    </div>
                    <div class="price-content">
                        <ul class="title-2">
                            <li>
                                Product Weight:
                                <span class="gray-clr"> &LT; 3kg</span>
                            </li>
                            <li>
                                Country:
                                <span class="gray-clr"> all</span>
                            </li>
                            <li>
                                duration:
                                <span class="gray-clr">7-14 days</span>
                            </li>
                            <li>
                                support:
                                <span class="gray-clr">yes</span>
                            </li>
                        </ul>
                    </div>
                    <div class="order">
                        <a href="#" class="title-1 theme-clr">
                            <span class="transition"> order now </span>
                            <i class="arrow_right fs-26"></i>
                        </a>
                    </div>
                    <div class="pricing-hover clrbg-before clrbg-after transition"></div>
                </div>
            </div>
            <div class="col-md-4 active white-clr wow slideInUp" data-wow-offset="50" data-wow-delay=".25s">
                <div class="pricing-box theme-clr-bg">
                    <div class="title-wrap text-center">
                        <h2 class="section-title fs-36">$250</h2>
                        <p>for package product</p>
                        <div class="btn-1 dark">Premium</div>
                    </div>
                    <div class="price-content">
                        <ul class="title-2">
                            <li>
                                Product Weight:
                                <span class="white-clr">&LT; 3kg</span>
                            </li>
                            <li>
                                Country:
                                <span class="white-clr"> all</span>
                            </li>
                            <li>
                                duration:
                                <span class="white-clr">7-14 days</span>
                            </li>
                            <li>
                                support:
                                <span class="white-clr">yes</span>
                            </li>
                        </ul>
                    </div>
                    <div class="order">
                        <a href="#" class="title-1 white-clr">
                            <span class="transition"> order now </span>
                            <i class="arrow_right fs-26"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 wow slideInUp" data-wow-offset="50" data-wow-delay=".30s">
                <div class="pricing-box clrbg-before clrbg-after transition">
                    <div class="title-wrap text-center">
                        <h2 class="section-title fs-36">$150</h2>
                        <p>for multiple product</p>
                        <div class="btn-1">standard</div>
                    </div>
                    <div class="price-content">
                        <ul class="title-2">
                            <li>
                                Product Weight:
                                <span class="gray-clr">&LT; 3kg</span>
                            </li>
                            <li>
                                Country:
                                <span class="gray-clr"> all</span>
                            </li>
                            <li>
                                duration:
                                <span class="gray-clr">7-14 days</span>
                            </li>
                            <li>
                                support:
                                <span class="gray-clr">yes</span>
                            </li>
                        </ul>
                    </div>
                    <div class="order">
                        <a href="#" class="title-1 theme-clr">
                            <span class="transition"> order now </span>
                            <i class="arrow_right fs-26"></i>
                        </a>
                    </div>
                    <div class="pricing-hover clrbg-before clrbg-after transition"></div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- /.Pricing & Plans -->

<!-- Contact us -->
<section id="contact-wrap" class="contact-wrap pad-120">
    <span class="bg-text wow fadeInLeft" data-wow-offset="50" data-wow-delay=".20s">
        Contact
    </span>
    <div class="theme-container container">
        <div class="row">
            <div class="col-md-6 col-sm-8">
                <div class="title-wrap">
                    <h2 class="section-title wow fadeInLeft" data-wow-offset="50" data-wow-delay=".20s">
                        contact us
                    </h2>
                    <p class="wow fadeInLeft" data-wow-offset="50" data-wow-delay=".20s">
                        Get in touch with us easily
                    </p>
                </div>
                <ul class="contact-detail title-2">
                    <li class="wow slideInUp" data-wow-offset="50" data-wow-delay=".25s">
                        <span>Whatsapp Number:</span>
                        <p class="gray-clr">
                            +17377073368 <br />
                        </p>
                    </li>
                    <li class="wow slideInUp" data-wow-offset="50" data-wow-delay=".25s">
                        <span>Direct call Number:</span>
                        <p class="gray-clr">
                            +17377073339 <br />
                        </p>
                    </li>
                    <li class="wow slideInUp" data-wow-offset="50" data-wow-delay=".30s">
                        <span>Email address:</span>
                        <p class="gray-clr">
                            info@rapidrouteservices.com <br />
                            support@rapidrouteservices.com
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- /.Contact us -->

@endsection