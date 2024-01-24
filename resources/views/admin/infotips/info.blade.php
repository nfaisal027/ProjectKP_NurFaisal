<x-app-layout title="Info & Tips">
    <!-- Breadcrumbs-->
    <nav class="mb-4 pb-2 border-bottom" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="ri-home-line align-bottom me-1"></i>
                    Info & Tips</a></li>
        </ol>
        <button type="button" data-bs-toggle="modal" data-bs-target="#tambah"
            class="btn btn-primary btn btn-sm m-2">Tambah</button>
    </nav> <!-- / Breadcrumbs-->
    @if (session()->has('success'))
    <div class="p-2">
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </symbol>
        </svg>
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                <use xlink:href="#check-circle-fill" />
            </svg>
        </div>
    </div>
    @endif

    <!-- Bottom Row Widgets-->
    <div class="row g-4 mb-4">
        <!-- Projects Widget-->
        <div class="col-12">
            <div class="card mb-4 h-100 bg-white">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tableData" style="color: black;"
                            class="table-striped align-items-center align-content-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Thumnail</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $i)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $i->title }}</td>
                                    <td>
                                        <img src="/storage/{{ $i->thumbnail }}" style="height: 50px;height: 50px;">
                                    </td>
                                    <td>
                                        <button id="{{ $i->slug }}" onclick="show(this.id)"
                                            class="btn btn-warning btn btn-sm">Edit</button>
                                        <form action="/admin/infotips/delete/{{ $i->id }}" method="post"
                                            data-confirm-delete="true" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="btn btn-danger btn-sm delete-confirm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Projects Widget-->
    </div>
    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambah" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Info</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="createForm" action="{{ route('info.create') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="form-label form-label-light" for="title">Judul</label>
                            <input type="text" autofocus name="title" value="{{ old('title') }}"
                                class="form-control form-control-light" id="title" placeholder="title">
                            <div id="titleError" class="error"></div>
                        </div>
                        <div class="form-group">
                            <label class="form-label form-label-light" for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" value="{{ old('deskripsi') }}"
                                class="form-control form-control-light"></textarea>
                            <div id="deskripsiError" class="error"></div>
                        </div>
                        <div class="form-group">
                            <label class="form-label form-label-light" for="thumbnail">thumbnails</label>
                            <img class="img-fluid" id="img-thumbnail">
                            <input type="file" name="thumbnail" class="form-control form-control-light" id="thumbnail"
                                placeholder="thumbnail" onchange="previewthumbnail()">
                            <div id="thumbnailError" class="error"></div>
                        </div>
                        <div class="form-group">
                            <label class="form-label form-label-light" for="name">files 1</label>
                            <img class="img-fluid" id="img-preview1">
                            <input type="file" name="files1" class="form-control form-control-light" id="files1"
                                placeholder="files 1" onchange="previewImage1()">
                            <div id="files1Error" class="error"></div>
                        </div>
                        <div class="form-group">
                            <label class="form-label form-label-light" for="name">files 2</label>
                            <img class="img-fluid" id="img-preview2">
                            <input type="file" name="files2" class="form-control form-control-light" id="files2"
                                placeholder="files 2" onchange="previewImage2()">
                            <div id="files2Error" class="error"></div>
                        </div>
                        <div class="form-group">
                            <label class="form-label form-label-light" for="name">files 3</label>
                            <img class="img-fluid" id="img-preview3">
                            <input type="file" name="files3" class="form-control form-control-light" id="files3"
                                placeholder="files 3" onchange="previewImage3()">
                            <div id="files3Error" class="error"></div>
                        </div>
                        <div class="form-group">
                            <label class="form-label form-label-light" for="name">files 4</label>
                            <img class="img-fluid" id="img-preview4">
                            <input type="file" name="files4" class="form-control form-control-light" id="files4"
                                placeholder="files 4" onchange="previewImage4()">
                            <div id="files4Error" class="error"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="summit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div id="load-update"></div>
            </div>
        </div>
    </div>

    </div>
    @slot('js')
    <script>
        $(document).ready( function () {
            $('#tableData').DataTable();
        });

        $(".delete-confirm").click(function(event) {
            event.preventDefault(); // Mencegah aksi default submit form
            let form = event.target.closest("form");
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Anda yakin ingin menghapus item ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.value) {
                    form.submit(); // Jika pengguna mengklik tombol "Ya, hapus", submit form
                }
            });
        });

        

        $(document).ready(function() {
            $('#createModal').on('shown.bs.modal', function() {
                $('.error').html('');
            });
                $('#createForm').on('submit', function(e) {
                    e.preventDefault();
                    $('.error').html('');
                    var form = $(this)[0];
                    var formData = new FormData(form);
                    // Lakukan POST create menggunakan AJAX
                    $.ajax({
                        type: 'POST',
                        url: $(this).attr('action'),
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            // Berhasil membuat data, lakukan tindakan yang diinginkan (misalnya, tutup modal, tampilkan notifikasi, dll.)
                            $.ajax({
                                type: 'GET',
                                url: '/admin/infotips/getdata',
                                success: function(data) {
                                    // Perbarui isi tabel dengan data terbaru
                                    $('#tableData').html(data);
                                    $('#tambah').modal('hide');
                                },
                            });
                        },
                        error: function(response) {
                            if (response.status === 422) {
                            // Tangani error validasi, tampilkan pesan error di masing-masing field
                            var errors = response.responseJSON.errors;
                            $.each(errors, function(field, messages) {
                                $('#' + field + 'Error').html(messages[0]);
                            });
                            }
                        }
                    });
                });
            });

        function show(id){
            $.ajax({
                method : 'get',
                type : "json",
                url : '/admin/infotips/' + id,
            }).done(function(data){
                $('#load-update').html(data);
                $('#edit').modal('show');
            })
        }
        function previewthumbnail(){
        const image = document.querySelector("#thumbnail");
            const imgview = document.querySelector("#img-thumbnail");
            imgview.style.display = 'block'
            imgview.style.width = '75px'
            imgview.style.height = '75px'
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFReader){
                imgview.src = oFReader.target.result;
            }
        }
        function previewImage1(){
        const image = document.querySelector("#files1");
            const imgview = document.querySelector("#img-preview1");
            imgview.style.display = 'block'
            imgview.style.width = '75px'
            imgview.style.height = '75px'
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFReader){
                imgview.src = oFReader.target.result;
            }
        }
        function previewImage2(){
        const image = document.querySelector("#files2");
            const imgview = document.querySelector("#img-preview2");
            imgview.style.display = 'block'
            imgview.style.width = '75px'
            imgview.style.height = '75px'
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFReader){
                imgview.src = oFReader.target.result;
            }
        }
        function previewImage3(){
        const image = document.querySelector("#files3");
            const imgview = document.querySelector("#img-preview3");
            imgview.style.display = 'block'
            imgview.style.width = '75px'
            imgview.style.height = '75px'
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFReader){
                imgview.src = oFReader.target.result;
            }
        }
        function previewImage4(){
        const image = document.querySelector("#files4");
            const imgview = document.querySelector("#img-preview4");
            imgview.style.display = 'block'
            imgview.style.width = '75px'
            imgview.style.height = '75px'
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFReader){
                imgview.src = oFReader.target.result;
            }
        }
        function updatePreviewthumbnail(){
            const image = document.querySelector("#update-thumbnail");
            const imgview = document.querySelector("#update-img-thumbnail");
            imgview.style.display = 'block'
            imgview.style.width = '75px'
            imgview.style.height = '75px'
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFReader){
                imgview.src = oFReader.target.result;
            }
        }
        function updatePreviewImage1(){
            const image = document.querySelector("#updateFiles1");
            const imgview = document.querySelector("#update-img-preview1");
            imgview.style.display = 'block'
            imgview.style.width = '75px'
            imgview.style.height = '75px'
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFReader){
                imgview.src = '';
                imgview.src = oFReader.target.result;
            }
        }
        function updatePreviewImage2(){
            const image = document.querySelector("#updateFiles2");
            const imgview = document.querySelector("#update-img-preview2");
            imgview.style.display = 'block'
            imgview.style.width = '75px'
            imgview.style.height = '75px'
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFReader){
                imgview.src = '';
                imgview.src = oFReader.target.result;
            }
        }
        function updatePreviewImage3(){
            const image = document.querySelector("#updateFiles3");
            const imgview = document.querySelector("#update-img-preview3");
            imgview.style.display = 'block'
            imgview.style.width = '75px'
            imgview.style.height = '75px'
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFReader){
                imgview.src = '';
                imgview.src = oFReader.target.result;
            }
        }
        function updatePreviewImage4(){
            const image = document.querySelector("#updateFiles4");
            const imgview = document.querySelector("#update-img-preview4");
            imgview.style.display = 'block'
            imgview.style.width = '75px'
            imgview.style.height = '75px'
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFReader){
                imgview.src = '';
                imgview.src = oFReader.target.result;
            }
        }        
    </script>
    @endslot
</x-app-layout>