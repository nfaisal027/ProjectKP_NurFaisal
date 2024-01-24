<x-guest-layout title="PRODUCT">
    <main>
        {{-- <nav class="navbar navbar-expand-lg navbar-light bg-transparent">

            <div class="container">
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav h4 ">
                        @foreach ($brand as $i)
                        <li class="nav-item">
                            <a class="nav-link text-bold" href="/{{ $i->slug }}">{{ $i->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </nav>
        <hr> --}}
        <hr>
        <hr>
        <h2 class="h2 color--theme text-center">PRODUK</h2>
        <hr>
        <form class="d-flex container" role="search" method="GET">
            <input class="form-control me-2 shadow-sm" value="{{ request()->cari??'' }}" type="search" name="cari"
                placeholder="Search" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Search</button>
        </form><br>
        <div class="container">
            @if (request()->cari)
            <h2>Hasil Pencarian dari kata {{ request()->cari }}</h2><br><br>
            @endif
            <div class="row row-cols-1 row-cols-md-2 row-cols-md-3 g-4">
                @foreach ($data as $p)
                <div class="col-md-3">
                    <div class="card text-center shadow p-3 mb-5 bg-transparent rounded">
                        <img src="storage/{{ $p->img1 }}" class="card-img-top"
                            style="aspect-ratio: 1 / 1;object-fit:cover;" alt="produk">
                        <div class="card-body" style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis">
                            <h5 class="card-title ">{{ $p->name }}</h5>
                            <P class="h5" style="color: #fc742b;">Rp. {{ $p->price }}</P>
                            <div class="card-text d-flex align-content-center justify-content-center">
                                <a class="btn btn-success me-2" href="/produk/{{ $p->slug }}">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </a>
                                <form action="{{ route('keranjang.add') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $p->id }}">
                                    <button class="btn btn-danger" type="submit"><i class=" fa-solid fa-cart-shopping"
                                            style="--fa-beat-scale: 2.0;"></i>
                                        Keranjang</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        {{ $data->links() }}
    </main>
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