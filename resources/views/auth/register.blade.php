<x-layout>
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card border-0 shadow rounded-4 p-4">
                <h2 class="fw-bold mb-4 text-center" style="color: #6d28d9;">Registrati</h2>

                @if ($errors->any())
                    <div class="alert alert-danger rounded-3">
                        <ul class="mb-0 small">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('register') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">Nome</label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="form-control rounded-3 @error('name') is-invalid @enderror"
                            value="{{ old('name') }}"
                            required
                            autofocus
                        >
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="form-label form-control rounded-3 @error('email') is-invalid @enderror"
                            value="{{ old('email') }}"
                            required
                        >
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="form-control rounded-3 @error('password') is-invalid @enderror"
                            required
                        >
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label fw-semibold">Conferma Password</label>
                        <input
                            type="password"
                            name="password_confirmation"
                            id="password_confirmation"
                            class="form-control rounded-3"
                            required
                        >
                    </div>

                    <button type="submit" class="btn btn-corallo w-100 py-2 rounded-3">
                        Crea Account
                    </button>
                </form>

                <p class="text-center text-muted mt-3 mb-0 small">
                    Hai già un account? <a href="{{ route('login') }}" class="fw-semibold" style="color: #6d28d9;">Accedi</a>
                </p>
            </div>
        </div>
    </div>
</x-layout>