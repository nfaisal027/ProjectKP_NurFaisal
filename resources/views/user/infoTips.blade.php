<x-guest-layout title="Tips & Triks">
    <div class="container p-6">
        <h2 class="p-6 text-2xl font-semibold">
            Tips & Triks
        </h2>
    </div>
    <div class="container">
        <div class="row p-2">
            @foreach ($data as $item)
            <div class="col-md-4 p-3">
                <div class="card">
                    <div class="card-body">
                        <img src="/storage/{{ $item->thumbnail }}" id="{{ $item->id }}" onclick="tes(this.id)"
                            class="card-img-top" style="aspect-ratio: 1 / 1;object-fit:cover;" alt="produk">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{ $data->links() }}
    </div>
    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="load-update"></div>
                </div>
            </div>
        </div>
    </div>
    @slot('js')
    <script>
        function tes(slug){
            $.ajax({
                type: 'GET',
                url: '/infotips/' + slug,
                success: function(data) {
                    $('#load-update').html(data);
                    $('#showModal').modal('show');
                },
            });
        }
    </script>
    @endslot
</x-guest-layout>