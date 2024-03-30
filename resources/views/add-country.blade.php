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
                        submit booking
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->


    <div class="container-fluid mb-4">

        <div class="row">
            <!-- Column -->

            <div class="col-lg-12 col-xl-12 col-md-12">

                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('countries.store') }}" method="post" class="form-horizontal form-material" id="save_data">
                            @csrf
                            <header class="mb-4">
                                <span>Add country</span>
                            </header>
                            <section>
                                <div class="row mb-4">
                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <label class="mb-2" for="firstName1">Country name</label>
                                            <input type="text" class="form-control" name="country_name" id="country_name" placeholder="Country name">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <label class="mb-2" for="firstName1">Phone code</label>
                                            <input type="text" class="form-control" name="phone_code" id="phone_code" placeholder="Phone code">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="mb-2" for="firstName1">Currency</label>
                                            <input type="text" class="form-control" name="currency" id="currency" placeholder="Currency">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="mb-2" for="firstName1">Currency symbol</label>
                                            <input type="text" class="form-control" name="currency_symbol" id="currency_symbol" placeholder="Currency symbol">
                                        </div>
                                    </div>
                                </div>




                            </section>
                            <br><br>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-outline-primary btn-confirmation" name="dosubmit" type="submit">Save country</button>
                                    <a href="countries_list.php" class="btn btn-outline-secondary btn-confirmation"><span><i class="ti-share-alt"></i></span> Back to list</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
    </div>

</div>

<!-- End page content -->
@endsection