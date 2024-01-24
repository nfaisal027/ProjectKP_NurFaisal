<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | POJOK GARASI</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/pg.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('./assets/css/libs.bundle.css') }}" />
    <link rel="stylesheet" href="{{ asset('./assets/css/theme.bundle.css') }}" />
    {{--
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="">

    <!-- Main Section-->
    <section class="d-flex justify-content-center align-items-start vh-100 py-5 px-3 px-md-0">

        <!-- Login Form-->
        <div class="d-flex flex-column w-100 align-items-center">

            <!-- Logo-->
            <a href="/" class="d-table mt-5 mb-4 mx-auto">
                <div class="d-flex align-items-center justify-content-center">
                    <span class="fw-bold fs-3 text-white">Pojok Garasi</span>
                </div>
            </a>
            <div class="shadow-lg rounded p-4 p-sm-5 bg-white form">
                <h5 class="fw-bold text-muted">Login</h5>
                <p class="text-muted">Selamat Datang!</p>
                <form class="mt-4" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label form-label-light" for="email">Email address</label>
                        <input type="email" autofocus name="email" value="{{old('email')}}"
                            class="form-control form-control-light" id="email" placeholder="name@email.com">
                        @error('email')
                        <label class="form-label form-label-light">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password"
                            class="form-label form-label-light d-flex justify-content-between align-items-center">
                            Password
                            <a href="/forgot-password" class="text-muted small ms-2 text-decoration-underline">Lupa
                                password?</a>
                        </label>
                        <input type="password" value="{{old('password')}}" name="password"
                            class="form-control form-control-light" id="password" placeholder="password">
                        @error('password')
                        <label class="form-label form-label-light">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-label form-label-light" for="remember">Remember Me</label>
                    </div>
                    <button type="submit" class="btn btn-primary d-block w-100 my-4">Login</button>
                </form>
                <p class="d-block text-center text-muted small">Belum Ada Akun? <a
                        class="text-muted text-decoration-underline" href="{{ route('register') }}">Daftar Sini.</a>
                </p>
            </div>
        </div>
    </section>
    <!-- / Main Section-->

    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="{{asset('assets/js/vendor.bundle.js')}}"></script>
    <script src="{{ asset('assets/js/theme.bundle.js') }}"></script>
    {{ $js??'' }}
</body>

</html>