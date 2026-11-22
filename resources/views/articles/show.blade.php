<x-layout>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="box-vivace p-4 p-md-5 rounded-4">
                <span class="badge rounded-pill text-bg-danger mb-2">{{ $article->technique }}</span>
                <h1 class="fw-bold mb-3" style="color: #6d28d9;">{{ $article->title }}</h1>

                @if($article->img)
                    <img src="{{ \Illuminate\Support\Facades\Storage::url($article->img) }}" class="img-fluid rounded-4 mb-4 shadow-sm" alt="{{ $article->title }}">
                @endif

                <p class="fs-5 text-secondary">{{ $article->description }}</p>

                <div class="d-flex flex-wrap gap-2 mt-4">
                    <a href="{{ route('articles.index') }}" class="btn btn-outline-dark">← Torna alla Galleria</a>
                    <a href="{{ route('articles.edit', $article) }}" class="btn btn-primary">Modifica</a>
                    <form action="{{ route('articles.destroy', $article) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Vuoi eliminare questo disegno?')">Elimina</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>