<x-guest-layout>
    <section class="cover-user bg-white">
        <div class="container-fluid px-0">
            <div class="row g-0 position-relative">
                <div class="col-lg-5 cover-my-30 order-2">
                    <div class="cover-user-img d-lg-flex align-items-center">
                        <div class="row">
                            <div id="resultados_ajax"></div>
                            <div class="col-12">
                                <div class="card border-0" style="z-index: 1">
                                    <div class="card-body p-0">
                                        <div class="text-center">
                                            <h4 class="card-title text-center">Sign up now!</h4>
                                            <p>Let's set up your account in just a couple of steps.</p>
                                        </div>

                                        <div id="msgholder2">
                                            <x-validation-errors class="mb-4" />
                                        </div>

                                        <form class="login-form mt-4" id="new_register" name="new_register" method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Name <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons">
                                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                <circle cx="12" cy="7" r="4"></circle>
                                                            </svg>
                                                            <input type="text" class="form-control ps-5" placeholder="Name" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end col-->

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone fea icon-sm icons">
                                                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                                            </svg>
                                                            <input type="tel" class="form-control ps-5" placeholder="Phone Number" name="phone_number" :value="old('phone_number')" required autofocus autocomplete="phone_number" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end col -->

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Email <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail fea icon-sm icons">
                                                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                                                <polyline points="22,6 12,13 2,6"></polyline>
                                                            </svg>
                                                            <input type="email" class="form-control ps-5" placeholder="Email" name="email" :value="old('email')" required autocomplete="username" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end col-->

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Password <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key fea icon-sm icons">
                                                                <path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path>
                                                            </svg>
                                                            <input type="password" class="form-control ps-5" placeholder="Password" name="password" required autocomplete="new-password" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end col-->

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key fea icon-sm icons">
                                                                <path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path>
                                                            </svg>
                                                            <input type="password" class="form-control ps-5" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end col-->


                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <div class="form-check">

                                                            <input type="checkbox" class="form-check-input" id="terms" name="terms" value="yes" required>
                                                            <label class="form-check-label" for="flexCheckDefault">You agree <a href="#" class="text-primary"> terms and conditions</a></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end col-->

                                                <div class="col-md-12">
                                                    <div class="d-grid">
                                                        <button class="btn btn-grad-register" name="dosubmit">Sign Up Free</button>
                                                        <input name="locker" type="hidden" id="locker" value="490400">
                                                    </div>
                                                </div>
                                                <!--end col-->


                                                <div class="mx-auto">
                                                    <p class="mb-0 mt-3"><small class="text-dark me-2">Already have an account?</small> <a href="/login" class="text-dark fw-bold">Login</a></p>
                                                </div>
                                            </div>
                                            <!--end row-->
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </div> <!-- end about detail -->
                </div> <!-- end col -->

                <div class="col-lg-7 offset-lg-5 padding-less img order-1" style="background-image:url('build/assets/images/user/02.jpg')" data-jarallax="{&quot;speed&quot;: 0.5}">

                </div><!-- end col -->
            </div>
            <!--end row-->
        </div>
        <!--end container fluid-->
    </section>
</x-guest-layout>