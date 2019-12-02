<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.partials._header')
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        @include('admin.partials._navbar')
        @yield('body-content')
        @include('admin.partials._footer')
    </div>
    <!-- ./wrapper -->
    @yield('javascripts')
</body>
</html>