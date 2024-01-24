<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register | POJOK GARASI</title>
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
</head>

<body class="">

    <!-- Main Section-->
    <section class="d-flex justify-content-center align-items-start vh-100 py-5 px-3 px-md-0">
  
      <!-- Login Form-->
      <div class="d-flex flex-column w-100 align-items-center">
  
        <!-- Logo-->
        <a href="/" class="d-table mt-5 mb-4 mx-auto">
            <div class="d-flex align-items-center justify-content-center">
                <span class="fw-bold fs-3 text-white">Pojok Gerasi</span>
            </div>
        </a>
        <!-- Logo-->
  
        <div class="shadow-lg rounded p-4 p-sm-5 bg-white form mb-4">
          <h5 class="fw-bold mb-3 text-muted">Register</h5>
  
          <!-- Register Form-->
          <form class="mt-4" action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group">
              <label class="form-label form-label-light" for="username">Name</label>
              <input type="text" required name="name" value="{{old('name')}}" class="form-control form-control-light" autofocus id="username" placeholder="Your Name">
                @error('name')
                    <label class="form-label form-label-light">{{ $message }}</label>
                @enderror
            </div>
            <div class="form-group">
              <label class="form-label form-label-light" for="email">Email address</label>
              <input type="email" required name="email" value="{{old('email')}}" class="form-control form-control-light" id="email" placeholder="name@email.com">
                @error('email')
                    <label class="form-label form-label-light">{{ $message }}</label>
                @enderror
            </div>
            <div class="form-group">
              <label class="form-label form-label-light" for="password">Password</label>
              <input type="password" required name="password" class="form-control form-control-light" id="password" placeholder="Enter your password">
                @error('password')
                    <label class="form-label form-label-light">{{ $message }}</label>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label form-label-light" for="password-confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control form-control-light" id="password-confirmation" placeholder="Enter your password again">
                  @error('password')
                      <label class="form-label form-label-light">{{ $message }}</label>
                  @enderror
              </div>
            <button type="submit" class="btn btn-primary d-block w-100 my-4">Daftar</button>
          </form>
          <!-- / Register Form-->
  
          <p class="d-block text-center text-muted small">Sudah Punya Akun? <a
              class="text-muted text-decoration-underline" href="{{ route('login') }}">Login here.</a>
            </p>
        </div>
      </div>
      <!-- / Login Form-->
  
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