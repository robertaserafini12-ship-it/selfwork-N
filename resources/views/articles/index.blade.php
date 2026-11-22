<x-layout>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold" style="color: #6d28d9;">Tutti i Disegni</h1>
        <a href="{{ route('articles.create') }}" class="btn btn-corallo">+ Nuovo Disegno</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success fw-semibold">{{ session('success') }}</div>
    @endif

    <div class="row g-4">
        @forelse($articles as $article)
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow rounded-4">
                    @if($article->img)
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($article->img) }}" class="card-img-top rounded-top-4" alt="{{ $article->title }}" style="height: 220px; object-fit: cover;">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <span class="badge rounded-pill text-bg-danger mb-2 align-self-start">{{ $article->technique }}</span>
                        <h5 class="card-title fw-bold">{{ $article->title }}</h5>
                        <p class="card-text text-muted">{{ \Illuminate\Support\Str::limit($article->description, 100) }}</p>
                        <div class="mt-auto d-flex flex-wrap gap-2">
                            <a href="{{ route('articles.show', $article) }}" class="btn btn-sm btn-outline-dark">Dettagli</a>
                            <a href="{{ route('articles.edit', $article) }}" class="btn btn-sm btn-outline-primary">Modifica</a>
                            <form action="{{ route('articles.destroy', $article) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Vuoi davvero eliminare questo disegno?')">Elimina</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning border-0 shadow-sm fw-semibold">
                    Nessun disegno presente. Clicca su "+ Nuovo Disegno" per iniziare!
                </div>
            </div>
        @endforelse
    </div>
</x-layout>