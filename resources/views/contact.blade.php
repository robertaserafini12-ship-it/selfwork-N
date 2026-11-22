<x-layout>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="box-vivace p-4 p-md-5 rounded-4">
                <h1 class="fw-bold mb-2" style="color: #7e22ce;">✉️ Contatta l'Atelier</h1>
                <p class="text-muted mb-4">Invia un messaggio di prova per verificare l'invio email su Mailtrap.</p>

                @if(session('success'))
                    <div class="alert alert-success fw-semibold">{{ session('success') }}</div>
                @endif

                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Il tuo nome</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Es. Giulia">
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">La tua email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="giulia@esempio.it">
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Messaggio</label>
                        <textarea name="message" rows="4" class="form-control @error('message') is-invalid @enderror" placeholder="Scrivi qui la tua richiesta o commento sui disegni...">{{ old('message') }}</textarea>
                        @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <button type="submit" class="btn btn-corallo px-4">Invia Email</button>
                    <a href="{{ route('homepage') }}" class="btn btn-outline-secondary">Torna alla Home</a>
                </form>
            </div>
        </div>
    </div>
</x-layout>