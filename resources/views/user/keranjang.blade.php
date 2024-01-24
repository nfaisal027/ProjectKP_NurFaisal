<x-guest-layout title="Keranjang">
    <div class="container mt-5 mb-4">
        <div class="table">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Subtotal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $subtotal = 0;
                            $total = 0;
                        @endphp
                        @foreach ($keranjang as $i)
                            @php
                                $subtotal += $i->jumlah * $i->product->price;
                                $total += $subtotal;
                            @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $i->product->name }}</td>
                                <td>
                                    <form action="{{ route('keranjang.update', ['id' => $i->id]) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="id_product" id="id_product"
                                            value="{{ $i->product->id }}">
                                        <input type="number" name="jumlah" id="jumlah" value="{{ $i->jumlah }}"
                                            min="1" onchange="this.form.submit()" max="{{ $i->product->stock }}"
                                            class="form-control">
                                    </form>
                                </td>
                                <td>Rp. {{ number_format($i->product->price, 0, ',', '.') }}</td>
                                <td>Rp. {{ number_format($subtotal, 0, ',', '.') }}</td>
                                <td>
                                    <form action="{{ route('keranjang.delete', ['id' => $i->id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="5" align="right">Total Belanja</td>
                            <td>Rp. {{ number_format($total, 0, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <a href="{{ route('transaksi') }}" class="btn btn-success">CheckOut</a>
        </div>
    </div>
</x-guest-layout>
