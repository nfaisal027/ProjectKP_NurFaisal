<div class="row">
    <div class="col-sm-12 col-md-8">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-interval="false">
            <div class="carousel-inner">
                @if ($data->thumbnail)
                <div class="carousel-item active">
                    <img src="/storage/{{ $data->thumbnail }}" class="d-block w-100" alt="Image 1">
                </div>
                @endif
                @if ($data->files1)
                <div class="carousel-item">
                    @if(in_array(strtolower(pathinfo($data->files1, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png',
                    'gif']))
                    <img src="/storage/{{ $data->files1 }}" class="d-block w-100" alt="Image 1">
                    @elseif(in_array(strtolower(pathinfo($data->files1, PATHINFO_EXTENSION)), ['mp4', 'avi', 'mov',
                    'wmv']))
                    <video src="/storage/{{ $data->files1 }}" class="d-block w-100" style="height: 800px" controls
                        preload="metadata"></video>
                    @endif
                </div>
                @endif
                @if ($data->files2)
                <div class="carousel-item">
                    @if(in_array(strtolower(pathinfo($data->files2, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png',
                    'gif']))
                    <img src="/storage/{{ $data->files2 }}" class="d-block w-100" alt="Image 2">
                    @elseif(in_array(strtolower(pathinfo($data->files2, PATHINFO_EXTENSION)), ['mp4', 'avi', 'mov',
                    'wmv']))
                    <video src="/storage/{{ $data->files2 }}" class="d-block w-100" style="height: 800px" controls
                        preload="metadata"></video>
                    @endif
                </div>
                @endif
                @if ($data->files3)
                <div class="carousel-item">
                    @if(in_array(strtolower(pathinfo($data->files3, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png',
                    'gif']))
                    <img src="/storage/{{ $data->files3 }}" class="d-block w-100" alt="Image 3">
                    @elseif(in_array(strtolower(pathinfo($data->files3, PATHINFO_EXTENSION)), ['mp4', 'avi', 'mov',
                    'wmv']))
                    <video src="/storage/{{ $data->files3 }}" class="d-block w-100" style="height: 800px" controls
                        preload="metadata"></video>
                    @endif
                </div>
                @endif
                @if ($data->files4)
                <div class="carousel-item">
                    @if(in_array(strtolower(pathinfo($data->files4, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png',
                    'gif']))
                    <img src="/storage/{{ $data->files4 }}" class="d-block w-100" alt="Image 1">
                    @elseif(in_array(strtolower(pathinfo($data->files4, PATHINFO_EXTENSION)), ['mp4', 'avi', 'mov',
                    'wmv']))
                    <video src="/storage/{{ $data->files4 }}" class="d-block w-100" style="height: 800px" controls
                        preload="metadata"></video>
                    @endif
                </div>
                @endif

                <!-- Tambahkan gambar atau video lainnya sesuai kebutuhan -->
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="col-md-4">
        <h2>{{ $data->title }}</h2>
        <p>{!! $data->deskripsi !!}</p>
    </div>
</div>