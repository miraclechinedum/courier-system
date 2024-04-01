<!--start sidebar -->
<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('build/assets/images/logo-icon-2.png') }}" class="logo-icon" alt="logo icon" />
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
        <li class="menu-label">Settings</li>
        @if(auth()->id() == 1)
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
        @endif

        <li>
            <a href="{{ route('recipients') }}">
                <div class="parent-icon">
                    <i class="lni lni-users"></i>
                </div>
                <div class="menu-title">My Recipients</div>
            </a>
        </li>
        @if(auth()->id() == 1)
        <li>
            <a href="javascript:;">
                <div class="parent-icon">
                    <i class="lni lni-calculator"></i>
                </div>
                <div class="menu-title">Rate Calculator</div>
            </a>
        </li>
        @endif


        <li class="menu-label">Mics</li>
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