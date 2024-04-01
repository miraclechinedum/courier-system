 <!--start top header-->
 <header class="top-header">
     <nav class="navbar navbar-expand gap-3">
         <div class="toggle-icon">
             <ion-icon name="menu-outline"></ion-icon>
         </div>

         <form class="searchbar">
             <div class="position-absolute top-50 translate-middle-y search-icon ms-3">
                 <ion-icon name="search-outline"></ion-icon>
             </div>
             <input class="form-control" type="text" placeholder="Search for anything" />
             <div class="position-absolute top-50 translate-middle-y search-close-icon">
                 <ion-icon name="close-outline"></ion-icon>
             </div>
         </form>
         <div class="top-navbar-right ms-auto">
             <ul class="navbar-nav align-items-center">
                 <li class="nav-item">
                     <a class="nav-link mobile-search-button" href="javascript:;">
                         <div class="">
                             <img src="{{ asset('build/assets/images/icons/us.png') }}" class="user-img" alt="" style="border-radius: 0; height: 20px" />
                         </div>
                     </a>
                 </li>
                 <li class="nav-item dropdown dropdown-large">
                     <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                         <div class="position-relative">
                             <span class="notify-badge">8</span>
                             <ion-icon name="notifications-outline"></ion-icon>
                         </div>
                     </a>
                     <div class="dropdown-menu dropdown-menu-end">
                         <a href="javascript:;">
                             <div class="msg-header">
                                 <p class="msg-header-title">Notifications</p>
                                 <p class="msg-header-clear ms-auto">Marks all as read</p>
                             </div>
                         </a>
                         <div class="header-notifications-list">
                             <a class="dropdown-item" href="javascript:;">
                                 <div class="d-flex align-items-center">
                                     <div class="notify text-primary">
                                         <ion-icon name="cart-outline"></ion-icon>
                                     </div>
                                     <div class="flex-grow-1">
                                         <h6 class="msg-name">
                                             New Orders
                                             <span class="msg-time float-end">2 min ago</span>
                                         </h6>
                                         <p class="msg-info">You have recived new orders</p>
                                     </div>
                                 </div>
                             </a>
                             <a class="dropdown-item" href="javascript:;">
                                 <div class="d-flex align-items-center">
                                     <div class="notify text-danger">
                                         <ion-icon name="person-outline"></ion-icon>
                                     </div>
                                     <div class="flex-grow-1">
                                         <h6 class="msg-name">
                                             New Customers<span class="msg-time float-end">14 Sec ago</span>
                                         </h6>
                                         <p class="msg-info">5 new user registered</p>
                                     </div>
                                 </div>
                             </a>
                             <a class="dropdown-item" href="javascript:;">
                                 <div class="d-flex align-items-center">
                                     <div class="notify text-success">
                                         <ion-icon name="document-outline"></ion-icon>
                                     </div>
                                     <div class="flex-grow-1">
                                         <h6 class="msg-name">
                                             24 PDF File<span class="msg-time float-end">19 min ago</span>
                                         </h6>
                                         <p class="msg-info">The pdf files generated</p>
                                     </div>
                                 </div>
                             </a>

                             <a class="dropdown-item" href="javascript:;">
                                 <div class="d-flex align-items-center">
                                     <div class="notify text-info">
                                         <ion-icon name="checkmark-done-outline"></ion-icon>
                                     </div>
                                     <div class="flex-grow-1">
                                         <h6 class="msg-name">
                                             New Product Approved
                                             <span class="msg-time float-end">2 hrs ago</span>
                                         </h6>
                                         <p class="msg-info">Your new product has approved</p>
                                     </div>
                                 </div>
                             </a>
                             <a class="dropdown-item" href="javascript:;">
                                 <div class="d-flex align-items-center">
                                     <div class="notify text-warning">
                                         <ion-icon name="send-outline"></ion-icon>
                                     </div>
                                     <div class="flex-grow-1">
                                         <h6 class="msg-name">
                                             Time Response
                                             <span class="msg-time float-end">28 min ago</span>
                                         </h6>
                                         <p class="msg-info">5.1 min avarage time response</p>
                                     </div>
                                 </div>
                             </a>
                             <a class="dropdown-item" href="javascript:;">
                                 <div class="d-flex align-items-center">
                                     <div class="notify text-danger">
                                         <ion-icon name="chatbox-ellipses-outline"></ion-icon>
                                     </div>
                                     <div class="flex-grow-1">
                                         <h6 class="msg-name">
                                             New Comments
                                             <span class="msg-time float-end">4 hrs ago</span>
                                         </h6>
                                         <p class="msg-info">New customer comments recived</p>
                                     </div>
                                 </div>
                             </a>
                             <a class="dropdown-item" href="javascript:;">
                                 <div class="d-flex align-items-center">
                                     <div class="notify text-primary">
                                         <ion-icon name="albums-outline"></ion-icon>
                                     </div>
                                     <div class="flex-grow-1">
                                         <h6 class="msg-name">
                                             New 24 authors<span class="msg-time float-end">1 day ago</span>
                                         </h6>
                                         <p class="msg-info">
                                             24 new authors joined last week
                                         </p>
                                     </div>
                                 </div>
                             </a>
                             <a class="dropdown-item" href="javascript:;">
                                 <div class="d-flex align-items-center">
                                     <div class="notify text-success">
                                         <ion-icon name="shield-outline"></ion-icon>
                                     </div>
                                     <div class="flex-grow-1">
                                         <h6 class="msg-name">
                                             Your item is shipped
                                             <span class="msg-time float-end">5 hrs ago</span>
                                         </h6>
                                         <p class="msg-info">Successfully shipped your item</p>
                                     </div>
                                 </div>
                             </a>
                             <a class="dropdown-item" href="javascript:;">
                                 <div class="d-flex align-items-center">
                                     <div class="notify text-warning">
                                         <ion-icon name="cafe-outline"></ion-icon>
                                     </div>
                                     <div class="flex-grow-1">
                                         <h6 class="msg-name">
                                             Defense Alerts
                                             <span class="msg-time float-end">2 weeks ago</span>
                                         </h6>
                                         <p class="msg-info">45% less alerts last 4 weeks</p>
                                     </div>
                                 </div>
                             </a>
                         </div>
                         <a href="javascript:;">
                             <div class="text-center msg-footer">
                                 View All Notifications
                             </div>
                         </a>
                     </div>
                 </li>
                 <li class="nav-item dropdown dropdown-user-setting">
                     <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                         <div class="user-setting">
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                 <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                 <circle cx="12" cy="7" r="4"></circle>
                             </svg>
                         </div>
                     </a>
                     <ul class="dropdown-menu dropdown-menu-end">
                         <li>
                             <a class="dropdown-item" href="javascript:;">
                                 <div class="d-flex flex-row align-items-center gap-2">
                                     <div class="">
                                         <h6 class="mb-0 dropdown-user-name">{{ auth()->user()->name }}</h6>
                                         <small class="mb-0 dropdown-user-designation text-secondary">{{ auth()->user()->email }}</small>
                                     </div>
                                 </div>
                             </a>
                         </li>
                         <li>
                             <hr class="dropdown-divider" />
                         </li>
                         <!-- <li>
                             <a class="dropdown-item" href="javascript:;">
                                 <div class="d-flex align-items-center">
                                     <div class="">
                                         <ion-icon name="person-outline"></ion-icon>
                                     </div>
                                     <div class="ms-3"><span>Profile</span></div>
                                 </div>
                             </a>
                         </li> -->
                         <li>
                             <hr class="dropdown-divider" />
                         </li>
                         <li>
                             <a class="dropdown-item" href="javascript:;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                 <div class="d-flex align-items-center">
                                     <div class="">
                                         <ion-icon name="log-out-outline"></ion-icon>
                                     </div>
                                     <div class="ms-3"><span>Logout</span></div>
                                 </div>
                             </a>
                         </li>
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                             @csrf
                         </form>
                     </ul>
                 </li>
             </ul>
         </div>
     </nav>
 </header>
 <!--end top header-->