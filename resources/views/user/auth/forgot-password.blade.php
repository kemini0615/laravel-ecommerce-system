@extends('user.layouts.app')

@section('content')
    <!-- BEGIN BREADCRUMBS -->
    <x-user.breadcrumbs :items="[['label' => 'Home', 'url' => '/'], ['label' => 'Forgot Password']]" />
    <!-- END BREADCRUMBS -->

    <!-- BEGIN FORGOT PASSWORD -->
    <div class="page-content pt-150 pb-140">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-12 m-auto">
                    <div class="login_wrap widget-taber-content background-white">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <img class="border-radius-15" src="{{ asset('assets/user/imgs/page/forgot_password.svg') }}"
                                    alt="Forgot Password" />
                                <h3 class="mb-15 mt-15">Forgot your password?</h3>
                            </div>

                            <!-- BEGIN SESSION STATUS -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />
                            <!-- END SESSION STATUS -->

                            <!-- BEGIN FORM -->
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <!-- BEGIN EMAIL -->
                                <div class="form-group">
                                    <input type="text" required name="email" id="email" value="{{ old('email') }}"
                                        placeholder="Your email" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                                <!-- END EMAIL -->

                                <!-- BEGIN BUTTON -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-heading btn-block hover-up" name="login">Email
                                        Password Reset Link</button>
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
    <!-- END FORGOT PASSWORD -->
@endsection
