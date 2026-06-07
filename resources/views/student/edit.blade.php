```html
@extends('includes.master')
@section('content')
    <div class="container mt-5 mb-5">

        <div class="card shadow p-4">

            <h3 class="text-center mb-4">Edit Student</h3>

            <form action="{{ route('student.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" id="first_name" name="first_name" class="form-control"
                            value="{{ $student->first_name }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" id="last_name" name="last_name" class="form-control"
                            value="{{ $student->last_name }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="father_name" class="form-label">Father Name</label>
                        <input type="text" id="father_name" name="father_name" class="form-control"
                            value="{{ $student->father_name }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="class" class="form-label">Class</label>
                        <input type="text" id="class" name="class" class="form-control"
                            value="{{ $student->class }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" id="subject" name="subject" class="form-control"
                            value="{{ $student->subject }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="roll_no" class="form-label">Roll No</label>
                        <input type="text" id="roll_no" name="roll_no" class="form-control"
                            value="{{ $student->roll_no }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control"
                            value="{{ $student->email }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" id="phone" name="phone" class="form-control"
                            value="{{ $student->phone }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="password" class="form-label">
                            Password (Leave blank if not changing)
                        </label>

                        <input type="password" id="password" name="password" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="password_confirmation" class="form-label">
                            Confirm Password
                        </label>

                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Gender</label>

                        <div>

                            <input type="radio" name="gender" value="male"
                                {{ $student->gender == 'male' ? 'checked' : '' }}>
                            Male

                            <input type="radio" name="gender" value="female"
                                {{ $student->gender == 'female' ? 'checked' : '' }}>
                            Female

                            <input type="radio" name="gender" value="other"
                                {{ $student->gender == 'other' ? 'checked' : '' }}>
                            Other

                        </div>

                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="dob" class="form-label">Date of Birth</label>

                        <input type="date" id="dob" name="dob" class="form-control"
                            value="{{ $student->dob }}">
                    </div>

                    <div class="col-md-6 mb-3">

                        <label for="file" class="form-label">File</label>
                        <input type="file" id="file" name="file" class="form-control">

                        <div class="mt-2">

                            @if ($student->file)
                                <img src="{{ asset('uploads/students/' . $student->file) }}" alt="Student File"
                                    width="100">
                            @endif

                        </div>

                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="address" class="form-label">Address</label>

                        <textarea id="address" name="address" class="form-control" rows="3">{{ $student->address }}</textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="description" class="form-label">Description</label>

                        <textarea id="description" name="description" class="form-control" rows="3">{{ $student->description }}</textarea>
                    </div>

                    <div class="col-md-6 mb-3">

                        <label for="status" class="form-label">Status</label>

                        <select id="status" name="status" class="form-select">

                            <option value="active" {{ $student->status == 'active' ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="inactive" {{ $student->status == 'inactive' ? 'selected' : '' }}>
                                Inactive
                            </option>

                        </select>

                    </div>

                </div>

                <div class="text-center mt-3">

                    <button type="submit" class="btn btn-warning px-5">
                        Update Student
                    </button>

                    <a href="{{ route('student.index') }}" class="btn btn-secondary px-5">
                        Back
                    </a>

                </div>

            </form>

        </div>

    </div>
    @include('sweetalert::alert')
@endsection
