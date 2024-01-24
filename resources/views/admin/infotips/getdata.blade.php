<table id="tableData" style="color: black;" class="table-striped align-items-center align-content-center">
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
                <button id="{{ $i->slug }}" onclick="show(this.id)" class="btn btn-warning btn btn-sm">Edit</button>
                <form action="/admin/infotips/delete/{{ $i->id }}" method="post"
                    onclick="confirm('yakin Mau Hapus Data')" class="d-inline">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>