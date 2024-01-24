<x-guest-layout title="Profile">
    <div class="container p-4">
        <div class="row">
            <div class="col">
                <div class="card-body">
                    <div class="img-center mb-3">
                        <img id="imgpic" style="aspect-ratio: 1 / 1;object-fit:cover;" class="card-img-top"
                            src="{{ $user->profile->img ? '/storage/' . $user->profile->img : '/assets/images/profile.jpeg' }}">
                    </div>
                    <div class="mb-3">
                        <form action="{{ route('user.updatepic') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <input id="img" name="img" type="file" class="form-control mb-3" onchange="previewImage()">
                            <input type="hidden" name="oldPic" value="{{ $user->profile->img }}">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('user.updateprof') }}" method="post">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="name">Nama</label>
                                <input type="text" name="name" value="{{ $user->name ?? '' }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="email">email</label>
                                <input type="email" name="email" readonly value="{{ $user->email ?? '' }}"
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="province_id">provinsi</label>
                                <select name="province_id" id="province_id" class="form-control">
                                    <option value="">province</option>
                                    @foreach ($prov as $i)
                                    <option @if ($i->id == $user->profile->province_id) {{ 'selected' }} @endif
                                        value="{{ $i->id }}">{{ $i->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="kota_id">Kota</label>
                                <select name="kota_id" id="kota_id" class="form-control">
                                    <option value="">kota</option>
                                    @foreach ($kota as $i)
                                    <option @if ($i->id == $user->profile->kota_id) {{ 'selected' }} @endif
                                        value="{{ $i->id }}">{{ $i->city_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="no_hp">No. Handphone</label>
                                <input type="text" id="no_hp" name="np_hp" class="form-control"
                                    value="{{ $user->profile->no_hp ?? '' }}">
                            </div>
                            <div class="mb-3">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" cols="120"
                                    class="form-control">{{ $user->profile->alamat ?? '' }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @slot('js')
    <script>
        function previewImage() {
                const image = document.querySelector("#img");
                const imgview = document.querySelector("#imgpic");
                imgview.style.display = 'block'
                imgview.style.width = '300px'
                imgview.style.height = '300px'
                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);
                oFReader.onload = function(oFReader) {
                    imgview.src = oFReader.target.result;
                }
            }
    </script>
    @endslot
</x-guest-layout>