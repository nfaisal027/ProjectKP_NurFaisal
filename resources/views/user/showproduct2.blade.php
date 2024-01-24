<x-guest-layout title="Detail">
    <div class="container">
        <div class="row ">
            <div class="col-md-5 mr-4">
                <div class="card">
                    <div class="card-body zoom-container">
                        <img id="changeimage" src="/storage/{{ $product->img1 }}" class="card-img-top"
                            style="aspect-ratio: 1 / 1;object-fit:cover;" alt="produk">
                        <div class="zoom-overlay"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <table class="table">
                        <tr style="white-space: nowrap;">
                            <th>NAMA PRODUK</th>
                            <td>{{ $product->name }}</td>
                        </tr>
                        <tr>
                            <th>MEREK</th>
                            <td>{{ $product->brand->name }}</td>
                        </tr>
                        <tr>
                            <th>BERAT</th>
                            <td>{{ $product->berat/1000 }} kg</td>
                        </tr>
                        <tr>
                            <th>HARGA</th>
                            <td>Rp. {{ number_format($product->price) }}</td>
                        </tr>
                        <tr>
                            <th>SPESIFIKASI</th>
                            <td>
                                {!! nl2br($product->spesifikasi) !!}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-7 m-2">
            @if ($product->img1)
            <a class="btn btn-outline-secondary" id="{{ $product->img1 }}" onclick="change(this.id)">
                <div class=" carousel-item active">
                    <img src="/storage/{{ $product->img1 }}" height="100px">
                </div>
            </a>
            @endif
            @if ($product->img2)
            <a class="btn btn-outline-secondary" id="{{ $product->img2 }}" onclick="change(this.id)">
                <div class=" carousel-item active">
                    <img src="/storage/{{ $product->img2 }}" height="100px">
                </div>
            </a>
            @endif
            @if ($product->img3)
            <a class="btn btn-outline-secondary" id="{{ $product->img3 }}" onclick="change(this.id)">
                <div class=" carousel-item active">
                    <img src="/storage/{{ $product->img3 }}" height="100px">
                </div>
            </a>
            @endif
            @if ($product->img4)
            <a class="btn btn-outline-secondary" id="{{ $product->img4 }}" onclick="change(this.id)">
                <div class=" carousel-item active">
                    <img src="/storage/{{ $product->img4 }}" height="100px">
                </div>
            </a>
            @endif
        </div>
    </div>
    @slot('js')
    <script src="{{ asset('js/showproduct.js') }}"></script>
    @endslot
</x-guest-layout>