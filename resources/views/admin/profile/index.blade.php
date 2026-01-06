@extends('admin.layouts.app')

@section('content')
    <div class="container-xl">
        <!-- BEGIN PROFILE CARD -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Update Profile</h3>
            </div>
            <div class="card-body">
                <!-- BEGIN FORM -->
                <form action="{{ route('admin.profile.update.information') }}" method="POST" enctype="multipart/form-data"
                    novalidate>
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <!-- BEGIN PROFILE IMAGE -->
                        <div class="col-md-12">
                            <div class="mb-3">
                                <x-input-image name="profile_image" :image="auth('admin')->user()->profile_image" />
                            </div>
                        </div>
                        <!-- END PROFILE IMAGE -->

                        <!-- BEGIN NAME -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Name</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{ auth('admin')->user()->name }}">
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                        </div>
                        <!-- END NAME -->

                        <!-- BEGIN EMAIL -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Email</label>
                                <input type="email" class="form-control" name="email"
                                    value="{{ auth('admin')->user()->email }}">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                        </div>
                        <!-- END EMAIL -->
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
                <!-- END FORM -->
            </div>
        </div>
        <!-- END PROFILE CARD -->

        <!-- BEGIN PASSWORD CARD -->
        <div class="card mt-5">
            <div class="card-header">
                <h3 class="card-title">Update Password</h3>
            </div>
            <div class="card-body">
                <!-- BEGIN FORM -->
                <form method="POST" action="{{ route('admin.profile.update.password') }}">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="form-group col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Current Password</label>
                                <input class="form-control" name="current_password" type="password" />
                                <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">New Password</label>
                                <input required class="form-control" name="password" type="password" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <div class="mb-3">

                                <label class="form-label required">Confirm Password</label>
                                <input required class="form-control" name="password_confirmation" type="password" />
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
                <!-- END FORM -->
            </div>
        </div>
        <!-- END PASSWORD CARD -->
    </div>
@endsection
