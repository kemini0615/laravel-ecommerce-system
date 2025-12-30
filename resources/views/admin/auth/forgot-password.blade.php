<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Forgot password</title>

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
                    <h2 class="h2 text-center mb-4">Forgot your password?</h2>

                    <!-- BEGIN SESSION STATUS -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    <!-- END SESSION STATUS -->

                    <!-- BEGIN FORM -->
                    <form method="POST" action="{{ route('admin.password.email') }}" novalidate>
                        @csrf

                        <!-- BEGIN EMAIL ADDRESS -->
                        <div class="mb-3">
                            <label class="form-label" for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email') }}" placeholder="your@email.com" autocomplete="off" required />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <!-- END EMAIL ADDRESS -->

                        <!-- BEGIN BUTTON -->
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">Email Password Reset Link</button>
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
