<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title??'POJOK GARASI' }} | POJOK GARASI</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/pg.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('./assets/css/libs.bundle.css') }}" />
    <link rel="stylesheet" href="{{ asset('./assets/css/theme.bundle.css') }}" />
    {{--
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Overpass:wght@200;300;400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Fix for custom scrollbar if JS is disabled-->
    <noscript>
        <style>
            /**
          * Reinstate scrolling for non-JS clients
          */
            .simplebar-content-wrapper {
                overflow: auto;
            }
        </style>
    </noscript>
</head>

<body>
    @include('sweetalert::alert')

    <!-- / Navbar-->
    <x-navbar></x-navbar>
    <!-- / Navbar-->

    <!-- Page Content -->
    <main id="main">
        <section class="container-fluid">
            {{ $slot }}
            <x-footer></x-footer>
            <!-- Sidebar Menu Overlay-->
            <div class="menu-overlay-bg"></div>
            <!-- / Sidebar Menu Overlay-->
        </section>
    </main>
    <!-- /Page Content -->

    <!-- Page Aside-->
    <x-sidebar></x-sidebar>

    <script src="{{asset('assets/js/vendor.bundle.js')}}"></script>
    <script src="{{ asset('assets/js/theme.bundle.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('datatable/datatables.min.js') }}"></script>
    {{ $js??'' }}
</body>

</html>