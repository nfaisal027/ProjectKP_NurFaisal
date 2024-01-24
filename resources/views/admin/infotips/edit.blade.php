<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Update Info</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form id="createForm" action="{{ route('info.update',['id'=>$infotips->id]) }}" method="POST"
        enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="form-group">
            <label class="form-label form-label-light" for="title">Judul</label>
            <input type="text" autofocus name="title" value="{{ $infotips->title }}"
                class="form-control form-control-light" id="title" placeholder="title">
            <div id="titleUpdateError" class="error"></div>
        </div>
        <div class="form-group">
            <label class="form-label form-label-light" for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" value="{{ $infotips->deskripsi }}"
                class="form-control form-control-light">{{ $infotips->deskripsi }}</textarea>
            <div id="deskripsiUpdateError" class="error"></div>
        </div>
        <div class="form-group">
            <label class="form-label form-label-light" for="thumbnail">thumbnails</label>
            <img class="img-fluid" id="update-img-thumbnail" style="height: 50px;height: 50px;"
                @if($infotips->thumbnail)
            src="/storage/{{ $infotips->thumbnail }}"
            @endif>
            <input type="file" value="{{ $infotips->thumbnail }}" name="thumbnail"
                class="form-control form-control-light" id="update-thumbnail" placeholder="thumbnail"
                onchange="updatePreviewthumbnail()">
            <div id="thumbnailUpdateError" class="error"></div>
        </div>
        <div class="form-group">
            <label class="form-label form-label-light" for="name">files 1</label>
            <img class="img-fluid" id="update-img-preview1" style="height: 50px;height: 50px;" @if ($infotips->files1)
            src="/storage/{{ $infotips->files1 }}"
            @endif>
            <input type="file" name="files1" class="form-control form-control-light" id="updateFiles1"
                placeholder="files 1" onchange="updatePreviewImage1()">
            <div id="files1UpdateError" class="error"></div>
        </div>
        <div class="form-group">
            <label class="form-label form-label-light" for="name">files 2</label>
            <img class="img-fluid" id="update-img-preview2" style="height: 50px;height: 50px;" @if ($infotips->files2)
            src="/storage/{{ $infotips->files2 }}"
            @endif>
            <input type="file" name="files2" class="form-control form-control-light" id="updateFiles2"
                placeholder="files 2" onchange="updatePreviewImage2()">
            <div id="files2UpdateError" class="error"></div>
        </div>
        <div class="form-group">
            <label class="form-label form-label-light" for="name">files 3</label>
            <img class="img-fluid" id="update-img-preview3" style="height: 50px;height: 50px;" @if ($infotips->files3)
            src="/storage/{{ $infotips->files3 }}"
            @endif>
            <input type="file" name="files3" class="form-control form-control-light" id="updateFiles3"
                placeholder="files 3" onchange="updatePreviewImage3()">
            <div id="files3Error" class="error"></div>
        </div>
        <div class="form-group">
            <label class="form-label form-label-light" for="name">files 4</label>
            <img class="img-fluid" id="update-img-preview4" style="height: 50px;height: 50px;" @if ($infotips->files4)
            src="/storage/{{ $infotips->files4 }}"
            @endif>
            <input type="file" name="files4" class="form-control form-control-light" id="updateFiles4"
                placeholder="files 4" onchange="updatePreviewImage4()">
            <div id="files4Error" class="error"></div>
        </div>
        <input name="oldThumbnail" value="{{ $infotips->thumbnail }}" type="hidden">
        <input name="oldFiles1" value="{{ $infotips->files1 }}" type="hidden">
        <input name="oldFiles2" value="{{ $infotips->files2 }}" type="hidden">
        <input name="oldFiles3" value="{{ $infotips->files3 }}" type="hidden">
        <input name="oldFiles4" value="{{ $infotips->files4 }}" type="hidden">
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="summit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
</div>