<x-layout>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="box-vivace p-4 p-md-5 rounded-4">
                <h1 class="fw-bold mb-4" style="color: #7e22ce;">Modifica disegno</h1>

                <form action="{{ route('articles.update', $article) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Titolo del disegno</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $article->title) }}">
                        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tecnica</label>
                        <input type="text" name="technique" class="form-control @error('technique') is-invalid @enderror" value="{{ old('technique', $article->technique) }}">
                        @error('technique') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Descrizione</label>
                        <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description', $article->description) }}</textarea>
                        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nuova immagine (opzionale)</label>
                        <input type="file" name="img" class="form-control @error('img') is-invalid @enderror">
                        @error('img') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <button type="submit" class="btn btn-corallo px-4">Aggiorna Disegno</button>
                    <a href="{{ route('articles.index') }}" class="btn btn-outline-secondary">Annulla</a>
                </form>
            </div>
        </div>
    </div>
</x-layout>