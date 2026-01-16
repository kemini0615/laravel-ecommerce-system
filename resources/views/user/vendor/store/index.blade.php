@extends('user.vendor.layouts.app')

@section('content')
    <div class="container-xl">
        <!-- BEGIN STORE CARD -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Update Store</h3>
            </div>
            <div class="card-body">
                <!-- BEGIN FORM -->
                <form action="" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <!-- BEGIN LOGO -->
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="logo" class="form-label">Logo</label>
                                <x-input-image name="logo_image" :image="auth('web')->user()->logo" id="logo" />
                                <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                            </div>
                        </div>
                        <!-- END LOGO -->

                        <!-- BEGIN BANNER -->
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="banner" class="form-label">Banner</label>
                                <x-input-image name="banner_image" :image="auth('web')->user()->banner" id="banner" />
                                <x-input-error :messages="$errors->get('banner')" class="mt-2" />
                            </div>
                        </div>
                        <!-- END BANNER -->

                        <!-- BEGIN NAME -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Name</label>
                                <input type="text" class="form-control" name="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                        </div>
                        <!-- END NAME -->

                        <!-- BEGIN ADDRESS -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Address</label>
                                <input type="text" class="form-control" name="address" />
                                <x-input-error :messages="$errors->get('address')" class="mt-2" />
                            </div>
                        </div>
                        <!-- END ADDRESS -->

                        <!-- BEGIN PHONE -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Phone</label>
                                <input type="text" class="form-control" name="phone" />
                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                            </div>
                        </div>
                        <!-- END PHONE -->

                        <!-- BEGIN EMAIL -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Email</label>
                                <input type="email" class="form-control" name="email" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                        </div>
                        <!-- END EMAIL -->

                        <!-- BEGIN SHORT DESCRIPTION -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Short Description</label>
                                <textarea class="form-control" name="short_description"></textarea>
                                <x-input-error :messages="$errors->get('short_description')" class="mt-2" />
                            </div>
                        </div>
                        <!-- END SHORT DESCRIPTION -->

                        <!-- BEGIN LONG DESCRIPTION -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Long Description</label>
                                <textarea class="form-control" name="long_description"></textarea>
                                <x-input-error :messages="$errors->get('long_description')" class="mt-2" />
                            </div>
                        </div>
                        <!-- END LONG DESCRIPTION -->
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
                <!-- END FORM -->
            </div>
        </div>
        <!-- END STORE CARD -->
    </div>
@endsection
