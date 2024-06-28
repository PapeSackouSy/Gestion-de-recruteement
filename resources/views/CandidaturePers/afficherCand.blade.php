@include('Dashboard.Dashboard')
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex flex-column">
        <div class="d-flex align-items-center justify-content-center flex-grow-1">
            <div class="row justify-content-center w-100">
                <div class="col-md-7 col-lg-10 col-xxl-10 mt-3" style="margin-top: 30px;">
                    <div class="card mb-2">
                        <div class="card-body">
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                            @endif
                            <h1>Liste des Candidatures avec leurs Offres</h1>
                            <a href="{{ url('/export-candidatures') }}" class="btn btn-success mb-3">Télécharger le Bordereau</a>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Email</th>
                                        <th>Date de naissance</th>
                                        <th>Offres</th>
                                        <th>Autres Information</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < max($candidatures->count(), $userInfo->count()); $i++)
                                    <tr>
                                        <td>{{ $candidatures[$i]->id }}</td>
                                        <td>{{ $userInfo[$i]->nom }}</td>
                                        <td>{{ $userInfo[$i]->prenom }}</td>
                                        <td>{{ $candidatures[$i]->email }}</td>
                                        <td>{{ $candidatures[$i]->datenaissance ?? 'Non disponible' }}</td>
                                        <td>{{ $candidatures[$i]->dossier->offre->Titre ?? 'Non disponible' }}</td>
                                        <td>
                                            <strong>Adresse:</strong> {{ $userInfo[$i]->adresse }} <br>
                                            <strong>Téléphone:</strong> {{ $userInfo[$i]->telephone }} <br>
                                            <strong>Date de Creation du Dossier:</strong> {{ $candidatures[$i]->dossier->datedecreation }} <br>
                                            <strong>CV :</strong> <a href="{{ asset('storage/' . $candidatures[$i]->cv) }}">Télécharger CV</a><br>
                                            <strong>Lettre de Motivation :</strong> <a href="{{ asset('storage/' . $candidatures[$i]->lettre) }}">Télécharger Lettre</a><br>
                                            <strong>These :</strong> <a href="{{ asset('storage/' . $candidatures[$i]->These) }}">Télécharger These</a>
                                        </td>
                                    </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
