@extends('includes.master')

@section('content')
    <div class="container-fluid mt-5">

        <h2>Student List</h2>

        <a href="{{ route('student.create') }}" class="btn btn-success mb-3">
            + Add Student
        </a>

        <div class="table-responsive" style="overflow-x:auto; width:100%;">
            <form method="GET" action="{{ route('student.index') }}" class="mb-3">
                <input type="text" name="search" class="form-control" placeholder="Search Name, Email, Phone"
                    value="{{ request('search') }}">
            </form>
            <table class="table table-bordered table-hover"
                style="white-space:nowrap; min-width:1400px; width:max-content;">

                <thead class="table-danger">
                    <tr>
                        <th>S.N</th>
                        <th>
                            <a href="{{ route('student.index', [
                                'sort' => 'first_name',
                                'direction' => request('direction') == 'asc' ? 'desc' : 'asc',
                                'search' => request('search'),
                            ]) }}"
                                class="text-dark text-decoration-none fw-bold">
                                Name ⇅
                            </a>
                        </th>
                        <th>Father Name</th>
                        <th>
                            <a href="{{ route('student.index', [
                                'sort' => 'email',
                                'direction' => request('direction') == 'asc' ? 'desc' : 'asc',
                                'search' => request('search'),
                            ]) }}"
                                class="text-dark text-decoration-none fw-bold">
                                Email ⇅
                            </a>
                        </th>
                        <th>Phone</th>
                        <th>Class</th>
                        <th>Subject</th>
                        <th>
                            <a href="{{ route('student.index', [
                                'sort' => 'roll_no',
                                'direction' => request('direction') == 'asc' ? 'desc' : 'asc',
                                'search' => request('search'),
                            ]) }}"
                                class="text-dark text-decoration-none fw-bold">
                                Roll No ⇅
                            </a>
                        </th>
                        <th>Gender</th>
                        <th>DOB</th>
                        <th>File</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($students as $student)
                        <tr>

                            <td>
                                {{ ($students->currentPage() - 1) * $students->perPage() + $loop->iteration }}
                            </td>

                            <td>{{ $student->first_name }} {{ $student->last_name }}</td>

                            <td>{{ $student->father_name }}</td>

                            <td>{{ $student->email }}</td>

                            <td>{{ $student->phone }}</td>

                            <td>{{ $student->class }}</td>

                            <td>{{ $student->subject }}</td>

                            <td>{{ $student->roll_no }}</td>

                            <td>{{ $student->gender }}</td>

                            <td>{{ $student->dob }}</td>

                            <td>
                                @if ($student->file)
                                    <img src="{{ asset('uploads/students/' . $student->file) }}" width="50"
                                        height="50" style="border-radius:50%; object-fit:cover;">
                                @endif
                            </td>

                            <td>{{ $student->address }}</td>

                            <td>
                                @if ($student->status == 'active')
                                    <span class="badge bg-success">
                                        Active
                                    </span>
                                @else
                                    <span class="badge bg-danger">
                                        Inactive
                                    </span>
                                @endif
                            </td>

                            <td>

                                <a href="{{ route('student.edit', $student->id) }}" class="btn btn-primary btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('student.destroy', $student->id) }}" method="POST"
                                    style="display:inline-block;">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are You Sure?')">
                                        Delete
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="14" class="text-center text-danger">
                                No Students Found
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $students->appends(request()->query())->links('pagination::bootstrap-5') }}
        </div>

    </div>

    @include('sweetalert::alert')
@endsection
