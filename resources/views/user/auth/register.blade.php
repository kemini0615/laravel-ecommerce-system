@extends('user.layouts.app')

@section('content')
    <!-- BEGIN BREADCRUMBS -->
    <x-user.breadcrumbs :items="[['label' => 'Home', 'url' => '/'], ['label' => 'Register']]" />
    <!-- END BREADCRUMBS -->

    <!-- BEGIN REGISTER -->
    <div class="page-content pt-150 pb-140">
        <div class="container">
            <div class="row">
                <div class="col-12 m-auto">
                    <div class="row align-items-center">
                        <div class="col-lg-6 offset-lg-3">
                            <div class="login_wrap widget-taber-content background-white">
                                <div class="padding_eight_all bg-white">
                                    <div class="heading_s1">
                                        <h2 class="mb-5">Create an Account</h2>
                                        <p class="mb-30">Already have an account? <a href="{{ route('login') }}">Login</a>
                                        </p>
                                    </div>

                                    <!-- BEGIN FORM -->
                                    <form method="POST" action="{{ route('register') }}" novalidate>
                                        @csrf

                                        <!-- BEGIN NAME -->
                                        <div class="form-group">
                                            <input type="text" required name="name" id="name" placeholder="Name"
                                                value="{{ old('name') }}" />
                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                        </div>
                                        <!-- END NAME -->

                                        <!-- BEGIN EMAIL -->
                                        <div class="form-group">
                                            <input type="text" required name="email" id="email" placeholder="Email"
                                                value="{{ old('email') }}" />
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                                        <!-- END EMAIL -->

                                        <!-- BEGIN PASSWORD -->
                                        <div class="form-group">
                                            <input required type="password" id="password" name="password"
                                                placeholder="Password" />
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>
                                        <!-- END PASSWORD -->

                                        <!-- BEGIN CONFIRM PASSWORD -->
                                        <div class="form-group">
                                            <input required type="password" name="password_confirmation"
                                                id="password_confirmation" placeholder="Confirm password" />
                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                        </div>
                                        <!-- END CONFIRM PASSWORD -->

                                        <div class="payment_option mb-30">
                                            <div class="custom-radio">
                                                <input class="form-check-input" required type="radio"
                                                    name="payment_option" id="exampleRadios3" checked />
                                                <label class="form-check-label" for="exampleRadios3"
                                                    data-bs-toggle="collapse" data-target="#bankTranfer"
                                                    aria-controls="bankTranfer">Customer</label>
                                            </div>
                                            <div class="custom-radio">
                                                <input class="form-check-input" required type="radio"
                                                    name="payment_option" id="exampleRadios4" />
                                                <label class="form-check-label" for="exampleRadios4"
                                                    data-bs-toggle="collapse" data-target="#checkPayment"
                                                    aria-controls="checkPayment">Vendor</label>
                                            </div>
                                        </div>
                                        <div class="form-group mb-0">
                                            <button type="submit"
                                                class="btn btn-fill-out btn-block hover-up font-weight-bold"
                                                name="login">Register</button>
                                        </div>
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
    <!-- END REGISTER -->
@endsection
