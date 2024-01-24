<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title }} | Pojok Garasi</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/pg.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <style>
        body {
            background: linear-gradient(to bottom, #f8f9fa, #e9ecef);
        }

        .container-fluid {
            padding: 20px;
        }

        .footer {
            background-color: #343a40;
            color: #fff;
            padding: 50px 0;
            text-align: center;
        }

        .footer h4 {
            color: #fff;
        }

        .footer p {
            color: #fff;
        }

        .footer li {
            display: inline-block;
            margin-right: 10px;
        }

        .footer a {
            color: #fff;
        }

        .footer a svg {
            width: 35px;
            height: 35px;
            fill: #fff;
            vertical-align: center;
        }
    </style>
    --}}
    {{-- <style>
        .zoomable-image {
            position: relative;
            z-index: 1;
            transition: transform 0.3s ease;
        }

        .zoomable-image:hover {
            transform: scale(1.5);
            /* Atur faktor perbesaran yang diinginkan */
        }
    </style> --}}
    {{-- <style>
        .zoom-container {
            position: relative;
            /* Sesuaikan dengan lebar gambar */
            /* Sesuaikan dengan tinggi gambar */
            overflow: hidden;
        }

        .zoom-container .zoom-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            background-color: rgba(0, 0, 0, 0.5);
            /* Warna overlay saat dihover */
            transition: opacity 0.3s ease;
            pointer-events: none;
            /* Mengabaikan interaksi mouse pada overlay */
        }

        .zoom-container:hover .zoom-overlay {
            opacity: 1;
        }

        .zoom-container:hover img {
            transform: scale(1.5);
            /* Perbesar gambar saat dihover */
            transition: transform 0.3s ease;
        }
    </style> --}}
</head>

