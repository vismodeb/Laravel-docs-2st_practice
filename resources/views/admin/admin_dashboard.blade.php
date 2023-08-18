<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <title>Laravel Pektij Design</title>
</head>

<body>

    <!-- Sidebar -->
    @include('admin.body.sidebar')
    <!-- End of Sidebar -->

    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        @include('admin.body.header')

        <!-- End of Navbar -->

        @yield('admin')

    </div>

    <script src="{{ asset('assets/js/index.js') }}"></script>
</body>

</html>