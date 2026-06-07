<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Login - Fortaxe </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('asset/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('asset/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('asset/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center">
                                    <img src="{{ asset('asset/img/sms.jpeg') }}" alt="logo">
                                    <span class="d-none d-lg-block">Student Management System</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                        <p class="text-center small">Enter your email Or phone & password to login</p>
                                    </div>

                                    <form action="{{ route('login-post') }}"
                                        method="POST"class="row g-3 needs-validation" novalidate>
                                        @csrf
                                        <div class="col-12">
                                            <label for="youremailPhone" class="form-label">Email/Phone</label>
                                            <div class="input-group has-validation">
                                                <input type="text" name="email_or_phone" class="form-control"
                                                    id="youremailPhone" placeholder="please enter your email or phone"
                                                    required>
                                                <div class="invalid-feedback">Please enter your email or phone</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                id="yourPassword" placeholder="please enter your password" required>
                                            <div class="invalid-feedback">Please enter your password</div>

                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    value="true" id="rememberMe">
                                                <label class="form-check-label" for="rememberMe">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Login</button>
                                        </div>

                                        <div class="d-grid mt-3">
                                            <a href="{{ route('google.login') }}"
                                                class="btn btn-light border d-flex align-items-center justify-content-center gap-2">

                                                <img src="https://developers.google.com/identity/images/g-logo.png"
                                                    alt="Google" width="20">

                                                <span>Sign in with Google</span>
                                            </a>
                                        </div>

                                        <div>
                                            <a href="{{ route('forgot.password') }}">
                                                Forgot Password?
                                            </a>
                                        </div>

                                        <div class="col-12">
                                            <p class="small mb-0">Don't have account? <a
                                                    href="{{ route('register') }}">Create an account</a></p>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('asset/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('asset/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('asset/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('asset/js/main.js') }}"></script>
    @include('sweetalert::alert')
</body>

</html>
