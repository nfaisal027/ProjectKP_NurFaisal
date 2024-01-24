<x-app-layout title="Transaksi">
    <div class="container mt-5 mb-4">
        <div class="table">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Transaksi</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Kurir</th>
                            <th>Ongkir</th>
                            <th>Harga Belanja</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $i)
                        <tr>
                            <td>PG - {{ $i->id }}</td>
                            <td>{{ $i->nama }}</td>
                            <td>{{ $i->status }}</td>
                            <td>{{ $i->kurir }}</td>
                            <td>Rp. {{ number_format($i->ongkir) }}</td>
                            <td>Rp. {{ number_format($i->total) }}</td>
                            <td>Rp. {{ number_format(($i->total + $i->ongkir)) }}</td>
                            <td><a class="btn btn-primary" href="/admin/invoice/{{ $i->id }}">Invoice</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>