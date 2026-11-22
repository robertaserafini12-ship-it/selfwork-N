<x-layout>
    <div class="p-4 p-md-5 mb-5 box-vivace rounded-4">
        <div class="row align-items-center g-4">
            <div class="col-lg-7">
                <span class="badge rounded-pill text-bg-warning mb-2 px-3 py-2">✏️ Schizzi • Carboncino • Acquerello</span>
                <h1 class="display-5 fw-bold mt-2" style="color: #7e22ce;">Atelier dei Disegni d'Arte</h1>
                <p class="fs-5 text-secondary mt-2">
                    Esplora schizzi preparatori, studi dal vero e quadri colorati, oppure pubblica le tue opere.
                </p>
                <div class="d-flex flex-wrap gap-3 mt-4">
                    <a href="{{ route('articles.index') }}" class="btn btn-corallo btn-lg px-4">Vai alla Galleria</a>
                    <a href="{{ route('articles.create') }}" class="btn btn-primary btn-lg px-4">Aggiungi un Disegno</a>
                    <a href="{{ route('contact') }}" class="btn btn-info text-dark fw-semibold btn-lg px-4">Contattaci</a>
                </div>
            </div>
            <div class="col-lg-5 text-center">
                <svg viewBox="0 0 420 290" class="w-100 rounded-4 shadow-sm" style="max-width: 420px; background: #fef3c7; border: 4px solid #8b5cf6;">
                    <!-- Cornice quadro -->
                    <rect x="28" y="24" width="364" height="242" rx="12" fill="#fffbeb" stroke="#7c3aed" stroke-width="6"/>
                    <!-- Schizzo a matita / carboncino -->
                    <path d="M55 215 Q 130 95, 210 175 T 360 115" fill="none" stroke="#334155" stroke-width="3" stroke-dasharray="6 4"/>
                    <circle cx="315" cy="78" r="26" fill="#fb7185" opacity="0.85"/>
                    <polygon points="85,220 165,110 245,220" fill="#38bdf8" opacity="0.8"/>
                    <polygon points="185,220 265,130 345,220" fill="#a855f7" opacity="0.75"/>
                    <!-- Matita disegnata -->
                    <g transform="translate(250, 215) rotate(-25)">
                        <rect x="0" y="0" width="95" height="14" rx="3" fill="#facc15" stroke="#1e293b" stroke-width="2"/>
                        <polygon points="95,0 114,7 95,14" fill="#fde68a" stroke="#1e293b" stroke-width="2"/>
                        <polygon points="108,4.6 114,7 108,9.4" fill="#1e293b"/>
                    </g>
                    <text x="52" y="54" font-family="sans-serif" font-size="14" font-weight="bold" fill="#6d28d9">SCHIZZO &amp; QUADRO D'ATELIER</text>
                </svg>
            </div>
        </div>
    </div>

    <h2 class="h4 mb-3 fw-bold" style="color: #6d28d9;">Ultimi disegni aggiunti</h2>
    <div class="row g-4">
        @forelse($latestArticles as $article)
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow rounded-4">
                    @if($article->img)
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($article->img) }}" class="card-img-top rounded-top-4" alt="{{ $article->title }}" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <span class="badge rounded-pill text-bg-danger mb-2 align-self-start">{{ $article->technique }}</span>
                        <h5 class="card-title fw-bold">{{ $article->title }}</h5>
                        <p class="card-text text-muted">{{ \Illuminate\Support\Str::limit($article->description, 90) }}</p>
                        <a href="{{ route('articles.show', $article) }}" class="btn btn-sm btn-corallo mt-auto align-self-start">Leggi scheda</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning border-0 shadow-sm fw-semibold">
                    Ancora nessun disegno caricato. Clicca su "+ Pubblica Disegno" per iniziare!
                </div>
            </div>
        @endforelse
    </div>
</x-layout>