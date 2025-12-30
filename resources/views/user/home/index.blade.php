@extends('user.layouts.app')

@section('content')
    <!-- BEGIN HERO -->
    @include('user.home.partials.hero')
    <!-- END HERO -->

    <!-- BEGIN TOP CATEGORIES -->
    @include('user.home.partials.top-categories')
    <!--END TOP CATEGORIES -->

    <!-- BEGIN BANNERS 1 -->
    @include('user.home.partials.banners-1')
    <!-- END BANNERS 1 -->

    <!-- BEGIN POPULAR PRODUCTS -->
    @include('user.home.partials.popular-products')
    <!-- END POPULAR PRODUCTS -->

    <!-- BEGIN BANNERS 2 -->
    @include('user.home.partials.banners-2')
    <!-- END BANNERS 2 -->

    <!-- BEGIN DAILY BEST -->
    @include('user.home.partials.daily-best')
    <!-- END DAILY BEST -->

    <!-- BEGIN NEW ARRIVAL -->

    @include('user.home.partials.new-arrival')
    <!-- END NEW ARRIVAL -->

    <!-- BEGIN CTA -->
    @include('user.home.partials.cta')
    <!-- END CTA -->

    <!-- BEGIN SPECIAL PRODUCTS -->
    @include('user.home.partials.special-products')
    <!-- END SPECIAL PRODUCTS -->

    <!-- BEGIN TABLE -->
    @include('user.home.partials.table')
    <!-- END TABLE -->
@endsection
