@extends('user.layouts.app')

@section('content')
    <!-- BEGIN BREADCRUMBS -->
    <x-user.breadcrumbs :items="[['label' => 'Home', 'url' => '/'], ['label' => 'Login']]" />
    <!-- END BREADCRUMBS -->

    <!-- BEGIN KYC VERIFICATION -->
    <div class="page-content pt-150 pb-135">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                    <div class="row">
                        <div class="col-lg-6 col-md-8 offset-lg-3">
                            <div class="login_wrap widget-taber-content background-white">
                                <div class="padding_eight_all bg-white">
                                    <div class="heading_s1 mb-4">
                                        <h3>KYC Verification</h3>
                                    </div>

                                    <!-- BEGIN SESSION STATUS -->
                                    <x-auth-session-status class="mb-4" :status="session('status')" />
                                    <!-- END SESSION STATUS -->

                                    <!-- BEGIN FORM -->
                                    <form method="POST" action="{{ route('kyc.verification.store') }}"
                                        enctype="multipart/form-data" novalidate>
                                        @csrf

                                        <!-- BEGIN NAME -->
                                        <div class="form-group">
                                            <label for="name" class="form-label">Name <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" required name="name" id="name" value="{{ old('name') }}"
                                                placeholder="Jane Doe" />
                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                        </div>
                                        <!-- END NAME -->

                                        <!-- BEGIN DATE OF BIRTH -->
                                        <div class="form-group">
                                            <label for="date_of_birth" class="form-label">Date of birth <span
                                                    class="text-danger">*</span></label>
                                            <input type="date" required name="date_of_birth" id="date-input" value="{{ old('date_of_birth') }}"
                                                placeholder="2000/01/01" />
                                            <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
                                        </div>
                                        <!-- END DATE OF BIRTH -->

                                        <!-- BEGIN GENDER -->
                                        <div class="form-group">
                                            <label for="gender" class="form-label">Gender <span
                                                    class="text-danger">*</span></label>
                                            <select required name="gender" id="gender" class="form-control">
                                                <option>Gender</option>
                                                <option value="male" @selected(old('gender') === 'male')>Male</option>
                                                <option value="female" @selected(old('gender') === 'femail')>Female</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                                        </div>
                                        <!-- END GENDER -->

                                        <!-- BEGIN ADDRESS -->
                                        <div class="form-group">
                                            <label for="address" class="form-label">Address <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" required name="address" id="address" value="{{ old('address') }}" />
                                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                                        </div>
                                        <!-- END ADDRESS -->

                                        <!-- BEGIN DOCUMENT TYPE -->
                                        <div class="form-group">
                                            <label for="document_type" class="form-label">Document Type <span
                                                    class="text-danger">*</span></label>
                                            <select required name="document_type" id="document_type" class="form-control">
                                                <option>Document Type</option>
                                                <option value="passport" @selected(old('document_type') === 'passport')>Passport</option>
                                                <option value="driver_license" @selected(old('document_type') === 'driver_license')>Driver License</option>
                                                <option value="id_card" @selected(old('document_type') === 'id_card')>ID Card</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('document_type')" class="mt-2" />
                                        </div>
                                        <!-- END DOCUMENT TYPE -->

                                        <!-- BEGIN DOCUMENT -->
                                        <div class="form-group">
                                            <label for="document" class="form-label">Document <span
                                                    class="text-danger">*</span></label>
                                            <input type="file" required name="document" id="document" />
                                            <x-input-error :messages="$errors->get('document')" class="mt-2" />
                                        </div>
                                        <!-- END DOCUMENT -->

                                        <!-- BEGIN BUTTON -->
                                        <div class="form-group">
                                            <button type="submit"
                                                class="btn btn-heading btn-block hover-up">Submit</button>
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
    <!-- END KYC VERIFICATION -->
@endsection
