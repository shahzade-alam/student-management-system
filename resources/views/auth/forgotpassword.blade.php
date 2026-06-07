<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Forgot Password</title>

    <link href="{{ asset('asset/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">
</head>

<body>

<main>
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">

            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <!-- Logo -->
                        <div class="d-flex justify-content-center py-4">
                            <a href="#" class="logo d-flex align-items-center">
                                <img src="{{ asset('asset/img/sms.jpeg') }}" alt="">
                                <span class="d-none d-lg-block">Student Management System</span>
                            </a>
                        </div>

                        <!-- Card -->
                        <div class="card mb-3">

                            <div class="card-body">

                                <!-- Header -->
                                <div class="pt-4 pb-2 text-center">
                                    <h5 class="card-title fs-4">
                                        Forgot Password
                                    </h5>
                                    <p class="small">
                                        Enter your email to receive reset link
                                    </p>
                                </div>

                                <!-- Form -->
                                <form method="POST" action="{{ route('forgot.passwordpost') }}" class="row g-3">
                                    @csrf

                                    <!-- Email -->
                                    <div class="col-12">
                                        <label class="form-label">Email Address</label>

                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="bi bi-envelope"></i>
                                            </span>

                                            <input type="email"
                                                   name="email"
                                                   class="form-control"
                                                   placeholder="Enter your email"
                                                   required>
                                        </div>
                                    </div>

                                    <!-- Button -->
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100">
                                            <i class="bi bi-send"></i>
                                            Send Reset Link
                                        </button>
                                    </div>

                                    <!-- Back to login -->
                                    <div class="col-12 text-center">
                                        <a href="{{ route('login') }}" class="small">
                                            Back to login
                                        </a>
                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </section>

    </div>
</main>

<script src="{{ asset('asset/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
@include('sweetalert::alert')

</body>
</html>