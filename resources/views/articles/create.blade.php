<x-layout>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="box-vivace p-4 p-md-5 rounded-4">
                <h1 class="fw-bold mb-4" style="color: #7e22ce;">Pubblica un nuovo disegno</h1>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Titolo del disegno</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Es. Studio di mani a carboncino">
                        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tecnica</label>
                        <input type="text" name="technique" class="form-control @error('technique') is-invalid @enderror" value="{{ old('technique') }}" placeholder="Es. Matita, Carboncino, Acquerello, China">
                        @error('technique') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Descrizione</label>
                        <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror" placeholder="Racconta carta, materiali, luci o ispirazione...">{{ old('description') }}</textarea>
                        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Immagine del disegno</label>
                        <input type="file" name="img" class="form-control @error('img') is-invalid @enderror">
                        @error('img') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <button type="submit" class="btn btn-corallo px-4">Salva Disegno</button>
                    <a href="{{ route('articles.index') }}" class="btn btn-outline-secondary">Annulla</a>
                </form>
            </div>
        </div>
    </div>
</x-layout>