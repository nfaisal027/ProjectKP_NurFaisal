<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Spesifikasi</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <table class="table " style="color: black; border: 1px black solid">
        <tbody>
            <tr>
                <th>Name</th>
                <td>:</td>
                <td>{{ $product->name }}</td>
            </tr>
            <tr>
                <th>Kategori</th>
                <td>:</td>
                <td>{{ $product->category->name }}</td>
            </tr>
            <tr>
                <th>Brand</th>
                <td>:</td>
                <td>{{ $product->brand->name }}</td>
            </tr>
            <tr>
                <th>Harga</th>
                <td>:</td>
                <td>{{ $product->price }}</td>
            </tr>

            <tr>
                <th>stock</th>
                <td>:</td>
                <td>{{ $product->stock }}</td>
            </tr>
            <tr>
                <th>Berat</th>
                <td>:</td>
                <td>{{ $product->berat }} g</td>
            </tr>
            <tr>
                <th>spesifikasi</th>
                <td>:</td>
                <td>{!! nl2br($product->spesifikasi) !!}</td>
            </tr>
            <tr>
                <th>Gambar 1</th>
                <td>:</td>
                @if ($product->img1)
                <td><img src="/storage/{{ $product->img1 }}" class="card-img-center img-responsive"
                        style="width: 50px; height: 50px;"></td>
                @else
                <td>Tidak Ada Gambar</td>
                @endif
            </tr>
            <tr>
                <th>Gambar 2</th>
                <td>:</td>
                @if ($product->img2)
                <td><img src="/storage/{{ $product->img2 }}" class="card-img-center img-responsive"
                        style="width: 50px; height: 50px;"></td>
                @else
                <td>Tidak Ada Gambar</td>
                @endif
            </tr>
            <tr>
                <th>Gambar 3</th>
                <td>:</td>
                @if ($product->img3)
                <td><img src="/storage/{{ $product->img3 }}" class="card-img-center img-responsive"
                        style="width: 50px; height: 50px;"></td>
                @else
                <td>Tidak Ada Gambar</td>
                @endif
            </tr>
            <tr>
                <th>Gambar 4</th>
                <td>:</td>
                @if ($product->img4)
                <td><img src="/storage/{{ $product->img4 }}" class="card-img-center img-responsive"
                        style="width: 50px; height: 50px;"></td>
                @else
                <td>Tidak Ada Gambar</td>
                @endif
            </tr>
        </tbody>
    </table>
</div>