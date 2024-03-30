<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/uploads/1657300911_favicon.png">
    <title>Add courier | Deprixa pro</title>
    <link rel="stylesheet" href="assets/template/assets/libs/intlTelInput/intlTelInput.css">
    <link rel="stylesheet" href="assets/template/assets/libs/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="assets/template/assets/libs/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/template/assets/libs/select2/dist/css/select2.min.css">

    <link href="assets/template/dist/css/front.css" rel="stylesheet" type="text/css">
    <link href="assets/template/dist/css/style.min.css" rel="stylesheet">
    <link href="assets/customClassPagination.css" rel="stylesheet">
    <link href="assets/css/scroll-menu.css" rel="stylesheet">


    <style>
        .select2-selection__rendered {
            line-height: 31px !important;
        }

        .select2-container .select2-selection--single {
            height: 35px !important;
        }

        .select2-selection__arrow {
            height: 34px !important;
        }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->


    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div> <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->

        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.php">
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="assets/uploads/1648521991_logo.png" alt="Deprixa pro" width="190" height="45" /> </span>
                    </a>

                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>

                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- create new -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="assets/template/assets/icon-flag/us.png" width="34" />
                            </a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->

                        <li class="nav-item dropdown">
                            <a id="clickme" class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="assets/images/alert/bell.png" width="26" />
                                <span class="badge badge-notify badge-sm up badge-light pull-top-xs" id="countNotifications">0</span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                                <div id="ajax_response"></div>
                            </div>

                        </li>


                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/uploads/blank.png" class="rounded-circle" width="50" />&nbsp; <i class="fa fa-caret-down"></i></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow"><span class="bg-primary"></span></span>
                                <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                                    <div class="">
                                        <img src="assets/uploads/blank.png" class="rounded-circle" width="80" />
                                    </div>
                                    <div class="m-l-10">
                                        <h4 class="m-b-0">customer</h4>
                                        <p class=" m-b-0">osorio123@yahoo.es</p>
                                    </div>
                                </div>

                                <a class="dropdown-item" href="customers_edit.php?user=17">
                                    <i class="ti-user m-r-5 m-l-5"></i> My profile</a>


                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="logout.php"><i class="fa fa-power-off m-r-5 m-l-5"></i>
                                    Logout</a>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>

        <audio id="chatAudio">
            <source src="assets/notify.mp3" type="audio/mpeg">
        </audio>


        <!-- <script src="dataJs/load_notifications_all.js"> </script> -->
        <!-- End Topbar header -->


        <!-- Left Sidebar - style you can find in sidebar.scss  -->

        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">

                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li>
                            <!-- User Profile-->
                            <div class="user-profile d-flex no-block dropdown m-t-20">
                                <div class="user-pic">
                                    <img src="assets/uploads/blank.png" class="rounded-circle" width="50" />
                                </div>

                                <div class="user-content hide-menu m-l-10">
                                    <a href="javascript:void(0)" class="" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <h5 class="m-b-0 user-name font-medium">Good morning,&nbsp;&nbsp;</h5>
                                        <span class="op-5 user-email">MARIA</span>
                                        <br>Locker <b>503865</b>
                                    </a>
                                </div>
                            </div>
                            <!-- End User Profile-->
                        </li>


                        <li class="p-15 m-t-10">
                            <a href="pickup_add.php" class="btn btn-block create-btn text-white no-block d-flex align-items-center">
                                <i class="mdi mdi-cube-send" style="font-size: 20px"></i>
                                <span class="hide-menu"> &nbsp; Create Pickup</span>
                            </a>
                        </li>
                        <!-- User Profile-->


                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark" href="index.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i>
                                <span class="hide-menu"> Control Panel </span>
                            </a>
                        </li>


                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-codepen"></i>
                                <span class="hide-menu">Locker packages</span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">

                                <li class="sidebar-item">
                                    <a href="prealert_add.php" class="sidebar-link"><i class="mdi mdi-bell"></i>
                                        <span class="hide-menu"> Create Pre Alert </span>
                                    </a>
                                </li>

                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark" href="prealert_list.php" aria-expanded="false"><i class="mdi mdi-check"></i>
                                        <span class="hide-menu"> Pre-Alert List </span>
                                    </a>
                                </li>

                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark" href="customer_packages_list.php" aria-expanded="false">
                                        <i class="mdi mdi-check"></i>
                                        <span class="hide-menu"> List of packages </span>
                                    </a>
                                </li>

                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark" href="payments_gateways_list.php" aria-expanded="false">
                                        <i class="fas fa-dollar-sign"></i>
                                        <span class="hide-menu">List of payments </span>
                                    </a>
                                </li>


                            </ul>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-package"></i>
                                <span class="hide-menu"> Shipping</span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">

                                <li class="sidebar-item">
                                    <a href="courier_add_client.php" class="sidebar-link"><i class="ti-package" style="color:#f62d51"></i>
                                        <span class="hide-menu"> Create Shipment </span>
                                    </a>
                                </li>

                                <li class="sidebar-item">
                                    <a href="courier_list.php" class="sidebar-link"><i class="mdi mdi-check"></i>
                                        <span class="hide-menu"> List of shipments </span>
                                    </a>
                                </li>

                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark" href="payments_gateways_courier_list.php" aria-expanded="false"><i class="fas fa-dollar-sign"></i>
                                        <span class="hide-menu">List of payments </span>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-cube-send"></i>
                                <span class="hide-menu"> Pickups</span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">

                                <li class="sidebar-item">
                                    <a href="pickup_add.php" class="sidebar-link"><i class="mdi mdi-cube-send" style="color:#f62d51"></i>
                                        <span class="hide-menu"> Create Pickup </span>
                                    </a>
                                </li>


                                <li class="sidebar-item">
                                    <a href="pickup_list.php" class="sidebar-link"><i class="mdi mdi-clock-fast"></i>
                                        <span class="hide-menu"> Pickup List </span>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="mdi mdi-widgets"></i>
                                <span class="hide-menu">Consolidated</span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">

                                <!-- Module consolidate-->
                                <li class="sidebar-item">
                                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                        <i class="fas fas fa-boxes"></i>
                                        <span class="hide-menu"> Shipments</span>
                                    </a>
                                    <ul aria-expanded="false" class="collapse  first-level">

                                        <li class="sidebar-item">
                                            <a href="consolidate_list.php" class="sidebar-link">
                                                <i class="ti ti-check" style="color:#975EF7"></i>
                                                <span class="hide-menu"> List of Consolidated </span>
                                            </a>
                                        </li>

                                        <li class="sidebar-item">
                                            <a class="sidebar-link waves-effect waves-dark" href="payments_gateways_consolidate_list.php" aria-expanded="false">
                                                <i class="ti ti-check" style="color:#975EF7"></i>
                                                <span class="hide-menu">List of payments </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>


                                <!-- Module consolidate-->
                                <li class="sidebar-item">
                                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                        <i class="fas fas fa-boxes"></i>
                                        <span class="hide-menu"> Locker packages</span>
                                    </a>
                                    <ul aria-expanded="false" class="collapse  first-level">

                                        <li class="sidebar-item">
                                            <a href="consolidate_package_list.php" class="sidebar-link">
                                                <i class="ti ti-check" style="color:#975EF7"></i>
                                                <span class="hide-menu"> List of Consolidated </span>
                                            </a>
                                        </li>

                                        <li class="sidebar-item">
                                            <a class="sidebar-link waves-effect waves-dark" href="payments_gateways_package_consolidate_list.php" aria-expanded="false">
                                                <i class="ti ti-check" style="color:#975EF7"></i>
                                                <span class="hide-menu">List of payments </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark" href="recipients_list.php" aria-expanded="false"><i class="fas fa-users"></i>
                                <span class="hide-menu"> My recipients </span>
                            </a>
                        </li>


                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark" href="customers_edit.php?user=17" aria-expanded="false"><i class="mdi mdi-account"></i>
                                <span class="hide-menu"> View Profile </span>
                            </a>
                        </li>

                    </ul>



                    <!-- User Profile-->
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

        <!-- End Left Sidebar - style you can find in sidebar.scss  -->

        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 align-self-center">
                        <h4 class="page-title"><i class="ti-package" aria-hidden="true"></i> Record shipment</h4> <br>
                    </div>
                </div>
            </div>

            <div class="container-fluid">

                <form method="post" id="invoice_form" name="invoice_form" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-8">

                                            <label for="inputcom" class="control-label col-form-label">Shipping Prefix</label>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend" style="display:none">
                                                    <div class="input-group-text">

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" name="prefix_check" id="prefix_check" value="1" readonly>
                                                            <label class="form-check-label" for="prefix_check">Country code</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <input type="text" class="form-control input-sm" name="code_prefix" id="code_prefix" value="AWB" readonly>

                                                <select class="custom-select input-sm hide" id="code_prefix2" name="code_prefix2" required="">
                                                    <option value="0">--Select country code--</option>
                                                    <option value="AFG">AFG - Afghanistan</option>
                                                    <option value="ALB">ALB - Albania</option>
                                                    <option value="DZA">DZA - Algeria</option>
                                                    <option value="AND">AND - Andorra</option>
                                                    <option value="AGO">AGO - Angola</option>
                                                    <option value="ATG">ATG - Antigua And Barbuda</option>
                                                    <option value="ARG">ARG - Argentina</option>
                                                    <option value="ARM">ARM - Armenia</option>
                                                    <option value="AUS">AUS - Australia</option>
                                                    <option value="AUT">AUT - Austria</option>
                                                    <option value="AZE">AZE - Azerbaijan</option>
                                                    <option value="BHS">BHS - The Bahamas</option>
                                                    <option value="BHR">BHR - Bahrain</option>
                                                    <option value="BGD">BGD - Bangladesh</option>
                                                    <option value="BRB">BRB - Barbados</option>
                                                    <option value="BLR">BLR - Belarus</option>
                                                    <option value="BEL">BEL - Belgium</option>
                                                    <option value="BLZ">BLZ - Belize</option>
                                                    <option value="BEN">BEN - Benin</option>
                                                    <option value="BMU">BMU - Bermuda</option>
                                                    <option value="BTN">BTN - Bhutan</option>
                                                    <option value="BOL">BOL - Bolivia</option>
                                                    <option value="BIH">BIH - Bosnia and Herzegovina</option>
                                                    <option value="BWA">BWA - Botswana</option>
                                                    <option value="BRA">BRA - Brazil</option>
                                                    <option value="BRN">BRN - Brunei</option>
                                                    <option value="BGR">BGR - Bulgaria</option>
                                                    <option value="BFA">BFA - Burkina Faso</option>
                                                    <option value="BDI">BDI - Burundi</option>
                                                    <option value="KHM">KHM - Cambodia</option>
                                                    <option value="CMR">CMR - Cameroon</option>
                                                    <option value="CAN">CAN - Canada</option>
                                                    <option value="CPV">CPV - Cape Verde</option>
                                                    <option value="CAF">CAF - Central African Republic</option>
                                                    <option value="TCD">TCD - Chad</option>
                                                    <option value="CHL">CHL - Chile</option>
                                                    <option value="CHN">CHN - China</option>
                                                    <option value="COL">COL - Colombia</option>
                                                    <option value="COM">COM - Comoros</option>
                                                    <option value="COG">COG - Congo</option>
                                                    <option value="COD">COD - Democratic Republic of the Congo</option>
                                                    <option value="CRI">CRI - Costa Rica</option>
                                                    <option value="CIV">CIV - Cote D'Ivoire (Ivory Coast)</option>
                                                    <option value="HRV">HRV - Croatia</option>
                                                    <option value="CUB">CUB - Cuba</option>
                                                    <option value="CYP">CYP - Cyprus</option>
                                                    <option value="CZE">CZE - Czech Republic</option>
                                                    <option value="DNK">DNK - Denmark</option>
                                                    <option value="DJI">DJI - Djibouti</option>
                                                    <option value="DMA">DMA - Dominica</option>
                                                    <option value="DOM">DOM - Dominican Republic</option>
                                                    <option value="TLS">TLS - East Timor</option>
                                                    <option value="ECU">ECU - Ecuador</option>
                                                    <option value="EGY">EGY - Egypt</option>
                                                    <option value="SLV">SLV - El Salvador</option>
                                                    <option value="GNQ">GNQ - Equatorial Guinea</option>
                                                    <option value="ERI">ERI - Eritrea</option>
                                                    <option value="EST">EST - Estonia</option>
                                                    <option value="ETH">ETH - Ethiopia</option>
                                                    <option value="FJI">FJI - Fiji Islands</option>
                                                    <option value="FIN">FIN - Finland</option>
                                                    <option value="FRA">FRA - France</option>
                                                    <option value="GAB">GAB - Gabon</option>
                                                    <option value="GMB">GMB - Gambia The</option>
                                                    <option value="GEO">GEO - Georgia</option>
                                                    <option value="DEU">DEU - Germany</option>
                                                    <option value="GHA">GHA - Ghana</option>
                                                    <option value="GRC">GRC - Greece</option>
                                                    <option value="GRD">GRD - Grenada</option>
                                                    <option value="GTM">GTM - Guatemala</option>
                                                    <option value="GIN">GIN - Guinea</option>
                                                    <option value="GNB">GNB - Guinea-Bissau</option>
                                                    <option value="GUY">GUY - Guyana</option>
                                                    <option value="HTI">HTI - Haiti</option>
                                                    <option value="HND">HND - Honduras</option>
                                                    <option value="HKG">HKG - Hong Kong S.A.R.</option>
                                                    <option value="HUN">HUN - Hungary</option>
                                                    <option value="ISL">ISL - Iceland</option>
                                                    <option value="IND">IND - India</option>
                                                    <option value="IDN">IDN - Indonesia</option>
                                                    <option value="IRN">IRN - Iran</option>
                                                    <option value="IRQ">IRQ - Iraq</option>
                                                    <option value="IRL">IRL - Ireland</option>
                                                    <option value="ISR">ISR - Israel</option>
                                                    <option value="ITA">ITA - Italy</option>
                                                    <option value="JAM">JAM - Jamaica</option>
                                                    <option value="JPN">JPN - Japan</option>
                                                    <option value="JOR">JOR - Jordan</option>
                                                    <option value="KAZ">KAZ - Kazakhstan</option>
                                                    <option value="KEN">KEN - Kenya</option>
                                                    <option value="KIR">KIR - Kiribati</option>
                                                    <option value="PRK">PRK - North Korea</option>
                                                    <option value="KOR">KOR - South Korea</option>
                                                    <option value="KWT">KWT - Kuwait</option>
                                                    <option value="KGZ">KGZ - Kyrgyzstan</option>
                                                    <option value="LAO">LAO - Laos</option>
                                                    <option value="LVA">LVA - Latvia</option>
                                                    <option value="LBN">LBN - Lebanon</option>
                                                    <option value="LSO">LSO - Lesotho</option>
                                                    <option value="LBR">LBR - Liberia</option>
                                                    <option value="LBY">LBY - Libya</option>
                                                    <option value="LIE">LIE - Liechtenstein</option>
                                                    <option value="LTU">LTU - Lithuania</option>
                                                    <option value="LUX">LUX - Luxembourg</option>
                                                    <option value="MKD">MKD - Macedonia</option>
                                                    <option value="MDG">MDG - Madagascar</option>
                                                    <option value="MWI">MWI - Malawi</option>
                                                    <option value="MYS">MYS - Malaysia</option>
                                                    <option value="MDV">MDV - Maldives</option>
                                                    <option value="MLI">MLI - Mali</option>
                                                    <option value="MLT">MLT - Malta</option>
                                                    <option value="MHL">MHL - Marshall Islands</option>
                                                    <option value="MRT">MRT - Mauritania</option>
                                                    <option value="MUS">MUS - Mauritius</option>
                                                    <option value="MEX">MEX - Mexico</option>
                                                    <option value="FSM">FSM - Micronesia</option>
                                                    <option value="MDA">MDA - Moldova</option>
                                                    <option value="MCO">MCO - Monaco</option>
                                                    <option value="MNG">MNG - Mongolia</option>
                                                    <option value="MNE">MNE - Montenegro</option>
                                                    <option value="MAR">MAR - Morocco</option>
                                                    <option value="MOZ">MOZ - Mozambique</option>
                                                    <option value="MMR">MMR - Myanmar</option>
                                                    <option value="NAM">NAM - Namibia</option>
                                                    <option value="NRU">NRU - Nauru</option>
                                                    <option value="NPL">NPL - Nepal</option>
                                                    <option value="BES">BES - Bonaire, Sint Eustatius and Saba</option>
                                                    <option value="NLD">NLD - Netherlands</option>
                                                    <option value="NZL">NZL - New Zealand</option>
                                                    <option value="NIC">NIC - Nicaragua</option>
                                                    <option value="NER">NER - Niger</option>
                                                    <option value="NGA">NGA - Nigeria</option>
                                                    <option value="NOR">NOR - Norway</option>
                                                    <option value="OMN">OMN - Oman</option>
                                                    <option value="PAK">PAK - Pakistan</option>
                                                    <option value="PLW">PLW - Palau</option>
                                                    <option value="PAN">PAN - Panama</option>
                                                    <option value="PNG">PNG - Papua new Guinea</option>
                                                    <option value="PRY">PRY - Paraguay</option>
                                                    <option value="PER">PER - Peru</option>
                                                    <option value="PHL">PHL - Philippines</option>
                                                    <option value="POL">POL - Poland</option>
                                                    <option value="PRT">PRT - Portugal</option>
                                                    <option value="PRI">PRI - Puerto Rico</option>
                                                    <option value="QAT">QAT - Qatar</option>
                                                    <option value="ROU">ROU - Romania</option>
                                                    <option value="RUS">RUS - Russia</option>
                                                    <option value="RWA">RWA - Rwanda</option>
                                                    <option value="KNA">KNA - Saint Kitts And Nevis</option>
                                                    <option value="LCA">LCA - Saint Lucia</option>
                                                    <option value="VCT">VCT - Saint Vincent And The Grenadines</option>
                                                    <option value="WSM">WSM - Samoa</option>
                                                    <option value="SMR">SMR - San Marino</option>
                                                    <option value="STP">STP - Sao Tome and Principe</option>
                                                    <option value="SAU">SAU - Saudi Arabia</option>
                                                    <option value="SEN">SEN - Senegal</option>
                                                    <option value="SRB">SRB - Serbia</option>
                                                    <option value="SYC">SYC - Seychelles</option>
                                                    <option value="SLE">SLE - Sierra Leone</option>
                                                    <option value="SGP">SGP - Singapore</option>
                                                    <option value="SVK">SVK - Slovakia</option>
                                                    <option value="SVN">SVN - Slovenia</option>
                                                    <option value="SLB">SLB - Solomon Islands</option>
                                                    <option value="SOM">SOM - Somalia</option>
                                                    <option value="ZAF">ZAF - South Africa</option>
                                                    <option value="SSD">SSD - South Sudan</option>
                                                    <option value="ESP">ESP - Spain</option>
                                                    <option value="LKA">LKA - Sri Lanka</option>
                                                    <option value="SDN">SDN - Sudan</option>
                                                    <option value="SUR">SUR - Suriname</option>
                                                    <option value="SWZ">SWZ - Swaziland</option>
                                                    <option value="SWE">SWE - Sweden</option>
                                                    <option value="CHE">CHE - Switzerland</option>
                                                    <option value="SYR">SYR - Syria</option>
                                                    <option value="TWN">TWN - Taiwan</option>
                                                    <option value="TJK">TJK - Tajikistan</option>
                                                    <option value="TZA">TZA - Tanzania</option>
                                                    <option value="THA">THA - Thailand</option>
                                                    <option value="TGO">TGO - Togo</option>
                                                    <option value="TON">TON - Tonga</option>
                                                    <option value="TTO">TTO - Trinidad And Tobago</option>
                                                    <option value="TUN">TUN - Tunisia</option>
                                                    <option value="TUR">TUR - Turkey</option>
                                                    <option value="TKM">TKM - Turkmenistan</option>
                                                    <option value="TUV">TUV - Tuvalu</option>
                                                    <option value="UGA">UGA - Uganda</option>
                                                    <option value="UKR">UKR - Ukraine</option>
                                                    <option value="ARE">ARE - United Arab Emirates</option>
                                                    <option value="GBR">GBR - United Kingdom</option>
                                                    <option value="USA">USA - United States</option>
                                                    <option value="URY">URY - Uruguay</option>
                                                    <option value="UZB">UZB - Uzbekistan</option>
                                                    <option value="VUT">VUT - Vanuatu</option>
                                                    <option value="VEN">VEN - Venezuela</option>
                                                    <option value="VNM">VNM - Vietnam</option>
                                                    <option value="VIR">VIR - Virgin Islands (US)</option>
                                                    <option value="YEM">YEM - Yemen</option>
                                                    <option value="ZMB">ZMB - Zambia</option>
                                                    <option value="ZWE">ZWE - Zimbabwe</option>
                                                    <option value="XKX">XKX - Kosovo</option>
                                                    <option value="test">test - test</option>
                                                    <option value="HA">HA - hindal</option>
                                                    <option value="ISM">ISM - United Kingdom1</option>
                                                    <option value="MAR">MAR - Maroc</option>
                                                    <option value="GN">GN - Guinée</option>
                                                    <option value="2ecr">2ecr - c2ec</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group col-md-4">
                                            <label for="inputcom" class="control-label col-form-label">Number (tracking)</label>
                                            <div class="input-group mb-3">
                                                <input type="number" class="form-control" name="order_no" id="order_no" value="9996586482" onchange="cdp_validateTrackNumber(this.value, '9996586482');" readonly>

                                                <input type="hidden" name="order_no_main" id="order_no_main" value="9996586482">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="inputlname" class="control-label col-form-label">List of Agencies </label>
                                            <div class="input-group mb-3">
                                                <select class="select2 form-control custom-select" id="agency" name="agency" required style="width: 100%;">

                                                    <option value="4">Deprixa Miami</option>
                                                    <option value="5">Al Hamra International</option>
                                                    <option value="6">tirupati</option>
                                                    <option value="7">Kandy Travels</option>
                                                    <option value="8">K-Agency</option>
                                                    <option value="9">agencia 1</option>
                                                    <option value="10">Paris</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="inputname" class="control-label col-form-label">Office of origin</label>
                                            <div class="input-group mb-3">
                                                <select class="select2 form-control custom-select" name="origin_off" id="origin_off" required style="width: 100%;">
                                                    <option value="86">Deprixa Group</option>
                                                    <option value="87">طريقة الدفعطريقة الدفعطريقة الدفع</option>
                                                    <option value="88">cs</option>
                                                    <option value="89">Kandy 1</option>
                                                    <option value="90">K-Test-Office</option>
                                                    <option value="91">Oficina central</option>
                                                    <option value="92">Paris</option>
                                                    <option value="93">Jamshedpur</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- Row -->


                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header bg-secondary">
                                    <h4 class="card-title text-white"><i class="mdi mdi-information-outline" style="color:#36bea6"></i> Sender Information</h4>
                                </div>
                                <div class="card-body">
                                    <div class="resultados_ajax_add_user_modal_sender"></div>
                                    <div class="row">
                                        <div class="col-md-12 ">
                                            <label class="control-label col-form-label">Sender/Customer</label>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="input-group">
                                                        <select class="select2 form-control custom-select" style="width: 100%;" id="sender_id" name="sender_id" disabled="">
                                                            <option value="17" selected> MARIA BELEN</option>
                                                        </select>
                                                        <input type="hidden" name="sender_id_temp" id="sender_id_temp" value="17">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-12 ">
                                            <label for="inputcontact" class="control-label col-form-label">Sender/Customer Address</label>
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <div class="input-group">
                                                        <select class="select2 form-control" style="width: 100%;" id="sender_address_id" name="sender_address_id">
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div class="input-group-append input-sm">
                                                        <button id="add_address_sender" data-type_user="user_customer" data-toggle="modal" data-target="#myModalAddUserAddresses" type="button" class="btn btn-default"><i class="fa fa-plus"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header bg-secondary">
                                    <h4 class="card-title text-white"><i class="mdi mdi-information-outline" style="color:#36bea6"></i> Recipient Information</h4>
                                </div>
                                <div class="card-body">
                                    <div class="resultados_ajax_add_user_modal_recipient"></div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="inputcontact" class="control-label col-form-label">Recipient/Client</label>
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <div class="input-group">
                                                        <select class="select2 form-control custom-select" id="recipient_id" name="recipient_id">
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group-append input-sm">
                                                        <button id="add_recipient" type="button" data-type_user="user_recipient" data-toggle="modal" data-target="#myModalAddRecipient" class="btn btn-default"><i class="fa fa-plus"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="inputcontact" class="control-label col-form-label">Recipient/Client Address</label>
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <div class="input-group">
                                                        <select class="select2 form-control" id="recipient_address_id" name="recipient_address_id">
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div class="input-group-append input-sm">
                                                        <button id="add_address_recipient" type="button" data-type_user="user_recipient" data-toggle="modal" data-target="#myModalAddRecipientAddresses" class="btn btn-default"><i class="fa fa-plus"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Row -->


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header bg-secondary">
                                    <h4 class="card-title text-white"><i class="mdi mdi-book-multiple" style="color:#36bea6"></i> Shipping information:</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">

                                        <div class="form-group col-md-4">
                                            <label for="inputEmail3" class="control-label col-form-label">Service Mode</label>
                                            <div class="input-group mb-3">
                                                <select class="select2 form-control custom-select" id="order_service_options" name="order_service_options" required style="width: 100%;">
                                                    <option value="7">Same Day</option>
                                                    <option value="7">Same Day</option>
                                                    <option value="8">Next Day</option>
                                                    <option value="9">After 2 Days</option>
                                                    <option value="10">After 3 Days</option>
                                                    <option value="11">After 4 Days</option>
                                                    <option value="12">After 5 Days</option>
                                                    <option value="13">After 6 Days</option>
                                                    <option value="14">After 7 Days</option>
                                                    <option value="15">After 8 Days</option>
                                                    <option value="16">After 9 Days</option>
                                                    <option value="17">After 10 Days</option>
                                                    <option value="18">After 11 Days</option>
                                                    <option value="19">After 12 Days</option>
                                                    <option value="20">After 13 Days</option>
                                                    <option value="21">After 14 Days</option>
                                                    <option value="22">After 15 Days</option>
                                                    <option value="23">After 16 Days</option>
                                                    <option value="24">After 17 Days</option>
                                                    <option value="25">After 18 Days</option>
                                                    <option value="26">After 19 Days</option>
                                                    <option value="27">After 20 Days</option>
                                                    <option value="28">After 21 Days</option>
                                                    <option value="29">After 22 Days</option>
                                                    <option value="30">After 23 Days</option>
                                                    <option value="31">After 24 Days</option>
                                                    <option value="32">After 25 Days</option>
                                                    <option value="33">After 26 Days</option>
                                                    <option value="34">After 27 Days</option>
                                                    <option value="35">After 28 Days</option>
                                                    <option value="36">After 29 Days</option>
                                                    <option value="37">After 30 Days</option>
                                                    <option value="38">After 31 Days</option>
                                                    <option value="39">speedy</option>
                                                    <option value="40">Ocean Freight</option>
                                                    <option value="41">uups</option>
                                                    <option value="42">KARAYOLU</option>
                                                    <option value="43">Fedex</option>
                                                    <option value="44">dfwe</option>
                                                    <option value="45">test</option>
                                                    <option value="46">Express</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="inputcontact" class="control-label col-form-label">Courier company</label>
                                            <div class="input-group mb-3">
                                                <select class="select2 form-control custom-select" id="order_courier" name="order_courier" required style="width: 100%;">
                                                    <option value="93">Deprixa Express</option>
                                                    <option value="93">Deprixa Express</option>
                                                    <option value="94">Deprixa Delivery</option>
                                                    <option value="95">Deprixa EMS</option>
                                                    <option value="97">WooImportSolution CHina</option>
                                                    <option value="98">kms</option>
                                                    <option value="99">BBNZ</option>
                                                    <option value="100">courier company 1</option>
                                                    <option value="101">SKYJET</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="inputlname" class="control-label col-form-label">Type of packaging</label>
                                            <div class="input-group mb-3">
                                                <select class="select2 form-control custom-select" id="order_package" name="order_package" required style="width: 100%;">
                                                    <option value="24">Large</option>
                                                    <option value="22">Small</option>
                                                    <option value="23">Medium</option>
                                                    <option value="24">Large</option>
                                                    <option value="25">Extra Large</option>
                                                    <option value="26">Extra Extra Large</option>
                                                    <option value="27">fgdfg</option>
                                                    <option value="28">big</option>
                                                    <option value="29">Large package</option>
                                                    <option value="30">botellon</option>
                                                    <option value="31">Cylinder</option>
                                                    <option value="32">FCL</option>
                                                    <option value="33">Documento ESPacial Pasaporte</option>
                                                    <option value="34">vitamins large packege</option>
                                                    <option value="35">Passenger</option>
                                                    <option value="36">Books of Accounts</option>
                                                    <option value="37">small packet air</option>
                                                    <option value="38">Adrien</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="row" style="display:none">

                                        <!--/span-->
                                        <div class="form-group col-md-3">
                                            <label for="inputEmail3" class="control-label col-form-label">Delivery time</label>
                                            <div class="input-group mb-3">
                                                <select class="select2 form-control custom-select" id="order_deli_time" name="order_deli_time" required style="width: 100%;">
                                                    <option value="12">24 Hours</option>
                                                    <option value="12">24 Hours</option>
                                                    <option value="13">24 - 48 Hours</option>
                                                    <option value="14">SAME DAY</option>
                                                    <option value="15">fghgh</option>
                                                    <option value="16">test</option>
                                                    <option value="17">12 - 14 Days</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--/span-->


                                        <div class="form-group col-md-3">
                                            <label for="inputcontact" class="control-label col-form-label">Delivery Status <i style="color:#ff0000" class="fas fa-shipping-fast"></i></label>
                                            <div class="input-group mb-3">
                                                <select class="select2 form-control custom-select" id="status_courier" name="status_courier" required style="width: 100%;">
                                                    <option value="11">Pending</option>
                                                    <option value="1">Pending_Collection</option>
                                                    <option value="2">Received Office</option>
                                                    <option value="3">In_Transit</option>
                                                    <option value="4">In_Warehouse</option>
                                                    <option value="5">Distribution</option>
                                                    <option value="6">Available</option>
                                                    <option value="7">On Route</option>
                                                    <option value="10">Approved</option>
                                                    <option value="11">Pending</option>
                                                    <option value="12">Rejected</option>
                                                    <option value="14">Pick_up</option>
                                                    <option value="15">Picked up</option>
                                                    <option value="16">No Picked up</option>
                                                    <option value="17">Quotation</option>
                                                    <option value="18">Pending_quote</option>
                                                    <option value="19">Invoiced</option>
                                                    <option value="21">Cancelled</option>
                                                    <option value="23">Pending_payment</option>
                                                    <option value="24">طريقة الدفعطريقة الدفعطريقة الدفعطريقة الدفعطريقة الدفعطريقة الدفعطريقة الدفعطريقة الدفعطريقة الدفع</option>
                                                    <option value="25">Not Shipped</option>
                                                    <option value="26">congelado</option>
                                                    <option value="27">تحویل شد</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="form-group col-md-4">

                                            <label for="inputlname" class="control-label col-form-label">Shipping mode</label>
                                            <div class="input-group mb-3">
                                                <select class="select2 form-control custom-select" id="order_item_category" name="order_item_category" required style="width: 100%;">
                                                    <option value="26">Air Freight</option>
                                                    <option value="26">Air Freight</option>
                                                    <option value="27">Ocean Freight</option>
                                                    <option value="28">Road Freight</option>
                                                    <option value="29">Rail Freight</option>
                                                    <option value="30">طريقة الدفعطريقة الدفعطريقة الدفعطريقة الدفعطريقة الدفعطريقة الدفعطريقة الدفعطريقة الدفع</option>
                                                    <option value="31">Xe tải 500kg</option>
                                                    <option value="32">Sea</option>
                                                    <option value="33">Ccc</option>
                                                    <option value="34">xpressbees</option>
                                                    <option value="35">entrega de documentos tipo A</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-4" style="display:none">
                                            <label for="inputcontact" class="control-label col-form-label">Estimated delivery date</i></label>
                                            <div class="input-group">
                                                <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i style="color:#ff0000" class="fa fa-calendar"></i></div>
                                                </div>
                                                <input type='text' class="form-control" name="order_date" id="order_date" placeholder="--Shipment Pickup Date--" data-toggle="tooltip" data-placement="bottom" title="Add ship date" readonly value="2024-03-21" />
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="inputEmail3" class="control-label col-form-label">Payment method <i style="color:#ff0000" class="fas fa-donate"></i></label>
                                            <div class="input-group mb-3">
                                                <select class="select2 form-control custom-select" id="order_pay_mode" name="order_pay_mode" required="" style="width: 100%;">
                                                    <option value="1">Cash_payment</option>
                                                    <option value="1">Cash_payment</option>
                                                    <option value="2">Paypal</option>
                                                    <option value="3">Stripe</option>
                                                    <option value="4">Paystack</option>
                                                    <option value="5">Wire transfer</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="inputEmail3" class="control-label col-form-label">Payment Methods</label>
                                            <div class="input-group mb-3">
                                                <select class="select2 form-control custom-select" id="order_payment_method" name="order_payment_method" required style="width: 100%;">
                                                    <option value="1">Prepaid</option>
                                                    <option value="1">Prepaid</option>
                                                    <option value="2">Postpaid 5 day</option>
                                                    <option value="3">Postpaid 15 day</option>
                                                    <option value="4">Postpaid 30 day</option>
                                                    <option value="5">طريقة الدفع</option>
                                                    <option value="6">youcan pay</option>
                                                    <option value="7">Test</option>
                                                    <option value="8">KCB Bank</option>
                                                    <option value="9">MPesa</option>
                                                    <option value="10">Vooma</option>
                                                    <option value="11">Cash App</option>
                                                    <option value="12">Paytm</option>
                                                    <option value="13">BRI</option>
                                                    <option value="14">Bank accounts</option>
                                                    <option value="15">Btc</option>
                                                    <option value="16">Bkash</option>
                                                    <option value="17">Bank Transfer</option>
                                                    <option value="18">pago contra enterga</option>
                                                    <option value="19">Bbv</option>
                                                    <option value="20">Test Payment</option>
                                                    <option value="21">Paystack</option>
                                                    <option value="22">test123</option>
                                                    <option value="23">We</option>
                                                    <option value="24">Cash</option>
                                                    <option value="25">BOG</option>
                                                    <option value="26">BTC-Bitcoin</option>
                                                    <option value="27">Bitcoin</option>
                                                    <option value="28">crypto</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <!--/row-->
                                    <div class="row">

                                        <div class="col-md-4">

                                            <div>
                                                <label class="control-label" id="selectItem"> Attach File</label>
                                            </div>

                                            <input class="custom-file-input" id="filesMultiple" name="filesMultiple[]" multiple="multiple" type="file" style="display: none;" onchange="cdp_validateZiseFiles(); cdp_preview_images();" />
                                            <button type="button" id="openMultiFile" class="btn btn-default  pull-left  mb-4"> <i class='fa fa-paperclip' id="openMultiFile" style="font-size:18px; cursor:pointer;"></i> Upload files </button>

                                        </div>

                                    </div>
                                    <div class="col-md-12 row" id="image_preview"></div>

                                    <div class="col-md-4 mt-4">
                                        <div id="clean_files" class="hide">
                                            <button type="button" id="clean_file_button" class="btn btn-danger ml-3"> <i class='fa fa-trash' style="font-size:18px; cursor:pointer;"></i> Cancel attachments </button>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="resultados_file col-md-4 pull-right mt-4">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
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

                                    <div id="data_items"></div>

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
                                                        <input type="hidden" name="total_item_files" id="total_item_files" value="0" />
                                                        <input type="hidden" name="deleted_file_ids" id="deleted_file_ids" />
                                                        <button type="button" name="calculate_invoice" id="calculate_invoice" class="btn btn-info">
                                                            <i class="fas fa-calculator"></i>
                                                            <span class="ml-1">
                                                                Calculate </span>
                                                        </button>
                                                        <button type="submit" name="create_invoice" id="create_invoice" class="btn btn-success" disabled>
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
                            <input type="hidden" value="3" name="price_lb" id="price_lb">
                            <input type="hidden" value="0" name="discount_value" id="discount_value">
                            <input type="hidden" value="100" name="insured_value" id="insured_value">
                            <input type="hidden" value="1" name="insurance_value" id="insurance_value">
                            <input type="hidden" value="0" name="tariffs_value" id="tariffs_value">
                            <input type="hidden" value="19" name="tax_value" id="tax_value">
                            <input type="hidden" value="0" name="declared_value_tax" id="declared_value_tax">
                            <input type="hidden" value="0" name="reexpedicion_value" id="reexpedicion_value">

                            <input type="hidden" name="core_meter" id="core_meter" value="166" />
                            <input type="hidden" name="core_min_cost_tax" id="core_min_cost_tax" value="0" />
                            <input type="hidden" name="core_min_cost_declared_tax" id="core_min_cost_declared_tax" value="0" />
                        </div>
                    </div>
                </form>

                <!-- Modal -->
                <div class="modal fade" id="myModalAddUser" role="dialog" aria-labelledby="modal_add_user_title">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add Sender</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" method="post" id="add_user_from_modal_shipments" name="add_user_from_modal_shipments">

                                    <input type="hidden" id="type_user" name="type_user">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="emailAddress1">Name</label>
                                                <input type="text" class="form-control" name="fname" id="fname" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phoneNumber1">Last Name</label>
                                                <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="emailAddress1">Email</label>
                                                <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phoneNumber1">Phone</label>
                                                <br>
                                                <input type="tel" class="form-control" name="phone_custom" id="phone_custom">

                                                <span id="valid-msg-sender" class="hide"></span>
                                                <div id="error-msg-sender" class="hide text-danger"></div>
                                            </div>
                                        </div>
                                    </div>


                                    <hr>
                                    <h4>Address </h4>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <select style="width: 100% !important;" class="select2 form-control" name="country_modal_user" id="country_modal_user">
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="">Status</label>
                                                <select style="width: 100% !important;" disabled class="select2 form-control" id="state_modal_user" name="state_modal_user">
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="">City</label>
                                                <select style="width: 100% !important;" disabled class="select2 form-control" id="city_modal_user" name="city_modal_user">
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="phoneNumber1">Zip Code</label>
                                                <input type="text" class="form-control" name="postal_modal_user" id="postal_modal_user" placeholder="Zip Code">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="phoneNumber1">Address</label>
                                                <input type="text" class="form-control" name="address_modal_user" id="address_modal_user" placeholder="Address">
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="total_address" id="total_address" value="1" />
                                    <input type="hidden" name="phone" id="phone" />
                                    <input name="locker" id="locker" type="hidden" value="054925" />

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" id="save_data_user">Save</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- Modal -->
                <div class="modal fade" id="myModalAddRecipient" role="dialog" aria-labelledby="modal_add_user_title">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="modal_add_user_title">Add Recipient</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" method="post" id="add_recipient_from_modal_shipments" name="add_recipient_from_modal_shipments">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="emailAddress1">Name</label>
                                                <input type="text" class="form-control" name="fname_recipient" id="fname_recipient" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phoneNumber1">Last Name</label>
                                                <input type="text" class="form-control" name="lname_recipient" id="lname_recipient" placeholder="Last Name">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="emailAddress1">Email</label>
                                                <input type="text" class="form-control" id="email_recipient" name="email_recipient" placeholder="Email">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phoneNumber1">Phone</label>
                                                <br>
                                                <input type="tel" class="form-control" name="phone_custom_recipient" id="phone_custom_recipient">

                                                <span id="valid-msg-recipient" class="hide"></span>
                                                <div id="error-msg-recipient" class="hide text-danger"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <h4>Address </h4>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <select style="width: 100% !important;" class="select2 form-control" name="country_modal_recipient" id="country_modal_recipient">
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="">Status</label>
                                                <select style="width: 100% !important;" disabled class="select2 form-control" id="state_modal_recipient" name="state_modal_recipient">
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="">City</label>
                                                <select style="width: 100% !important;" disabled class="select2 form-control" id="city_modal_recipient" name="city_modal_recipient">
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="phoneNumber1">Zip Code</label>
                                                <input type="text" class="form-control" name="postal_modal_recipient" id="postal_modal_recipient" placeholder="Zip Code">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="phoneNumber1">Address</label>
                                                <input type="text" class="form-control" name="address_modal_recipient" id="address_modal_recipient" placeholder="Address">
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="total_address_recipient" id="total_address_recipient" value="1" />
                                    <input type="hidden" name="phone_recipient" id="phone_recipient" />

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" id="save_data_recipient">Save</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- Modal -->
                <div class="modal fade" id="myModalAddUserAddresses" role="dialog" aria-labelledby="modal_add_address_title">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add sender address</h4>
                                <button type=" button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" method="post" id="add_address_users_from_modal_shipments" name="add_address_users_from_modal_shipments">
                                    <div class="resultados_ajax_mail text-center"></div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <select style="width: 100% !important;" class="select2 form-control" name="country_modal_user_address" id="country_modal_user_address">
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="">Status</label>
                                                <select style="width: 100% !important;" disabled class="select2 form-control" id="state_modal_user_address" name="state_modal_user_address">
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="">City</label>
                                                <select style="width: 100% !important;" disabled class="select2 form-control" id="city_modal_user_address" name="city_modal_user_address">
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="phoneNumber1">Zip Code</label>
                                                <input type="text" class="form-control" name="postal_modal_user_address" id="postal_modal_user_address" placeholder="Zip Code">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="phoneNumber1">Address</label>
                                                <input type="text" class="form-control" name="address_modal_user_address" id="address_modal_user_address" placeholder="Address">
                                            </div>
                                        </div>
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" id="save_data_address_users">Save</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- Modal -->
                <div class="modal fade" id="myModalAddRecipientAddresses" role="dialog" aria-labelledby="modal_add_address_title">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add recipient address</h4>
                                <button type=" button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" method="post" id="add_address_recipients_from_modal_shipments" name="add_address_recipients_from_modal_shipments">
                                    <div class="resultados_ajax_mail text-center"></div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <select style="width: 100% !important;" class="select2 form-control" name="country_modal_recipient_address" id="country_modal_recipient_address">
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="">Status</label>
                                                <select style="width: 100% !important;" disabled class="select2 form-control" id="state_modal_recipient_address" name="state_modal_recipient_address">
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="">City</label>
                                                <select style="width: 100% !important;" disabled class="select2 form-control" id="city_modal_recipient_address" name="city_modal_recipient_address">
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="phoneNumber1">Zip Code</label>
                                                <input type="text" class="form-control" name="postal_modal_recipient_address" id="postal_modal_recipient_address" placeholder="Zip Code">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="phoneNumber1">Address</label>
                                                <input type="text" class="form-control" name="address_modal_recipient_address" id="address_modal_recipient_address" placeholder="Address">
                                            </div>
                                        </div>
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" id="save_data_address_recipients">Save</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>


    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->


    <script>
        var translate_quantity = "Amount"
        var translate_description = "Package Description"
        var translate_weight = "Weight"
        var translate_length = "Length"
        var translate_width = "Width"
        var translate_height = "Height"
        var translate_volweight = "Weight Vol."
        var translate_charge = "Fixed charge"
        var translate_declared = "DecValue"

        var translate_label_firstname = "Enter first name"
        var translate_label_lastname = "Enter middle name"
        var translate_label_email = "Enter email"
        var translate_delete_address = "Delete address"


        var message_error_consolidate_add_packages = "Error! This package is already selected in the list."


        var translate_label_country = "Country"
        var translate_label_state = "Status"
        var translate_label_city = "City"
        var translate_label_zip = "Zip Code"
        var translate_label_address = "Address"

        var search_sender = "Search sender name"
        var search_sender_address = "Search sender address"

        var search_recipient = "Search Recipient Name"
        var search_recipient_address = "Search recipient address"

        var translate_search_country = "Search Country"
        var translate_search_state = "Search State"
        var translate_search_city = "Search City"

        var translate_search_address_country = "Country"
        var translate_search_address_state = "State"
        var translate_search_address_city = "City"
        var translate_search_address_address = "Search City"
        var translate_search_address_zip = "Postcode"
        var translate_search_origin = "Search country of origin"
        var translate_search_destiny = "Search destination country"


        var translate_graphic_0 = "January"
        var translate_graphic_1 = "February"
        var translate_graphic_2 = "March"
        var translate_graphic_3 = "April"
        var translate_graphic_4 = "May"
        var translate_graphic_5 = "June"
        var translate_graphic_6 = "July"
        var translate_graphic_7 = "August"
        var translate_graphic_8 = "September"
        var translate_graphic_9 = "October"
        var translate_graphic_10 = "November"
        var translate_graphic_11 = "December"

        var translate_graphic_12 = "Shipments"
        var translate_graphic_13 = "Registered packages"
        var translate_graphic_14 = "Pickups"
        var translate_graphic_15 = "Consolidated"
        var translate_graphic_16 = "account receivable"



        var validation_files_size = "Error! Sorry, the file size is too large. Please select files smaller than 5 MB."
        var validation_country = "Enter country"
        var validation_city = "Enter the city"
        var validation_state = "Enter the status"
        var validation_zip = "Enter zip code"
        var validation_address = "Enter address"

        var validation_discount_1 = "The discount cannot be greater than the subtotal"
        var validation_discount_2 = "Discount cannot be less than 0"

        var validation_description = "Enter description"
        var validation_quantity = "Enter amount"
        var validation_weight = "Enter weight"
        var validation_length = "Enter long"
        var validation_width = "Enter width"
        var validation_height = "Enter height"
        var validation_charge = "Enter fixed charge value"
        var validation_declared = "Enter declared value"

        var message_loading = "Please wait a moment..."
        var message_error = "There was an error processing the request!"
        var message_error_exist_tracking = "This shipment number is already tracked."


        var message_delete_confirm = "Are you sure you want to delete this record?"
        var message_delete_confirm1 = "Delete"
        var message_delete_confirm2 = "This action cannot be undone!!!"


        var message_print_confirm1 = "Print shipping labels"
        var message_print_confirm2 = "Are you sure you want to print the selected submissions?"
        var message_print_confirm3 = "Print"



        var range_calendar_text1 = "January"
        var range_calendar_text2 = "February"
        var range_calendar_text3 = "March"
        var range_calendar_text4 = "April"
        var range_calendar_text5 = "May"
        var range_calendar_text6 = "June"
        var range_calendar_text7 = "July"
        var range_calendar_text8 = "August"
        var range_calendar_text9 = "September"
        var range_calendar_text10 = "October"
        var range_calendar_text11 = "November"
        var range_calendar_text12 = "December"

        var range_calendar_text13 = "Custom Range"
        var range_calendar_text14 = "From"
        var range_calendar_text15 = "to"

        var range_calendar_text16 = "Cancel"
        var range_calendar_text17 = "Apply"


        var range_calendar_text18 = "Today"
        var range_calendar_text19 = "Yesterday"
        var range_calendar_text20 = "Last 7 days"
        var range_calendar_text21 = "Last 30 days"
        var range_calendar_text22 = "This month"
        var range_calendar_text23 = "Last month"


        var range_calendar_text24 = "Su"
        var range_calendar_text25 = "Mo"
        var range_calendar_text26 = "Tu"
        var range_calendar_text27 = "We"
        var range_calendar_text28 = "Th"
        var range_calendar_text29 = "Fr"
        var range_calendar_text30 = "Sa"
    </script>
    <footer class="footer text-center">
        &copy 2024 Deprixa pro - All rights reserved </footer>


    <script src="assets/template/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/template/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/template/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="assets/template/dist/js/app.min.js"></script>
    <script src="assets/template/dist/js/app.init.js"></script>
    <script src="assets/template/dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/template/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/template/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="assets/template/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="assets/template/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="assets/template/dist/js/custom.min.js"></script>

    <script src="assets/template/assets/extra-libs/chart.js-2.8/Chart.min.js"></script>

    <script src="dataJs/load_notifications_all.js"> </script>

    <script src="assets/template/dist/js/global.js"></script>
    <script src="assets/template/assets/libs/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/template/assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="assets/template/assets/libs/select2/dist/js/select2.min.js"></script>
    <script src="assets/template/assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <script src="assets/template/assets/libs/intlTelInput/intlTelInput.js"></script>
    <script src="dataJs/courier_add_client.js"></script>



</body>

</html>