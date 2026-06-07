<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('dashboard') }}">
                {{-- <a class="nav-link " href="{{ route('dashboard') }}"> ye line thi maine # kar diya chalane ke liye --}}
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#student-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person"></i><span>Student</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>

            <ul id="student-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('student.create') }}">
                        <i class="bi bi-circle"></i><span>Add</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('student.index') }}">
                        <i class="bi bi-circle"></i><span>List</span>
                    </a>
                </li>
            </ul>


        </li><!-- End Student Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person-vcard"></i><span>Profile</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('profile.index') }}">
                        <i class="bi bi-circle"></i><span>My Profile</span>
                    </a>
                </li>
                {{-- <li>
                    <a href="{{ route('change-password') }}">
                        <i class="bi bi-circle"></i><span>Name</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}">
                        <i class="bi bi-circle"></i><span>Name</span>
                    </a>
                </li> --}}

            </ul>
        </li><!-- End Profile Nav -->

        <li class="nav-item">
            <a class="nav-link " href="{{ route('change-password') }}">
                {{-- <a class="nav-link " href="{{ route('dashboard') }}"> ye line thi maine # kar diya chalane ke liye --}}
                <i class="bi bi-key"></i>
                <span>Change Password</span>
            </a>
        </li>
        <li class="nav-item">
    <form action="{{ route('logout') }}" method="POST">
        @csrf

        <button type="submit"
            class="nav-link border-0 bg-transparent w-100 text-start">

            <i class="bi bi-box-arrow-right"></i>
            <span>Logout</span>

        </button>
    </form>
</li>

        {{-- <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="forms-elements.html">
                        <i class="bi bi-circle"></i><span>Form Elements</span>
                    </a>
                </li>
                <li>
                    <a href="forms-layouts.html">
                        <i class="bi bi-circle"></i><span>Form Layouts</span>
                    </a>
                </li>
                <li>
                    <a href="forms-editors.html">
                        <i class="bi bi-circle"></i><span>Form Editors</span>
                    </a>
                </li>
                <li>
                    <a href="forms-validation.html">
                        <i class="bi bi-circle"></i><span>Form Validation</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav --> --}}

        {{-- <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="tables-general.html">
                        <i class="bi bi-circle"></i><span>General Tables</span>
                    </a>
                </li>
                <li>
                    <a href="tables-data.html">
                        <i class="bi bi-circle"></i><span>Data Tables</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav --> --}}
    </ul>

</aside>
