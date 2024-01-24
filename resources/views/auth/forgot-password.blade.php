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

                    <h2>Lupa Password</h2>
                    <p>Masukan Email Untuk Reset</p>
                    <form action="{{ route('password.email') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="Email" class="form-label">Email</label>
                            <input type="email" required class="form-control" name="email">
                        </div>
                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>