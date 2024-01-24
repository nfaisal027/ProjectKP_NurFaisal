<x-guest-layout title="invoice">
    <div class="card">
        <div class="card-body">
            <div class="container mb-5 mt-3">
                <div class="row d-flex align-items-baseline">
                    <div class="col-xl-9">
                        <p style="color: #7e8d9f;font-size: 20px;">Invoice >> <strong>ID: {{ $transaksi->faktur
                                }}</strong>
                        </p>
                    </div>
                    <div class="col-xl-3 float-end">
                        <a onclick="printElement()" class="btn btn-light text-capitalize border-0"
                            data-mdb-ripple-color="dark">
                            <i class="fas fa-print text-primary"></i> Print</a>
                        <a onclick="exportToPDF()" class="btn btn-light text-capitalize" data-mdb-ripple-color="dark"><i
                                class="far fa-file-pdf text-danger"></i> Export</a>
                    </div>
                    <hr>
                </div>
                <div class="container" id="print">
                    <div class="col-md-12">
                        <div class="text-center">
                            <h1 class="pt-0">POJOK GARASI</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-8">
                            <ul class="list-unstyled">
                                <li class="text-muted">Kepada: <span style="color:#5d9fc5 ;">{{ $transaksi->nama
                                        }}</span></li>
                                <li class="text-muted">Pontianak, Indonesia</li>
                                <li class="text-muted"><i class="fas fa-phone"></i>{{ $transaksi->no_hp }}</li>
                            </ul>
                        </div>
                        <div class="col-xl-4">
                            <p class="text-muted">Invoice</p>
                            <ul class="list-unstyled">
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                        class="fw-bold">ID:</span>{{ $transaksi->faktur }}</li>
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                        class="fw-bold">Tanggal: </span>{{ $transaksi->created_at->format('d-m-Y')
                                    }}</li>
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                        class="me-1 fw-bold">Status:</span><span
                                        class="badge bg-warning text-black fw-bold">
                                        {{ $transaksi->status }}</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="row my-2 mx-1 justify-content-center">
                        <table class="table table-striped table-borderless">
                            <thead style="background-color:#1e52fd ;" class="text-white">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama produk</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">harga Satuan</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksi->detail as $i)
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{ $i->name }}</td>
                                    <td>{{ $i->jumlah }}</td>
                                    <td>Rp. {{ number_format($i->price) }}</td>
                                    <td>Rp. {{ number_format(($i->price * $i->jumlah)) }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <th scope="row"></th>
                                    <td>Ongkos kirim</td>
                                    <td></td>
                                    <td>Rp. {{ number_format($transaksi->ongkir) }}</td>
                                    <td>Rp. {{ number_format($transaksi->ongkir) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-xl-9">
                        </div>
                        <div class="col-xl-3">
                            <p class="text-black float-start"><span class="text-black me-3"> Total </span><span
                                    style="font-size: 25px;">Rp. {{ number_format(($transaksi->total +
                                    $transaksi->ongkir)) }}</span></p>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    @slot('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script>
        function printElement() {
        var element = document.getElementById('print');
        var printContents = element.innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();

        document.body.innerHTML = originalContents;
        }

        function exportToPDF() {
        var element = document.getElementById('print');
        var opt = {
            margin: 10,
            filename: 'invoice.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
        };

        html2pdf().set(opt).from(element).save();
        }
    </script>
    @endslot
</x-guest-layout>