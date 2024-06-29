
<div class="container mt-4">
    <h1>Bordereau des Candidatures</h1>

    @if($pdfExists)
        <p>Un nouveau bordereau de candidatures a été généré.</p>
        <a href="{{ Storage::url('public/' . $pdfPath) }}" class="btn btn-primary" target="_blank">Voir le PDF</a>
        <a href="{{ Storage::url('public/' . $pdfPath) }}" class="btn btn-success" download>Télécharger le PDF</a>
    @else
        <p>Aucun bordereau disponible.</p>
    @endif
</div>