<body>
    @include('sweetalert::alert')
    <nav class="navbar navbar-expand-md  bg-light sticky-top shadow-sm p-2  rounded">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('assets/images/pg.png') }}"
                    height="60px" width="60" alt="" srcset=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('home') ? '
                        active' : null }}" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('user.product') ? '
                        active' : null }}" href="/produk">Produk</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Brand
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            @foreach ($brands as $i)
                            <li><a class="dropdown-item" href="/brand/{{ $i->slug }}">{{ $i->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            kategori
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            @foreach ($cat as $i)
                            <li><a class="dropdown-item" href="/kategori/{{ $i->slug }}">{{ $i->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link {{ Request::is('infoTips') ? '
                        active' : null }}" href="/infotips">Info & Tips</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('tentang') ? '
                        active' : null }}" href="/aboutus">Tentang Kami</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    @guest
                    <li class="nav-link me-lg-2">
                        <a href="{{ route('login') }}" class="nav-link">Login</a>
                    </li>
                    <li class="nav-link me-lg-2">
                        <a href="{{ route('register') }}" class="nav-link">Register</a>
                    </li>
                    @endguest
                    @auth()
                    <li class="nav-link me-lg-2">
                        <a href="/keranjang" class="nav-link"><i class="fa fa-cart-shopping"></i> Keranjang</a>
                    </li>
                    <li class="nav-link px-lg-4 dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                            aria-expanded="false">{{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu dropdown-menu-sm-end">
                            {{-- <li><a class="dropdown-item " href="{{ route('user.profile') }}">Profile</a></li> --}}
                            
                            <li><a class="dropdown-item " href="{{ route('user.transaksi') }}">Transaksi</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ route('admin.logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    {{ $slot }}

    <div class="container-fluid bg-gradient">
        <footer class="footer bg-secondary">
            <br><br>
            <div class="footer_top">
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <h4 class="text-light">
                                Pojok Garasi
                            </h4>
                            <p>Pojok Garasi, Siantan Hulu, Kec. Pontianak Utara, Kota Pontianak, Kalimantan Barat 78243</p>
                            <br><br>
                            <p>Informasi Lebih Lanjut</p>
                            <li class="ms-3 nav-link">
                                <a class="text-muted" href="facebook.com">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35" height="35"
                                        viewBox="0 0 50 50" style=" fill:#000000;">
                                        <path
                                            d="M25,3C12.85,3,3,12.85,3,25c0,11.03,8.125,20.137,18.712,21.728V30.831h-5.443v-5.783h5.443v-3.848 c0-6.371,3.104-9.168,8.399-9.168c2.536,0,3.877,0.188,4.512,0.274v5.048h-3.612c-2.248,0-3.033,2.131-3.033,4.533v3.161h6.588 l-0.894,5.783h-5.694v15.944C38.716,45.318,47,36.137,47,25C47,12.85,37.15,3,25,3z">
                                        </path>
                                    </svg>
                                </a>
                                <a class="text-muted" href="https://www.instagram.com/pojokgarasi.id/">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35" height="35"
                                        viewBox="0 0 50 50" style=" fill:#000000;">
                                        <path
                                            d="M 16 3 C 8.8324839 3 3 8.8324839 3 16 L 3 34 C 3 41.167516 8.8324839 47 16 47 L 34 47 C 41.167516 47 47 41.167516 47 34 L 47 16 C 47 8.8324839 41.167516 3 34 3 L 16 3 z M 16 5 L 34 5 C 40.086484 5 45 9.9135161 45 16 L 45 34 C 45 40.086484 40.086484 45 34 45 L 16 45 C 9.9135161 45 5 40.086484 5 34 L 5 16 C 5 9.9135161 9.9135161 5 16 5 z M 37 11 A 2 2 0 0 0 35 13 A 2 2 0 0 0 37 15 A 2 2 0 0 0 39 13 A 2 2 0 0 0 37 11 z M 25 14 C 18.936712 14 14 18.936712 14 25 C 14 31.063288 18.936712 36 25 36 C 31.063288 36 36 31.063288 36 25 C 36 18.936712 31.063288 14 25 14 z M 25 16 C 29.982407 16 34 20.017593 34 25 C 34 29.982407 29.982407 34 25 34 C 20.017593 34 16 29.982407 16 25 C 16 20.017593 20.017593 16 25 16 z">
                                        </path>
                                    </svg>
                                </a>
                                <a class="text-muted" href="https://wa.me/628152210215?">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35" height="35"
                                        viewBox="0 0 50 50" style=" fill:#000000;">
                                        <path
                                            d="M 25 2 C 12.309534 2 2 12.309534 2 25 C 2 29.079097 3.1186875 32.88588 4.984375 36.208984 L 2.0371094 46.730469 A 1.0001 1.0001 0 0 0 3.2402344 47.970703 L 14.210938 45.251953 C 17.434629 46.972929 21.092591 48 25 48 C 37.690466 48 48 37.690466 48 25 C 48 12.309534 37.690466 2 25 2 z M 25 4 C 36.609534 4 46 13.390466 46 25 C 46 36.609534 36.609534 46 25 46 C 21.278025 46 17.792121 45.029635 14.761719 43.333984 A 1.0001 1.0001 0 0 0 14.033203 43.236328 L 4.4257812 45.617188 L 7.0019531 36.425781 A 1.0001 1.0001 0 0 0 6.9023438 35.646484 C 5.0606869 32.523592 4 28.890107 4 25 C 4 13.390466 13.390466 4 25 4 z M 16.642578 13 C 16.001539 13 15.086045 13.23849 14.333984 14.048828 C 13.882268 14.535548 12 16.369511 12 19.59375 C 12 22.955271 14.331391 25.855848 14.613281 26.228516 L 14.615234 26.228516 L 14.615234 26.230469 C 14.588494 26.195329 14.973031 26.752191 15.486328 27.419922 C 15.999626 28.087653 16.717405 28.96464 17.619141 29.914062 C 19.422612 31.812909 21.958282 34.007419 25.105469 35.349609 C 26.554789 35.966779 27.698179 36.339417 28.564453 36.611328 C 30.169845 37.115426 31.632073 37.038799 32.730469 36.876953 C 33.55263 36.755876 34.456878 36.361114 35.351562 35.794922 C 36.246248 35.22873 37.12309 34.524722 37.509766 33.455078 C 37.786772 32.688244 37.927591 31.979598 37.978516 31.396484 C 38.003976 31.104927 38.007211 30.847602 37.988281 30.609375 C 37.969311 30.371148 37.989581 30.188664 37.767578 29.824219 C 37.302009 29.059804 36.774753 29.039853 36.224609 28.767578 C 35.918939 28.616297 35.048661 28.191329 34.175781 27.775391 C 33.303883 27.35992 32.54892 26.991953 32.083984 26.826172 C 31.790239 26.720488 31.431556 26.568352 30.914062 26.626953 C 30.396569 26.685553 29.88546 27.058933 29.587891 27.5 C 29.305837 27.918069 28.170387 29.258349 27.824219 29.652344 C 27.819619 29.649544 27.849659 29.663383 27.712891 29.595703 C 27.284761 29.383815 26.761157 29.203652 25.986328 28.794922 C 25.2115 28.386192 24.242255 27.782635 23.181641 26.847656 L 23.181641 26.845703 C 21.603029 25.455949 20.497272 23.711106 20.148438 23.125 C 20.171937 23.09704 20.145643 23.130901 20.195312 23.082031 L 20.197266 23.080078 C 20.553781 22.728924 20.869739 22.309521 21.136719 22.001953 C 21.515257 21.565866 21.68231 21.181437 21.863281 20.822266 C 22.223954 20.10644 22.02313 19.318742 21.814453 18.904297 L 21.814453 18.902344 C 21.828863 18.931014 21.701572 18.650157 21.564453 18.326172 C 21.426943 18.001263 21.251663 17.580039 21.064453 17.130859 C 20.690033 16.232501 20.272027 15.224912 20.023438 14.634766 L 20.023438 14.632812 C 19.730591 13.937684 19.334395 13.436908 18.816406 13.195312 C 18.298417 12.953717 17.840778 13.022402 17.822266 13.021484 L 17.820312 13.021484 C 17.450668 13.004432 17.045038 13 16.642578 13 z M 16.642578 15 C 17.028118 15 17.408214 15.004701 17.726562 15.019531 C 18.054056 15.035851 18.033687 15.037192 17.970703 15.007812 C 17.906713 14.977972 17.993533 14.968282 18.179688 15.410156 C 18.423098 15.98801 18.84317 16.999249 19.21875 17.900391 C 19.40654 18.350961 19.582292 18.773816 19.722656 19.105469 C 19.863021 19.437122 19.939077 19.622295 20.027344 19.798828 L 20.027344 19.800781 L 20.029297 19.802734 C 20.115837 19.973483 20.108185 19.864164 20.078125 19.923828 C 19.867096 20.342656 19.838461 20.445493 19.625 20.691406 C 19.29998 21.065838 18.968453 21.483404 18.792969 21.65625 C 18.639439 21.80707 18.36242 22.042032 18.189453 22.501953 C 18.016221 22.962578 18.097073 23.59457 18.375 24.066406 C 18.745032 24.6946 19.964406 26.679307 21.859375 28.347656 C 23.05276 29.399678 24.164563 30.095933 25.052734 30.564453 C 25.940906 31.032973 26.664301 31.306607 26.826172 31.386719 C 27.210549 31.576953 27.630655 31.72467 28.119141 31.666016 C 28.607627 31.607366 29.02878 31.310979 29.296875 31.007812 L 29.298828 31.005859 C 29.655629 30.601347 30.715848 29.390728 31.224609 28.644531 C 31.246169 28.652131 31.239109 28.646231 31.408203 28.707031 L 31.408203 28.708984 L 31.410156 28.708984 C 31.487356 28.736474 32.454286 29.169267 33.316406 29.580078 C 34.178526 29.990889 35.053561 30.417875 35.337891 30.558594 C 35.748225 30.761674 35.942113 30.893881 35.992188 30.894531 C 35.995572 30.982516 35.998992 31.07786 35.986328 31.222656 C 35.951258 31.624292 35.8439 32.180225 35.628906 32.775391 C 35.523582 33.066746 34.975018 33.667661 34.283203 34.105469 C 33.591388 34.543277 32.749338 34.852514 32.4375 34.898438 C 31.499896 35.036591 30.386672 35.087027 29.164062 34.703125 C 28.316336 34.437036 27.259305 34.092596 25.890625 33.509766 C 23.114812 32.325956 20.755591 30.311513 19.070312 28.537109 C 18.227674 27.649908 17.552562 26.824019 17.072266 26.199219 C 16.592866 25.575584 16.383528 25.251054 16.208984 25.021484 L 16.207031 25.019531 C 15.897202 24.609805 14 21.970851 14 19.59375 C 14 17.077989 15.168497 16.091436 15.800781 15.410156 C 16.132721 15.052495 16.495617 15 16.642578 15 z">
                                        </path>
                                    </svg>
                                </a>
                            </li>
                            <br>
                            <h2 class="text-light">0815-2210-215</h2>
                        </div>

                        <div class="col-8">
                            <div class="footer_widget">
                                <h3 class="footer_title">
                                    Temukan Kami
                                </h3>
                                <iframe class="container-fluid"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.818158506972!2d109.35495627434658!3d-0.016319199983518717!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1d59ac81c564e5%3A0x862d966dda4330a3!2sPojok%20Garasi!5e0!3m2!1sid!2sid!4v1694001101730!5m2!1sid!2sid" 
                                style="border:0; height: 300px;" allowfullscreen="" loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                        <div class="footer_bottom">
                            <div class="container">
                                <div class="row">
                                    <div class="col text-center">
                                        <p>&copy; 2023 Pojok Garasi. All Rights Reserved</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    {{-- <div class="container-fluid">
        <footer class="footer">
            <div class="footer_top">
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <h4>EC-Computer Pontianak</h4>
                            <p>EC-Computer Pontianak, Samping hotel 95, Jalan Imam Bonjol, Bansir Laut, Pontianak, West
                                Kalimantan</p>
                            <br>
                            <p>Informasi Lebih Lanjut</p>
                            <ul class="nav">
                                <li class="ms-6 nav-item">
                                    <a href="facebook.com">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50">
                                            <path
                                                d="M25,3C12.85,3,3,12.85,3,25c0,11.03,8.125,20.137,18.712,21.728V30.831h-5.443v-5.783h5.443v-3.848 c0-6.371,3.104-9.168,8.399-9.168c2.536,0,3.877,0.188,4.512,0.274v5.048h-3.612c-2.248,0-3.033,2.131-3.033,4.533v3.161h6.588 l-0.894,5.783h-5.694v15.944C38.716,45.318,47,36.137,47,25C47,12.85,37.15,3,25,3z">
                                            </path>
                                        </svg>
                                    </a>
                                </li>
                                <li class="ms-6 nav-item">
                                    <a href="instagram.com">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50">
                                            <path
                                                d="M 16 3 C 8.8324839 3 3 8.8324839 3 16 L 3 34 C 3 41.167516 8.8324839 47 16 47 L 34 47 C 41.167516 47 47 41.167516 47 34 L 47 16 C 47 8.8324839 41.167516 3 34 3 L 16 3 z M 16 5 L 34 5 C 40.074997 5 45 9.9250031 45 16 L 45 34 C 45 40.074997 40.074997 45 34 45 L 16 45 C 9.9250031 45 5 40.074997 5 34 L 5 16 C 5 9.9250031 9.9250031 5 16 5 z M 25 9 C 18.385786 9 13 14.385786 13 21 C 13 27.614214 18.385786 33 25 33 C 31.614214 33 37 27.614214 37 21 C 37 14.385786 31.614214 9 25 9 z M 25 11 C 30.514574 11 35 15.485426 35 21 C 35 26.514574 30.514574 31 25 31 C 19.485426 31 15 26.514574 15 21 C 15 15.485426 19.485426 11 25 11 z">
                                            </path>
                                        </svg>
                                    </a>
                                </li>
                                <li class="ms-6 nav-item">
                                    <a href="whatsapp.com">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50">
                                            <path
                                                d="M25,3C12.85,3,3,12.85,3,25c0,11.03,8.125,20.137,18.712,21.728V30.831h-5.443v-5.783h5.443v-3.848 c0-6.371,3.104-9.168,8.399-9.168c2.536,0,3.877,0.188,4.512,0.274v5.048h-3.612c-2.248,0-3.033,2.131-3.033,4.533v3.161h6.588 l-0.894,5.783h-5.694v15.944C38.716,45.318,47,36.137,47,25C47,12.85,37.15,3,25,3z">
                                            </path>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-8">
                            <div class="footer_widget">
                                <h3 class="footer_title">
                                    Temukan Kami
                                </h3>
                                <iframe class="container-fluid"
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.8168809962826!2d109.35341181409584!3d-0.048668035540184694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1d59c0c7e5de93%3A0x671bc058a649cca5!2sEC-Computer%20Pontianak!5e0!3m2!1sid!2sid!4v1660290929966!5m2!1sid!2sid"
                                    style="border:0; height: 300px;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_bottom">
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <p>&copy; 2023 EC-Computer Pontianak. All Rights Reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div> --}}
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    {{ $js??'' }}
</body>

</html>