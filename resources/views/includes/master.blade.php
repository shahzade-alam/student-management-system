<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
    <title>@yield('title')</title>
    @yield('head-area')
</head>

<body>

<!-- ===== Header ===== -->
<header id="header" class="header fixed-top d-flex align-items-center">
    @include('includes.header')
</header>

<!-- ===== Sidebar ===== -->
<aside id="sidebar" class="sidebar">
    @include('includes.sidebar')
</aside>

<!-- ===== Main Content ===== -->
<main id="main" class="main" >
    @yield('content')
</main>

<!-- ===== Footer (IMPORTANT: inside body) ===== -->
<footer id="footer" class="footer">
    @include('includes.footer')
</footer>

<!-- ===== FOOT JS ===== -->
@include('includes.foot')
@yield('script-area')

</body>
</html>