<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Errors | POJOK GARASI</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/EC.png') }}" type="image/x-icon"> 
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
</head>

<body class="">

    <!-- Main Section-->
    <section class="d-flex justify-content-center align-items-start vh-100 py-5 px-3 px-md-0">

        <div class="d-flex flex-column w-100 align-items-center">
            <div class="p-4 p-sm-5 col-lg-7 col-md-10 col-12 text-center px-4">
                <i class="ri-file-damage-fill ri-5x mb-3"></i>
                <h1 class="mb-4 display-5 fw-bold">404 page not found</h1>
                <p class="lead text-muted">Looks like you've entered an incorrect page URL, or the page you are looking for
                    no longer exists.</p>
                <a class="btn btn-primary mt-4" href="{{ route('home') }}">Back to home</a>
            </div>
        </div>

    </section>
    <!-- / Main Section-->

    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="{{asset('assets/js/vendor.bundle.js')}}"></script>
    <script src="{{ asset('assets/js/theme.bundle.js') }}"></script>
    {{-- <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script> --}}
    {{ $js??'' }}
</body>

</html>