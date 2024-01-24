<x-guest-layout title="HOME">
    <div class="container-fluid">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner p-2 rounded-2 m-auto">
                <div class="carousel-item active ">
                    <img src="assets/images/slide1.png" class="d-block w-100" alt="Produk">
                </div>
                <div class="carousel-item">
                    <img src="assets/images/slide2.jpg" class="d-block w-100" alt="Produk">
                </div>
                <div class="carousel-item">
                    <img src="assets/images/slide3.jpg" class="d-block w-100" alt="Produk">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="container">
        <hr>
        <h2 class="text-capitalize h2 text-center">PRODUK</h2>
        <hr>
        <div class="row row-cols-1 row-cols-md-2 row-cols-md-3 g-4">
            @foreach ($data as $i)

            <div class="col">
                <div class="card text-center shadow p-3 mb-5 bg-transparent rounded">
                    <img src="storage/{{ $i->img1 }}" class="card-img-top" style="aspect-ratio: 1 / 1;object-fit:cover;"
                        alt="produk">
                    <div class="card-body" style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis">
                        <h5 class="card-title ">{{ $i->name }}</h5>
                        <P class="h5" style="color: #fc742b;">Rp. {{ $i->price }}</P>
                        <div class="card-text d-flex align-content-center justify-content-center">
                            <a class="btn btn-success me-2" href="/produk/{{ $i->slug }}">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
                            <form action="{{ route('keranjang.add') }}" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $i->id }}">
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
        <div class="p-4">
            <a href="/produk" class="btn btn-secondary">Lebih banyak</a>
        </div>
    </div>
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