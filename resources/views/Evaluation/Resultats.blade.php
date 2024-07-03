@include('Dashboard.Dashboard')

<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex flex-column">
        <div class="d-flex align-items-center justify-content-center flex-grow-1">
            <div class="row justify-content-center w-100">
                <div class="col-md-7 col-lg-7 col-xxl-8">
                    <div class="card mb-2">
                        <div class="card-body">
                            <h1>Résultats des Évaluations par Offre</h1>

                            @if($scoresParOffre)
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID Offre</th>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Email</th>
                                            <th>Total Score</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($scoresParOffre as $score)
                                        <tr>
                                            <td>{{ $score->id_offre }}</td>
                                            @if(isset($score->utilisateur))
                                                <td>{{ $score->utilisateur->nom }}</td>
                                                <td>{{ $score->utilisateur->prenom }}</td>
                                                <td>{{ $score->utilisateur->email }}</td>
                                            @else
                                                <td colspan="3">Aucun utilisateur associé</td>
                                            @endif
                                            <td>{{ $score->total_score }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>Aucun score trouvé pour cette offre.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
