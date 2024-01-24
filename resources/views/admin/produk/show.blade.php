<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Spesifikasi</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form action="{{ route('product.update',['id'=>$product->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label class="form-label form-label-light" for="name">Nama Produk</label>
            <input type="text" name="name" value="{{ $product->name }}" class="form-control form-control-light"
                id="name" placeholder="name">
            @error('name')
            <label class="form-label form-label-light">{{ $message }}</label>
            @enderror
        </div>
        <div class="form-group">
            <label class="form-label form-label-light" for="name">Kategori Produk</label>
            <select class="form-control form-control-light" value="{{ $product->category_id }}" name="category_id"
                id="category_id">
                @foreach ($cat as $i)
                <option value="{{ $i->id }}">{{ $i->name }}</option>
                @endforeach
            </select>
            @error('category_id')
            <label class="form-label form-label-light">{{ $message }}</label>
            @enderror
        </div>
        <div class="form-group">
            <label class="form-label form-label-light" for="name">Brand Produk</label>
            <select class="form-control form-control-light" value="{{ $product->brand_id }}" name="brand_id"
                id="brand_id">
                @foreach ($brand as $i)
                <option value="{{ $i->id }}" <?php if ($i->id == $product->brand_id) {
                    echo "selected";
                    }?>>{{ $i->name }}</option>
                @endforeach
            </select>
            @error('brand_id')
            <label class="form-label form-label-light">{{ $message }}</label>
            @enderror
        </div>
        <div class="form-group">
            <label class="form-label form-label-light" for="name">Stock Produk</label>
            <input type="number" name="stock" value="{{ $product->stock }}" class="form-control form-control-light"
                id="stock" placeholder="1">
            @error('stock')
            <label class="form-label form-label-light">{{ $message }}</label>
            @enderror
        </div>
        <div class="form-group">
            <label class="form-label form-label-light" for="name">berat Produk</label>
            <input type="number" name="berat" value="{{ $product->berat }}" class="form-control form-control-light"
                id="berat" placeholder="1">
            @error('berat')
            <label class="form-label form-label-light">{{ $message }}</label>
            @enderror
        </div>
        <div class="form-group">
            <label class="form-label form-label-light" for="name">Harga Produk</label>
            <input type="number" name="price" class="form-control form-control-light" value="{{ $product->price }}"
                id="price" placeholder="1000000">
            @error('price')
            <label class="form-label form-label-light">{{ $message }}</label>
            @enderror
        </div>
        <div class="form-group">
            <label class="form-label form-label-light" for="name">Spesifikasi Produk</label>
            <textarea name="spesifikasi" id="spesifikasi" value="{{ $product->spesifikasi }}"
                class="form-control form-control-light">{{ $product->spesifikasi }}</textarea>
            @error('spesifikasi')
            <label class="form-label form-label-light">{{ $message }}</label>
            @enderror
        </div>
        <div class="form-group">
            <label class="form-label form-label-light" for="name">Gambar 1 Produk</label>
            <img class="img-fluid" id="update-img-preview1" style="height: 50px;height: 50px;" @if ($product->img1)
            src="/storage/{{ $product->img1 }}"
            @endif>
            <input type="file" name="img1" class="form-control form-control-light" id="updateImg1"
                placeholder="gambar 1" onchange="updatePreviewImage1()">
            @error('img1')
            <label class="form-label form-label-light">{{ $message }}</label>
            @enderror
        </div>
        <div class="form-group">
            <label class="form-label form-label-light" for="name">Gambar 2 Produk</label>
            <img class="img-fluid" id="update-img-preview2" style="height: 50px;height: 50px;" @if ($product->img2)
            src="/storage/{{ $product->img2 }}"
            @endif>
            <input type="file" name="img2" class="form-control form-control-light" id="updateImg2"
                placeholder="gambar 2" onchange="updatePreviewImage2()">
            @error('img2')
            <label class="form-label form-label-light">{{ $message }}</label>
            @enderror
        </div>
        <div class="form-group">
            <label class="form-label form-label-light" for="name">Gambar 3 Produk</label>
            <img class="img-fluid" id="update-img-preview3" style="height: 50px;height: 50px;" @if ($product->img3)
            src="/storage/{{ $product->img3 }}"
            @endif>
            <input type="file" name="img3" class="form-control form-control-light" id="updateImg3"
                placeholder="gambar 3" onchange="updatePreviewImage3()">
            @error('img3')
            <label class="form-label form-label-light">{{ $message }}</label>
            @enderror
        </div>
        <div class="form-group">
            <label class="form-label form-label-light" for="name">Gambar 4 Produk</label>
            <img class="img-fluid" id="update-img-preview4" style="height: 50px;height: 50px;" @if ($product->img4)
            src="/storage/{{ $product->img4 }}"
            @endif>
            <input type="file" name="img4" class="form-control form-control-light" id="updateImg4"
                placeholder="gambar 4" onchange="updatePreviewImage4()">
            @error('img4')
            <label class="form-label form-label-light">{{ $message }}</label>
            @enderror
        </div>
        <input name="oldImg1" value="{{ $product->img1 }}" type="hidden">
        <input name="oldImg2" value="{{ $product->img2 }}" type="hidden">
        <input name="oldImg3" value="{{ $product->img3 }}" type="hidden">
        <input name="oldImg4" value="{{ $product->img4 }}" type="hidden">
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="summit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>