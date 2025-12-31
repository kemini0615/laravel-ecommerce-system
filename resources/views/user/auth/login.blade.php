@extends('user.layouts.app')

@section('content')
    <!-- BEGIN BREADCRUMBS -->
    <x-user.breadcrumbs :items="[['label' => 'Home', 'url' => '/'], ['label' => 'Login']]" />
    <!-- END BREADCRUMBS -->

    <!-- BEGIN LOGIN -->
    <div class="page-content pt-150 pb-135">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                    <div class="row">
                        <div class="col-lg-6 pr-30 d-none d-lg-block">
                            <img class="border-radius-15" src="{{ asset('assets/user/imgs/page/login-1.png') }}"
                                alt="Login" />
                        </div>
                        <div class="col-lg-6 col-md-8">
                            <div class="login_wrap widget-taber-content background-white">
                                <div class="padding_eight_all bg-white">
                                    <div class="heading_s1">
                                        <h1 class="mb-5">Login</h1>
                                        <p class="mb-30">Don't have an account? <a href="{{ route('register') }}">Create
                                                here</a>
                                        </p>
                                    </div>

                                    <!-- BEGIN SESSION STATUS -->
                                    <x-auth-session-status class="mb-4" :status="session('status')" />
                                    <!-- END SESSION STATUS -->

                                    <!-- BEGIN FORM -->
                                    <form method="POST" action="{{ route('login') }}" novalidate>
                                        @csrf

                                        <!-- BEGIN EMAIL -->
                                        <div class="form-group">
                                            <input type="text" required name="email" id="email"
                                                value="{{ old('email') }}" placeholder="Your email" />
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                                        <!-- END EMAIL -->

                                        <!-- BEGIN PASSWORD -->
                                        <div class="form-group">
                                            <input required type="password" name="password" id="password"
                                                placeholder="Your password" />
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>
                                        <!-- END PASSWORD -->

                                        <div class="login_footer form-group mb-50">
                                            <!-- BEGIN REMEMBER ME -->
                                            <div class="chek-form">
                                                <div class="custome-checkbox">
                                                    <input class="form-check-input" type="checkbox" name="remember"
                                                        id="remember_me" />
                                                    <label class="form-check-label" for="remember_me"><span>Remember
                                                            me</span></label>
                                                </div>
                                            </div>
                                            <!-- END REMEMBER ME -->

                                            <!-- BEGIN FORGOT PASSWORD -->
                                            <a class="text-muted" href="{{ route('password.request') }}">Forgot
                                                password?</a>
                                            <!-- END FORGOT PASSWORD -->
                                        </div>

                                        <!-- BEGIN BUTTON -->
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-heading btn-block hover-up"
                                                name="login">Log in</button>
                                        </div>
                                        <!-- END BUTTON -->
                                    </form>
                                    <!-- END FORM -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END LOGIN -->
@endsection
