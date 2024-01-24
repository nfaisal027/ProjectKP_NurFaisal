<form action="{{ route('user.update',['id'=>$user->id]) }}" method="POST">
    @csrf
    @method('put')
    <div class="form-group">
        <label class="form-label form-label-light" for="name">Nama User</label>
        <input type="text" name="name" value="{{ $user->name }}" class="form-control form-control-light" id="name"
            placeholder="name">
        @error('name')
        <label class="form-label form-label-light">{{ $message }}</label>
        @enderror
    </div>
    <div class="form-group">
        <label class="form-label form-label-light" for="name">Email User</label>
        <input type="email" value="{{ $user->email }}" name="email" class="form-control form-control-light" id="email"
            placeholder="email@gmail.com">
        @error('email')
        <label class="form-label form-label-light">{{ $message }}</label>
        @enderror
    </div>
    <div class="form-group">
        <label class="form-label form-label-light" for="name">Role User</label>
        <select name="role" id="role" value="{{ implode('',$user->getRoleNames()->toArray()) }}"
            class="form-control form-control-light">
            @foreach ($role as $rol)
            <option value="{{ $rol->name }}" <?php if ($rol->name == implode('',$user->getRoleNames()->toArray()))
                {echo'selected';} ?>>
                {{ $rol->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="form-label form-label-light" for="name">Password User </label><br>
        <label class="form-label form-label-light" for="name">Note : kosongkan jika tidak ingin ganti password</label>
        <input type="password" name="password" class="form-control form-control-light" id="password">
        @error('password')
        <label class="form-label form-label-light">{{ $message }}</label>
        @enderror
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="summit" class="btn btn-primary">Simpan</button>
    </div>
</form>