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

    <div class="container">
        <div class="row justify-content-center">
            <div class="row justify-content-between col-12 p-0">
                <div class="col-md-6 pe-2"> <!-- Add pe-2 for right margin -->
                    <div class="card mt-4" style="padding: 20px;">
                        <div class="d-flex justify-content-between" style="padding-bottom: 20px;">
                            <div class="col-md-6">
                                <h5>Shipping Prefix</h5>
                                <input class="form-control" type="text" disabled />
                            </div>

                            <div>
                                <h5>Number (tracking)</h5>
                                <input class="form-control" type="text" disabled />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 ps-2"> <!-- Add ps-2 for left margin -->
                    <div class="card mt-4" style="padding: 20px;">
                        <div class="d-flex justify-content-between" style="padding-bottom: 20px;">
                            <div class="col-md-6">
                                <h5>List of Agencies</h5>
                                <input class="form-control" type="text" disabled />
                            </div>

                            <div>
                                <h5>Office of origin</h5>
                                <input class="form-control" type="text" disabled />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sender & Recipient -->
            <div class="row justify-content-between col-12 p-0">
                <div class="col-md-6 pe-2">
                    <div class="card mt-4">
                        <div class="card-head-con p-2">
                            <h4>Sender Information</h4>
                        </div>
                        <div class="p-4">
                            <div class="mb-3">
                                <h5>Sender/Customer</h5>
                                <select class="form-select" aria-label="Disabled select example" disabled="">
                                    <option selected="">Open this select menu</option>
                                </select>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <div style="width: 77%;">
                                    <h5>Sender/Customer Address</h5>
                                    <select class="form-select" id="single-select-field" data-placeholder="Choose one thing">
                                        <option></option>
                                    </select>
                                </div>

                                <button type="button" class="btn btn-primary rounded-percent p-2 mt-4" data-bs-toggle="modal" data-bs-target="#exampleLargeModal">
                                    <i class="fadeIn animated bx bx-plus text-white"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Add sender address</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" method="post" id="add_address_users_from_modal_shipments" name="add_address_users_from_modal_shipments">
                                                    <div class="resultados_ajax_mail text-center"></div>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Country</label>
                                                                <select style="width: 100% !important;" class="select2 form-control select2-hidden-accessible" name="country_modal_user_address" id="country_modal_user_address" data-select2-id="country_modal_user_address" tabindex="-1" aria-hidden="true">
                                                                </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="7" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-country_modal_user_address-container"><span class="select2-selection__rendered" id="select2-country_modal_user_address-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">Search Country</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="">Status</label>
                                                                <select style="width: 100% !important;" disabled="" class="select2 form-control select2-hidden-accessible" id="state_modal_user_address" name="state_modal_user_address" data-select2-id="state_modal_user_address" tabindex="-1" aria-hidden="true">
                                                                </select><span class="select2 select2-container select2-container--default select2-container--disabled" dir="ltr" data-select2-id="8" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-labelledby="select2-state_modal_user_address-container"><span class="select2-selection__rendered" id="select2-state_modal_user_address-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">Search State</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="">City</label>
                                                                <select style="width: 100% !important;" disabled="" class="select2 form-control select2-hidden-accessible" id="city_modal_user_address" name="city_modal_user_address" data-select2-id="city_modal_user_address" tabindex="-1" aria-hidden="true">
                                                                </select><span class="select2 select2-container select2-container--default select2-container--disabled" dir="ltr" data-select2-id="9" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-labelledby="select2-city_modal_user_address-container"><span class="select2-selection__rendered" id="select2-city_modal_user_address-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">Search City</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4 mt-2">
                                                            <div class="form-group">
                                                                <label for="phoneNumber1">Zip Code</label>
                                                                <input type="text" class="form-control" name="postal_modal_user_address" id="postal_modal_user_address" placeholder="Zip Code">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4 mt-2">
                                                            <div class="form-group">
                                                                <label for="phoneNumber1">Address</label>
                                                                <input type="text" class="form-control" name="address_modal_user_address" id="address_modal_user_address" placeholder="Address">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 pe-2">
                    <div class="card mt-4">
                        <div class="card-head-con p-2">
                            <h4>Recipient Information</h4>
                        </div>
                        <div class="p-4">
                            <div class="mb-3">
                                <h5>Recipient/Client</h5>
                                <select class="form-select" aria-label="Disabled select example" disabled="">
                                    <option selected="">Open this select menu</option>
                                </select>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <div style="width: 77%;">
                                    <h5>Sender/Customer Address</h5>
                                    <select class="form-select" id="single-select-field" data-placeholder="Choose one thing">
                                        <option></option>
                                    </select>
                                </div>

                                <button type="button" class="btn btn-primary rounded-percent p-2 mt-4" data-bs-toggle="modal" data-bs-target="#exampleLargeModal">
                                    <i class="fadeIn animated bx bx-plus text-white"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Add sender address</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" method="post" id="add_address_users_from_modal_shipments" name="add_address_users_from_modal_shipments">
                                                    <div class="resultados_ajax_mail text-center"></div>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Country</label>
                                                                <select style="width: 100% !important;" class="select2 form-control select2-hidden-accessible" name="country_modal_user_address" id="country_modal_user_address" data-select2-id="country_modal_user_address" tabindex="-1" aria-hidden="true">
                                                                </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="7" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-country_modal_user_address-container"><span class="select2-selection__rendered" id="select2-country_modal_user_address-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">Search Country</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="">Status</label>
                                                                <select style="width: 100% !important;" disabled="" class="select2 form-control select2-hidden-accessible" id="state_modal_user_address" name="state_modal_user_address" data-select2-id="state_modal_user_address" tabindex="-1" aria-hidden="true">
                                                                </select><span class="select2 select2-container select2-container--default select2-container--disabled" dir="ltr" data-select2-id="8" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-labelledby="select2-state_modal_user_address-container"><span class="select2-selection__rendered" id="select2-state_modal_user_address-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">Search State</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="">City</label>
                                                                <select style="width: 100% !important;" disabled="" class="select2 form-control select2-hidden-accessible" id="city_modal_user_address" name="city_modal_user_address" data-select2-id="city_modal_user_address" tabindex="-1" aria-hidden="true">
                                                                </select><span class="select2 select2-container select2-container--default select2-container--disabled" dir="ltr" data-select2-id="9" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-labelledby="select2-city_modal_user_address-container"><span class="select2-selection__rendered" id="select2-city_modal_user_address-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">Search City</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4 mt-2">
                                                            <div class="form-group">
                                                                <label for="phoneNumber1">Zip Code</label>
                                                                <input type="text" class="form-control" name="postal_modal_user_address" id="postal_modal_user_address" placeholder="Zip Code">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4 mt-2">
                                                            <div class="form-group">
                                                                <label for="phoneNumber1">Address</label>
                                                                <input type="text" class="form-control" name="address_modal_user_address" id="address_modal_user_address" placeholder="Address">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Shipping Information -->
            <div class="row">
                <div class="pe-2">
                    <div class="card mt-4">
                        <div class="card-head-con p-2">
                            <h4>Sender Information</h4>
                        </div>
                        <div class="p-4">
                            <form class="form-horizontal" method="post" id="add_address_users_from_modal_shipments" name="add_address_users_from_modal_shipments">
                                <div class="resultados_ajax_mail text-center"></div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Service Mode</label>
                                            <select style="width: 100% !important;" class="select2 form-control select2-hidden-accessible" name="country_modal_user_address" id="country_modal_user_address" data-select2-id="country_modal_user_address" tabindex="-1" aria-hidden="true">
                                            </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="7" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-country_modal_user_address-container"><span class="select2-selection__rendered" id="select2-country_modal_user_address-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">Search Country</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="">Courier company</label>
                                            <select style="width: 100% !important;" disabled="" class="select2 form-control select2-hidden-accessible" id="state_modal_user_address" name="state_modal_user_address" data-select2-id="state_modal_user_address" tabindex="-1" aria-hidden="true">
                                            </select><span class="select2 select2-container select2-container--default select2-container--disabled" dir="ltr" data-select2-id="8" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-labelledby="select2-state_modal_user_address-container"><span class="select2-selection__rendered" id="select2-state_modal_user_address-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">Search State</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="">Type of packaging</label>
                                            <select style="width: 100% !important;" disabled="" class="select2 form-control select2-hidden-accessible" id="city_modal_user_address" name="city_modal_user_address" data-select2-id="city_modal_user_address" tabindex="-1" aria-hidden="true">
                                            </select><span class="select2 select2-container select2-container--default select2-container--disabled" dir="ltr" data-select2-id="9" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-labelledby="select2-city_modal_user_address-container"><span class="select2-selection__rendered" id="select2-city_modal_user_address-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">Search City</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-4">
                                        <div class="form-group">
                                            <label>Shipping mode</label>
                                            <select style="width: 100% !important;" class="select2 form-control select2-hidden-accessible" name="country_modal_user_address" id="country_modal_user_address" data-select2-id="country_modal_user_address" tabindex="-1" aria-hidden="true">
                                            </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="7" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-country_modal_user_address-container"><span class="select2-selection__rendered" id="select2-country_modal_user_address-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">Search Country</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-4">
                                        <div class="form-group">
                                            <label class="">Payment method</label>
                                            <select style="width: 100% !important;" disabled="" class="select2 form-control select2-hidden-accessible" id="state_modal_user_address" name="state_modal_user_address" data-select2-id="state_modal_user_address" tabindex="-1" aria-hidden="true">
                                            </select><span class="select2 select2-container select2-container--default select2-container--disabled" dir="ltr" data-select2-id="8" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-labelledby="select2-state_modal_user_address-container"><span class="select2-selection__rendered" id="select2-state_modal_user_address-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">Search State</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-4">
                                        <div class="form-group">
                                            <label class="">Payment Methods</label>
                                            <select style="width: 100% !important;" disabled="" class="select2 form-control select2-hidden-accessible" id="city_modal_user_address" name="city_modal_user_address" data-select2-id="city_modal_user_address" tabindex="-1" aria-hidden="true">
                                            </select><span class="select2 select2-container select2-container--default select2-container--disabled" dir="ltr" data-select2-id="9" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-labelledby="select2-city_modal_user_address-container"><span class="select2-selection__rendered" id="select2-city_modal_user_address-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">Search City</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <div>
                                            <label class="control-label" id="selectItem"> Attach File</label>
                                        </div>

                                        <input class="custom-file-input" id="filesMultiple" name="filesMultiple[]" multiple="multiple" type="file" style="display: none;" onchange="cdp_validateZiseFiles(); cdp_preview_images();">
                                        <button type="button" id="openMultiFile" class="btn btn-default  pull-left  mb-4"> <i class="fa fa-paperclip" id="openMultiFile" style="font-size:18px; cursor:pointer;"></i> Upload files </button>
                                    </div>
                                </div>

                                <div class="col-md-12 row" id="image_preview"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Package Information -->
            <!-- <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <h4 class="card-title">
                                        <i class="fas fas fa-boxes" style="color:#36bea6"></i>
                                        Package Information
                                    </h4>
                                </div>
                                <div class="col-md-2">
                                    <div align="">
                                        <button type="button" onclick="addPackage()" name="add_rows" id="add_rows" class="btn btn-success mb-2"><span class="fa fa-plus"></span> Add Box or Packages</button>
                                    </div>
                                </div>
                            </div>

                            <div id="data_items">
                                <div class="card-hover" id="row_id_0">
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6 col-lg-1">
                                            <div class="form-group"><label for="emailAddress1"> Amount</label>
                                                <div class="input-group"><input type="text" onchange="changePackage(this)" value="1" onkeypress="return isNumberKey(event, this)" name="qty" id="qty_0" class="form-control input-sm" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Amount"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-3">
                                            <div class="form-group"><label for="emailAddress1"> Package Description</label>
                                                <div class="input-group"><input type="text" onchange="changePackage(this)" value="" name="description" id="description_0" class="form-control input-sm" data-toggle="tooltip" data-placement="bottom" placeholder=" Package Description" data-original-title="" title=""></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-1">
                                            <div class="form-group"><label for="emailAddress1"> Weight</label>
                                                <div class="input-group"><input type="text" onchange="changePackage(this)" value="0" onkeypress="return isNumberKey(event, this)" name="weight" id="weight_0" class="form-control input-sm" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Weight"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-1">
                                            <div class="form-group"><label for="emailAddress1"> Length</label>
                                                <div class="input-group"><input type="text" onchange="changePackage(this)" value="0" onkeypress="return isNumberKey(event, this)" name="length" id="length_0" class="form-control input-sm text_only" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Length"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-1">
                                            <div class="form-group"><label for="emailAddress1"> Width</label>
                                                <div class="input-group"><input type="text" onchange="changePackage(this)" value="0" onkeypress="return isNumberKey(event, this)" name="width" id="width_0" class="form-control input-sm text_only" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Width"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-1">
                                            <div class="form-group"><label for="emailAddress1"> Height</label>
                                                <div class="input-group"><input type="text" onchange="changePackage(this)" value="0" onkeypress="return isNumberKey(event, this)" name="height" id="height_0" class="form-control input-sm number_only" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Height"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-1">
                                            <div class="form-group"><label for="emailAddress1"> Weight Vol.</label>
                                                <div class="input-group"><input type="text" readonly="" value="0" onkeypress="return isNumberKey(event, this)" name="weightVol" id="weightVol_0" class="form-control input-sm number_only" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Weight Vol."></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-1">
                                            <div class="form-group"><label for="emailAddress1"> Fixed charge</label>
                                                <div class="input-group"><input type="text" onchange="changePackage(this)" value="0" onkeypress="return isNumberKey(event, this)" name="fixed_value" id="fixedValue_0" class="form-control input-sm number_only" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Fixed charge"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-1">
                                            <div class="form-group"><label for="emailAddress1"> DecValue</label>
                                                <div class="input-group"><input type="text" onchange="changePackage(this)" value="0" onkeypress="return isNumberKey(event, this)" name="declared_value" id="declaredValue_0" class="form-control input-sm number_only" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="DecValue"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <span class="text-secondary text-left">TOTALS</span>
                                </div>
                                <div class="col-md-1">
                                    <span class="text-secondary text-center" id="total_weight">0.00</span>
                                </div>
                                <div class="col-md-1 offset-3">
                                    <span class="text-secondary text-center" id="total_vol_weight">0.00</span>
                                </div>
                                <div class="col-md-1">
                                    <span class="text-secondary text-center" id="total_fixed">0.00</span>
                                </div>
                                <div class="col-md-1">
                                    <span class="text-secondary text-center" id="total_declared">0.00</span>
                                </div>
                            </div>
                            <hr>

                            <div class="row" style="margin-top: 20px;">
                                <div class="table-responsive d-none" id="table-totals">
                                    <table id="insvoice-item-table" class="table">
                                        <tfoot>
                                            <tr class="card-hover">
                                                <td colspan="4" class="text-right"><b>Subtotal</b></td>
                                                <td colspan="1"></td>
                                                <td class="text-right">
                                                    <b> $ </b>
                                                    <span id="subtotal"> 0.00</span>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr class="card-hover">
                                                <td colspan="2">
                                                    <b>Price &nbsp; kg: </b>
                                                    <b> $ </b>
                                                    <span id="price_lb_label"> 3 </span>
                                                </td>

                                                <td colspan="2" class="text-right"> <b>Discount </b></td>
                                                <td colspan="1">
                                                    <span> 0 %</span>
                                                </td>
                                                <td class="text-right">
                                                    <b> $ </b>
                                                    <span id="discount"> 0.00</span>
                                                </td>
                                                <td></td>
                                            </tr>

                                            <tr class="card-hover">
                                                <td colspan="2"></td>
                                                <td class="text-right" colspan="2"><b>Value assured</b></td>
                                                <td colspan="1">
                                                </td>
                                                <td class="text-center" id="insured_label"></td>
                                                <td></td>
                                            </tr>
                                            <tr class="card-hover">
                                                <td colspan="4" class="text-right"> <b>Shipping Insurance </b></td>
                                                <td colspan="1">
                                                    <span> 1 %</span>
                                                </td>
                                                <td class="text-right">
                                                    <b> $ </b>
                                                    <span id="insurance"> 0.00</span>
                                                </td>
                                                <td></td>
                                            </tr>

                                            <tr class="card-hover">
                                                <td colspan="4" class="text-right"><b>Customs Duties </b></td>
                                                <td colspan="1">
                                                    <span> 0 %</span>
                                                </td>
                                                <td class="text-right">
                                                    <b> $ </b>
                                                    <span id="total_impuesto_aduanero"> 0.00</span>
                                                </td>
                                                <td></td>
                                            </tr>

                                            <tr class="card-hover">
                                                <td colspan="4" class="text-right"><b> Tax </b></td>
                                                <td colspan="1">
                                                    <span> 19 %</span>
                                                </td>
                                                <td class="text-right">
                                                    <b> $ </b>
                                                    <span id="impuesto"> 0.00</span>
                                                </td>
                                                <td></td>
                                            </tr>

                                            <tr class="card-hover">
                                                <td class="text-right" colspan="4"><b>Declared value </b></td>
                                                <td colspan="1">
                                                    <span> 0 % </span>
                                                </td>
                                                <td class="text-right">
                                                    <b> $ </b>
                                                    <span id="declared_value_label"> 0.00</span>
                                                </td>
                                                <td></td>
                                            </tr>

                                            <tr class="card-hover">
                                                <td class="text-right" colspan="4"><b>Fixed charge</b></td>
                                                <td colspan="1">
                                                    <span> 0 </span>
                                                </td>
                                                <td class="text-right" colspan="1">
                                                    <b> $ </b>
                                                    <span id="fixed_value_label"> 0.00</span>
                                                </td>
                                                <td></td>
                                            </tr>


                                            <tr class="card-hover">
                                                <td colspan="2"></td>
                                                <td class="text-right" colspan="2"><b><b> Reissue </b></b></td>
                                                <td colspan="1">
                                                    <span> 0 </span>
                                                </td>
                                                <td class="text-right" id="reexpedicion_label"></td>
                                                <td></td>
                                            </tr>

                                            <tr class="card-hover">
                                                <td colspan="2"></td>
                                                <td colspan="2" class="text-right"><b>TOTAL&nbsp; </b></td>
                                                <td></td>
                                                <td class="text-right">
                                                    <b> $ </b>
                                                    <span id="total_envio"> 0.00</span>
                                                </td>
                                                <td></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-actions">
                                        <div class="card-body">
                                            <div class="text-right">
                                                <input type="hidden" name="total_item_files" id="total_item_files" value="0">
                                                <input type="hidden" name="deleted_file_ids" id="deleted_file_ids">
                                                <button type="button" name="calculate_invoice" id="calculate_invoice" class="btn btn-info">
                                                    <i class="fas fa-calculator"></i>
                                                    <span class="ml-1">
                                                        Calculate </span>
                                                </button>
                                                <button type="submit" name="create_invoice" id="create_invoice" class="btn btn-success" disabled="">
                                                    <i class="fas fa-save"></i>
                                                    <span class="ml-1">
                                                        Save </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div> -->

        </div>
    </div>
</div>
<!-- End page content -->
@endsection