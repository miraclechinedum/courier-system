<!--start sidebar -->
<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="build/assets/images/logo-icon-2.png" class="logo-icon" alt="logo icon" />
        </div>
        <div>
            <h4 class="logo-text">SpeedyLogistics</h4>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('dashboard') }}">
                <div class="parent-icon">
                    <ion-icon name="home-outline"></ion-icon>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                    <ion-icon name="bag-handle-outline"></ion-icon>
                </div>
                <div class="menu-title">Booking</div>
            </a>
            <ul>
                <li>
                    <a href="{{ route('bookings.index') }}">
                        <ion-icon name="ellipse-outline"></ion-icon>My Bookings
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-label">Pages</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                </div>
                <div class="menu-title">Authentication</div>
            </a>
            <ul>
                <li>
                    <a href="authentication-sign-in-basic.html">
                        <ion-icon name="ellipse-outline"></ion-icon>Sign In Basic
                    </a>
                </li>
                <li>
                    <a href="authentication-sign-in-cover.html">
                        <ion-icon name="ellipse-outline"></ion-icon>Sign In Cover
                    </a>
                </li>
                <li>
                    <a href="authentication-sign-in-simple.html">
                        <ion-icon name="ellipse-outline"></ion-icon>Sign In Simple
                    </a>
                </li>
                <li>
                    <a href="authentication-sign-up-basic.html">
                        <ion-icon name="ellipse-outline"></ion-icon>Sign Up Basic
                    </a>
                </li>
                <li>
                    <a href="authentication-sign-up-cover.html">
                        <ion-icon name="ellipse-outline"></ion-icon>Sign Up Cover
                    </a>
                </li>
                <li>
                    <a href="authentication-sign-up-simple.html">
                        <ion-icon name="ellipse-outline"></ion-icon>Sign Up Simple
                    </a>
                </li>
                <li>
                    <a href="authentication-reset-password-basic.html">
                        <ion-icon name="ellipse-outline"></ion-icon>Reset Password
                        Basic
                    </a>
                </li>
                <li>
                    <a href="authentication-reset-password-cover.html">
                        <ion-icon name="ellipse-outline"></ion-icon>Reset Password
                        Cover
                    </a>
                </li>
                <li>
                    <a href="authentication-reset-password-simple.html">
                        <ion-icon name="ellipse-outline"></ion-icon>Reset Password
                        Simple
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="pages-user-profile.html">
                <div class="parent-icon">
                    <ion-icon name="person-circle-outline"></ion-icon>
                </div>
                <div class="menu-title">User Profile</div>
            </a>
        </li>
        <li>
            <a href="pages-edit-profile.html">
                <div class="parent-icon">
                    <ion-icon name="create-outline"></ion-icon>
                </div>
                <div class="menu-title">Edit Profile</div>
            </a>
        </li>
        <li>
            <a href="pages-invoices.html">
                <div class="parent-icon">
                    <ion-icon name="receipt-outline"></ion-icon>
                </div>
                <div class="menu-title">Invoice</div>
            </a>
        </li>
        <li>
            <a href="pages-to-do.html">
                <div class="parent-icon">
                    <ion-icon name="shield-checkmark-outline"></ion-icon>
                </div>
                <div class="menu-title">Invoice</div>
            </a>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon">
                    <ion-icon name="copy-outline"></ion-icon>
                </div>
                <div class="menu-title">Extra Pages</div>
            </a>
            <ul>
                <li>
                    <a href="pages-faq.html">
                        <ion-icon name="ellipse-outline"></ion-icon>FAQ
                    </a>
                </li>
                <li>
                    <a href="pages-pricing-tables.html">
                        <ion-icon name="ellipse-outline"></ion-icon>Pricing
                    </a>
                </li>
                <li>
                    <a href="pages-errors-404-error.html">
                        <ion-icon name="ellipse-outline"></ion-icon>404 Error
                    </a>
                </li>
                <li>
                    <a href="pages-errors-500-error.html">
                        <ion-icon name="ellipse-outline"></ion-icon>500 Error
                    </a>
                </li>
                <li>
                    <a href="pages-errors-coming-soon.html">
                        <ion-icon name="ellipse-outline"></ion-icon>Coming Soon
                    </a>
                </li>
                <li>
                    <a href="pages-starter-page.html">
                        <ion-icon name="ellipse-outline"></ion-icon>Blank Page
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-label">Charts & Maps</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon">
                    <ion-icon name="bar-chart-outline"></ion-icon>
                </div>
                <div class="menu-title">Charts</div>
            </a>
            <ul>
                <li>
                    <a href="charts-apex-chart.html">
                        <ion-icon name="ellipse-outline"></ion-icon>Apex
                    </a>
                </li>
                <li>
                    <a href="charts-chartjs.html">
                        <ion-icon name="ellipse-outline"></ion-icon>Chartjs
                    </a>
                </li>
                <li>
                    <a href="charts-peity.html">
                        <ion-icon name="ellipse-outline"></ion-icon>Peity
                    </a>
                </li>
                <li>
                    <a href="charts-other.html">
                        <ion-icon name="ellipse-outline"></ion-icon>Other Charts
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon">
                    <ion-icon name="map-outline"></ion-icon>
                </div>
                <div class="menu-title">Maps</div>
            </a>
            <ul>
                <li>
                    <a href="map-google-maps.html">
                        <ion-icon name="ellipse-outline"></ion-icon>Google Maps
                    </a>
                </li>
                <li>
                    <a href="map-vector-maps.html">
                        <ion-icon name="ellipse-outline"></ion-icon>Vector Maps
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-label">Settings</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon">
                    <ion-icon name="list-outline"></ion-icon>
                </div>
                <div class="menu-title">Locations</div>
            </a>
            <ul>
                <li>
                    <a href="{{ route('countries.index') }}">
                        <ion-icon name="ellipse-outline"></ion-icon>Countries
                    </a>
                </li>
                <li>
                    <a href="{{ route('states.index') }}">
                        <ion-icon name="ellipse-outline"></ion-icon>States
                    </a>
                </li>
                <li>
                    <a href="{{ route('cities.index') }}">
                        <ion-icon name="ellipse-outline"></ion-icon>Cities
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;">
                <div class="parent-icon">
                    <ion-icon name="document-text-outline"></ion-icon>
                </div>
                <div class="menu-title">Rate Calculator</div>
            </a>
        </li>
        <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <div class="parent-icon">
                    <ion-icon name="link-outline"></ion-icon>
                </div>
                <div class="menu-title">Logout</div>
            </a>
        </li>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </ul>
    <!--end navigation-->
</aside>
<!--end sidebar -->