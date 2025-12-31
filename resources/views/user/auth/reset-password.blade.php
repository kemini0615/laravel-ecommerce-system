@extends('user.layouts.app')

@section('content')
    <!-- BEGIN BREADCRUMBS -->
    <x-user.breadcrumbs :items="[['label' => 'Home', 'url' => '/'], ['label' => 'Reset Password']]" />
    <!-- END BREADCRUMBS -->

    <!-- BEGIN RESET PASSWORD -->
    <div class="page-content pt-150 pb-140">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-12 m-auto">
                    <div class="login_wrap widget-taber-content background-white">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <h3 class="mb-15 mt-15">Reset Password</h3>
                            </div>

                            <!-- BEGIN SESSION STATUS -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />
                            <!-- END SESSION STATUS -->

                            <!-- BEGIN FORM -->
                            <form method="POST" action="{{ route('password.store') }}">
                                @csrf

                                <!-- BEGIN PASSWORD RESET TOKEN -->
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                <!-- END PASSWORD RESET TOKEN -->

                                <!-- BEGIN EMAIL -->
                                <div class="form-group">
                                    <input type="text" required name="email" id="email"
                                        value="{{ old('email', $request->email) }}" placeholder="Your email" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                                <!-- END EMAIL -->

                                <!-- BEGIN PASSWORD -->
                                <div class="form-group">
                                    <input required type="password" id="password" name="password"
                                        placeholder="New password" />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                                <!-- END PASSWORD -->

                                <!-- BEGIN CONFIRM PASSWORD -->
                                <div class="form-group">
                                    <input required type="password" name="password_confirmation" id="password_confirmation"
                                        placeholder="Confirm password" />
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                                <!-- END CONFIRM PASSWORD -->

                                <!-- BEGIN BUTTON -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-heading btn-block hover-up" name="login">Reset
                                        Password</button>
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
    <!-- END RESET PASSWORD -->
@endsection
