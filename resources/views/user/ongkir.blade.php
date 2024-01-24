<div class="card">
    <div class="card-body">
        <h5 class="card-title">Pilih Jasa Ongkir</h5>
        @foreach ($data as $item)
        <div class="card-body">
            <div class="form-check">
                <input class="form-check-input" value="{{ $item['cost'][0]['value']}}" type="radio" name="ongkir"
                    required id="ongkir">
                <label class="form-check-label" for="ongkir">
                    Rp {{ $item['cost'][0]['value'].' '.$item['description'].' ('. $item['service']}})
                </label>
            </div>
        </div>
        @endforeach
    </div>
</div>