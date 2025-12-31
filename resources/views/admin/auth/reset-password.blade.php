<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Reset Password</title>

    <!-- BEGIN TABLER CSS -->
    <link href="{{ asset('assets/admin/css/tabler.css') }}" rel="stylesheet" />
    <!-- END TABLER CSS -->

    <!-- BEGIN FONT -->
    <style>
        @import url("https://rsms.me/inter/inter.css");
    </style>
    <!-- END FONT -->
</head>

<body>
    <!-- BEGIN TABLER JS -->
    <script src="{{ asset('assets/admin/js/tabler-theme.min.js') }}"></script>
    <!-- END TABLER JS -->

    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="card card-md">
                <div class="card-body">
                    <h2 class="h2 text-center mb-4">Reset your password</h2>

                    <!-- BEGIN FORM -->
                    <form method="POST" action="{{ route('admin.password.store') }}" novalidate>
                        @csrf

                        <!-- BEGIN PASSWORD RESET TOKEN -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <!-- END PASSWORD RESET TOKEN -->

                        <!-- BEGIN EMAIL ADDRESS -->
                        <div class="mb-3">
                            <label class="form-label" for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email', $request->email) }}" placeholder="your@email.com"
                                autocomplete="off" required />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <!-- END EMAIL ADDRESS -->

                        <!-- BEGIN PASSWORD -->
                        <div class="mb-2">
                            <label class="form-label" for="password">Password</label>
                            <div class="input-group input-group-flat">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Your password" autocomplete="off" required />
                                <!-- BEGIN PASSWORD TOGGLE -->
                                <span class="input-group-text">
                                    <a href="#" class="link-secondary" title="Show password"
                                        data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler.io/icons/icon/eye -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                            <path
                                                d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                        </svg>
                                    </a>
                                </span>
                                <!-- END PASSWORD TOGGLE -->
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <!-- END PASSWORD -->

                        <!-- BEGIN CONFIRM PASSWORD -->
                        <div class="mb-2">
                            <label class="form-label" for="password_confirmation">Confirm Password</label>
                            <div class="input-group input-group-flat">
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" placeholder="Confirm password" autocomplete="off"
                                    required />
                                <!-- BEGIN PASSWORD TOGGLE -->
                                <span class="input-group-text">
                                    <a href="#" class="link-secondary" title="Show confirm password"
                                        data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler.io/icons/icon/eye -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                            <path
                                                d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                        </svg>
                                    </a>
                                </span>
                                <!-- END PASSWORD TOGGLE -->
                            </div>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                        <!-- END CONFIRM PASSWORD -->

                        <!-- BEGIN BUTTON -->
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">Reset Password</button>
                        </div>
                        <!-- END BUTTON -->
                    </form>
                    <!-- END FORM -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>
