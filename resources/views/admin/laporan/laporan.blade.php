<x-app-layout title="Laporan">
    <div class="row g-4 mb-4">
        <!-- Projects Widget-->
        <div class="col-12">
            <div class="card mb-4 h-100 bg-white">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table" style="color: black;" class="table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Total Pemasukan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($harian as $i)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $i->hari .'/'. $i->bulan .'/'. $i->tahun }}</td>
                                    <td>Rp. {{ number_format($i->total_harian) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Projects Widget-->
        <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambah" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('category.create') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="form-label form-label-light" for="name">Nama Kategori</label>
                                <input type="text" name="name" class="form-control form-control-light" id="name"
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
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="load-update"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @slot('js')
    <script>
        $(document).ready( function () {
            $('#table').DataTable({
                dom: 'Bfrtip',
            buttons: [
                'colvis',
                'excel',
                'print'
            ]
            });
        } );
    </script>
    @endslot
</x-app-layout>