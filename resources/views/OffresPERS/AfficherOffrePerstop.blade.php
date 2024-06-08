<div class="container">
    <h1>Détails de l'Offre PERS</h1>
    <div class="card">
        <div class="card-header">
            Offre ID: {{ $offre->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $offre->Titre }}</h5>
            <p class="card-text"><strong>Profil:</strong> {{ $offre->Profil }}</p>
            <p class="card-text"><strong>Exigence:</strong> {{ $offre->Exigence }}</p>
            <p class="card-text"><strong>Experience:</strong> {{ $offre->Experience }}</p>
            <p class="card-text"><strong>Details:</strong> {{ $offre->Details }}</p>
            <p class="card-text"><strong>Description:</strong> {{ $offre->Description }}</p>
            <hr>
            <h3>Avis de Recrutement associés</h3>
            @if ($offre->avis->isEmpty())
                <p>Aucun avis de recrutement associé à cette offre.</p>
            @else
                @foreach ($offre->avis as $avis)
                    <div class="card mb-2">
                        <div class="card-body">
                            <h5 class="card-title">{{ $avis->Titre ?? 'Titre non disponible' }}</h5>
                            <p class="card-text">{{ $avis->Description ?? 'Description non disponible' }}</p>
                            <p class="card-text"><strong>Date de l'avis:</strong> {{ $avis->created_at ?? 'Date non disponible' }}</p>
                        </div>
                    </div>
                @endforeach
            @endif
            <a href="{{ url()->previous() }}" class="btn btn-primary">Retour</a>
        </div>
    </div>
</div>
