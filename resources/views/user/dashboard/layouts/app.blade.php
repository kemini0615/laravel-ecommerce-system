@extends('user.layouts.app')

@section('content')
    <!-- BEGIN BREADCRUMBS -->
    <x-user.breadcrumbs :items="[['label' => 'Home', 'url' => '/'], ['label' => 'Dashboard']]" />
    <!-- END BREADCRUMBS -->

    <!-- BEGIN DASHBOARD -->
    <div class="page-content pt-70 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <!-- BEGIN DASHBOARD TABS -->
                        <div class="col-md-3">
                            <div class="dashboard-menu">
                                <ul class="nav flex-column" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#"><i
                                                class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#orders"><i
                                                class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#track-orders"><i
                                                class="fi-rs-shopping-cart-check mr-10"></i>Track Your
                                            Order</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#address"><i class="fi-rs-marker mr-10"></i>My Address</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#account-detail"><i class="fi-rs-user mr-10"></i>Account
                                            details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#wishlist-tab"><i class="fi-rs-heart mr-10"></i>Wishlist</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- END DASHBOARD TABS -->

                        <!-- BEGIN DASHBOARD CONTENT -->
                        <div class="col-md-9">
                            <div class="tab-content account dashboard-content pl-50">
                                @yield('dashboard.content')
                            </div>
                        </div>
                        <!-- END DASHBOARD CONTENT -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END DASHBOARD -->
@endsection
