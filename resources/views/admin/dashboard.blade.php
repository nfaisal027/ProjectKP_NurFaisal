<x-app-layout title="DashBoard">
    <!-- Breadcrumbs-->
    <nav class="mb-4 pb-2 border-bottom" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./index.html"><i class="ri-home-line align-bottom me-1"></i>
                    Dashboard</a></li>
        </ol>
    </nav> <!-- / Breadcrumbs-->

    <!-- Bottom Row Widgets-->
    <div class="row g-4 mb-4">
        <div>
            <canvas id="myChart"></canvas>
        </div>
        <!-- Projects Widget-->
        <div class="col-12">
            <div class="card mb-4 h-100 bg-white">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table" class="table m-0" style="color: black">
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
                                    <td>PG - {{ $i->faktur }}</td>
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
        </div>

        <!-- / Projects Widget-->


    </div>

    @slot('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
        function generateBackgroundColors(length) {
        var colors = [];
        for (var i = 0; i < length; i++) {
            var color = 'rgba(' + getRandomValue(0, 255) + ',' + getRandomValue(0, 255) + ',' + getRandomValue(0, 255) + ',0.6)';
            colors.push(color);
        }
        return colors;
        }

        // Fungsi untuk menghasilkan nilai acak antara min dan max
        function getRandomValue(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
        }
        // Mendapatkan referensi ke elemen canvas
    var ctx = document.getElementById('myChart').getContext('2d');

    $.ajax({
        url: '/chart-data-bulanan',
        method: 'GET',
        success: function(data) {
            // Mengolah data bulanan dari controller menjadi format yang diperlukan untuk grafik
            var labels = data.map(function(item) {
            return item.bulan + '-' + item.tahun;
            });

            var values = data.map(function(item) {
            return item.total_bulan;
            });
            var backgroundColors = generateBackgroundColors(data.length);

            // Membuat konfigurasi grafik dengan data bulanan dari controller
            var config = {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                label: 'Total Pendapatan Per Bulanan',
                data: values,
                backgroundColor: backgroundColors
                }]
            },
            options: {}
            };

            // Membuat objek grafik menggunakan konfigurasi
            var myChart = new Chart(ctx, config);
        }
    });

    </script>

    @endslot
</x-app-layout>