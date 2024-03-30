<x-guest-layout>

    <section class="cover-user bg-white">
        <div class="container-fluid px-0">
            <div class="row g-0 position-relative">
                <div class="col-lg-5 cover-my-30 order-2">
                    <div class="cover-user-img d-flex align-items-center">
                        <div class="row">
                            <div class="col-12">
                                <div class="card login-page border-0" style="z-index: 1">
                                    <div class="card-title text-center">
                                        <a class="logo" href="index.php">
                                            <img src="assets/uploads/1648521991_logo.png" alt="SpeedyPost Logistics" width="190" height="45">

                                        </a>
                                    </div>
                                    <div><br></div>
                                    @if(session('status'))
                                    <div class="alert alert-info">
                                        {{ session('status') }}
                                    </div>
                                    @endif
                                    <div class="card-body p-0">
                                        <h4 class="card-title text-center">Welcome to SpeedyPost Logistics</h4>
                                        <p class="text-center">Log in to your account and start your adventure.</p>

                                        <div id="msgholder2">
                                            <x-validation-errors class="mb-4" />
                                        </div>

                                        <div id="loader" style="display:none"></div>
                                        <form class="login-form mt-4" method="POST" action="{{ route('login') }}" name="login_form" id="login-form">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Email <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons">
                                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                <circle cx="12" cy="7" r="4"></circle>
                                                            </svg>
                                                            <input class="form-control ps-5" type="email" name="email" :value="old('email')" placeholder="Email" required autofocus>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end col-->

                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Password <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key fea icon-sm icons">
                                                                <path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path>
                                                            </svg>
                                                            <input type="password" class="form-control ps-5" placeholder="Password" name="password" required autocomplete="current-password" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end col-->

                                                <div class="col-lg-12">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="mb-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                <label class="form-check-label" for="flexCheckDefault">Remember me</label>
                                                            </div>
                                                        </div>
                                                        <p class="forgot-pass mb-0"><a href="forgot-password.php" class="text-dark fw-bold">Forgot your password ?</a></p>
                                                    </div>
                                                </div>
                                                <!--end col-->

                                                <div class="col-lg-12 mb-0">
                                                    <div class="d-grid">
                                                        <button class="btn btn-grad">Enter</button>
                                                        <input name="login" type="hidden" value="1">
                                                    </div>
                                                </div>
                                                <!--end col-->


                                                <div class="col-12 text-center">
                                                    <p class="mb-0 mt-3"><small class="text-dark me-2">Don't have an account ?</small> <a href="/register" class="text-dark fw-bold">Sign up</a></p>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->
                                        </form>
                                        <!--end col-->
                                    </div>
                                </div>
                            </div>
                            <!--end col-->

                        </div>
                        <!--end row-->
                    </div> <!-- end about detail -->
                </div> <!-- end col -->

                <div class="col-lg-7 offset-lg-5 padding-less img order-1" style="background-image:url('build/assets/images/user/01.jpg')" data-jarallax="{&quot;speed&quot;: 0.5}"></div><!-- end col -->
            </div>
            <!--end row-->
        </div>
        <!--end container fluid-->
    </section>


</x-guest-layout>