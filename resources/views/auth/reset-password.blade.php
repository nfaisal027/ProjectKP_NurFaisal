<x-guest-layout>
    <div class="container p-5">
        <div class="col-md-6">
            <div class="card-body">
                <div class="form">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $i)
                            <li>{{ $i }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if (session()->has('success'))
                    <div class="alert alert-succes">
                        {{ session()->get('success') }}
                    </div>
                    @endif

                    <h2>Masukan Password Baru</h2>
                    <form action="{{ route('password.update') }}" method="post">
                        @csrf
                        <input type="text" name="token" value="{{ $token }}" hidden>
                        <input type="text" name="email" value="{{ request()->email }}" hidden>
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" required class="form-control" name="password">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password_confirmation" class="form-label">Password Confirmation</label>
                            <input type="password" id="password_confirmation" required class="form-control"
                                name="password_confirmation">
                        </div>
                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>