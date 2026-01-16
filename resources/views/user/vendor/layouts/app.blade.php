<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Admin Dashboard</title>

    <!-- BEGIN TABLER CSS -->
    <link href="{{ asset('assets/admin/css/tabler.css') }}" rel="stylesheet" />
    <!-- END TABLER CSS -->

    <!-- BEGIN JS -->
    @vite('resources/js/image-preview.js')
    @vite('resources/js/tinymce-init.js')
    <!-- END JS -->

    <!-- BEGIN FONT -->
    <style>
        @import url("https://rsms.me/inter/inter.css");
    </style>
    <!-- END FONT -->
</head>

<body>
    <!-- BEGIN TABLER JS -->
    <script src="{{ asset('assets/admin/js/tabler-theme.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/tabler.min.js') }}" defer></script>
    <!-- END TABLER JS -->

    <!--  BEGIN PAGE  -->
    <div class="page">
        <!--  BEGIN SIDEBAR  -->
        @include('user.vendor.layouts.sidebar')
        <!--  END SIDEBAR  -->

        <!-- BEGIN NAVBAR  -->
        @include('user.vendor.layouts.navbar')
        <!-- END NAVBAR  -->

        <!--  BEGIN CONTENT  -->
        <div class="page-wrapper">
            <!-- BEGIN BODY -->
            @yield('content')
            <!-- END BODY -->

            <!--  BEGIN FOOTER  -->
            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                    <div class="row text-center align-items-center flex-row-reverse">
                        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    Copyright &copy; 2025
                                    <a href="https://github.com/kemini0615/laravel-ecommerce-system" target="_blank"
                                        class="link-secondary">Kemini</a>. All rights reserved.
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="link-secondary" rel="noopener"> v1.0.0 </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
            <!--  END FOOTER  -->
        </div>
        <!--  END CONTENT  -->
    </div>
    <!--  END PAGE  -->
</body>

</html>
