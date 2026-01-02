@extends('user.dashboard.layouts.app')

@section('dashboard.content')
    <div id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <!-- BEGIN PROFILE UPDATE -->
        <div class="card">
            <div class="card-header p-0">
                <h5>Profile</h5>
            </div>
            <div class="card-body p-0">
                <p>Edit your information</p>

                <!-- BEGIN FORM -->
                <form method="POST" action="{{ route('profile.update.information') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row mt-30">
                        <x-input-image name="profile_image" :image="auth()->user()->profile_image" />

                        <div class="form-group col-md-12">
                            <label>Name</label>
                            <input required class="form-control" name="name" type="text"
                                value="{{ auth('web')->user()->name }}" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="form-group col-md-12">
                            <label>Email Address</label>
                            <input required class="form-control" name="email" type="email"
                                value="{{ auth('web')->user()->email }}" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-fill-out submit font-weight-bold">Save Change</button>
                        </div>
                    </div>
                </form>
                <!-- END FORM -->
            </div>
        </div>
        <!-- END PROFILE UPDATE -->

        <hr class="mtb-50" />

        <!-- BEGIN PASSWORD UPDATE -->
        <div class="card">
            <div class="card-header p-0">
                <h5>Password</h5>
            </div>
            <div class="card-body p-0">
                <p>Update your password</p>

                <!-- BEGIN FORM -->
                <form method="POST" action="{{ route('profile.update.password') }}">
                    @csrf
                    @method('PUT')

                    <div class="row mt-30">
                        <div class="form-group col-md-12">
                            <label>Current Password</label>
                            <input class="form-control" name="current_password" type="password" />
                            <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
                        </div>

                        <div class="form-group col-md-12">
                            <label>New Password</label>
                            <input required class="form-control" name="password" type="password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div class="form-group col-md-12">
                            <label>Confirm Password</label>
                            <input required class="form-control" name="password_confirmation" type="password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-fill-out submit font-weight-bold">Save Change</button>
                        </div>
                    </div>
                </form>
                <!-- END FORM -->
            </div>
        </div>
        <!-- END PASSWORD UPDATE -->
    </div>
@endsection
