<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.includes.head')
    @yield('css')
    @yield('js')

</head>
<body>
<div class="page">
    <!-- Main Navbar-->
    @include('admin.includes.header')
    <div class="page-content d-flex align-items-stretch">
        @include('admin.includes.sidebar')
        @yield('content')
    </div>
</div>
<!-- JavaScript files-->
<script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('admin/vendor/popper.js/umd/popper.min.js')}}"></script>
<script src="{{asset('admin/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/vendor/jquery.cookie/jquery.cookie.js')}}"></script>
<script src="{{asset('admin/vendor/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('admin/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('admin/js/charts-home.js')}}"></script>

<!-- Main File-->
<script src="{{asset('admin/js/front.js')}}"></script>
</body>
</html>
