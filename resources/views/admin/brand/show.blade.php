<form action="{{ route('brand.update',['id'=>$brand->id]) }}" method="POST">
    @csrf
    @method('put')
    <div class="form-group">
        <label class="form-label form-label-light" for="name">Nama Kategori</label>
        <input type="text" name="name" value="{{ $brand->name }}" class="form-control form-control-light" id="name"
            placeholder="name">
        @error('name')
        <label class="form-label form-label-light">{{ $message }}</label>
        @enderror
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="summit" class="btn btn-primary">Simpan</button>
    </div>
</form>