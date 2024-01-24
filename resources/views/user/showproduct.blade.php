<div class="row">
    <div class="col-md-4">
        {{-- <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @if ($product->img1)
                <div class="carousel-item active">
                    <img src="/storage/{{ $product->img1 }}" class="d-block w-100" alt="...">
                </div>
                @endif
                @if ($product->img2)
                <div class="carousel-item ">
                    <img src="/storage/{{ $product->img2 }}" class="d-block w-100" alt="...">
                </div>
                @endif
                @if ($product->img3)
                <div class="carousel-item ">
                    <img src="/storage/{{ $product->img3 }}" class="d-block w-100" alt="...">
                </div>
                @endif
                @if ($product->img4)
                <div class="carousel-item ">
                    <img src="/storage/{{ $product->img4 }}" class="d-block w-100" alt="...">
                </div>
                @endif
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
        </div> --}}
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @if ($product->img1)
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                @endif
                @if ($product->img2)
                <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
                @endif
                @if ($product->img3)
                <li data-target="#carouselExampleIndicators" data-slide-to="2" class="active"></li>
                @endif
                @if ($product->img4)
                <li data-target="#carouselExampleIndicators" data-slide-to="3" class="active"></li>
                @endif
            </ol>
            <div class="carousel-inner">
                @if ($product->img1)
                <div class="carousel-item active">
                    <img src="/storage/{{ $product->img1 }}" class="d-block w-100" alt="...">
                </div>
                @endif
                @if ($product->img2)
                <div class="carousel-item ">
                    <img src="/storage/{{ $product->img2 }}" class="d-block w-100" alt="...">
                </div>
                @endif
                @if ($product->img3)
                <div class="carousel-item ">
                    <img src="/storage/{{ $product->img3 }}" class="d-block w-100" alt="...">
                </div>
                @endif
                @if ($product->img4)
                <div class="carousel-item ">
                    <img src="/storage/{{ $product->img4 }}" class="d-block w-100" alt="...">
                </div>
                @endif
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="col-md-8">
        <table class="table">
            <tr>
                <th>NAMA PRODUK</th>
                <td>{{ $product->name }}</td>
            </tr>
            <tr>
                <th>MEREK</th>
                <td>{{ $product->brand->name }}</td>
            </tr>
            <tr>
                <th>BERAT</th>
                <td>{{ $product->berat }} g</td>
            </tr>
            <tr>
                <th>HARGA</th>
                <td>Rp. {{ number_format($product->price) }}</td>
            </tr>
            <tr>
                <th>SPESIFIKASI</th>
                <td>
                    <p>{{ $product->spesifikasi }}</p>
                </td>
            </tr>
        </table>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success"><i class="fa fa-plus"></i>Tambah kranjang</button>
    </div>
</div>