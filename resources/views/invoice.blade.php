<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- BOOTSTRAP CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="index.css" />
    <title>Receipt</title>
</head>

<style>
    * {
        margin: 0;
    }

    .row {
        margin: 0;
        width: 90%;
        margin: auto;
    }

    .left {
        border: 1px solid black;
        padding-bottom: 30px !important;
    }

    .right {
        border: 1px solid black;
    }

    .company-info {
        border: 1px solid black;
        font-weight: bold;
        text-align: center;
        padding-top: 10px;
        padding-bottom: 25px;
    }

    .company-info .site-details h5 {
        margin: 0;
        font-weight: bolder;
        color: #b31217;
    }

    .company-info .site-info span {
        display: flex;
        align-items: center;
        justify-content: center;

    }

    .company-info .site-info span h6 {
        margin: 0;
        font-weight: bold;
    }

    .barcode-con {
        display: flex;
        justify-content: center;
        align-items: center;
        border: 1px solid black;
    }

    .barcode {
        text-align: center;
    }

    table {
        margin: 0 !important;
    }

    .customers-details .sender .title {
        background-color: #09183A;
        padding: 10px;
    }

    .customers-details .sender .title h5 {
        color: #fff;
        font-size: 17px;
    }

    .customers-details .sender table td {
        padding: 0;
        padding-left: 10px;
    }

    .right .logo {
        height: 156px;
        border: 1px solid black;
    }

    .right .logo img {
        height: 100%;
        width: 100%;
    }

    .parcel-details-con,
    .parcel-details-con .details table {
        background-color: #f0f0f0;
    }

    .parcel-details-con .details .title {
        color: #fff;
        padding: 15px 5px;
        text-transform: uppercase;
        background-color: #09183A;
    }

    .parcel-details-con .details .title h4 {
        font-size: 18px;
    }

    .parcel-details-con .details .top-table th,
    .parcel-details-con .details .top-table td {
        padding: 20px;
        /* text-align: center; */
        border: 1px solid black;
        background-color: #f0f0f0;
    }

    .parcel-details-con .details table td {
        border: 1px solid black;
        background-color: #f0f0f0;
    }


    .package table {
        border-color: #09183A;
    }

    .partners-details {
        background-color: #f0f0f0;
        padding: 20px 10px;
    }

    .partners-details .title h5 {
        text-transform: uppercase;
        text-decoration: underline;
        font-weight: bold;
    }

    .img-con {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .img-con .img {
        width: 250px;
        margin-right: 5px;
    }

    .img-con .img img {
        width: 100%;
    }

    .payment-con {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px 10px;
    }

    .payment-con .img {
        width: 150px;
    }

    .payment-con .img img {
        width: 100%;
    }
</style>

<body class="row">
    <!-- Left part (wider) -->
    <div class="col-md-8 p-0 left">
        <div class="d-flex">
            <div class="w-75 me-1 company-info">
                <div class="site-details">
                    <h5>RAPIDROUTE COURIER COMPANY</h5>
                    <span>301 N Lake Ave., Suite 600, Pasadena,<br />
                         CA 91101, United States</span>
                </div>
                <div class="site-info">
                    <span>
                        <h6>Website:</h6>
                        <a href="https://www.rapidrouteservices.com/">https://www.rapidrouteservices.com/</a>
                    </span>
                    <span>
                        <h6>Email:</h6>
                        <a href="">info@rapidrouteservices.com</a>
                    </span>
                </div>
            </div>
            <div class="w-25 barcode-con">
                <div class="barcode">
                    <h5 style="font-size: 15px; margin: 0">Tracking ID</h5>
                    <h6 style="font-weight: bold">
                        {{ $booking->tracking_id }}
                    </h6>
                </div>
            </div>
        </div>

        <div class="empty" style="height: 100px">&nbsp;</div>

        <div class="customers-details">
            <div class="sender">
                <div class="title">
                    <h5>1. FROM</h5>
                </div>
                <div class="table-responsive">
                    @if($booking->sender)
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Sender's Name</td>
                                <td>{{ $booking->sender->name }}</td>
                            </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td>
                                    {{ $booking->sender->phone_number }}
                                </td>
                            </tr>
                            @if($booking->senderAddress)
                            <tr>
                                <td>Address</td>
                                <td>
                                    {{ $booking->senderAddress->address }},
                                    {{
                                        $booking->senderAddress->city->city_name
                                        }}, {{
                                        $booking->senderAddress->state->state_name
                                        }}, {{ $booking->senderAddress->zip_code
                                        }}
                                </td>
                            </tr>
                            @endif
                            <tr>
                                <td>Country</td>
                                <td>
                                    {{
                                        $booking->senderAddress->country->country_name
                                        }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>

            <div class="sender">
                <div class="title">
                    <h5>2. TO</h5>
                </div>
                <div class="table-responsive">
                    @if($booking->recipientClientAddress)
                    @php
                    $recipientAddress = App\Models\UserAddress::find($booking->recipientClientAddress)->first();
                    @endphp
                    @if($recipientAddress)
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Receiver's Name</td>
                                <td>{{ $recipientAddress->user->name }}</td>
                            </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td>{{ $recipientAddress->user->phone_number }}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>{{ $recipientAddress->address }}, {{ $recipientAddress->city->city_name }},
                                    {{ $recipientAddress->state->state_name }}, {{ $recipientAddress->zip_code }}
                                </td>
                            </tr>
                            <tr>
                                <td>Country</td>
                                <td>{{ $recipientAddress->country->country_name }}</td>
                            </tr>
                        </tbody>
                    </table>
                    @endif
                    @endif
                </div>
            </div>

            <div class="sender package">
                <div class="title">
                    <h5>3. PACKAGES</h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Package</th>
                                <th class="text-center" width="10%">Qty</th>
                                <th class="text-center" width="10%">
                                    Weight
                                </th>
                                <th class="text-center" width="10%">
                                    Length
                                </th>
                                <th class="text-center" width="10%">
                                    Width
                                </th>
                                <th class="text-center" width="10%">
                                    Height
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($booking->packages as $index=> $package)
                            <tr>
                                <td class="ps-2">{{ $index + 1}}</td>
                                <td class="ps-2">
                                    <span class="text-inverse">{{ $package->package_description }} pieces</span><br />
                                </td>
                                <td class="text-center">{{ $package->quantity }} pieces</td>
                                <td class="text-center">{{ number_format($package->weight, 0, '.', ',') }} kg</td>
                                <td class="text-center">{{ number_format($package->length, 0, '.', ',') }} cm</td>
                                <td class="text-center">{{ number_format($package->width, 0, '.', ',') }} cm</td>
                                <td class="text-center">{{ number_format($package->height, 0, '.', ',') }} cm</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="partners-details">
            <div class="title">
                <h5>Our Courier Partners:</h5>
            </div>
            <div class="img-con">
                <div class="img">
                    <img src="{{ asset('./build/assets/images/icons/dhl-logo.png') }}" />
                </div>
                <div class="img">
                    <img src="{{ asset('./build/assets/images/icons/fedex-logo.png') }}" />
                </div>
                <div class="img">
                    <img src="{{ asset('./build/assets/images/icons/citylink-logo.png') }}" />
                </div>
                <div class="img">
                    <img src="{{ asset('./build/assets/images/icons/ceva-logo.png') }}" />
                </div>
                <div class="img" style="width: 180px;">
                    <img src="{{ asset('./build/assets/images/icons/ups-logo.png') }}" />
                </div>
            </div>
        </div>
    </div>
    <!-- Right part -->
    <div class="col-md-4 p-0 right">
        <div class="logo">
            <img src="{{ asset('./build/assets/images/logo/rapidroute-logo.png') }}" />
        </div>
        <div class="parcel-details-con">
            <div class="details">
                <div class="con">
                    <div class="table-responsive">
                        <table class="table top-table">
                            <thead>
                                <tr>
                                    <th>DESCRIPTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        {{ $booking->description }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="details">
                <div class="title">
                    <div class="title" style="display: flex; align-items: center">
                        <h4 style="margin-bottom: 0; margin-right: 10px;">AMOUNT:</h4>
                        <span>${{ $booking->amount }}</span>
                    </div>
                </div>
                <div class="con">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Payment Method</td>
                                    <td>
                                        {{ $booking->payment_method }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Package size:</td>
                                    <td>{{ $booking->packaging_type }}</td>
                                </tr>
                                <tr>
                                    <td>Status:</td>
                                    <td>{{ $booking->status }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="payment-con">
                <div class="img">
                    <img src="{{ asset('./build/assets/images/icons/visa-logo.png') }}" />
                </div>
                <div class="img">
                    <img src="{{ asset('./build/assets/images/icons/mastercard-logo.png') }}" />
                </div>
                <div class="img">
                    <img src="{{ asset('./build/assets/images/icons/american-express-logo.png') }}" />
                </div>
                <div class="img">
                    <img src="{{ asset('./build/assets/images/icons/paypal-logo.png') }}" />
                </div>
            </div>

            <div class="details">
                <div class="title" style="display: flex; align-items: center">
                    <h4 style="margin-bottom: 0; margin-right: 10px;">Tracking ID:</h4>
                    <span>{{ $booking->tracking_id }}</span>
                </div>
                <div class="con">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>PACKAGED BY</td>
                                    <td>
                                        {{ $booking->courier_company }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>DATE SENT OUT:</td>
                                    <td>{{ date('jS M, Y', strtotime($booking->created_at)) }}</td>
                                </tr>
                                <tr>
                                    <td>DELIVERY DATE</td>
                                    <td>{{ date('jS M, Y', strtotime($booking->service_mode)) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between my-4 p-2">
            <button class="btn btn-primary" onclick="window.print()">
                Print Receipt
            </button>
        </div>
    </div>

    <!-- JavaScript to share receipt via email -->
    <script>
        const shareReceiptBtn = document.getElementById('shareReceiptBtn');

        shareReceiptBtn.addEventListener('click', async () => {
            try {
                // Fetch CSRF token from the page
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                // Fetch HTML content of the receipt page
                const response = await fetch(window.location.href, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'text/html',
                        'X-CSRF-TOKEN': csrfToken // Include CSRF token in the headers
                    }
                });
                const htmlContent = await response.text();

                // Send HTML content to server to generate PDF
                const pdfResponse = await fetch('/generate-pdf', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken // Include CSRF token in the headers
                    },
                    body: JSON.stringify({
                        htmlContent
                    })
                });
                const pdfBlob = await pdfResponse.blob();

                // Prepare email data
                const formData = new FormData();
                formData.append('pdf', pdfBlob, 'receipt.pdf');
                formData.append('_token', csrfToken); // Include CSRF token in the form data

                // Send email with PDF attachment
                await fetch('/send-email', {
                    method: 'POST',
                    body: formData
                });

                console.log('Receipt shared successfully');
            } catch (error) {
                console.error('Error sharing receipt:', error);
            }
        });
    </script>


</body>

</html>