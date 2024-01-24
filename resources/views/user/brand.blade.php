<x-guest-layout title="BRAND">
    <main>
        {{-- <nav class="navbar navbar-expand-lg navbar-light bg-transparent">

            <div class="container">
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav h4 ">
                        @foreach ($data as $i)
                        <li class="nav-item">
                            <a class="nav-link text-bold" href="/{{ $i->slug }}">{{ $i->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </nav> --}}
        <br><br>
        <h2 class="h2 color--theme text-center">PRODUCT DARI {{ $brand[0]->name }}</h2>
        <hr>
        {{-- <form class="d-flex container" role="search">
            <input class="form-control me-2 shadow-sm" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Search</button>
        </form><br> --}}
        <div class="container">
            <div class="row ">
                @foreach ($brand[0]->produk as $p)
                <div class="col-md-3 mb-md-3">
                    <div class="card text-start">
                        <img class="card-img-top img-thumbnail" style="aspect-ratio: 1 / 1;object-fit:cover;"
                            src="/storage/{{ $p->img1 }}" alt="Title">
                        <div class="card-body text-sm-center"
                            style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis">
                            <h4 class="card-title">{{ $p->name }}</h4>
                            <p class="card-text h5" style="color: #fc742b;">Rp {{ number_format($p->price) }}</p>
                            <p>
                                <a class="btn btn-success" href="/produk/{{ $p->slug }}">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </a>
                                &nbsp;
                                <button class="btn btn-danger"><i class=" fa-solid fa-cart-shopping"></i>
                                    Keranjang</button>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>

    {{-- modal dek --}}
    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="load-update"></div>
                </div>
            </div>
        </div>
    </div>
    @slot('js')
    <script src="{{ asset('js/showproduct.js') }}"></script>
    @endslot
</x-guest-layout>