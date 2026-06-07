@extends('includes.master')
@section('content')
    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">User</li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="pt-4 card-body profile-card d-flex flex-column align-items-center">

                        <img src="{{ asset('asset/img/shahzadealam.jpeg') }}" alt="Profile" class="rounded-circle">
                        <h2>{{ $user->name ?? '' }}</h2>
                        <div class="mt-2 social-links">
                            <a href="{{ $user->twitter ?? '' }}" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="{{ $user->facebook ?? '' }}" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="{{ $user->instagram ?? '' }}" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="https://www.linkedin.com/in/shahzade-alam-a964241a2/" target="_blank" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Overview</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                    Profile</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-change-password">Change Password</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">About</h5>
                                <p class="small fst-italic">
                                    {{ $user->about ?? 'The beauty you see in me is a reflection of you' }}</p>

                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Name</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->name ?? '' }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Class</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->class ?? '' }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Roll No</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->roll_no ?? '' }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->email ?? '' }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Phone</div>
                                    <div class="col-lg-9 col-md-8">+91 {{ $user->phone ?? '' }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Address</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->address ?? '' }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">File</div>
                                    <div class="col-lg-9 col-md-8">

                                        @if ($user->file)
                                            <img src="{{ asset('img/' . $user->file) }}" width="100"
                                                class="img-thumbnail">
                                        @else
                                            No File
                                        @endif

                                    </div>
                                </div>
                            </div>

                            <div class="pt-3 tab-pane fade profile-edit" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form action="{{ route('profile.update', $user->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $user->name }}">
                                    </div>

                                    <div class="mb-3">
                                        <label>Class</label>
                                        <input type="text" name="class" class="form-control"
                                            value="{{ $user->class }}">
                                    </div>

                                    <div class="mb-3">
                                        <label>Roll No</label>
                                        <input type="text" name="roll_no" class="form-control"
                                            value="{{ $user->roll_no }}">
                                    </div>

                                    <div class="mb-3">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ $user->email }}">
                                    </div>

                                    <div class="mb-3">
                                        <label>Phone</label>
                                        <input type="text" name="phone" class="form-control"
                                            value="{{ $user->phone }}">
                                    </div>

                                    <div class="mb-3">
                                        <label>Address</label>
                                        <input type="text" name="address" class="form-control"
                                            value="{{ $user->address }}">
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-md-4 col-lg-3 col-form-label">File</label>

                                        <div class="col-md-8 col-lg-9">
                                            <input type="file" name="file" class="form-control">

                                            @if ($user->file)
                                                <img src="{{ asset('uploads/students/' . $user->file) }}" width="100"
                                                    class="mt-2 rounded">
                                            @endif
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">
                                        Save Changes
                                    </button>
                                </form><!-- End Profile Edit Form -->

                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ route('change-passwordpost') }}" method="POST">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password" type="password" class="form-control"
                                                id="currentPassword" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="newpassword" type="password" class="form-control"
                                                id="newPassword" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="renewpassword" type="password" class="form-control"
                                                id="renewPassword" required>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </form>
                                <!-- End Change Password Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>
    @include('sweetalert::alert')
@endsection
